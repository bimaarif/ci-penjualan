<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    checklogin();
		$this->load->model('Model_pelanggan');
		$this->load->model('Model_cabang');
	}

	public function index()
	{
		$data['pelanggan'] = $this->Model_pelanggan->getDataPelanggan()->result();
		$this->template->load('template/template','pelanggan/view_pelanggan', $data);
	}

	public function inputpelanggan()
	{
		$data['cabang'] = $this->Model_cabang->getdataCabang()->result();
		$this->load->view('pelanggan/input_pelanggan', $data);
	}

	public function simpanpelanggan()
	{
		$kodepelanggan = $this->input->post('kodepelanggan');
    	$namapelanggan = $this->input->post('namapelanggan');
    	$alamatpelanggan 	= $this->input->post('alamatpelanggan');
    	$nohp 	    = $this->input->post('nohp');
    	$cabang 	= $this->input->post('cabang');

    	$data = array(
    		'kode_pelanggan' => $kodepelanggan,
    		'nama_pelanggan' => $namapelanggan,
    		'alamat_pelanggan' => $alamatpelanggan,
    		'no_hp' => $nohp,
    		'kode_cabang' => $cabang
    	);

    	$simpan = $this->Model_pelanggan->insertPelanggan($data);

    	if ($simpan == 1) {
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  					data berhasil di simpan
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('pelanggan');
    	}else{
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="8" y1="8" x2="12" y2="12" /><line x1="12" y1="8" x2="8" y2="12" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
  					data gagal di simpan
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('pelanggan');
    	}
	}

	  public function editpelanggan()
    {
    	$kodepelanggan = $this->uri->segment(3);
    	$data['cabang'] = $this->Model_cabang->getdataCabang()->result();
        $data['pelanggan'] = $this->Model_pelanggan->getPelanggan($kodepelanggan)->row_array();
    	$this->load->view('pelanggan/edit_pelanggan', $data);
    }

    public function updatepelanggan()
    {
    	$kodepelanggan = $this->input->post('kodepelanggan');
    	$namapelanggan = $this->input->post('namapelanggan');
    	$alamatpelanggan 	= $this->input->post('alamatpelanggan');
    	$nohp 	    = $this->input->post('nohp');
    	$cabang 	= $this->input->post('cabang');

    	$data = array(
    		'nama_pelanggan' => $namapelanggan,
    		'alamat_pelanggan' => $alamatpelanggan,
    		'no_hp' => $nohp,
    		'kode_cabang' => $cabang
    	);

    	$simpan = $this->Model_pelanggan->updatePelanggan($data, $kodepelanggan);

    	if ($simpan == 1) {
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  					data berhasil di update
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('pelanggan');
    	}else{
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="8" y1="8" x2="12" y2="12" /><line x1="12" y1="8" x2="8" y2="12" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
  					data gagal di update
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('pelanggan');
    	}
    }

    public function hapuspelanggan()
	{
		$kodepelanggan = $this->uri->segment(3);
		$hapus = $this->Model_pelanggan->deletePelanggan($kodepelanggan);

		if ($hapus == 1) {
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  					data berhasil di hapus
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('pelanggan');
    	}else{
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="8" y1="8" x2="12" y2="12" /><line x1="12" y1="8" x2="8" y2="12" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
  					data gagal di hapus
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('pelanggan');
    	}
	}

}

/* End of file pelanggan.php */
/* Location: ./application/controllers/pelanggan.php */