<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pemesanan extends CI_Controller {

//library, helper, model
public function __construct() {
	parent::__construct();
	sesiAdmin();
	$this->load->model('m_pemesanan');
	$this->load->model('m_kategori');
}

public function index() {
			redirect('admin/pemesanan/list_pemesanan','refresh');

	}

//list pemesan
public function list_pemesanan() {
	$data = array(
	'title' => 'Kategori Paket | SIP Umroh',
	'pemesanan' => $this->m_pemesanan->data()
	);
	$this->load->view('backend/header', $data);
	$this->load->view('backend/admin/sidebar');
	$this->load->view('backend/admin/pemesanan/list_pemesanan');
	$this->load->view('backend/footer');
}

//tambah
	public function pemesanan_tambah() {
		if (isset($_POST['submit'])) {
			
			$id_pemesanan = $this->input->post('id_pemesanan');
			$query = $this->db->get_where('tbl_pemesanan', array('id_pemesanan' => $id_pemesanan));

			if($query->num_rows() == 0) {
				$uploadGambar = $this->upload_gambar();
            	$this->m_pemesanan->simpan($uploadGambar);
				$this->session->set_flashdata('Simpan', 'Pemesanan Umroh berhasil disimpan ...');
				redirect('admin/pemesanan/list_pemesanan');
			} else {
                $this->session->set_flashdata('Salah', 'Terjadi kesalahan, Pemesanan Umroh sudah ada ...');
                redirect('admin/pemesanan/list_pemesanan');
            }

        } else {
			$data = array(
				'title' => 'Tambah Pemesanan | SIP UMROH',
				'Kategori'   => $this->m_kategori->data(),
			);
			$this->load->view('backend/header', $data);
			$this->load->view('backend/admin/sidebar');
			$this->load->view('backend/admin/pemesanan/pemesanan_tambah');
			$this->load->view('backend/footer');
		}
	}

	//upload foto
	public function upload_gambar() {
		$config['upload_path'] = './assets/backend/images/bukti_transfer/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
		$config['max_size'] = 2048;
		
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('bukti_transfer');
		
		$upload = $this->upload->data();
		return $upload['file_name'];
	}

}