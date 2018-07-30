<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_templateBAST extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_template');		
	}

	public function viewTemplateBAST(){
<<<<<<< HEAD
		
		$data['bast'] 	= $this->model_template->get_all_bast();	
		// echo json_encode($data['bast']);
		$this->load->view('template/header');
		$this->load->view('logistik/contoh',$data);
=======
	
		$data['bast'] 	= $this->model_template->get_all_bast();	
		// echo json_encode($data['bast']);
		$this->load->view('template/header');
		$this->load->view('logistik/view_bast',$data);
>>>>>>> f53280abc7bfed79b7fcbb38d9e8fc97042f0a18
		$this->load->view('template/footer'); 

	}

<<<<<<< HEAD

	// function editTemplateBAST($id)
	// {
	// 	$id = base64_decode($id);
	// 	$data['mdraft']= $this->db->query('select * from pesanan order by pesanan_id ASC');
	// 	$data["mdata"]= $this->model_template->edit("template","id='".$id."'");	
			
	// 	$this->load->view('template/header');
	// 	$this->load->view('logistik/edit_templateBAST',$data);
	// 	$this->load->view('template/footer');
	// }
	
	// function update()
	// {
	// 	$in['id'] 			= $this->input->post('id');
	// 	$in['pesanan_id'] 	= $this->input->post('pesanan_id');
	// 	$in["nama_customer"]= $this->input->post('nama_customer');
	// 	$in["nama_vendor"]= $this->input->post('nama_vendor');
	// 	$in["tgl_bast"]	= date('Y-m-d');
	// 	$this->model_template->update('template',$in,'id');
	// 	// $this->session->set_flashdata('info','Data berhasil diupdate !');
	// 	redirect('c_templateBAST/viewTemplateBAST');	
	// }
	
	
	// function update($pesanan_id)
	// {	
	// 	$where=array(
	// 				'pesanan_id'=>$pesanan_id
	// 				);
	// 	$in["tgl_bast"]	= date('Y-m-d');
	// 	$this->m_pesanan->update('pesanan',$in,$where);
	// 	// $this->session->set_flashdata('info','Data berhasil diupdate !');
	// 	redirect('c_templateBAST/viewTemplateBAST');	
	// }


	function export_pdfCUST($id='')
	{
		date_default_timezone_get('Asia/Jakarta');
		$tgl=date('d-n-Y H:i:s');			
		// $id 	= base64_decode($id);
=======
	
	function export_pdfCUST($id='')
	{
		date_default_timezone_set("Asia/Jakarta");
		$tgl =  date('Y-m-d h:i:s');		
>>>>>>> f53280abc7bfed79b7fcbb38d9e8fc97042f0a18
		$data	= $this->model_template->get_content_bast($id);		
		$i=array();
		$x=array();
		$no=1;
		foreach ($data->result() as $row) {
			$i['no']			= $no++;
			$i['nama_barang']	= $row->nama_barang;
			$i['satuan']		= $row->satuan;
			$i['vol']			= number_format($row->vol);
			$nama_pengadaan		= $row->nama_pengadaan;
			$nama_customer		= $row->customer;
			$nama_hari			= nama_hari($tgl);
			$tgl_bast			= terbilang(date('d',strtotime($tgl)));
<<<<<<< HEAD
			$bulan				= nama_bulan(date('n',strtotime($tgl)));
			$tahun				= terbilang(tahun($tgl));
=======
			$bulan				= nama_bulan(date('m',strtotime($tgl)));
			$tahun				= terbilang(tahun($tgl));			
>>>>>>> f53280abc7bfed79b7fcbb38d9e8fc97042f0a18
			array_push($x,$i);
		}

		$in['content_data']	= $x;
<<<<<<< HEAD
		$in['nama_pengadaan']		= $nama_pengadaan;
		$in['customer']		= $nama_customer;
=======
		$in['nama_pengadaan']= $nama_pengadaan;
		$in['nama_customer']= $nama_customer;
>>>>>>> f53280abc7bfed79b7fcbb38d9e8fc97042f0a18
		$in['hari']			= $nama_hari;
		$in['tgl_bast']		= $tgl_bast;
		$in['bulan']		= $bulan;
		$in['tahun']		= $tahun;
		
		$html_page 	= $this->parser->parse('logistik/surat_bastcust', $in, TRUE);
		$pdfFilePath= 'bast_customer.pdf';
		$this->load->library('m_pdf');
		$this->m_pdf->pdf->WriteHTML($html_page);
		$this->m_pdf->pdf->Output($pdfFilePath, "D");
	}
	

<<<<<<< HEAD
	function export_pdfVEND($id=''){		
		date_default_timezone_get('Asia/Jakarta');
		$tgl=date('d-m-Y H:i:s');
				
		// $id 	= base64_decode($id);
=======
	function export_pdfVEND($id='')
	{
		date_default_timezone_set("Asia/Jakarta");
		$tgl =  date('Y-m-d h:i:s');			
>>>>>>> f53280abc7bfed79b7fcbb38d9e8fc97042f0a18
		$data	= $this->model_template->get_content_bast($id);
		// print_r($data);
		$i=array();
		$x=array();
		$no=1;
		foreach ($data->result() as $row) {
			$i['no']			= $no++;
			$i['nama_barang']	= $row->nama_barang;
			$i['satuan']		= $row->satuan;
			$i['vol']			= number_format($row->vol);
			$nama_pengadaan		= $row->nama_pengadaan;
			$nama_vendor		= $row->vendor;
			$nama_hari			= nama_hari($tgl);
			$tgl_bast			= terbilang(date('d',strtotime($tgl)));
			$bulan				= nama_bulan(date('m',strtotime($tgl)));
<<<<<<< HEAD
			$tahun				= terbilang(tahun($tgl));
=======
			$tahun				= terbilang(tahun($tgl));			
>>>>>>> f53280abc7bfed79b7fcbb38d9e8fc97042f0a18
			array_push($x,$i);
		}
		
		$in['content_data']		= $x;
<<<<<<< HEAD
		$in['nama_pengadaan']	= $nama_pengadaan;
=======
		$in['nama_pengadaan']	=$nama_pengadaan;
>>>>>>> f53280abc7bfed79b7fcbb38d9e8fc97042f0a18
		$in['nama_vendor']		= $nama_vendor;
		$in['hari']				= $nama_hari;
		$in['tgl_bast']			= $tgl_bast;
		$in['bulan']			= $bulan;
		$in['tahun']			= $tahun;
		
		$html_page 	= $this->parser->parse('logistik/surat_bastvend', $in, TRUE);
		$pdfFilePath= 'bast_vendor.pdf';

		$this->load->library('m_pdf');
		$this->m_pdf->pdf->WriteHTML($html_page);
		$this->m_pdf->pdf->Output($pdfFilePath, "D");
	}	
}

	
