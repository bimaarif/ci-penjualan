 <?php

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	    checklogin();
	    $this->load->model('Model_pelanggan');
	    $this->load->model('Model_penjualan');
	    $this->load->model('Model_cabang');		
	}

    function index()
	{
		$data['jmlpelanggan'] = $this->Model_pelanggan->getDataPelanggan()->num_rows();
		$data['jmltransaksi'] = $this->Model_penjualan->getDataPenjualanHariIni()->num_rows();
		$data['jmlcabang'] = $this->Model_cabang->getDataCabang()->num_rows();
		$data['jmlbayar'] = $this->Model_penjualan-> getBayarHariIni()->row_array();
		$data['rekappenjualan'] = $this->Model_penjualan->getPenjualanPerbulan()->result();
		
		$this->template->load('template/template','dashboard/dashboard', $data);
	}


}

