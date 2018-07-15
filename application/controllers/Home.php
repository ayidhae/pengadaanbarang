<?php
/**
* 
*/
class Home extends CI_Controller
{

	
	function index()
	{
		if($this->session->has_userdata('username')){
				if($this->session->userdata('hak_akses')=='logistik'){
					redirect('c_user/homeLogistik');
				}elseif($this->session->userdata('hak_akses')=='direktur'){
					redirect('c_user/homeDirektur');
				}elseif ($this->session->userdata('hak_akses')=='customer') {
					redirect('c_customer/home');
				}else{
					redirect('c_vendor/home');
				}
		}else{
			$this->load->view('utama/home');
		}
	}
	

}