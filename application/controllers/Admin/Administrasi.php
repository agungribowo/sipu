<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrasi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		sesiAdmin();
		
		$this->load->model('m_admin');
		$this->load->model('m_anggota');
		$this->load->model('m_kategori');
		$this->load->model('m_pemesanan');
	}

	public function index() {
	$data = array(			
            'adm' => $this->m_admin->data()
		);
		$this->load->view('backend/header', $data);
		$this->load->view('backend/admin/sidebar');	
        $this->load->view('backend/admin/list_admin');
        $this->load->view('backend/footer');
	}

	//list admin
	public function list_administrasi() {
		$data = array(
		'title' => 'Data Admin | Panel Admin SIP UMROH',
		'adm' => $this->m_admin->data()
		);
		$this->load->view('backend/header', $data);
		$this->load->view('backend/admin/sidebar');
		$this->load->view('backend/admin/list_admin');
		$this->load->view('backend/footer');
	}
	
	//tambah admin
		public function tambah_admin() {
			if (isset($_POST['submit'])) {

				$id_admin = $this->input->post('id_admin');
	            $query = $this->db->get_where('tbl_admin', array('id_admin' => $id_admin));
	            
	            if($query->num_rows() == 0) {
	            	$uploadGambar = $this->upload_gambar();
	            	$this->m_admin->simpan($uploadGambar);
	                $this->session->set_flashdata('Simpan', 'Admin Berhasil Tersimpan ...');
	                redirect('admin/adminitrasi/list_administrasi');

	            } else {
	                $this->session->set_flashdata('GAGAL', 'Terjadi Kesalahan, Admin Sudah Ada ...');
	                redirect('admin/adminitrasi/list_administrasi');                
	            }
			
				} else {
					$data = array(
					'kodeunik'   	=> $this->m_admin->kodeotomatis(),
					'title' 		=> 'Tambah Admin | Panel Admin SIP Umroh',
				);
				
				$this->load->view('backend/header', $data);
				$this->load->view('backend/admin/tambah_admin');
				$this->load->view('backend/admin/sidebar');
				$this->load->view('backend/footer');
			}
		}

	//Anggota hapus
    public function admin_hapus() {
        if ($id_admin = $this->uri->segment(4)) {

            if(!empty($id_admin)) {
                $this->db->where('id_admin', $id_admin);
                $this->db->delete('tbl_admin');
            }
            $this->session->set_flashdata('Hapus', 'Admin berhasil terhapus ...');
            redirect('admin/adminitrasi');
        
        	}else {
			redirect('admin/adminitrasi');
			}
    	}

	//upload foto
	public function upload_gambar() {
		$config['upload_path'] = './assets/backend/images/admin/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
		$config['max_size'] = 2048;
		
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('foto');
		
		$upload = $this->upload->data();
		return $upload['file_name'];
	}

	//profil saya
	public function profil_saya() {
		if (isset($_POST['submit'])) {
		$uploadFoto = $this->upload_foto();
		$this->m_admin->update($uploadFoto);
		$this->session->set_flashdata('simpan', 'Profil kamu diperbaharui ...');
		redirect('admin/profil_saya');
		} else {
		$data = array(
		'title' => 'Profil Saya | Panel Admin SIINI',
		'ps' => $this->db->get_where('tbl_admin', array('username' => $this->session->userdata('username')))->row_array()
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/profil_saya');
		$this->load->view('admin/footer');
		}
	}


}