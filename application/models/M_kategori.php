<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

//table
public $table ="kategori_paket";

//data
public function data() {
    $query = "SELECT * FROM kategori_paket ORDER BY id_kategori ASC";
    return $this->db->query($query)->result();
}

function getPage($where = ''){
        return $this->db->query("select * from pages $where; ");
        }

public function kodeotomatis() {
        $q = $this->db->query("SELECT MAX(RIGHT(id_kategori, 4)) AS kd_max FROM kategori_paket");
        $kd = "";
        if($q->num_rows() > 0) {
            foreach ($q->result()as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s",$tmp);
            }
        }else {
            $kd = "0001";
        } $kodejadi = "K".$kd;
            return $kodejadi;
    }

//simpan
public function simpan($banner_kategori) {

		$data = array(
			'id_kategori' 		=> $this->input->post('id_kategori'),
			'kategori' 			=> $this->input->post('kategori'),
			'definisi_kategori' => $this->input->post('definisi_kategori'),
            'id_admin'          => $this->session->userdata('id_admin'),
			'banner_kategori' 	=> $banner_kategori 
		);

			$this->db->insert($this->table, $data);
	}

public function update($banner_kategori) {
        
        if(empty($banner_kategori) AND $this->input->post('kategori') == '') {
            $data = array(
                'definisi_kategori'     => $this->input->post('definisi_kategori'),
                'id_admin'          => $this->session->userdata('id_admin'),            
            );
        } else if(empty($banner_kategori) AND $this->input->post('kategori') != '') {
            $data = array(
                'kategori'              => $this->input->post('kategori'),
                'definisi_kategori'     => $this->input->post('definisi_kategori'),
                'id_admin'          => $this->session->userdata('id_admin'),
            );
        } else if($this->input->post('kategori') == '') {
            $data = array(
                'definisi_kategori'      => $this->input->post('definisi_kategori'),
                'id_admin'          => $this->session->userdata('id_admin'),
                'banner_kategori'      => $banner_kategori
            );
        } else if($this->input->post('kategori') != '') {
            $data = array(
                'kategori'               => $this->input->post('kategori'),
                'definisi_kategori'      => $this->input->post('definisi_kategori'),
                'id_admin'          => $this->session->userdata('id_admin'),
                'banner_kategori'        => $banner_kategori
            );
        }

        $id_kategori   = $this->input->post('id_kategori');
        $this->db->where('id_kategori',$id_kategori);
        $this->db->update($this->table,$data);
    }

}