<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	function __construct() {
        parent::__construct();        
        $this->load->model('M_kategori');
        $this->load->model('M_pemesanan');

    }
	
	function index()	{
		$data = array(
			'kate'	=> $this->M_kategori->data()
		);
		$this->load->view('home/head');		
		$this->load->view('home/dashboard');
		$this->load->view('home/footer');
	}
}