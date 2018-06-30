<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	//Fungsi konstruk
	function __construct() {
        parent::__construct();
        $this->load->model('m_admin');
         $this->load->model('m_anggota');
    }


    //Fungsi default
	function index() {
		if(isset($_SESSION['id_admin'])) {
            redirect(site_url('admin'));

        } else if(isset($_SESSION['id_anggota'])) {
            redirect(site_url('anggota'));
        }

        $this->load->view('home/head');
        $this->load->view('login');
        $this->load->view('home/footer');
	}

    //Fungsi cekmasuk
    function cekmasuk() {
        if (isset($_POST['submit'])) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $loginadmin   = $this->m_admin->cekmasuk($username, $password);
            $loginanggota = $this->m_anggota->cekmasuk($username, $password);

            if (!empty($loginadmin)) {
                $this->session->set_userdata($loginadmin);
                $this->session->set_flashdata('sukses', 'kamu berhasil masuk ...');
                redirect('admin/dashboard');

            } elseif (!empty($loginanggota)) {
                $this->session->set_userdata($loginanggota);
                $this->session->set_flashdata('sukses', 'kamu berhasil masuk ...');
                redirect('anggota/dashboard');

            } else {
                $this->session->set_flashdata('gagal', 'maaf, username atau password kamu salah !');
                redirect('auth');
            }
            
        } else {
            $this->session->set_flashdata('gagal', 'maaf, username atau password kamu salah !');
            redirect('auth');
        }
    }

    //Fungsi pendaftaran
    public function pendaftaran() {
        if (isset($_POST['submit'])) {
            $id_anggota = $this->input->post('id_anggota');

            $query = $this->db->get_where('tbl_anggota', array('id_anggota' => $id_anggota));
            
            if($query->num_rows() == 0) {
                $this->m_anggota->simpan();
                $this->session->set_flashdata('simpan', 'Anggota berhasil tersimpan ...');
                redirect('auth');

            } else {
                $this->session->set_flashdata('gagal', 'Terjadi kesalahan, Anggota sudah ada ...');
                redirect('auth');                
            }

        } else {
            $data = array(
                'kodeunik'   => $this->m_anggota->kodeotomatis()
            );
            $this->load->view('home/head', $data);            
            $this->load->view('pendaftaran');
            $this->load->view('home/footer');
        }
    }
}