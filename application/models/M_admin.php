 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    //table
    public $table ="tbl_admin";
    
    //check login
    public function cekmasuk($username, $password) {
        $this->db->where('username',  $username);
        $this->db->where('password',  SHA1($password));
        $user = $this->db->get($this->table)->row_array();
        return $user;
    }

    //data
    public function data(){
        $query = "SELECT * FROM tbl_admin ORDER BY id_admin asc";
        return $this->db->query($query)->result();
    }

    //admin
    public function getadmin($where = '') {
        return $this->db->query("SELECT * FROM tbl_admin $where; ");
    }
   

    public function kodeotomatis() {
        $q = $this->db->query("SELECT MAX(RIGHT(id_admin, 4)) AS kd_max FROM tbl_admin");
        $kd = "";
        if($q->num_rows() > 0) {
            foreach ($q->result()as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s",$tmp);
            }
        }else {
            $kd = "0001";
        } $kodejadi = "ADM".$kd;
            return $kodejadi;
    }

    public function simpan($foto) {
        $data = array(
            'id_admin'      => $this->input->post('id_admin'),
            'nama_admin'    => $this->input->post('nama_admin'),
            'username'      => $this->input->post('username'),
            'password'      => SHA1($this->input->post('password')),
            'foto'          => $foto
        );  
        $this->db->insert($this->table,$data);
    }

    public function update($foto) {
        if(empty($foto) AND $this->input->post('password') == '') {
            $data = array(
                'nama_admin'      => $this->input->post('nama_admin'),
                'username'        => $this->input->post('username'),            
            );
        } else if(empty($foto) AND $this->input->post('password') != '') {
            $data = array(
                'password'        => SHA1($this->input->post('password')),
                'nama_admin'      => $this->input->post('nama_admin'),
                'username'        => $this->input->post('username'),
            );
        } else if($this->input->post('password') == '') {
            $data = array(
                'nama_admin'      => $this->input->post('nama_admin'),
                'username'        => $this->input->post('username'),
                'foto'            => $foto
            );
        } else if($this->input->post('password') != '') {
            $data = array(
                'password'        => SHA1($this->input->post('password')),
                'nama_admin'      => $this->input->post('nama_admin'),
                'username'        => $this->input->post('username'),
                'foto'            => $foto
            );
        }

        $id_admin   = $this->input->post('id_admin');
        $this->db->where('id_admin',$id_admin);
        $this->db->update($this->table,$data);
    }
}