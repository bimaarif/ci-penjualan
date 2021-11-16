<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_user');
		$this->load->model('Model_cabang');
	}

	public function index()
	{
		$data['user'] = $this->Model_user->getDataUser()->result();
  		$this->template->load('template/template','users/view_user', $data);		
	}

	public function inputuser()
    {
    	$data['cabang'] = $this->Model_cabang->getdataCabang()->result();
    	$this->load->view('users/input_user', $data);
    }

    public function simpanuser()
    {
    	$id_user = $this->input->post('id_user');
    	$nama_lengkap = $this->input->post('nama_lengkap');
    	$no_hp 	= $this->input->post('no_hp');
    	$username 	= $this->input->post('username');
    	$password 	= $this->input->post('password');
    	$level 	= $this->input->post('level');
        $kodecabang 	= $this->input->post('kode_cabang');

    	$data = array(
    		'id_user' => $id_user,
    		'nama_lengkap' => $nama_lengkap,
    		'no_hp' => $no_hp,
    		'username' => $username,
    		'password' => $password,
    		'level' => $level,
    		'kode_cabang' => $kodecabang
    	);

    	$simpan = $this->Model_user->insertUser($data);

    	if ($simpan == 1) {
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  					data berhasil di simpan
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('user');
    	}else{
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="8" y1="8" x2="12" y2="12" /><line x1="12" y1="8" x2="8" y2="12" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
  					data gagal di simpan
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('user');
    	}
    }

    public function edituser()
    {
    	$id_user = $this->uri->segment(3);
        $data['users'] = $this->Model_user->getUser($id_user)->row_array();
        $data['cabang'] = $this->Model_cabang->getDataCabang()->result();
        $data['useredit'] = $this->Model_user->getDataUser()->result();
    	$this->load->view('users/edit_user', $data);
    }

      public function updateuser()
	  {
	    $id_user = $this->input->post('id_user');
    	$nama_lengkap = $this->input->post('nama_lengkap');
    	$no_hp 	= $this->input->post('no_hp');
    	$username 	= $this->input->post('username');
    	$password 	= $this->input->post('password');
    	$level 	= $this->input->post('level');
        $kodecabang 	= $this->input->post('kode_cabang');

    	$data = array(
    		'nama_lengkap' => $nama_lengkap,
    		'no_hp' => $no_hp,
    		'username' => $username,
    		'password' => $password,
    		'level' => $level,
    		'kode_cabang' => $kodecabang
    	);


	      $simpan = $this->Model_user->updateUser($data, $id_user);

	      if ($simpan == 1) {
	        $this->session->set_flashdata('msg','
	               <div class="alert alert-success alert-dismissible" role="alert">
	                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
	            data berhasil di update
	          <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
	         </div>
	        ');
	        redirect('user');
	      }else{
	        $this->session->set_flashdata('msg','
	               <div class="alert alert-success alert-dismissible" role="alert">
	                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="8" y1="8" x2="12" y2="12" /><line x1="12" y1="8" x2="8" y2="12" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
	            data gagal di update
	          <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
	         </div>
	        ');
	        redirect('user');
	      }
	    }

    public function hapususer()
	{
		$id_user = $this->uri->segment(3);
		$hapus   = $this->Model_user->deleteUser($id_user);

		if ($hapus == 1) {
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  					data berhasil di hapus
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('user');
    	}else{
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="8" y1="8" x2="12" y2="12" /><line x1="12" y1="8" x2="8" y2="12" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
  					data gagal di hapus
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('user');
    	}
	}


}

/* End of file User.php */
/* Location: ./application/controllers/User.php */