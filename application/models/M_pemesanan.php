<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_pemesanan extends CI_Model {

//table
public $table ="tbl_pemesanan";

//data
public function data() {
$query = "SELECT * FROM $this->table ORDER BY id_pemesanan ASC";
return $this->db->query($query)->result();
}

function getPage($where = ''){
        return $this->db->query("select * from pages $where; ");
        }

public function kodeotomatis() {
        $q = $this->db->query("SELECT MAX(RIGHT(id_pemesanan, 4)) AS kd_max FROM tbl_pemesanan");
        $kd = "";
        if($q->num_rows() > 0) {
            foreach ($q->result()as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s",$tmp);
            }
        }else {
            $kd = "0001";
        } $kodejadi = "PMS".$kd;
            return $kodejadi;
    }

//simpan
public function simpan() {

		$data = array(
			'id_pemesanan' 		=> $this->input->post('id_pemesanan'),
			'id_anggota' 		=> $this->input->post('id_anggota'),
			'id_kategori' 		=> $this->input->post('id_kategori'),
			'berangkat' 		=> $this->input->post('berangkat'),
			'kembali' 			=> $this->input->post('kembali'),
			'id_transfer' 		=> $this->input->post('id_transfer')
		);

			$this->db->insert($this->table, $data);
	}

public function update() {
        $data = array(
            'id_anggota'    => $this->input->post('id_anggota'),
            'id_kategori'   => $this->input->post('id_kategori'),
            'berangkat'     => $this->input->post('berangkat'),
            'kembali'       => $this->input->post('kembali'),
            'id_transfer'   => $this->input->post('id_transfer')
            
        );
        $id_pemesanan   = $this->input->post('id_pemesanan');
        $this->db->where('id_pemesanan',$id_pemesanan);
        $this->db->update($this->table,$data);
    }    
}