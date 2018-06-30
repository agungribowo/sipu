<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori extends CI_Controller {

//library, helper, model
public function __construct() {
	parent::__construct();
	sesiAdmin();
	$this->load->model('m_kategori');
}

public function index() {
	$data = array(			
            'kate' => $this->m_kategori->data()
		);
		$this->load->view('backend/header', $data);
		$this->load->view('backend/admin/sidebar');	
        $this->load->view('backend/admin/kategori/list');
        $this->load->view('backend/footer');
	}

//list kategori Paket
public function list_kategori() {
	$data = array(
	'title' => 'Kategori Paket | SIP Umroh',
	'kate' => $this->m_kategori->data()
	);
	$this->load->view('backend/header', $data);
	$this->load->view('backend/admin/sidebar');
	$this->load->view('backend/admin/kategori/list');
	$this->load->view('backend/footer');
}

//tambah kategori
	public function kategori_tambah() {
		if (isset($_POST['submit'])) {

			$id_kategori = $this->input->post('id_kategori');
            $query = $this->db->get_where('kategori_paket', array('id_kategori' => $id_kategori));
            
            if($query->num_rows() == 0) {
                $uploadGambar = $this->upload_gambar();
                $this->m_kategori->simpan($uploadGambar);
                $this->session->set_flashdata('Simpan', 'Kategori Paket Berhasil Tersimpan ...');
                redirect('admin/kategori/list_kategori');

            } else {
                $this->session->set_flashdata('GAGAL', 'Terjadi Kesalahan, Kategori Sudah Ada ...');
                redirect('admin/kategori/list_kategori');                
            }
		
			} else {
				$data = array(
				'kodeunik'   	=> $this->m_kategori->kodeotomatis(),
				'title' 		=> 'Tambah Paket Umroh | Panel Admin SIP Umroh',
			);
			
			$this->load->view('backend/header', $data);
			$this->load->view('backend/admin/kategori/kategori_tambah');
			$this->load->view('backend/admin/sidebar');
			$this->load->view('backend/footer');
		}
	}

	//Kategori edit
    function kategori_edit() {

        if (isset($_POST['submit'])) {

                $uploadGambar = $this->upload_gambar();
                $this->m_kategori->update($uploadGambar);
                $this->session->set_flashdata('update', 'produk produk berhasil diperbaharui ...');
                redirect('admin/kategori/list_kategori');        
        } else {
            if ($id_kategori = $this->uri->segment(4)) {
                    $data = array(
                    'title' 				=> 'Edit Kategori | SIP UMROH',
                    'kate' 					=> $this->db->get_where('kategori_paket', array('id_kategori' => $id_kategori))->row_array()

                );
                $this->load->view('backend/header', $data);
                $this->load->view('backend/admin/kategori/kategori_edit');
                $this->load->view('backend/admin/sidebar');
                $this->load->view('backend/footer');
            }
           }
        }

	//hapus kategori
	public function kategori_hapus() {
		
	if ($id = $this->uri->segment(4)) {
	
		if(!empty($id)) {
			$this->db->where('id_kategori', $id);
			$this->db->delete('kategori_paket');
		}
		$this->session->set_flashdata('Hapus', 'Kategori berhasil terhapus ...');
		redirect('admin/kategori');
		
		} else {
		redirect('admin/kategori');
		}
	}


	//upload foto
	public function upload_gambar() {
		$config['upload_path'] = './assets/backend/images/pengguna/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
		$config['max_size'] = 2048;
		
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('banner_kategori');
		
		$upload = $this->upload->data();
		return $upload['file_name'];
	}
}