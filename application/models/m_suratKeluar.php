<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_suratKeluar extends CI_Model {


      function viewSuratKeluar($where,$table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by('tgl_surat','DESC');
        $query = $this->db->get();
        return $query->result();

        // return $this->db->get_where($table,$where);
        // return $this->db->order_by('tgl_surat','DESC')->result();
        // return $this->db->query("SELECT * FROM surat_keluar ORDER BY tgl_surat DESC");
      }
    
      // function ambilDataUsernameDirektur(){
      //   $this->db->where('hak_akses', 'direktur');
      //   $this->db->order_by('username ','asc');
      //   $query = $this->db->get('user');
      //   if($query->num_rows()>0)
      //   {
      //     return $query->result();
      //   }
      //   else
      //   {
      //     return false;
      //   }
      // 

     function ambilDataUsernameDirektur(){
        $this->db->where('hak_akses', 'direktur');
        $this->db->order_by('username ','asc');
        $query = $this->db->get('user');
        if($query->num_rows()>0)
        {
          return $query->result();
        }
        else
        {
          return false;
        }
      }      

 function ambilDataUsernameLogistik(){
         $this->db->where('hak_akses', 'logistik');
        $this->db->order_by('username','asc');
        $query = $this->db->get('user');
        if($query->num_rows()>0)
        {
          return $query->result();
        }
        else
        {
          return false;
        }
      }


      function get_nosurat($id){
        $this->db->where('id_surat', $id);
        $query = $this->db->get('surat_keluar');
}
  
  // function ambilDataUsernameDirektur(){
  //   $this->db->order_by('hak_akses','asc');
  //   $query = $this->db->get('user');
  //   if($query->num_rows()>0)
  //   {
  //     return $query->result();
  //   }
  //   else
  //   {
  //     return false;
  //   }
  // }

  //       return $query->row();
  //     }

     

      function ambilDataUsernameCustomer(){
        $this->db->order_by('username','asc');
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
     

     function edit_data($where,$table){    
      return $this->db->get_where($table,$where);
    }
    function update_status($where,$data,$table){
      $this->db->where($where);
      $this->db->update($table,$data);
    }


    function inputSuratKeluar($data,$table){
     $res = $this->db->insert($table,$data);
     return $res; 
    }



    function insertData($data,$table){
      $this->db->insert($table,$data);
    }



    function ambilSPPHbyID($id_surat){
     $this->db->where('id_surat', $id_surat);
     $query = $this->db->get('surat_keluar');
     if($query->num_rows()>0)
     {
       return $query->row();
     }
     else
     {
       return false;
     }
    }

  function updateStatus($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
  }
  
}


