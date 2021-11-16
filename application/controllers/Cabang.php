<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    checklogin();
		$this->load->model('Model_cabang');
	}

	public function index()
	{
		$data['cabang'] = $this->Model_cabang->getDataCabang()->result();
		$this->template->load('template/template','cabang/view_cabang', $data);
	}

	public function inputcabang()
    {
    	$this->load->view('cabang/input_cabang');
    }

    public function simpancabang()
    {
    	$kodecabang = $this->input->post('kodecabang');
    	$namacabang = $this->input->post('namacabang');
    	$alamatcabang 	= $this->input->post('alamatcabang');
    	$telepon 	= $this->input->post('telepon');

    	$data = array(
    		'kode_cabang' => $kodecabang,
    		'nama_cabang' => $namacabang,
    		'alamat_cabang' => $alamatcabang,
    		'telepon' => $telepon
    	);

    	$simpan = $this->Model_cabang->insertCabang($data);

    	if ($simpan == 1) {
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  					data berhasil di simpan
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('cabang');
    	}else{
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="8" y1="8" x2="12" y2="12" /><line x1="12" y1="8" x2="8" y2="12" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
  					data gagal di simpan
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('cabang');
    	}
    }

    public function editcabang()
    {
    	$kodecabang = $this->uri->segment(3);
        $data['cabang'] = $this->Model_cabang->getCabang($kodecabang)->row_array();
    	$this->load->view('cabang/edit_cabang', $data);
    }
    
    public function updatecabang()
    {
    	$kodecabang = $this->input->post('kodecabang');
    	$namacabang = $this->input->post('namacabang');
    	$alamatcabang 	= $this->input->post('alamatcabang');
    	$telepon 	= $this->input->post('telepon');

    	$data = array(
    		'nama_cabang' => $namacabang,
    		'alamat_cabang' => $alamatcabang,
    		'telepon' => $telepon
    	);

    	$simpan = $this->Model_cabang->updateCabang($data, $kodecabang);

    	if ($simpan == 1) {
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  					data berhasil di update
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('cabang');
    	}else{
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="8" y1="8" x2="12" y2="12" /><line x1="12" y1="8" x2="8" y2="12" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
  					data gagal di update
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('cabang');
    	}
    }

    public function hapusCabang()
	{
		$kodecabang = $this->uri->segment(3);
		$hapus = $this->Model_cabang->deleteCabang($kodecabang);

		if ($hapus == 1) {
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  					data berhasil di hapus
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('cabang');
    	}else{
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="8" y1="8" x2="12" y2="12" /><line x1="12" y1="8" x2="8" y2="12" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
  					data gagal di hapus
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('cabang');
    	}
	}


}

/* End of file Cabang.php */
/* Location: ./application/controllers/Cabang.php */