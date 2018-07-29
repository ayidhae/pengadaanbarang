<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_templateSPPH extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_template');
		$this->load->model('m_pesanan');
	}

	public function viewTemplateSPPH(){
		
		$data['mdata'] = $this->model_template->get_all_spph();
		$this->load->view('template/header');
		$this->load->view('logistik/view_templateSPPH',$data);
		$this->load->view('template/footer'); 
		
	}
	


	public function inputTemplateSPPH(){
	
		// $data['mdraft']	= $this->db->query('select * from pesanan p join template t on p.pesanan_id=t.pesanan_id where t.no_spph is null order by p.pesanan_id ASC');

		// $data['mdraft']	= $this->db->query('select * from pesanan  order by pesanan_id ASC');
		$data['mdraft']	= $this->m_pesanan->get_allPesanan();
		// echo json_encode($data['mdraft']);
		
		$this->load->view('template/header');
		$this->load->view('logistik/input_templateSPPH',$data);
		$this->load->view('template/footer');
	}
	
	function input(){
		$id= $this->model_template->get_id_template();
		echo $id;
		date_default_timezone_set("Asia/Jakarta");
		$nomorSPPH = 'BUT/LOG/SPPH/'.date("Y").'/'.date("m").'/'.str_pad($id,3, "0", STR_PAD_LEFT);

		$data = array(
			'pesanan_id' 	=> $this->input->post('pesanan_id'),
			'no_spph' 	    => $nomorSPPH,
			'tgl_spph' => date('Y-m-d'),
			'nama_pengadaan'		=> $this->input->post('nama_pengadaan'),
		'kepada_vendor' 	=> $this->input->post('kepada_vendor')
		);
		$this->model_template->simpan('template',$data);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center"> <a href="" class="close" data-dismiss="alert" aria-label="close">&times; </a>Data Template Berhasil Ditambah</div>');
		redirect('c_templateSPPH/viewTemplateSPPH');
	}
  	
	function edit($id){
		$id = base64_decode($id);
		// $data['mdraft']= $this->db->query('select * from pesanan order by pesanan_id ASC');
		$data['mdraft']	= $this->m_pesanan->get_allPesanan();
		$data["mdata"]= $this->model_template->edit("template","id='".$id."'");								
		$this->load->view('template/header');
		$this->load->view('logistik/edit_templateSPPH',$data);
		$this->load->view('template/footer');
	}
	
	// function update()
	// {
	// 	$in['id'] 			= $this->input->post('id');
	// 	$in['pesanan_id'] 	= $this->input->post('pesanan_id');
	// 	$in["no_spph"] 	= $this->input->post('no_spph');
	// 	$in["nama_pengadaan"]		= $this->input->post('nama_pengadaan');
	// 	$in["kepada_vendor"]		= $this->input->post('kepada_vendor');
	// 	$this->model_template->update('template',$in,'id');

	// 	$this->session->set_flashdata('msg','<div class="alert alert-success text-center"> <a href="" class="close" data-dismiss="alert" aria-label="close">&times; </a>Data Template Berhasil Diubah</div>');
	// 	redirect('c_templateSPPH/viewTemplateSPPH');	

	// }

	function update(){
		$this->form_validation->set_rules('kepada_vendor', 'kepada Vendor','required');
		if ($this->form_validation->run() == TRUE){
			$in['id'] 			= $this->input->post('id');
			$in['pesanan_id'] 	= $this->input->post('pesanan_id');
			$in["no_spph"] 	= $this->input->post('no_spph');
			$in["nama_pengadaan"]		= $this->input->post('nama_pengadaan');
			$in["kepada_vendor"]		= $this->input->post('kepada_vendor');
			$this->model_template->update('template',$in,'id');
			$this->session->set_flashdata('msg','<div class="alert alert-success text-center"> <a href="" class="close" data-dismiss="alert" aria-label="close">&times; </a>Data Template Berhasil Diubah</div>');
			redirect('c_templateSPPH/viewTemplateSPPH');
		}else{
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> <a href="" class="close" data-dismiss="alert" aria-label="close">&times; </a>Data Template Gagal Diubah</div>');
			redirect('c_templateSPPH/viewTemplateSPPH');
		}
	}
			
	
	 // function create_spph($id){
	 // 	$id = base64_decode($id);
		// date_default_timezone_set("Asia/Jakarta");
		// $nomorSPPH = 'BUT/LOG/SPPH/'.date("Y").'/'.date("m").'/'.str_pad($id,3, "0", STR_PAD_LEFT);
		// $where = array('id' => $id);
		// $data = array('no_spph' =>$nomorSPPH);
		// echo $nomorSPPH;
		// $this->model_template->update_nomor_spph($where,$data,'template');
		// redirect('c_templateSPPH/export_pdf/'.$id);	
	 // }

	function export_pdf($id='')
	{
		// date_default_timezone_set("Asia/Jakarta");
		// $rtno = 'BUT/LOG/'.$jenis_surat.date("yyyy").str_pad($data->id_pasien,6, "0", STR_PAD_LEFT);

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