<?php

class Barang extends CI_Controller{

  	public function __construct()
  	{
  		parent::__construct();
      checklogin();
  		$this->load->model('Model_barang');
      $this->load->model('Model_cabang');
      $this->load->library('form_validation');
  	}

  	public function index()
  	{
  		$data['barang'] = $this->Model_barang->getDataBarang()->result();
  		$this->template->load('template/template','barang/view_barang', $data);
  	}
    
    public function inputbarang()
    {
    	$this->load->view('barang/input_barang');
    }

    public function simpanbarang()
    {
    	$kodebarang = $this->input->post('kodebarang');
    	$namabarang = $this->input->post('namabarang');
    	$satuan 	= $this->input->post('satuan');

    	$data = array(
    		'kode_barang' => $kodebarang,
    		'nama_barang' => $namabarang,
    		'satuan' => $satuan
    	);

    	$simpan = $this->Model_barang->insertBarang($data);

    	if ($simpan == 1) {
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  					data berhasil di simpan
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('barang');
    	}else{
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="8" y1="8" x2="12" y2="12" /><line x1="12" y1="8" x2="8" y2="12" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
  					data gagal di simpan
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('barang');
    	}
    }

    public function editbarang()
    {
    	$kodebarang = $this->uri->segment(3);
      $data['barang'] = $this->Model_barang->getBarang($kodebarang)->row_array();
    	$this->load->view('barang/edit_barang', $data);
    }

    public function updatebarang()
    {
    	$kodebarang = $this->input->post('kodebarang');
    	$namabarang = $this->input->post('namabarang');
    	$satuan 	= $this->input->post('satuan');

    	$data = array(
    		'nama_barang' => $namabarang,
    		'satuan' => $satuan
    	);

    	$simpan = $this->Model_barang->updateBarang($data, $kodebarang);

    	if ($simpan == 1) {
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  					data berhasil di update
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('barang');
    	}else{
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="8" y1="8" x2="12" y2="12" /><line x1="12" y1="8" x2="8" y2="12" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
  					data gagal di update
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('barang');
    	}
    }

  public function hapusBarang()
	{
		$kodebarang = $this->uri->segment(3);
		$hapus = $this->Model_barang->deleteBarang($kodebarang);

		if ($hapus == 1) {
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
  					data berhasil di hapus
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('barang');
    	}else{
    		$this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="8" y1="8" x2="12" y2="12" /><line x1="12" y1="8" x2="8" y2="12" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
  					data gagal di hapus
  				<a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
			   </div>
    		');
    		redirect('barang');
    	}
	}

  public function harga()
  {
     $data['harga'] = $this->Model_barang->getDataHarga()->result();
     $this->template->load('template/template','barang/view_harga', $data);
  }

  public function inputharga()
  {
      $data['barang'] = $this->Model_barang->getDataBarang()->result();
      $data['cabang'] = $this->Model_cabang->getDataCabang()->result();
      $this->load->view('barang/input_harga', $data);
  }

  public function simpanharga()
  {
      $this->form_validation->set_rules('kodeharga', 'Kodeharga', 'is_unique[barang_harga.kode_harga]',[
          'is_unique' => 'kode harga sudah digunakan'
      ]);

      $this->form_validation->set_rules('kodebarang', 'Kodebarang', 'trim|required');
      $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
      $this->form_validation->set_rules('stok', 'Stok', 'trim|required');
      $this->form_validation->set_rules('cabang', 'Cabang', 'trim|required');

      if ($this->form_validation->run() == false) {
         $data['harga'] = $this->Model_barang->getDataHarga()->result();
         $this->template->load('template/template','barang/view_harga',$data);
      }else{

        $kodeharga  = $this->input->post('kodeharga');
        $kodebarang = $this->input->post('kodebarang');
        $harga      = $this->input->post('harga');
        $stok       = $this->input->post('stok');
        $cabang     = $this->input->post('cabang');

        $data = array(
          'kode_harga' => $kodeharga,
          'kode_barang' => $kodebarang,
          'harga' => $harga,
          'stok' => $stok,
          'kode_cabang' => $cabang
        );

        $simpan = $this->Model_barang->insertHarga($data);
        
        if ($simpan == 1) {
          $this->session->set_flashdata('msg','
                 <div class="alert alert-success alert-dismissible" role="alert">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
              data berhasil di simpan
            <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
           </div>
          ');
          redirect('barang/harga');
        }else{
          $this->session->set_flashdata('msg','
                 <div class="alert alert-success alert-dismissible" role="alert">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="8" y1="8" x2="12" y2="12" /><line x1="12" y1="8" x2="8" y2="12" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
              data gagal di simpan
            <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
           </div>
          ');
          redirect('barang/harga');
        }

      }

      
  }

  public function editharga()
  {
      $kodeharga = $this->uri->segment(3);
      $data['barang'] = $this->Model_barang->getDataBarang()->result();
      $data['cabang'] = $this->Model_cabang->getDataCabang()->result();
      $data['harga'] = $this->Model_barang->getHarga($kodeharga)->row_array();
      $this->load->view('barang/edit_harga', $data);
  }

  public function updateharga()
  {
      $kodeharga  = $this->input->post('kodeharga');
      $harga = $this->input->post('harga');
      $stok   = $this->input->post('stok');

      $data = array(
        'harga' => $harga,
        'stok' => $stok,
      );

      $simpan = $this->Model_barang->updateHarga($data, $kodeharga);

      if ($simpan == 1) {
        $this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            data berhasil di update
          <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
         </div>
        ');
        redirect('barang/harga');
      }else{
        $this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="8" y1="8" x2="12" y2="12" /><line x1="12" y1="8" x2="8" y2="12" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
            data gagal di update
          <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
         </div>
        ');
        redirect('barang/harga');
      }
    }

  public function hapusHarga()
  {
    $kodeharga = $this->uri->segment(3);
    $hapus = $this->Model_barang->deleteHarga($kodeharga);

    if ($hapus == 1) {
        $this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
            data berhasil di hapus
          <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
         </div>
        ');
        redirect('barang/harga');
      }else{
        $this->session->set_flashdata('msg','
               <div class="alert alert-success alert-dismissible" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="8" y1="8" x2="12" y2="12" /><line x1="12" y1="8" x2="8" y2="12" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
            data gagal di hapus
          <a href="#" class="btn-close" data-dismiss="alert" aria-label="close"></a>
         </div>
        ');
        redirect('barang/harga');
      }
  }	

}