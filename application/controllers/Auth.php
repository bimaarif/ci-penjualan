<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Auth');
	}

	public function login()
	{
		checklog();
		$this->load->view('auth/login');
	}

	public function checklogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
        
        $login = $this->Model_Auth->getlogin($username,$password);
        $ceklogin = $login->num_rows();
        $datalogin = $login->row_array();
        
        $data = array(
           'id_user' => $datalogin['id_user'],
           'nama_lengkap' => $datalogin['nama_lengkap'],
           'username' => $datalogin['username'],
           'password' => $datalogin['password'],
           'level' => $datalogin['level'],
           'kode_cabang' => $datalogin['kode_cabang']
        );

        $this->session->set_userdata($data);

        if ($ceklogin == 1) {
        	redirect('dashboard');
        }else{
        	$this->session->set_flashdata('msg', '
              <div class="alert alert-warning" role="alert">
                username / password salah
              </div>
        	');
        	redirect('auth/login');
        }
	}

	public function logout()
	{
	   session_destroy();
	   redirect('auth/login');
	}
}