<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_user extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('m_user'); 
        $this->load->model('m_customer');
		$this->load->model('m_vendor');    
        $this->load->model('m_barang');              
    }

    public function homeDirektur(){
		// $this->load->view('vendor/header_ven');
		$data['barang'] = $this->m_barang->getAllBarang('barang');
		$this->load->view('template/header'); // default template
		$this->load->view('direktur/dashboard',$data); // dashboard vendornya
		$this->load->view('template/footer'); 
	}

	public function homeLogistik(){
		$data['barang'] = $this->m_barang->getAllBarang('barang');
		$this->load->view('template/header');
		 $this->load->view('logistik/view_barang',$data);		
		$this->load->view('template/footer');
	}

	public function kelola_user(){		
		$data['vendor'] = $this->m_vendor->getAllVendor()->result();
		$data['customer'] = $this->m_customer->getAllCustomer()->result();
		$data['direktur'] = $this->m_direktur->getAllDirektur()->result();
		$data['logistik'] = $this->m_logistik->getAllLogistik()->result();

		//$data = array();
		//array_push($data,$getVendor);
		//array_push($data,$getCustomer);
		//array_push($data,$getDirektur);
		//array_push($data,$getLogistik);
		//print_r($data[0]);
		//print_r($data);
		$this->load->view('template/header');
		$this->load->view('logistik/kelola_user',$data);
		$this->load->view('template/footer');

		//print_r($getVendor->result());
		//print_r($getCustomer->result());
		//print_r($getDirektur->result());
		//print_r($getLogistik->result());
	}

	// public function home(){
	// 	$this->load->view('utama/header');
	// 	$this->load->view('utama/home');
	// 	$this->load->view('utama/footer');
	// }

	// public function login(){
	// 	$this->load->view('utama/header');
	// 	$this->load->view('utama/v_login');

	// 	$username =$this->input->post('username');
	// 	$password =$this->input->post('password');
	
		
	// 	$cek = $this->m_user->cek($username, $password);
	// 	$cekVendor = $this->m_vendor->cek($username, $password);
	// 	$cekCustomer = $this->m_customer->cek($username, $password);

	// 	if($cek->num_rows() == 1)
	// 	{
	// 		foreach($cek->result() as $data){
	// 			$sess_data['username'] = $data->username;
	// 			$sess_data['password'] = $data->password;
	// 			$sess_data['hak_akses'] = $data->hak_akses;
	// 			$this->session->set_userdata($sess_data);
	// 		}
		

	// 		if($this->session->userdata('hak_akses') == 'logistik')
	// 		{
	// 			redirect('c_logistik/home');
	// 		}else{
	// 			$_SESSION['pesan'] = 'Maaf, kombinasi username dengan password salah.';
	// 			$this->session->mark_as_flash('pesan');
	// 		}
	// 	} else if($cekVendor->num_rows() == 1)
	// 	{
	// 		foreach($cekVendor->result() as $data){
	// 			$sess_data['username'] = $data->username;
	// 			$sess_data['password'] = $data->password;
	// 			$sess_data['hak_akses'] = $data->hak_akses;
	// 			$this->session->set_userdata($sess_data);
	// 		}
		

	// 		if($this->session->userdata('hak_akses') == 'vendor')
	// 		{
	// 			redirect('c_vendor/home');

	// 		}else{
	// 			$_SESSION['pesan'] = 'Maaf, kombinasi username dengan password salah.';
	// 			$this->session->mark_as_flash('pesan');
	// 		}
	// 	} else if($cekCustomer->num_rows() == 1)
	// 	{
	// 		foreach($cekCustomer->result() as $data){
	// 			$sess_data['username'] = $data->username;
	// 			$sess_data['password'] = $data->password;
	// 			$sess_data['hak_akses'] = $data->hak_akses;
	// 			$this->session->set_userdata($sess_data);
	// 		}
		

	// 		if($this->session->userdata('hak_akses') == 'customer')
	// 		{
	// 			redirect('c_customer/home');

	// 		}else{
	// 			$_SESSION['pesan'] = 'Maaf, kombinasi username dengan password salah.';
	// 			$this->session->mark_as_flash('pesan');
	// 		}


	// 	}
	// 	$this->load->view('utama/footer');
	// }	

	function keluar()
	{
		$this->session->sess_destroy();
		redirect('c_user/home');
	}

}
