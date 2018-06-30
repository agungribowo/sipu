<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		sesiAdmin();
		
		$this->load->helper('my_helper');
		$this->load->model('m_admin');
		$this->load->model('m_anggota');
		$this->load->model('m_kategori');
		$this->load->model('m_pemesanan');
		$this->load->model('m_transfer');
		$this->load->model('m_galeri');
	}

	public function index() {
		redirect('admin/dashboard','refresh');
	}

	//dashboard
	public function dashboard() {
	$data = array(
		'title' => 'Dashboard | SIP Umroh',
		'kate'  => $this->db->query("SELECT * FROM kategori_paket")->num_rows(),
		'adm'  	=> $this->db->query("SELECT * FROM tbl_admin")->num_rows(),
		'agt'  	=> $this->db->query("SELECT * FROM tbl_anggota")->num_rows(),
		'glr'  	=> $this->db->query("SELECT * FROM tbl_galeri")->num_rows(),
		'pms'   => $this->db->query("SELECT * FROM tbl_pemesanan")->num_rows(),
		'bkt'   => $this->db->query("SELECT * FROM tbl_transfer")->num_rows(),
	);

	$this->load->view('admin/header', $data);
	$this->load->view('admin/sidebar');
	$this->load->view('admin/dashboard');
	$this->load->view('admin/footer');
	}

	//list admin
	public function user() {
		$data = array(
		'title' => 'Data Admin | SIP UMROH',
		'usr' => $this->m_admin->data()
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/user_list');
		$this->load->view('admin/footer');
	}

	//tambah admin
		public function user_tambah() {
			if (isset($_POST['submit'])) {

				$id_admin = $this->input->post('id_admin');
	            $query = $this->db->get_where('tbl_admin', array('id_admin' => $id_admin));
	            
	            if($query->num_rows() == 0) {
	            	$uploadGambar = $this->upload_user();
	            	$this->m_admin->simpan($uploadGambar);
	                $this->session->set_flashdata('simpan', 'Admin Berhasil Tersimpan ...');
	                redirect('admin/user');

	            } else {
	                $this->session->set_flashdata('gagal', 'Terjadi Kesalahan, Admin Sudah Ada ...');
	                redirect('admin/user');                
	            }
			
				} else {
					$data = array(
					'kodeunik'   	=> $this->m_admin->kodeotomatis(),
					'title' 		=> 'Tambah Admin | SIP Umroh',
				);
				
				$this->load->view('admin/header', $data);
				$this->load->view('admin/user_tambah');
				$this->load->view('admin/sidebar');
				$this->load->view('admin/footer');
			}
		}

//User edit
   public function user_edit() {

        if (isset($_POST['submit'])) {

                $uploadUser = $this->upload_user();
                $this->m_admin->update($uploadUser);
                $this->session->set_flashdata('Simpan', 'Admin berhasil diperbaharui ...');
                redirect('admin/user');        
        } else {
            if ($id_admin = $this->uri->segment(3)) {
                    $data = array(
                    'title' 	=> 'Edit Admin | SIP UMROH',
                    'usr' 		=> $this->db->get_where('tbl_admin', array('id_admin' => $id_admin))->row_array()

                );
                $this->load->view('admin/header', $data);
                $this->load->view('admin/user_edit');
                $this->load->view('admin/sidebar');
                $this->load->view('admin/footer');
            }
          }

        }

	//User hapus
    public function user_hapus() {
        if ($id_admin = $this->uri->segment(3)) {

            if(!empty($id_admin)) {
                $this->db->where('id_admin', $id_admin);
                $this->db->delete('tbl_admin');
            }
            $this->session->set_flashdata('Hapus', 'Admin berhasil terhapus ...');
            redirect('admin/user');
        
        	}else {
			redirect('admin/user');
			}
    	}

    //profil saya
	public function profil_saya() {
		if (isset($_POST['submit'])) {
		$uploadUser = $this->upload_user();
		$this->m_admin->update($uploadUser);
		$this->session->set_flashdata('simpan', 'Profil kamu diperbaharui ...');
		redirect('admin/profil_saya');
		} else {
		$data = array(
		'title' => 'Profil Saya | Panel Admin SIP Umroh',
		'ps' => $this->db->get_where('tbl_admin', array('username' => $this->session->userdata('username')))->row_array()
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');	
		$this->load->view('admin/profil_saya');
		$this->load->view('admin/footer');
		}
	}

	//upload foto
	public function upload_user() {
		$config['upload_path'] = './assets/backend/images/admin/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
		$config['max_size'] = 2048;
		
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('foto');
		
		$upload = $this->upload->data();
		return $upload['file_name'];
	}

	//kategori list
	public function kategori() {
	$data = array(			
            'kate' => $this->m_kategori->data(),
            'adm' => $this->m_admin->data()
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');	
        $this->load->view('admin/kategori_list');
        $this->load->view('admin/footer');
	}

	//kategori tambah
	public function kategori_tambah() {
		if (isset($_POST['submit'])) {

			$id_kategori = $this->input->post('id_kategori');
            $query = $this->db->get_where('kategori_paket', array('id_kategori' => $id_kategori));
            
            if($query->num_rows() == 0) {
                $uploadGambar = $this->upload_kategori();
                $this->m_kategori->simpan($uploadGambar);
                $this->session->set_flashdata('simpan', 'Kategori Paket Berhasil Tersimpan ...');
                redirect('admin/kategori');

            } else {
                $this->session->set_flashdata('gagal', 'Terjadi Kesalahan, Kategori Sudah Ada ...');
                redirect('admin/kategori');                
            }
		
			} else {
				$data = array(
				'kodeunik'   	=> $this->m_kategori->kodeotomatis(),
				'title' 		=> 'Tambah Paket Umroh | SIP Umroh',
			);
			
			$this->load->view('admin/header', $data);
			$this->load->view('admin/kategori_tambah');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/footer');
		}
	}

	//Kategori edit
   public function kategori_edit() {

        if (isset($_POST['submit'])) {

                $uploadGambar = $this->upload_kategori();
                $this->m_kategori->update($uploadGambar);
                $this->session->set_flashdata('simpan', 'Kategori berhasil diperbaharui ...');
                redirect('admin/kategori');        
        } else {
            if ($id_kategori = $this->uri->segment(3)) {
                    $data = array(
                    'title' 				=> 'Edit Kategori | SIP UMROH',
                    'kate' 					=> $this->db->get_where('kategori_paket', array('id_kategori' => $id_kategori))->row_array()

                );
                $this->load->view('admin/header', $data);
                $this->load->view('admin/kategori_edit');
                $this->load->view('admin/sidebar');
                $this->load->view('admin/footer');
            }
          }

        }

    //hapus kategori
	public function kategori_hapus() {
		
	if ($id = $this->uri->segment(3)) {
	
		if(!empty($id)) {
			$this->db->where('id_kategori', $id);
			$this->db->delete('kategori_paket');
		}
		$this->session->set_flashdata('hapus', 'Kategori berhasil terhapus ...');
		redirect('admin/kategori');
		
		} else {
		redirect('admin/kategori');
		}
	}

	//upload foto
	public function upload_kategori() {
		$config['upload_path'] = './assets/backend/images/kategori/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
		$config['max_size'] = 2048;
		
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('banner_kategori');
		
		$upload = $this->upload->data();
		return $upload['file_name'];
	}

//list pemesan
public function pemesanan() {
	$data = array(
	'title'		 => 'Data Pemesanan | SIP Umroh',
	'pms' 		=> $this->m_pemesanan->data(),
	'agt'		=> $this->m_anggota->data(),
	'kate'		=> $this->m_kategori->data(),
	'bkt'		=> $this->m_transfer->data()
	);
	$this->load->view('admin/header', $data);
	$this->load->view('admin/sidebar');
	$this->load->view('admin/pemesanan_list');
	$this->load->view('admin/footer');
}

//tambah pemesanan
	public function pemesanan_tambah() {
		if (isset($_POST['submit'])) {
			
			$id_pemesanan = $this->input->post('id_pemesanan');
			$query = $this->db->get_where('tbl_pemesanan', array('id_pemesanan' => $id_pemesanan));

			if($query->num_rows() == 0) {
            	$this->m_pemesanan->simpan();
				$this->session->set_flashdata('simpan', 'Pemesanan Umroh berhasil disimpan ...');
				redirect('admin/pemesanan');
			} else {
                $this->session->set_flashdata('salah', 'Terjadi kesalahan, Pemesanan Umroh sudah ada ...');
                redirect('admin/pemesanan');
            }

        } else {
			$data = array(
				'title' 		=> 'Tambah Pemesanan | SIP UMROH',
				'kodeunik'   	=> $this->m_pemesanan->kodeotomatis(),
				'kate'   		=> $this->m_kategori->data(),
				'pms'   		=> $this->m_pemesanan->data(),
				'agt'			=> $this->m_anggota->data(),
				'bkt'			=> $this->m_transfer->data()
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('admin/pemesanan_tambah');
			$this->load->view('admin/footer');
		}
	}

	//Anggota edit
    public function pemesanan_edit() {
        
        if (isset($_POST['submit'])) {
                $this->m_pemesanan->update();
                $this->session->set_flashdata('simpan', 'Anggota berhasil diperbaharui ...');
                redirect('admin/pemesanan');        
        } else {
            if ($id_pemesanan = $this->uri->segment(3)) {
                $data = array(
                	'title' => 'Edit Pemesanan | SIP Umroh',
                    'pemesanan' 	=> $this->db->get_where('tbl_pemesanan', array('id_pemesanan' => $id_pemesanan))->row_array(),
                    'kate'  		=> $this->m_kategori->data(),
					'pms'   		=> $this->m_pemesanan->data(),
					'agt'			=> $this->m_anggota->data(),
					'bkt'			=> $this->m_transfer->data()
                );
                $this->load->view('admin/header', $data);
                $this->load->view('admin/pemesanan_edit');
                $this->load->view('admin/sidebar');
                $this->load->view('admin/footer');
            }
        }
    }

    //hapus pemesanan
	public function pemesanan_hapus() {
		
	if ($id_pemesanan = $this->uri->segment(3)) {
	
		if(!empty($id_pemesanan)) {
			$this->db->where('id_pemesanan', $id_pemesanan);
			$this->db->delete('tbl_pemesanan');
		}
		$this->session->set_flashdata('hapus', 'Pemesanan berhasil terhapus ...');
		redirect('admin/pemesanan');
		
		} else {
		redirect('admin/pemesanan');
		}
	}

//list anggota
public function anggota() {
	$data = array(
	'title' => 'Data Anggota | SIP Umroh',
	'agt' => $this->m_anggota->data()
	);
	$this->load->view('admin/header', $data);
	$this->load->view('admin/sidebar');
	$this->load->view('admin/anggota_list');
	$this->load->view('admin/footer');
	}

	//tambah anggota
	public function anggota_tambah() {
		if (isset($_POST['submit'])) {

			$id_transfer = $this->input->post('id_transfer');
            $query = $this->db->get_where('tbl_anggota', array('id_transfer' => $id_transfer));
            
            if($query->num_rows() == 0) {
            	$this->m_anggota->simpan();
                $this->session->set_flashdata('simpan', 'Anggota Berhasil Tersimpan ...');
                redirect('admin/anggota');

            } else {
                $this->session->set_flashdata('gagal', 'Terjadi Kesalahan, Anggota Sudah Ada ...');
                redirect('admin/anggota');                
            }
		
			} else {
				$data = array(
				'kodeunik'   	=> $this->m_anggota->kodeotomatis(),
				'title' 		=> 'Tambah Anggota | SIP Umroh',
			);
			
			$this->load->view('admin/header', $data);
			$this->load->view('admin/anggota_tambah');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/footer');
		}
	}

    //Fungsi detail
    public function anggota_detail() {
        if ($id_anggota = $this->uri->segment(3)) {
            $data = array(          
            'agt' => $this->db->get_where('tbl_anggota', array('id_anggota' => $id_anggota))->row_array()
            );
            $this->load->view('admin/header', $data);       
            $this->load->view('admin/anggota_detail');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/footer');
        }      
    }

	//Anggota edit
    public function anggota_edit() {
        
        if (isset($_POST['submit'])) {
                $this->m_anggota->update();
                $this->session->set_flashdata('simpan', 'Anggota berhasil diperbaharui ...');
                redirect('admin/anggota');        
        } else {
            if ($id_anggota = $this->uri->segment(3)) {
                $data = array(
                	'title'  => 'Edit Anggota | SIP Umroh',
                    'agt' => $this->db->get_where('tbl_anggota', array('id_anggota' => $id_anggota))->row_array()
                );
                $this->load->view('admin/header', $data);
                $this->load->view('admin/anggota_edit');
                $this->load->view('admin/sidebar');
                $this->load->view('admin/footer');
            }
        }
    }

	//Anggota hapus
    public function anggota_hapus() {
        if ($id_anggota = $this->uri->segment(3)) {

            if(!empty($id_anggota)) {
                $this->db->where('id_anggota', $id_anggota);
                $this->db->delete('tbl_anggota');
            }
            $this->session->set_flashdata('hapus', 'Anggota berhasil terhapus ...');
            redirect('admin/anggota');
        
        	}else {
			redirect('admin/anggota');
			}
    	}

	//list transfer
	public function transfer() {
		$data = array(
		'title' => 'Data Transfer | SIP Umroh',
		'bkt' 	=> $this->m_transfer->data()
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/transfer_list');
		$this->load->view('admin/footer');
	}

	//tambah transfer
	public function transfer_tambah() {
		if (isset($_POST['submit'])) {

			$id_transfer = $this->input->post('id_transfer');
            $query = $this->db->get_where('tbl_transfer', array('id_transfer' => $id_transfer));
            
            if($query->num_rows() == 0) {

            	$uploadTransfer = $this->upload_transfer();
            	$this->m_transfer->simpan($uploadTransfer);
                $this->session->set_flashdata('simpan', 'Transfer Berhasil Tersimpan ...');
                redirect('admin/transfer');

            } else {
                $this->session->set_flashdata('gagal', 'Terjadi Kesalahan, Transfer Sudah Ada ...');
                redirect('admin/transfer');                
            }
		
			} else {
				$data = array(
				'kodeunik'   	=> $this->m_transfer->kodeotomatis(),
				'title' 		=> 'Tambah Transfer | SIP Umroh',
			);
			
			$this->load->view('admin/header', $data);
			$this->load->view('admin/transfer_tambah');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/footer');
		}
	}

//Transfer edit
   public function transfer_edit() {

        if (isset($_POST['submit'])) {

                $uploadTransfer = $this->upload_transfer();
                $this->m_transfer->update($uploadTransfer);
                $this->session->set_flashdata('update', 'Edit Transfer berhasil diperbaharui ...');
                redirect('admin/transfer');        
        } else {
            if ($id_transfer = $this->uri->segment(3)) {
                    $data = array(
                    'title' 	=> 'Edit Transfer | SIP UMROH',
                    'bkt' 		=> $this->db->get_where('tbl_transfer', array('id_transfer' => $id_transfer))->row_array()

                );
                $this->load->view('admin/header', $data);
                $this->load->view('admin/transfer_edit');
                $this->load->view('admin/sidebar');
                $this->load->view('admin/footer');
            }
          }

        }


    //Transfer hapus
    public function transfer_hapus() {
        if ($id_transfer = $this->uri->segment(3)) {

            if(!empty($id_transfer)) {
                $this->db->where('id_transfer', $id_transfer);
                $this->db->delete('tbl_transfer');
            }
            $this->session->set_flashdata('hapus', 'Bukti Transfer berhasil terhapus ...');
            redirect('admin/transfer');
        
        	}else {
			redirect('admin/transfer');
			}
    	}

    //Fungsi detail
    public function transfer_detail() {
        if ($id_transfer = $this->uri->segment(3)) {
            $data = array(          
            'bkt' => $this->db->get_where('tbl_transfer', array('id_transfer' => $id_transfer))->row_array()
            );
            $this->load->view('admin/header', $data);       
            $this->load->view('admin/transfer_detail');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/footer');
        }      
    }

	//upload foto
	public function upload_transfer() {
		$config['upload_path'] = './assets/backend/images/bukti_transfer/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
		$config['max_size'] = 4048;
		
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('bukti');
		
		$upload = $this->upload->data();
		return $upload['file_name'];
	}

	//list transfer
	public function album() {
		$data = array(
		'title' => 'Data Album | SIP Umroh',
		'glr' 	=> $this->m_galeri->data()
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/album_list');
		$this->load->view('admin/footer');
	}

	//tambah album
	public function album_tambah() {
		if (isset($_POST['submit'])) {

			$id_galeri = $this->input->post('id_galeri');
            $query = $this->db->get_where('tbl_galeri', array('id_galeri' => $id_galeri));
            
            if($query->num_rows() == 0) {

            	$uploadGaleri = $this->upload_galeri();
            	$this->m_galeri->simpan($uploadGaleri);
                $this->session->set_flashdata('simpan', 'Album Berhasil Tersimpan ...');
                redirect('admin/album');

            } else {
                $this->session->set_flashdata('gagal', 'Terjadi Kesalahan, Album Sudah Ada ...');
                redirect('admin/album');                
            }
		
			} else {
				$data = array(
				'kodeunik'   	=> $this->m_galeri->kodeotomatis(),
				'title' 		=> 'Tambah Album | SIP Umroh',
			);
			
			$this->load->view('admin/header', $data);
			$this->load->view('admin/album_tambah');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/footer');
		}
	}

	//Album edit
    public function album_edit() {
        
        if (isset($_POST['submit'])) {

        		$uploadGaleri = $this->upload_galeri();
                $this->m_galeri->update($uploadGaleri);
                $this->session->set_flashdata('simpan', 'Album berhasil diperbaharui ...');
                redirect('admin/album');        
        } else {
            if ($id_galeri = $this->uri->segment(3)) {
                $data = array(
                	'title'  => 'Edit Anggota | SIP Umroh',
                    'glr' => $this->db->get_where('tbl_galeri', array('id_galeri' => $id_galeri))->row_array()
                );
                $this->load->view('admin/header', $data);
                $this->load->view('admin/album_edit');
                $this->load->view('admin/sidebar');
                $this->load->view('admin/footer');
            }
        }
    }

	//upload galeri
	public function upload_galeri() {
		$config['upload_path'] = './assets/backend/images/galeri/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
		$config['max_size'] = 4048;
		
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('gbr_galeri');
		
		$upload = $this->upload->data();
		return $upload['file_name'];
	}







































	
}