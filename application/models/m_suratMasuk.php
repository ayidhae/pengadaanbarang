<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_suratMasuk extends CI_Model {

 function kotak_masuk_direktur($kotak_masuk){
  if($kotak_masuk) {
    $sql = "SELECT * FROM surat_keluar WHERE tujuan_direktur = ? ORDER BY tgl_surat DESC";
    $query = $this->db->query($sql, array($kotak_masuk));
    $result = $query->result_array();
    return $result;
  }
}

function kotak_masuk_customer($kotak_masuk){
  if($kotak_masuk) {
    $sql = "SELECT * FROM surat_keluar WHERE tujuan_customer = ? ORDER BY tgl_surat DESC";
    $query = $this->db->query($sql, array($kotak_masuk));
    $result = $query->result_array();

    return $result;
  }
}

function kotak_masuk_logistik($kotak_masuk){
  if($kotak_masuk) {
    $sql = "SELECT * FROM surat_keluar WHERE tujuan_logistik = ?  ORDER BY tgl_surat DESC";;
    $query = $this->db->query($sql, array($kotak_masuk));
    $result = $query->result_array();

    return $result;
  }
}


function kotak_masuk_vendor($kotak_masuk){
  if($kotak_masuk) {
    $sql = "SELECT * FROM surat_keluar WHERE tujuan_vendor = ? ORDER BY tgl_surat DESC";
    $query = $this->db->query($sql, array($kotak_masuk));
    $result = $query->result_array();

    return $result;
  }
}

function getApprove(){
 // return $this->db->get_where($table,$where);
  return $query=$this->db->query("SELECT * FROM surat_keluar where status_approve='YA'")->result();
}

function getTidakApprove(){
 // return $this->db->get_where($table,$where);
  return $query=$this->db->query("SELECT * FROM surat_keluar where status_approve='TIDAK'")->result();
}

function edit_data($where,$table){   
  return $this->db->get_where($table,$where);
}
function update_data($where,$data,$table){
  $this->db->where($where);
  $this->db->update($table,$data);
}

function delete($where,$table){
 $this->db->where($where);
 $this->db->delete($table);
}

}

