<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_suratKeluar extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_suratKeluar');
				$this->load->model('m_suratMasuk');
		$this->load->model('m_direktur');
		$this->load->model('m_logistik');
		$this->load->model('m_customer');
		$this->load->model('m_vendor');
		$this->load->model('m_pesanan');
		$this->load->model('model_template');
		$this->load->model('m_user');

	}
		 //call model
	public function home(){
		$this->load->view('template/header'); // default template
		$this->load->view('customer/dashboard'); // dashboard vendornya
		$this->load->view('template/footer'); 
	}
//halaman customer
	 public function viewSuratKeluarCustomer(){
		$where = array('username' => $this->session->userdata('username'));
		$data ['surat_keluar'] = $this->m_suratKeluar->viewSuratKeluar($where,'surat_keluar')->result();
		$this->load->view('template/header');
		$this->load->view('customer/view_suratKeluar',$data);
		$this->load->view('template/footer'); 
		
	}

//customer
	function inputSuratDirektur()
		{
			$data = array(
				'username' => $this->m_suratKeluar->ambilDataUsernameDirektur(),
				// 'hak_akses' => $this->m_suratkeluarcust->ambilDataUsernameLogist(),
				
			);

		 $this->load->view('template/header');
		 $this->load->view('customer/input_suratKeluarDirekt', $data);
		 $this->load->view('template/footer');
	}


	

//DIBAWAH ADALAH INPUT SURAT KELUAR DIHALAMAN CUSTOMER
	function inputSuratKeluarDirektur(){	
    $username = $this->input->post('tujuan');
    $penanggung_jawab  = $this->input->post('penanggung_jawab');
    $no_hp =  $this->input->post('no_hp');
    $jenis_surat = $this->input->post('jenis_surat');
    $no_surat = $this->input->post('no_surat');
    $tgl_surat =$this->input->post('tgl_surat');
    
    $config['upload_path'] 		= 'asset/upload/surat_keluar';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|xlsx';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		$this->upload->do_upload('file');
	      $upload	 	= $this->upload->data();
				
    $data = array(
    
      'tujuan_direktur' => $username,
      'penanggung_jawab' => $penanggung_jawab,
      'no_hp' => $no_hp,
      'jenis_surat' => $jenis_surat,
      'no_surat' => $no_surat,
      'tgl_surat' => date('Y-m-d h:i:s'),
       'file' => $upload['file_name'],
      'username' => $this->session->userdata('username')
      
      );

     $this->m_suratKeluar->insertData($data, 'surat_keluar');
   redirect(base_url('c_suratKeluar/viewSuratKeluarCustomer'));
  }

//customer
	function inputSuratLogistik()
		{
			$data = array(
				'username' => $this->m_suratKeluar->ambilDataUsernameLogistik(),
				// 'hak_akses' => $this->m_suratkeluarcust->ambilDataUsernameLogist(),
				
			);


		$this->load->view('template/header');
		$this->load->view('customer/input_suratKeluarLogist', $data);
		$this->load->view('template/footer');
	}

	
	function inputSuratKeluarLogistik(){
		

    $username = $this->input->post('tujuan');
    $penanggung_jawab  = $this->input->post('penanggung_jawab');
    $no_hp =  $this->input->post('no_hp');
    $jenis_surat = $this->input->post('jenis_surat');
    $no_surat = $this->input->post('no_surat');
    $tgl_surat =$this->input->post('tgl_surat');
    $pesan = $this->input->post('pesan');
    $config['upload_path'] 		= 'asset/upload/surat_keluar';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		$this->upload->do_upload('file');
	      $upload	 	= $this->upload->data();
				
    $data = array(
    
      'tujuan_logistik' => $username,
       'penanggung_jawab' => $penanggung_jawab,
        'no_hp' => $no_hp,
      'jenis_surat' => $jenis_surat,
      'no_surat' => $no_surat,
     'tgl_surat' => date('Y-m-d h:i:s'),
       'file' => $upload['file_name'],
      'pesan' => $pesan,
      'username' => $this->session->userdata('username')
      
      );

     $this->m_suratKeluar->insertData($data, 'surat_keluar');
   redirect(base_url('c_suratKeluar/viewSuratKeluarCustomer'));
  }

  
// diatas adalah input surat di menu customer


