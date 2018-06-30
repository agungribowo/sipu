<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_transfer extends CI_Model {

//table
public $table ="tbl_transfer";

//data
public function data() {
$query = "SELECT * FROM tbl_transfer ORDER BY id_transfer ASC";
return $this->db->query($query)->result();
}

//transfer
    public function gettransfer($where = '') {
        return $this->db->query("SELECT * FROM tbl_transfer $where; ");
    }
   

    public function kodeotomatis() {
        $q = $this->db->query("SELECT MAX(RIGHT(id_transfer, 4)) AS kd_max FROM tbl_transfer");
        $kd = "";
        if($q->num_rows() > 0) {
            foreach ($q->result()as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s",$tmp);
            }
        }else {
            $kd = "0001";
        } $kodejadi = "BKT".$kd;
            return $kodejadi;
    }

    public function simpan($bukti) {
        $data = array(
            'id_transfer'   => $this->input->post('id_transfer'),
            'tgl_transfer'  => $this->input->post('tgl_transfer'),
            'nama_rekening' => $this->input->post('nama_rekening'),
            'no_rekening'   => $this->input->post('no_rekening'),
            'bukti'         => $bukti
        );  
        $this->db->insert($this->table,$data);
    }

    public function update($bukti) {
        if(empty($bukti)) {
            $data = array(
                'nama_rekening'      => $this->input->post('nama_rekening'),
                'tgl_transfer'       =>$this->input->post('tgl_transfer'),
                'nama_rekening'      => $this->input->post('nama_rekening'),
                'no_rekening'        => $this->input->post('no_rekening')
            );
        } else {
            $data = array(
                'nama_rekening'      => $this->input->post('nama_rekening'),
                'tgl_transfer'       =>$this->input->post('tgl_transfer'),
                'nama_rekening'      => $this->input->post('nama_rekening'),
                'no_rekening'        => $this->input->post('no_rekening'),
                'bukti'            => $bukti
            );
        }

        $id_transfer        = $this->input->post('id_transfer');
        $this->db->where('id_transfer',$id_transfer);
        $this->db->update($this->table,$data);
    }
}