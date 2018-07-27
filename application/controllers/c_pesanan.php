<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_pesanan extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->model('m_pesanan');
		$this->load->model('m_suratKeluar');
	}


	public function viewPesanan(){
		$data['pesanan'] = $this->m_pesanan->get_allPesanan();
		$this->load->view('template/header');
		$this->load->view('logistik/view_pesanan',$data);
		$this->load->view('template/footer'); 
		
	}

	public function tambahPesanan($id,$username){	
		// $data['pesanan_id']= $this->m_pesanan->get_pesanan_id();
		// $no_surat = $rowSurat->no_surat;
		$rowSurat = $this->m_suratKeluar->get_nosurat($id);
		$data = array(
			 	'username' => $username,
			 	'nama_perusahaan' => $this->m_pesanan->ambilDataNamaVendor(),
			 	'pesanan_id' => $this->m_pesanan->get_pesanan_id(),			 	
				'id_surat' => $id
				);
		$this->load->view('template/header');
		$this->load->view('logistik/input_pesanan',$data);
		$this->load->view('template/footer'); 
		
	}

	public function InputTambahPesanan(){
	$this->form_validation->set_rules('nama_pengadaan', 'Nama Pengadaan','required|alpha_numeric_spaces');
	date_default_timezone_set("Asia/Jakarta");
	$today =  date('Y-m-d h:i:s');
		if($this->form_validation->run() == TRUE) {
			$data = array(
						'id_surat' => $this->input->post('id_surat'),
						'pesanan_id' => $this->input->post('pesanan_id'),
						'nama_pengadaan' => $this->input->post('nama_pengadaan'),
						'nama_customer' => $this->input->post('nama_customer'),
						'nama_vendor' => $this->input->post('nama_vendor'),
						'tgl_input' => $today,
						'status' =>  $this->input->post('status')
					);

			$this->m_pesanan->simpan('pesanan',$data);
			$id = $this->input->post('id_surat');
			$status=array(
				'status_dipesanlogistik'=> 1
				);
			$where=array(
				'id_surat'=>$id
				);
			$this->m_suratKeluar->updateStatus($where,$status,'surat_keluar');
			redirect('c_pesanan/detail/'.trim(base64_encode($data['pesanan_id']),'=').'');
		}else{	
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> <a href="" class="close" data-dismiss="alert" aria-label="close">&times; </a>Data Pesanan Gagal Ditambah</div>');
			redirect('c_suratMasuk/surat_masukLogistik');	
			// redirect(base_url('/c_pesanan/tambahPesanan/'.$data['id_surat'].'/'.$data['username']));
		}	
	}
	


	 function editPesanan($id)
	 {
		$id = base64_decode($id);	
	 	$data["editpesanan"]= $this->m_pesanan->edit("pesanan","pesanan_id='".$id."'");								

	 	$this->load->view('template/header');
	 	$this->load->view('logistik/edit_pesanan',$data);
	 	$this->load->view('template/footer'); 
	 }
	
	 function edit(){
	 	$this->form_validation->set_rules('nama_pengadaan', 'Nama pengadaan','required|alpha_numeric_spaces');
	 	if ($this->form_validation->run() == TRUE){
	 		$data['pesanan_id'] = $this->input->post('pesanan_id');
	 		$data["nama_pengadaan"] 	= $this->input->post('nama_pengadaan');
	 		$this->m_pesanan->update('pesanan',$data,'pesanan_id');
	 		$this->session->set_flashdata('msg','<div class="alert alert-success text-center"> <a href="" class="close" data-dismiss="alert" aria-label="close">&times; </a>Data Pesanan berhasil diubah</div>');
	 		redirect('c_pesanan/viewPesanan');		
	 	}else{
	 		$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> <a href="" class="close" data-dismiss="alert" aria-label="close">&times; </a>Data pesanan gagal diubah</div>');
	 		redirect('c_pesanan/viewPesanan');
	 	}
	 	
	 }



