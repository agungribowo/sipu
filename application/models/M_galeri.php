 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_galeri extends CI_Model {

    //table
    public $table ="tbl_galeri";

    //data
	public function data() {
	$query = "SELECT * FROM tbl_galeri ORDER BY id_galeri ASC";
	return $this->db->query($query)->result();
}
	
	function getPage($where = ''){
        return $this->db->query("select * from pages $where; ");
        }

public function kodeotomatis() {
        $q = $this->db->query("SELECT MAX(RIGHT(id_galeri, 4)) AS kd_max FROM tbl_galeri");
        $kd = "";
        if($q->num_rows() > 0) {
            foreach ($q->result()as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s",$tmp);
            }
        }else {
            $kd = "0001";
        } $kodejadi = "ALB".$kd;
            return $kodejadi;
    }

//simpan
public function simpan($gbr_galeri) {

		$data = array(
			'id_galeri' 		=> $this->input->post('id_galeri'),
			'jdl_galeri' 		=> $this->input->post('jdl_galeri'),
			'gbr_galeri' 		=> $gbr_galeri 
		);

			$this->db->insert($this->table, $data);
	}

public function update($gbr_galeri) {
        if(empty($gbr_galeri)) {
            $data = array(
                'jdl_galeri'      => $this->input->post('jdl_galeri')
            );
        } else {
            $data = array(
                'jdl_galeri'        => $this->input->post('jdl_galeri'),
                'gbr_galeri'        => $gbr_galeri 
            );
        }

        $id_galeri   = $this->input->post('id_galeri');
        $this->db->where('id_galeri',$id_galeri);
        $this->db->update($this->table,$data);
    }
}