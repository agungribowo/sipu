<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//session admin
function sesiAdmin() { 
  if(isset($_SESSION['username'])) {
      return TRUE;
  } else {
     redirect(base_url(),'auth', 'refresh');
  }
}
  
//session anggota
function sesiAnggota() { 
  if(isset($_SESSION['username'])) {
      return TRUE;
  } else {
     redirect(base_url(),'auth', 'refresh');
  }
}

//getAdmin
  function getAdmin($id_admin) {
    $CI =& get_instance();
    $ambil = $CI->db->query("SELECT nama_admin FROM tbl_admin WHERE id_admin = '$id_admin'")->row();
    return $ambil->nama_admin;
  }

  //getKategori
  function getKategori($id_kategori) {
    $CI =& get_instance();
    $ambil = $CI->db->query("SELECT kategori FROM kategori_paket WHERE id_kategori = '$id_kategori'")->row();
    return $ambil->kategori;
  }

  //getAnggota
  function getAnggota($id_anggota) {
    $CI =& get_instance();
    $ambil = $CI->db->query("SELECT nama_anggota FROM tbl_anggota WHERE id_anggota = '$id_anggota'")->row();
    return $ambil->nama_anggota;
  }

  //getBukti
  function getBukti($id_transfer) {
    $CI =& get_instance();
    $ambil = $CI->db->query("SELECT nama_rekening FROM tbl_transfer WHERE id_transfer = '$id_transfer'")->row();
    return $ambil->nama_rekening;
  }