//hapus pesanan pesanan sekaligus detail
	 	function hapus($id){
	 	$id = base64_decode($id);
        $this->m_pesanan->hapus($id,"pesanan_id","pesanan");
	  $this->m_pesanan->hapus($id,"pesanan_id","pesanan_detail");
        redirect('c_pesanan/viewPesanan');
        }

		function detail($id){		
			$id = base64_decode($id);
			$data["pesanan_id"]= $id;
			//diatas mengambil pesanan id dari tabel pesanan					
			$data["pesanandetail"] = $this->m_pesanan->edit("pesanan_detail","pesanan_id='".$id."'");
			// $data['pesanan_id']= $this->m_pesanan->get_draft_id();
			$this->load->view('template/header');
			$this->load->view('logistik/pesanan_detail',$data);
			$this->load->view('template/footer'); 		
		}

	
	 	public function insert_detail(){
		$this->form_validation->set_rules('nama_barang', 'Nama Barang','required|alpha_numeric_spaces');		
		$this->form_validation->set_rules('satuan', 'Satuan','required|alpha_numeric_spaces');
		$this->form_validation->set_rules('vol', 'Volume','required|numeric');
			if ($this->form_validation->run() == TRUE){
				$data = array(				
	 				'pesanan_id' => $this->input->post('pesanan_id'),
					'nama_barang' => $this->input->post('nama_barang'),
	 				'satuan' => $this->input->post('satuan'),
					// 'harga' => $this->input->post('harga'),
	 				'vol' => $this->input->post('vol')
	 				// 'subtotal' => $harga*$jumlah				
	 			);
	 			$this->m_pesanan->simpan('pesanan_detail',$data);
	 			$this->session->set_flashdata('msg','<div class="alert alert-success text-center"> <a href="" class="close" data-dismiss="alert" aria-label="close">&times; </a>Detail Barang berhasil Disimpan</div>');
				redirect('c_pesanan/detail/'.trim(base64_encode($data['pesanan_id']),'=').'');
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> <a href="" class="close" data-dismiss="alert" aria-label="close">&times; </a>Detail Barang Gagal Disimpan</div>');
	 			redirect('c_pesanan/viewPesanan');
			}
	 	
				
	 	}


	
	 	function edit_detail($id_detail)
	{
		$id_detail = base64_decode($id_detail);
		$data["mdetail"] = $this->m_pesanan->edit("pesanan_detail","detail_id='".$id_detail."'");	
		$this->load->view('template/header');
		$this->load->view('logistik/edit_detail',$data);
		$this->load->view('template/footer'); 
	}
	
	function update_detail()
	{
		$pesanan_id			= $this->input->post('pesanan_id');
		$data["detail_id"] 	= $this->input->post('detail_id');
		$data["nama_barang"] 	= $this->input->post('nama_barang');
		$data["satuan"] 		= $this->input->post('satuan');
		$data["harga"]		= $this->input->post('harga');
		$data["vol"]		= $this->input->post('vol');
		$data["subtotal"]		= $data["harga"]*$data["vol"];
		$this->m_pesanan->update('pesanan_detail',$data,'detail_id');

	redirect('c_pesanan/detail/'.trim(base64_encode($pesanan_id),'=').'');

		
	}



  function hapus_detail($id,$id_detail)
	 {
	 	$id = base64_decode($id);
	 	$id_detail = base64_decode($id_detail);
	 	$this->m_pesanan->hapus($id_detail,"detail_id","pesanan_detail");
	 	redirect('c_pesanan/detail/'.trim(base64_encode($id),'=').'');
	 }

//dibawah untuk status pesanan


public function viewStatuslog(){
		
		$data['pesanan'] = $this->m_pesanan->get_allPesanan();
		$this->load->view('template/header');
				$this->load->view('logistik/view_statuslog',$data);
		$this->load->view('template/footer'); 
	}

	 function editStatus($id)
	 {
		$id = base64_decode($id);
		

	 	$data["editpesanan"]= $this->m_pesanan->edit("pesanan","pesanan_id='".$id."'");								

	 	$this->load->view('template/header');
	 	$this->load->view('logistik/edit_status',$data);
	 	$this->load->view('template/footer'); 
	 }
	
	 function updateStatus()
	 {
	 	$data['pesanan_id'] = $this->input->post('pesanan_id');
	 	$data["tgl_input"] 	= $this->input->post('tgl_input');
	 	$data['tgl_selesai'] = date('Y-m-d');
 	    $data['nama_customer'] = $this->input->post('nama_customer');
 	     	$data['status'] = $this->input->post('status');
 	     	 	$data['catatan'] = $this->input->post('catatan');
	 	$this->m_pesanan->update('pesanan',$data,'pesanan_id');
	 	redirect('c_pesanan/viewStatuslog');	
	 }

//untuk customer
	 	public function viewStatusPesanan(){
		$data ['status'] = $this->m_pesanan->viewStatus($this->session->userdata('username'));
		$this->load->view('template/header');
		$this->load->view('customer/view_status',$data);
		$this->load->view('template/footer'); 
	
	}
	 
	
	
}
