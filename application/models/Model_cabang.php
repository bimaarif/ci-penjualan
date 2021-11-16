<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_cabang extends CI_Model {

  public function getdataCabang()
  {
  	 return $this->db->get('cabang');
  }

  public function insertCabang($data)
  {
  	$simpan = $this->db->insert('cabang', $data);

  	if ($simpan) {
  		return 1;
  	}else{
  		return 0;
  	}
  }

  public function getCabang($kodecabang)
  {
  	 return $this->db->get_where('cabang', array('kode_cabang' => $kodecabang));
  }

  public function updateCabang($data, $kodecabang)
  {
  	$simpan = $this->db->update('cabang', $data, array('kode_cabang' => $kodecabang));

  	if ($simpan) {
  		return 1;
  	}else{
  		return 0;
  	}
  }

  public function deleteCabang($kodecabang)
  {
  	$hapus = $this->db->delete('cabang', array('kode_cabang' => $kodecabang));

  	if ($hapus) {
  		return 1;
  	}else{
  		return 0;
  	}
  }	

}

/* End of file Model_cabang.php */
/* Location: ./application/models/Model_cabang.php */