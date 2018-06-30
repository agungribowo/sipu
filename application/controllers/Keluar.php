<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar extends CI_Controller {

	//Fungsi konstruk
	function __construct() {
        parent::__construct();
    }


    //Fungsi default
	function index() {
        $this->session->sess_destroy();
    	$this->session->set_flashdata('keluar', 'Kamu berhasil keluar ...');
    	redirect('auth');
	}
}