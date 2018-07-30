<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_templateBAST extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_template');
	}

	public function viewTemplateBAST(){
	
		$data['bast'] 	= $this->model_template->get_all_bast();	
		// echo json_encode($data['bast']);
		$this->load->view('template/header');
		$this->load->view('logistik/view_bast',$data);
		$this->load->view('template/footer'); 

	}

	
	function export_pdfCUST($id='')
	{
		date_default_timezone_set("Asia/Jakarta");
		$tgl =  date('Y-m-d h:i:s');		
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
			$bulan				= nama_bulan(date('m',strtotime($tgl)));
			$tahun				= terbilang(tahun($tgl));			
			array_push($x,$i);
		}

		$in['content_data']	= $x;
		$in['nama_pengadaan']= $nama_pengadaan;
		$in['nama_customer']= $nama_customer;
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

	function export_pdfVEND($id='')
	{
		date_default_timezone_set("Asia/Jakarta");
		$tgl =  date('Y-m-d h:i:s');			
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
			$tahun				= terbilang(tahun($tgl));			
			array_push($x,$i);
		}
		
		$in['content_data']		= $x;
		$in['nama_pengadaan']	=$nama_pengadaan;
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
