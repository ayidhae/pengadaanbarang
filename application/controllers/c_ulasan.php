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

// function viewUlasanlog(){
// 		$x['data']=$this->m_ulasan->get_data_stok();
// 	print_r($x);
// 		 $this->load->view('logistik/v_grafik',$x);
// 	}
	

	public function viewUlasan(){
		$where = array('username' => $this->session->userdata('username'));
		$data ['ulasan'] = $this->m_ulasan->viewUlasan($where,'ulasan')->result();

		$this->load->view('template/header');
		$this->load->view('customer/view_ulasan',$data);
		$this->load->view('template/footer'); 
	}

	public function viewUlasanlog(){
		
		 $data ['ulasan'] = $this->m_ulasan->viewUlasanlog()->result();
		 $data['data']=$this->m_ulasan->get_data_rating();
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
			// $data = array(
			// 	// 'username' => $this->m_ulasan->ambilDataNamaVendor(),
			// 	'pesanan_id' => $this->m_ulasan->ambilDataPesanan($this->session->userdata('username')),
			// );
			
		

	 	$data["pesanan_id"]= $this->m_ulasan->ambilDataPesanan($this->session->userdata('username'));
	 	
          $this->load->view('template/header');
		 $this->load->view('customer/input_ulasan',$data);
		  $this->load->view('template/footer');
    }  

	function inputUlasan(){
		$pesanan_id = $this->input->post('pesanan_id');
		  $nama_vendor  = $this->input->post('nama_vendor');
		   $rating  = $this->input->post('rating');
         $komentar  = $this->input->post('komentar');
        $data = array(
        'pesanan_id' => $pesanan_id,
         'nama_vendor' => $nama_vendor,
        'rating' => $rating,
        'komentar' => $komentar,
        'tanggal' => date('Y-m-d'),
        'username' => $this->session->userdata('username')
        );
        $this->m_ulasan->inputUlasan($data, 'ulasan');
        redirect('c_ulasan/viewUlasan');   
       }
  }
