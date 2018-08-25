<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_barang extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_barang');
	}

	public function view_AllBarang(){
		$data['barang'] = $this->m_barang->getAllBarang('barang')->result();
		$this->load->view('template/header');
		$this->load->view('logistik/view_barang',$data);
		$this->load->view('template/footer');
	}
	
	public function view_barang(){
		$where = array('username' => $this->session->userdata('username'));
		$data['barang'] = $this->m_barang->getBarang($where,'barang')->result();
		$this->load->view('template/header');
		$this->load->view('vendor/view_barang',$data);
		$this->load->view('template/footer');
	}

	public function view_barang_user($username){
		$where = array('username' => $username);;
		$data['barang'] = $this->m_barang->getBarang($where,'barang')->result();
		$this->load->view('template/header');
		$this->load->view('logistik/view_barang_user',$data);
		$this->load->view('template/footer');
	}

	public function detail($idbarang){
		$where = array('idbarang' => $idbarang);
		$data['barang'] = $this->m_barang->detail($where,'barang')->result();
		$this->load->view('template/header');
		$this->load->view('logistik/detail_barang',$data);
		$this->load->view('template/footer');
	}

	function delete_barang($idbarang){
		$where=array(
            'idbarang'=>$idbarang
		);
		$this->m_barang->delete_barang($where,'barang');
		$this->view_barang();
	}

	//form edit
	public function edit_barang($idbarang){
		$where = array('idbarang' => $idbarang);
		$data['barang'] = $this->m_barang->detail($where,'barang')->result();

		$this->load->view('template/header');
		$this->load->view('vendor/edit_barang',$data);
		$this->load->view('template/footer');
	}

	public function updateStatus($idbarang){
		$status=$this->input->post('status');
		$data=array(
					'status' =>$status,					
					);
		$where = array(
					'idbarang'=>$idbarang
				);
		$this->m_barang->update_barang($where,$data,"barang");
		redirect(base_url('c_user/homeLogistik'));
	}

	//update data barang
	public function update_barang($idbarang){
		$this->form_validation->set_rules('namabarang', 'Nama Barang','required|alpha_numeric_spaces');
			if ($this->form_validation->run() == TRUE){	
				$namabarang=$this->input->post('namabarang');
				$jenis=$this->input->post('jenis');	
				$spesifikasi=$this->input->post('spesifikasi_barang');
				$harga=$this->input->post('harga');
				$harga_but=$this->input->post('harga_but');
				$data=array(
					'namabarang' =>$namabarang,
					'jenis'=>$jenis,
					'spesifikasi_barang'=>$spesifikasi,
					'harga'=>$harga,
					'harga_but'=>$harga_but
					);
				$where=array(
					'idbarang'=>$idbarang
					);
				if(!empty($_FILES['gambar']['name'])){
					$config['upload_path']   = 'asset/img/barang/'; 
					$config['allowed_types'] = 'gif|jpg|png'; 					
					$config['max_width']     = 1024; 
					$config['max_height']    = 768;
					$this->load->library('upload',$config); 
					if (!$this->upload->do_upload('gambar')){
						$this->upload->display_errors();
					}else{
						$gambar = $this->upload->data('file_name');
					}
					$data['gambar'] = $gambar;
				}
				
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center"> <a href="" class="close" data-dismiss="alert" aria-label="close">&times; </a>Data barang berhasil diubah</div>');
				$this->m_barang->update_barang($where,$data,"barang");	
				redirect(base_url('c_barang/view_barang'));
				$this->view_barang();
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> <a href="" class="close" data-dismiss="alert" aria-label="close">&times; </a>Data barang gagal diubah</div>');
				$this->load->view('template/header');		
				$this->load->view('vendor/edit_barang');
				$this->load->view('template/footer');
			}
		// redirect(base_url('c_barang/view_barang'));
	}

	public function form_add(){
		$this->load->view('template/header');
		$this->load->view('vendor/add_barang');
		$this->load->view('template/footer');
	}

	public function add_barang(){
		$this->form_validation->set_rules('namabarang', 'Nama Barang','required|alpha_numeric_spaces');
		$this->form_validation->set_rules('harga', 'Harga','required|numeric');
		$harga = $this->input->post('harga');
		$harga_but = $harga*10/100;
		$id = $this->m_barang->getIdBarang();
		if ($this->form_validation->run() == TRUE){	
			$config['upload_path']   = 'asset/img/barang/'; 
			$config['allowed_types'] = 'gif|jpg|png'; 
			$config['max_size']      = 100; 
			$config['max_width']     = 1024; 
			$config['max_height']    = 768;
			$this->load->library('upload',$config); 
			if(! $this->upload->do_upload('gambar')){
				$error = array('error' => $this->upload->display_errors()); 
		 		?>
                     <script type=text/javascript>alert("File tidak sesuai format");</script>
        		<?php
        		$this->load->view('template/header');		
        		$this->load->view('vendor/add_barang');
				$this->load->view('template/footer');        		
			}else{
				$upload=$this->upload->data();			      				
				$data = array(
					'idbarang' => $id,
					'namabarang' => $this->input->post('namabarang'),
					'spesifikasi_barang' => $this->input->post('spesifikasi_barang'),
					'harga' => $harga,
					'harga_but' => $harga_but+$harga,
					'gambar' => $upload['file_name'],
					'jenis' => $this->input->post('jenis'),
					'username' => $this->session->userdata('username'),
					'status' => 'Tidak'
				);		
				
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center"> <a href="" class="close" data-dismiss="alert" aria-label="close">&times; </a>Data barang berhasil ditambahkan</div>');
				$this->m_barang->insert_barang($data);			
				redirect(base_url('c_barang/view_barang'));				
			}
		}else{
			$this->load->view('template/header');		
			$this->load->view('vendor/add_barang');
			$this->load->view('template/footer');		
		}
	}

}
