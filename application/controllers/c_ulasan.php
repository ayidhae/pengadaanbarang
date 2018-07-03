<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_ulasan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_ulasan');
		$this->load->model('m_progress');

		
	}
	public function home(){
		$this->load->view('template/header'); // default template
		$this->load->view('customer/dashboard'); // dashboard vendornya
		$this->load->view('template/footer'); 
	}


	

	public function viewUlasan(){
		$where = array('username' => $this->session->userdata('username'));
		$data ['ulasan'] = $this->m_ulasan->viewUlasan($where,'ulasan')->result();
		$this->load->view('template/header');
		$this->load->view('customer/view_ulasan',$data);
		$this->load->view('template/footer'); 
	}

	public function viewUlasanlog(){
		
		 $data ['ulasan'] = $this->m_ulasan->viewUlasanlog()->result();
		$this->load->view('template/header');
		$this->load->view('logistik/view_ulasanlog',$data);
		$this->load->view('template/footer'); 
	}

	function hapusUlasanlog($id_ulasan){
        $where=array('id_ulasan' => $id_ulasan);
        $this->m_ulasan->delete($where,'ulasan');
        redirect('c_ulasan/viewUlasanlog');
        }




	function input(){
			$data = array(
				'username' => $this->m_ulasan->ambilDataNamaVendor(),
				
			);
         $this->load->view('template/header');
		$this->load->view('customer/input_ulasan',$data);
		$this->load->view('template/footer');
    }  

	function inputUlasan(){
		  $username  = $this->input->post('dari_vendor');
		   $rating  = $this->input->post('rating');
         $komentar  = $this->input->post('komentar');
        $data = array(
        
        'dari_vendor' => $username,
        'rating' => $rating,
        'komentar' => $komentar,
        'tanggal' => date('Y-m-d'),
        'username' => $this->session->userdata('username')
        );
        $this->m_ulasan->inputUlasan($data, 'ulasan');
        redirect('c_ulasan/viewUlasan');   
       }
  }
