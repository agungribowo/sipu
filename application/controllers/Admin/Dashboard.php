<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

//library, helper, model
public function __construct() {
        parent::__construct();
        sesiAdmin();
    }

//dashboard
public function index() {
	$data = array(
		'title' => 'Dashboard | SIP Umroh',
		'kate'  => $this->db->query("SELECT * FROM kategori_paket")->num_rows(),
		'adm'  	=> $this->db->query("SELECT * FROM tbl_admin")->num_rows(),
		'agt'  	=> $this->db->query("SELECT * FROM tbl_anggota")->num_rows(),
		'glr'  	=> $this->db->query("SELECT * FROM tbl_galeri")->num_rows(),
		'pms'   => $this->db->query("SELECT * FROM tbl_pemesanan")->num_rows(),
		'bkt'   => $this->db->query("SELECT * FROM tbl_transfer")->num_rows(),
		'sld'   => $this->db->query("SELECT * FROM tbl_slide")->num_rows(),
	);

	$this->load->view('backend/header', $data);
	$this->load->view('backend/admin/sidebar');
	$this->load->view('backend/admin/view_dashboard');
	$this->load->view('backend/footer');
	}
}