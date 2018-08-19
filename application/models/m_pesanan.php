<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class m_pesanan extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	/*general function start*/
	function simpan($tabel,$data)
	{
		$s=$this->db->insert($tabel,$data);
		return $s;
	}
	function edit($tabel,$where)
	{
		$query=$this->db->query("select * from $tabel where $where");
		return $query;
	}

	function update($tabel,$data,$where)
	{
		$this->db->where($where,$data[$where]);
		$this->db->update($tabel,$data);
	}

	// function detail($where,$table){
	// 	return $this->db->get_where($table,$where);
	// }


	function hapus($id,$seleksi,$tabel)
	{
		$this->db->where($seleksi,$id);
		$this->db->delete($tabel);
	}
	/*general function end*/
	function get_allPesanan()
	{
		// $query=$this->db->query("select * from pesanan p JOIN surat_keluar s on p.id_surat=s.id_surat order by pesanan_id asc");
		$query=$this->db->query("select * from pesanan p JOIN surat_keluar s on p.id_surat=s.id_surat order by tgl_input DESC");
		return $query;
	}
	
	function get_pesanan_id()
	{ 	
		$prefix	='PESAN';
		$query 	= $this->db->query("SELECT MAX(RIGHT(pesanan_id,3))as lastcode FROM pesanan ");
		if($query->num_rows()>0){
			foreach($query->result() as $k){
				$tmp = ((int)$k->lastcode)+1;
				$lastcode = sprintf("%03s", $tmp);
				$lastcode = $lastcode;
			}
		}else{
			$lastcode ="001";
		}
		return $prefix.$lastcode;
	}


	function ambilDataNamaCustomer(){
		$this->db->order_by('nama_perusahaan','asc');
		$query = $this->db->get('customer');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

   // function ambilDataStatus(){
   //   $this->db->order_by('detail_id','asc');
   //   $query = $this->db->get('pesanan_detail');

   // }

	function ambilDataStatus() {

		$this->db->select('status2')->from('pesanan_detail');

		$query = $this->db->get();

		return $query->result();

	}

	function ambilDataNamaVendor(){
		$this->db->where('status','aktif');
		$this->db->order_by('nama_perusahaan','asc');
		$query = $this->db->get('vendor');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}


  

  function viewStatuslog(){
  return $this->db->get('status_pesanan');
    }
  

	function viewStatus($nama_customer){
		if($nama_customer) {
			$sql = "SELECT * FROM pesanan WHERE nama_customer = ?";
			$query = $this->db->query($sql, array($nama_customer));
			$result = $query->result_array();

			return $result;
		}
	}



	// function viewStatuslog(){
	// 	return $this->db->get('status_pesanan');
	// }

}
