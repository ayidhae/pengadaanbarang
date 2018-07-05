<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class model_template extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	/*general function start*/

	function simpan($tabel,$data)
	{
		$s=$this->db->insert($tabel,$data);
		return $s;
	}
	
	function detail($id='')
	{
		$query=$this->db->query("select * from template h 
									left join pesanan d on d.pesanan_id=h.pesanan_id
									where h.id='".$id."' order by d.pesanan_id asc");
		return $query;
	}
	
	
	function edit($tabel,$seleksi)
	{
		$query=$this->db->query("select * from $tabel where $seleksi");
		return $query;
	}
	function update($tabel,$isi,$seleksi)
	{
		$this->db->where($seleksi,$isi[$seleksi]);
		$this->db->update($tabel,$isi);
	}
	function hapus($id,$seleksi,$tabel)
	{
		$this->db->where($seleksi,$id);
		$this->db->delete($tabel);
	}
	/*general function end*/
	
	/*sph function */
	function get_all_spph()
	{
		$query=$this->db->query("select * from template order by id asc");
		return $query;
	}
	
	function get_content_spph($id='')
	{
		$query=$this->db->query("select * from template h 
									left join pesanan_detail d on d.pesanan_id=h.pesanan_id
									where h.id='".$id."' order by d.detail_id asc");
		return $query;
	}

	
	function get_all_sph()
	{
		$query=$this->db->query("select * from template order by id asc");
		return $query;
	}
	
	function get_heder_sph($id='')
	{
		$query=$this->db->query("select h.*,sum(d.subtotal) as total
								from template h
								left join pesanan_detail d on d.pesanan_id=h.pesanan_id
								where h.id='".$id."'
								GROUP BY h.pesanan_id");
		return $query;
	}
	
	function get_content_sph($id='')
	{
		$query=$this->db->query("select * from template h 
									left join pesanan_detail d on d.pesanan_id=h.pesanan_id
									where h.id='".$id."' order by d.detail_id asc");
		return $query;
	}

	function get_all_spk()
	{
		$query=$this->db->query("select h.*,d.total
								from template h
								left join (select pesanan_id,sum(subtotal) as total from pesanan_detail GROUP BY pesanan_id) as d on d.pesanan_id=h.pesanan_id
								ORDER BY h.id ASC");
		return $query;
	}
	
	 function get_heder_spk($id='')
	 {
	 	$query=$this->db->query("select h.*,sum(d.subtotal) as total
	 							from template h
								left join pesanan_detail d on d.pesanan_id=h.pesanan_id
	 							where h.id='".$id."'
	 							GROUP BY h.pesanan_id");
	 	return $query;
	 }
	
	function get_content_spk($id='')
	{
		$query=$this->db->query("select * from template h 
									left join pesanan_detail d on d.pesanan_id=h.pesanan_id
									where h.id='".$id."' order by d.detail_id asc");
		return $query;
	}
	
	
	function get_all_bast()
	{
		$query=$this->db->query("select * from template order by id asc");
		return $query;
	}
	
	
	
	function get_content_bast($id)
	{
		$query=$this->db->query("select * from template v 
									left join pesanan_detail d on d.pesanan_id=v.pesanan_id
									where v.id='".$id."' order by d.detail_id asc");
		return $query;
	}
	
	
	

	
	
	
	
	
	
}