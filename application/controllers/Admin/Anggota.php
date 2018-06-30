<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Anggota extends CI_Controller {

//library, helper, model
public function __construct() {
	parent::__construct();
	sesiAnggota();
	$this->load->model('m_anggota');
}

public function index() {
	$data = array(			
            'agt' => $this->m_anggota->data()
		);
		$this->load->view('backend/header', $data);
		$this->load->view('backend/admin/sidebar');	
        $this->load->view('backend/admin/anggota/list_anggota');
        $this->load->view('backend/footer');
	}

//list anggota
public function list_anggota() {
	$data = array(
	'title' => 'Kategori Paket | SIP Umroh',
	'agt' => $this->m_anggota->data()
	);
	$this->load->view('backend/header', $data);
	$this->load->view('backend/admin/sidebar');
	$this->load->view('backend/admin/anggota/list_anggota');
	$this->load->view('backend/footer');
	}

	//tambah anggota
	public function anggota_tambah() {
		if (isset($_POST['submit'])) {

			$id_anggota = $this->input->post('id_anggota');
            $query = $this->db->get_where('tbl_anggota', array('id_anggota' => $id_anggota));
            
            if($query->num_rows() == 0) {
            	$this->m_anggota->simpan();
                $this->session->set_flashdata('Simpan', 'Anggota Berhasil Tersimpan ...');
                redirect('admin/anggota/list_anggota');

            } else {
                $this->session->set_flashdata('GAGAL', 'Terjadi Kesalahan, Anggota Sudah Ada ...');
                redirect('admin/anggota/list_anggota');                
            }
		
			} else {
				$data = array(
				'kodeunik'   	=> $this->m_anggota->kodeotomatis(),
				'title' 		=> 'Tambah Anggota | Panel Admin SIP Umroh',
			);
			
			$this->load->view('backend/header', $data);
			$this->load->view('backend/admin/anggota/anggota_tambah');
			$this->load->view('backend/admin/sidebar');
			$this->load->view('backend/footer');
		}
	}

    //Fungsi detail
    public function anggota_detail() {
        if ($id_anggota = $this->uri->segment(4)) {
            $data = array(          
            'agt' => $this->db->get_where('tbl_anggota', array('id_anggota' => $id_anggota))->row_array()
            );
            $this->load->view('backend/header', $data);       
            $this->load->view('backend/admin/anggota/anggota_detail');
            $this->load->view('backend/admin/sidebar');
            $this->load->view('backend/footer');
        } else {
            redirect('kesalahan');
        }      
    }

	//Anggota edit
    public function anggota_edit() {
        if (isset($_POST['submit'])) {
                $this->m_anggota->update();
                $this->session->set_flashdata('Edit', 'Anggota berhasil diperbaharui ...');
                redirect('admin/anggota');        
        } else {
            if ($id_anggota = $this->uri->segment(4)) {
                    $data = array(
                    'agt' => $this->db->get_where('tbl_anggota', array('id_anggota' => $id_anggota))->row_array()
                );
                $this->load->view('backend/header', $data);
                $this->load->view('backend/admin/anggota/anggota_edit');
                $this->load->view('backend/admin/sidebar');
                $this->load->view('backend/footer');
            }
        }
    }

	//Anggota hapus
    public function anggota_hapus() {
        if ($id_anggota = $this->uri->segment(4)) {

            if(!empty($id_anggota)) {
                $this->db->where('id_anggota', $id_anggota);
                $this->db->delete('tbl_anggota');
            }
            $this->session->set_flashdata('Hapus', 'Anggota berhasil terhapus ...');
            redirect('admin/anggota');
        
        	}else {
			redirect('admin/anggota');
			}
    	}
}