// DIBAWAH ADA DIHALAMAN LOGISTIK

	   public function viewSuratKeluarLogistik(){ // ini ada di menu surat keluar logistik
			$where = array('username' => $this->session->userdata('username'));
			$data ['surat_keluar'] = $this->m_suratKeluar->viewSuratKeluar($where,'surat_keluar')->result();
			$this->load->view('template/header');
			$this->load->view('logistik/view_suratKeluar',$data);
			$this->load->view('template/footer'); 
			
		}

	//form kirim SPH ke customer
	function form_kirimSPH($id){
		$where = array('username' => $this->session->userdata('username'));
		$data['nama_pnj'] = $this->m_user->ambilNama($where);
		$id = base64_decode($id);		
		$data['pesanan'] = $this->model_template->detail($id)->result();	
		     $this->model_template->manualQuery("update template set status2='PRINT' where id='".$id."'");		
		$this->load->view('template/header');
		$this->load->view('logistik/form_kirimsph',$data);
		$this->load->view('template/footer');
	}
	// function inputSuratCustomer()
	// 	{
	// 		$data = array(
	// 			'username' => $this->m_suratKeluar->ambilDataUsernameCustomer(),
	// 			// 'hak_akses' => $this->m_suratkeluarcust->ambilDataUsernameLogist(),
				
	// 		);

	// 	$this->load->view('template/header');
	// 	$this->load->view('logistik/input_suratKeluarCust', $data);
	// 	$this->load->view('template/footer');
	// }
	

	function inputSuratKeluarCustomer(){
		

    $tujuan_customer = $this->input->post('tujuan_customer');
    $penanggung_jawab = $this->input->post('penanggung_jawab');
    $no_hp = $this->input->post('no_hp');
    $jenis_surat = $this->input->post('jenis_surat');
    $no_surat = $this->input->post('no_surat');
    $tgl_surat = date('Y-m-d h:i:s');
    $pesan = $this->input->post('pesan');
    $config['upload_path'] 		= 'asset/upload/surat_keluar';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		$this->upload->do_upload('file');
	      $upload	 	= $this->upload->data();
				
    $data = array(
    
      'tujuan_customer' => $tujuan_customer,
      'penanggung_jawab' => $penanggung_jawab,
      'no_hp' => $no_hp,
      'jenis_surat' => $jenis_surat,
      'no_surat' => $no_surat,
     'tgl_surat' => $tgl_surat,
       'file' => $upload['file_name'],
      'pesan' => $pesan,
      'username' => $this->session->userdata('username')
      
      );

     $this->m_suratKeluar->insertData($data, 'surat_keluar');

    redirect(base_url('c_suratKeluar/viewSuratKeluarLogistik'));
  }


//vendor
  function formsph()
		{
			$data = array(
				'username' => $this->m_suratKeluar->ambilDataUsernameLogistik(),								
			);

		$this->load->view('template/header');
		$this->load->view('vendor/formsuratsph', $data);
		$this->load->view('template/footer');
	}

	
	function addsph(){
    $username = $this->input->post('tujuan');
    $penanggung_jawab  = $this->input->post('penanggung_jawab');
    $no_hp =  $this->input->post('no_hp');
    $jenis_surat = $this->input->post('jenis_surat');
    $no_surat = $this->input->post('no_surat');
    $tgl_surat =$this->input->post('tgl_surat');
    $pesan = $this->input->post('pesan');
    $config['upload_path'] 		= 'asset/upload/surat_keluar';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		$this->upload->do_upload('file');
	      $upload	 	= $this->upload->data();
				
    $data = array(
    
      'tujuan_logistik' => $username,
       'penanggung_jawab' => $penanggung_jawab,
        'no_hp' => $no_hp,
      'jenis_surat' => $jenis_surat,
      'no_surat' => $no_surat,
      'tgl_surat' => date('Y-m-d h:i:s'),
       'file' => $upload['file_name'],
      'pesan' => $pesan,
      'username' => $this->session->userdata('username')
      
      );

     $this->m_suratKeluar->insertData($data, 'surat_keluar');
   	redirect(base_url('c_suratKeluar/viewSuratKeluarVendor'));
  }

  	public function viewSuratKeluarVendor(){
		$where = array('username' => $this->session->userdata('username'));
		$data ['surat_keluar'] = $this->m_suratKeluar->viewSuratKeluar($where,'surat_keluar')->result();
		$this->load->view('template/header');
		$this->load->view('vendor/list_suratKeluar',$data);
		$this->load->view('template/footer'); 
		
	}

	//form kirim spph
	function form_kirimspph($id){
		$where = array('username' => $this->session->userdata('username'));
		$data['nama_pnj'] = $this->m_user->ambilNama($where);	
		// echo json_encode($data['nama_pnj']);
		$id = base64_decode($id);
		// $where = array('id' => $id);

		$data['pesanan'] = $this->model_template->detail($id)->result();	
			$this->model_template->manualQuery("update template set status1='PRINT' where id='".$id."'");	

		$this->load->view('template/header');
		$this->load->view('logistik/form_kirimspph',$data);
		$this->load->view('template/footer');
	}


	//form kirim spk
	function form_kirimspk($id){
		$id = base64_decode($id);
		// $where = array('id' => $id);
		  $this->model_template->manualQuery("update template set status3='PRINT' where id='".$id."'");	
		$data['pesanan'] = $this->model_template->detail($id)->result();			
		$this->load->view('template/header');
		$this->load->view('logistik/form_kirimspk',$data);
		$this->load->view('template/footer');
	}
	//belum selesai:
	public function kirim_suratVendor()	{
		$config['upload_path'] 		= 'asset/upload/surat_keluar';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';
    
		$this->load->library('upload', $config);
		$this->upload->do_upload('file');
	    $upload	 	= $this->upload->data();
	    $data = array (
	    	'tujuan_vendor' => $this->input->post('tujuan_vendor'),
	    	'no_surat' => $this->input->post('no_surat'),
	    	'file' => $upload['file_name'],
	    	'jenis_surat' => $this->input->post('jenis_surat'),
      		'pesan' => $this->input->post('pesan'),
      		'penanggung_jawab' => $this->input->post('penanggung_jawab'),
      		'no_hp' => $this->input->post('no_hp'),
      		'tgl_surat' => date('Y-m-d h:i:s'),
      		'username' => $this->session->userdata('username')
	    	);
	    $this->m_suratKeluar->insertData($data, 'surat_keluar');
	    redirect(base_url('c_suratKeluar/viewSuratKeluarLogistik'));
	}

}

 
	