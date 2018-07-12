<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_ulasan extends CI_Model {



	
	function viewUlasanlog(){
	return $this->db->get('ulasan');
		}
	
	 	function viewUlasan($where,$table){
		return $this->db->get_where($table,$where);
	}
	
     function inputUlasan($data,$table){
        $this->db->insert($table,$data);
    }


      function delete($where,$table){
       $this->db->where($where);
       $this->db->delete($table);
    }


    function ambilDataNamaVendor(){
    $this->db->order_by('username','asc');
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


   function ambilDataPesanan($nama_customer){
    
    if($nama_customer) {
      $sql = "SELECT * FROM pesanan WHERE nama_customer = ?";
      $query = $this->db->query($sql, array($nama_customer));
      $result = $query->result_array();

      return $result;
    }
  
}

}