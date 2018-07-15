<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_templateSPH extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_template');
	}

	public function viewTemplateSPH(){
		
		$data['mdata'] = $this->model_template->get_all_sph();
			$this->load->view('template/header');
		$this->load->view('logistik/view_templateSPH',$data);
		$this->load->view('template/footer'); 
	
	}


	//SPH TIDAK USAH INPUT

	public function editTemplateSPH($id){
	$id = base64_decode($id);
 	$data['mdraft']= $this->db->query('select * from pesanan order by pesanan_id ASC');
 	$data["mdata"]= $this->model_template->edit("template","id='".$id."'");	


		$this->load->view('template/header');
		$this->load->view('logistik/edit_templateSPH',$data);
		$this->load->view('template/footer');
	}


	function edit()
	{
		$in['id'] 			= $this->input->post('id');
		$in['pesanan_id'] 	= $this->input->post('pesanan_id');
		$in["no_sph"] 	= $this->input->post('no_sph');
		$in["lampiran"]		= $this->input->post('lampiran');
		$in["tgl_sph"]	= date('Y-m-d');
		$in["nama_pengadaan"]		= $this->input->post('nama_pengadaan');
		$in["kepada_customer"]		= $this->input->post('kepada_customer');
		$this->model_template->update('template',$in,'id');
				redirect('c_templateSPH/viewTemplateSPH');
	}
		
		 function get_no_sph($id){
      
		 $id 	= base64_decode($id);
		 date_default_timezone_set("Asia/Jakarta");
		$nomorSPH = 'BUT/LOG/SPH/'.date("Y").'/'.date("m").'/'.str_pad($id,3, "0", STR_PAD_LEFT);
		 $where = array('id' => $id);
		 $data = array('no_sph' =>$nomorSPH);
		 echo $nomorSPH;
		 
		  $this->model_template->update_nomor_sph($where,$data,'template');
		  redirect('c_templateSPH/export_pdf/'.$id);	
	     }



	function export_pdf($id='')
	{
		// $id 	= base64_decode($id);
		$header	= $this->model_template->get_heder_sph($id); //halaman pertama
		$content= $this->model_template->get_content_sph($id); //halaman kedua
		$total_harga=0;
		foreach ($header->result() as $row) {
			//PERHITUNGAN PPN
			$ppn				= $row->total*10/100;
			//PERHITUNGAN TOTAL HARGA DITAMBAH PPN
			$total_harga		= $row->total+$ppn;
			$in['pesanan_id']		= $row->pesanan_id;
			$in['no_sph']	= $row->no_sph;
			$in['lampiran']		= $row->lampiran;
			$in['tgl_sph']	= tanggal($row->tgl_sph).' '.nama_bulan(bulan($row->tgl_sph)).' '.tahun($row->tgl_sph);
			$in['nama_pengadaan']		= $row->nama_pengadaan;
			$in['kepada_customer']  = $row->kepada_customer;
			$in['total_harga']		= number_format($total_harga);
			$in['total']		= number_format($row->total);
			$in['terbilang']	= terbilang($total_harga);
		}

		
		$i=array();
		$x=array();
		$no=1;
		//dibawah untuk template surat sph lampiran1
		foreach ($content->result() as $row) {
			$i['no']			= $no++;
			$i['nama_barang']	= $row->nama_barang;
			$i['satuan']		= $row->satuan;
			$i['harga']			= number_format($row->harga);
			$i['vol']		= number_format($row->vol);
			$i['subtotal']		= number_format($row->subtotal);
			array_push($x,$i);	
		}
		
		//dibawah untuk template surat sph lampiran 2
		$in2['content_data']=$x;
		$in2['no_sph']	= $in['no_sph'];
	   $in2['tgl_sph']	= $in['tgl_sph'];
	    $in2['perihal']		= $in['perihal'];
		$in2['total']		= $in['total'];
		$in2['ppn']			= number_format($ppn);
		$in2['total_harga']	= number_format($total_harga);
		$in2['terbilang']	= terbilang($total_harga);
		
		$html_page1 	= $this->parser->parse('logistik/surat_sph', $in, TRUE);
		 $html_page2 	= $this->parser->parse('logistik/surat_sph_lampiran2', $in2, TRUE);
		$pdfFilePath 	= 'sph.pdf';
		
		$this->load->library('m_pdf');
		$this->m_pdf->pdf->WriteHTML($html_page1);
		$this->m_pdf->pdf->AddPage();
		$this->m_pdf->pdf->WriteHTML($html_page2);
		$this->m_pdf->pdf->Output($pdfFilePath, "D");
	}
}
