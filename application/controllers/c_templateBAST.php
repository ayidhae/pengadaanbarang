<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_templateBAST extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_template');
	}

	public function viewTemplateBAST(){
		
		$data['mdata'] 	= $this->model_template->get_all_bast();
			$this->load->view('template/header');
		$this->load->view('logistik/view_templateBAST',$data);
		$this->load->view('template/footer'); 

	}

	

	function editTemplateBAST($id)
	{
		$id = base64_decode($id);
		$data['mdraft']= $this->db->query('select * from pesanan order by pesanan_id ASC');
		$data["mdata"]= $this->model_template->edit("template","id='".$id."'");					
		$this->load->view('template/header');
		$this->load->view('logistik/edit_templateBAST',$data);
		$this->load->view('template/footer');
	}
	
	function update()
	{
		$in['id'] 			= $this->input->post('id');
		$in['pesanan_id'] 	= $this->input->post('pesanan_id');
		$in["nama_customer"]= $this->input->post('nama_customer');
		$in["nama_vendor"]= $this->input->post('nama_vendor');
		$in["tgl_bast"]	= date('Y-m-d');
		$this->model_template->update('template',$in,'id');
		// $this->session->set_flashdata('info','Data berhasil diupdate !');
		redirect('c_templateBAST/viewTemplateBAST');	
	}
	
	
	function export_pdfCUST($id='')
	{
		$id 	= base64_decode($id);
		$data	= $this->model_template->get_content_bast($id);
		$i=array();
		$x=array();
		$no=1;
		foreach ($data->result() as $row) {
			$i['no']			= $no++;
			$i['nama_barang']	= $row->nama_barang;
			$i['satuan']		= $row->satuan;
			$i['vol']		= number_format($row->vol);
			$nama_customer		= $row->nama_customer;
			$nama_hari			= nama_hari($row->tgl_bast);
			$tgl_bast			= terbilang(tanggal($row->tgl_bast));
			$bulan				= nama_bulan(bulan($row->tgl_bast));
			$tahun				= terbilang(tahun($row->tgl_bast));
			array_push($x,$i);
		}
		
		$in['content_data']	= $x;
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
		$id 	= base64_decode($id);
		$data	= $this->model_template->get_content_bast($id);
		$i=array();
		$x=array();
		$no=1;
		foreach ($data->result() as $row) {
			$i['no']			= $no++;
			$i['nama_barang']	= $row->nama_barang;
			$i['satuan']		= $row->satuan;
			$i['vol']		= number_format($row->vol);
			$nama_vendor		= $row->nama_vendor;
			$nama_hari			= nama_hari($row->tgl_bast);
			$tgl_bast			= terbilang(tanggal($row->tgl_bast));
			$bulan				= nama_bulan(bulan($row->tgl_bast));
			$tahun				= terbilang(tahun($row->tgl_bast));
			array_push($x,$i);
		}
		
		$in['content_data']	= $x;
		$in['nama_vendor']= $nama_vendor;
		$in['hari']			= $nama_hari;
		$in['tgl_bast']		= $tgl_bast;
		$in['bulan']		= $bulan;
		$in['tahun']		= $tahun;
		
		$html_page 	= $this->parser->parse('logistik/surat_bastvend', $in, TRUE);
		$pdfFilePath= 'bast_vendor.pdf';
		$this->load->library('m_pdf');
		$this->m_pdf->pdf->WriteHTML($html_page);
		$this->m_pdf->pdf->Output($pdfFilePath, "D");
	}
}
