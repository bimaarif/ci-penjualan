<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

    function getDataUser(){
	   return $this->db->get('users');	
	}

	function insertUser($data){
       $simpan = $this->db->insert('users', $data);

       if ($simpan) {
       	 return 1;
       }else{
       	 return 0;
       }
	}

	public function getUser($id_user)
	{
	   return $this->db->get_where('users', array('id_user' => $id_user));
	}

	public function updateUser($data, $id_user)
	{
      $simpan = $this->db->update('users', $data, array('id_user' => $id_user));

      if ($simpan) {
       	 return 1;
       }else{
       	 return 0;
       }
	}

	public function deleteUser($id_user)
	{
		$hapus = $this->db->delete('users', array('id_user' => $id_user));

		   if ($hapus) {
	       	 return 1;
	       }else{
	       	 return 0;
	       }

	}	

}

/* End of file Model_user.php */
/* Location: ./application/models/Model_user.php */