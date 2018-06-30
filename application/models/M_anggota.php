<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_anggota extends CI_Model {

    public $table ="tbl_anggota";

    public function cekmasuk($username, $password) {
        $this->db->where('username',  $username);
        $this->db->where('password',  SHA1($password));
        $anggota = $this->db->get('tbl_anggota')->row_array();
        return $anggota;
    } 
    
    //data
    public function data(){
        $query = "SELECT * FROM tbl_anggota ORDER BY id_anggota asc";
        return $this->db->query($query)->result();
    }

    public function kodeotomatis() {
        $q = $this->db->query("SELECT MAX(RIGHT(id_anggota, 4)) AS kd_max FROM tbl_anggota");
        $kd = "";
        if($q->num_rows() > 0) {
            foreach ($q->result()as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s",$tmp);
            }
        }else {
            $kd = "0001";
        } $kodejadi = "AGT".$kd;
            return $kodejadi;
    }

    public function simpan() {
        $data = array(
            'id_anggota'    => $this->input->post('id_anggota'),
            'username'      => $this->input->post('username'),
            'password'      => SHA1($this->input->post('password')),
            'nama_anggota'  => $this->input->post('nama_anggota'),
            'email_anggota' => $this->input->post('email_anggota'),
            'tipe_identitas'=> $this->input->post('tipe_identitas'),
            'no_identitas'  => $this->input->post('no_identitas'),
            'no_hp'         => $this->input->post('no_hp'),
            'tgl_lahir'     => $this->input->post('tgl_lahir'),
            'jekel'         => $this->input->post('jekel'),
            'alamat'        => $this->input->post('alamat')
        );  
        $this->db->insert($this->table,$data);
    }

    public function update() {
        $data = array(
            'username'      => $this->input->post('username'),
            'password'      => SHA1($this->input->post('password')),
            'nama_anggota'  => $this->input->post('nama_anggota'),
            'email_anggota' => $this->input->post('email_anggota'),
            'tipe_identitas'=> $this->input->post('tipe_identitas'),
            'no_identitas'  => $this->input->post('no_identitas'),
            'no_hp'         => $this->input->post('no_hp'),
            'tgl_lahir'     => $this->input->post('tgl_lahir'),
            'jekel'         => $this->input->post('jekel'),
            'alamat'        => $this->input->post('alamat')
        );
        $id_anggota   = $this->input->post('id_anggota');
        $this->db->where('id_anggota',$id_anggota);
        $this->db->update($this->table,$data);
    }    
}   