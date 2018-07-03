<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_templateSPK extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_template');
	}


	public function viewTemplateSPK(){
		
	$data['mdata'] = $this->model_template->get_all_spk();
		$this->load->view('template/header');
		$this->load->view('logistik/view_templateSPK',$data);
		$this->load->view('template/footer'); 
		
	}

	function editTemplateSPK($id)
	{
		$id = base64_decode($id);
		$data['mdraft']= $this->db->query('select * from pesanan order by pesanan_id ASC');
		$data["mdata"]= $this->model_template->edit("template","id='".$id."'");								
		$this->load->view('template/header');
		$this->load->view('logistik/edit_templateSPK',$data);
		$this->load->view('template/footer');
	}
	
	function edit()
	{
		$in['id'] 					= $this->input->post('id');
		$in['nomor_spk'] 			= $this->input->post('nomor_spk');
		$in['pesanan_id'] 			= $this->input->post('pesanan_id');
		$in["nama_pengadaan"]		= $this->input->post('nama_pengadaan');
		$in["tgl_negoisasi_spk"] 		= $this->input->post('tgl_negoisasi_spk');
		$in["lokasi_pengadaan"]		= $this->input->post('lokasi_pengadaan');
		$in["jangka_waktu"]			= $this->input->post('jangka_waktu');
		$in["nama_vendor"]			= $this->input->post('nama_vendor');
		$in["nama_pihak_vendor"]	= $this->input->post('nama_pihak_vendor');
		$in["jabatan_pihak_vendor"]	= $this->input->post('jabatan_pihak_vendor');
		$in["alamat_pihak_vendor"]	= $this->input->post('alamat_pihak_vendor');
		$in["hp_pihak_vendor"]		= $this->input->post('hp_pihak_vendor');
		$in["fax_pihak_vendor"]		= $this->input->post('fax_pihak_vendor');
		$in["no_rekening_vendor"]	= $this->input->post('no_rekening_vendor');
		$in["nama_rekening_vendor"]	= $this->input->post('nama_rekening_vendor');
		$in["bank_rekening_vendor"]	= $this->input->post('bank_rekening_vendor');
		$in["tgl_spk"]	= date('Y-m-d');
		$this->model_template->update('template',$in,'id');
	
		redirect('c_templateSPK/viewTemplateSPK');	
	}
	

	function export_pdf($id='')
	{
		$id= base64_decode($id);
		$i=array();
		$x=array();
		$no=1;
		$total=0;
		$header	= $this->model_template->get_heder_spk($id);
		$content= $this->model_template->get_content_spk($id);
		foreach ($header->result() as $row) {
		 $in["nomor_spk"]			= $row->nomor_spk;
			 $in["nama_pengadaan"]		= $row->nama_pengadaan;
			 $in['tgl_negoisasi_spk']		= tanggal($row->tgl_negoisasi_spk).' '.nama_bulan(bulan($row->tgl_negoisasi_spk)).' '.tahun($row->tgl_negoisasi_spk);
		 $in["lokasi_pengadaan"]		= $row->lokasi_pengadaan;
			 $in["jangka_waktu"]			= $row->jangka_waktu;
			 $in["nama_vendor"]			= $row->nama_vendor;
			 $in["nama_pihak_vendor"]	= $row->nama_pihak_vendor;
			 $in["jabatan_pihak_vendor"]	= $row->jabatan_pihak_vendor;
			 $in["alamat_pihak_vendor"]	= $row->alamat_pihak_vendor;
			 $in["hp_pihak_vendor"]		= $row->hp_pihak_vendor;
			 $in["fax_pihak_vendor"]		= $row->fax_pihak_vendor;
			 $in["no_rekening_vendor"]	= $row->no_rekening_vendor;
			 $in["nama_rekening_vendor"]	= $row->nama_rekening_vendor;
			 $in["bank_rekening_vendor"]	= $row->bank_rekening_vendor;
			
			 $in['tgl_spk']			= tanggal($row->tgl_spk).' '.nama_bulan(bulan($row->tgl_spk)).' '.tahun($row->tgl_spk);
		
		}

		foreach ($content->result() as $row) {
			$total				=$total+$row->subtotal;
			$i['no']			= $no++;
			$i['nama_barang']	= $row->nama_barang;
			$i['satuan']		= $row->satuan;
			$i['harga']			= number_format($row->harga);
			$i['vol']		= number_format($row->vol);
			$i['subtotal']		= number_format($row->subtotal);
			array_push($x,$i);
			}

		
		
		$in['total']		= number_format($total);
		$in['ppn']			= number_format($total*10/100);
		$in['total_harga']	= number_format($total+($total*10/100));
		$in['terbilang']	= terbilang($total+($total*10/100));
		$in['content_data']	=$x;

		$html_page  	= $this->parser->parse('logistik/surat_spk', $in, TRUE);
		$pdfFilePath 	= 'spk.pdf';
		$this->load->library('m_pdf');
		$this->m_pdf->pdf->WriteHTML($html_page);
		$this->m_pdf->pdf->Output($pdfFilePath, "D");
	}
}
