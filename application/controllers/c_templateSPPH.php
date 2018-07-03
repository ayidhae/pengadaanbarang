<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_templateSPPH extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_template');
	}

	public function viewTemplateSPPH(){
		
		$data['mdata'] = $this->model_template->get_all_spph();
		$this->load->view('template/header');
		$this->load->view('logistik/view_templateSPPH',$data);
		$this->load->view('template/footer'); 
		
	}
	

	public function inputTemplateSPPH(){
	
		$data['mdraft']	= $this->db->query('select * from pesanan order by pesanan_id ASC');
		
		$this->load->view('template/header');
		$this->load->view('logistik/input_templateSPPH',$data);
		$this->load->view('template/footer');
	}
	
	function input()
	{
		$data = array(
			'pesanan_id' 	=> $this->input->post('pesanan_id'),
			'no_spph' 	    => $this->input->post('no_spph'),
			'tgl_spph' => date('Y-m-d'),
			'nama_pengadaan'		=> $this->input->post('nama_pengadaan'),
		'kepada_vendor' 	=> $this->input->post('kepada_vendor')
		);
		$this->model_template->simpan('template',$data);
		redirect('c_templateSPPH/viewTemplateSPPH');

	}
  	
	
	
	function edit($id)
	{
		$id = base64_decode($id);
		$data['mdraft']= $this->db->query('select * from pesanan order by pesanan_id ASC');
		$data["mdata"]= $this->model_template->edit("template","id='".$id."'");								
		$this->load->view('template/header');
		$this->load->view('logistik/edit_templateSPPH',$data);
		$this->load->view('template/footer');
	}
	
	function update()
	{
		$in['id'] 			= $this->input->post('id');
		$in['pesanan_id'] 	= $this->input->post('pesanan_id');
		$in["no_spph"] 	= $this->input->post('no_spph');
		$in["nama_pengadaan"]		= $this->input->post('nama_pengadaan');
		$in["kepada_vendor"]		= $this->input->post('kepada_vendor');
		$this->model_template->update('template',$in,'id');
		redirect('c_templateSPPH/viewTemplateSPPH');	
	}
	

	function export_pdf($id='')
	{
		$id 	= base64_decode($id);
		$content= $this->model_template->get_content_spph($id);
		$i=array();
		$x=array();
		$no=1;
		foreach ($content->result() as $row) {
			$i['no']			= $no++;
			$i['nama_barang']	= $row->nama_barang;
			$i['satuan']		= $row->satuan;
			$i['vol']		= $row->vol;
			array_push($x,$i);
			$in['pesanan_id']		= $row->pesanan_id;
			$in['no_spph']	= $row->no_spph;
			$in['tgl_spph']	= tanggal($row->tgl_spph).' '.nama_bulan(bulan($row->tgl_spph)).' '.tahun($row->tgl_spph);
			$in['nama_pengadaan']		= $row->nama_pengadaan;
			$in['kepada_vendor']		= $row->kepada_vendor;
		}
		
		$in['content_data'] = $x;
		$html_page 	= $this->parser->parse('logistik/surat_spph', $in, TRUE);
		$pdfFilePath = 'spph.pdf';
		
		$this->load->library('m_pdf');
		$this->m_pdf->pdf->WriteHTML($html_page);
		$this->m_pdf->pdf->Output($pdfFilePath, "D");
	}
}
