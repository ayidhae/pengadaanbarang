<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_progress extends CI_Model {

	

	function viewProgress(){


    return $this->db->query("SELECT * FROM progress_pengadaan ORDER BY tanggal DESC");
  }
  
	//return $this->db->get('progress_pengadaan');

  
  
  function inputProgress($data,$table){
    $this->db->insert($table,$data);
  }
  
  function edit_data($where,$table){		
    return $this->db->get_where($table,$where);
  }
  function update_progress($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
  }
  
  function delete($where,$table){
   $this->db->where($where);
   $this->db->delete($table);
 }


 function getIdProgress(){
   $this->db->select('RIGHT(progress_pengadaan.id_progress,4) as no', FALSE);
   $this->db->order_by('id_progress','DESC');    
   $this->db->limit(1);    
   $query = $this->db->get('progress_pengadaan');    
   if($query->num_rows() <> 0){            
    $data = $query->row();      
    $kode = intval($data->no) + 1;    
  }
  else {            
    $kode = 1;    
  }
  $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
  $kodejadi = "PROGRESS-".$kodemax;    
  return $kodejadi;
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

function ambilDataNamaVendor(){
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

function ambilDataNamaPesanan($pesanan_id=''){
    // $query=$this->db->query("select * from progress_pengadaan pp 
    //               left join pesanan p on p.pesanan_id=pp.pesanan_id where pp.pesanan_id='".$pesanan_id."' order by p.pesanan_id");
    // return $query;
  $this->db->select('*');
  $this->db->from('progress_pengadaan pp');
  $this->db->join('pesanan p', 'p.pesanan_id = pesanan_id','left');
  $this->db->where('pp.pesanan_id',$pesanan_id);
  $this->db->order_by('p.id_progress');
  $this->db->get();
}

}



//   function ambilDataNamaVendor(){
//     $query = $this->db->get('vendor');
//     return $query->result_array();
// }


//  function ambilDataNamaCustomer(){
//     $query = $this->db->get('customer');
//     return $query->result_array();
// }

//  return $this->db
// ->select('.....')
// ->from('progress_pengadaan pp')
// >join('pesanan p', 'p.pesanan_id=pp.pesanan_id', 'left')
// ->where('pp.pesanan_id", $pesanan_id)
// ->order_by(p.id_progres)
// ->get()





