<h2 class="page-title">
    Data penjualan
</h2>
<div><?php echo $this->session->flashdata('msg'); ?></div>
<form id="formPenjualan" method="POST" action="<?php echo base_url(); ?>penjualan/simpanpenjualan">
	<input type="hidden" name="" id="cekBarang">
	<div class="row">
		<div class="col-md-5">
			<div class="card">
			   <div class="card-body">
			   	  <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><rect x="5" y="11" width="1" height="2" /><line x1="10" y1="11" x2="10" y2="13" /><rect x="14" y="11" width="1" height="2" /><line x1="19" y1="11" x2="19" y2="13" /></svg>
                    </span>
                    <input type="text" value="<?= $no_faktur; ?>" class="form-control" name="no_faktur" id="no_faktur" placeholder="no faktur" readonly>
                   </div>

                <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                               <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                    </span>
                    <input type="text" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="tgltransaksi" id="tgltransaksi" placeholder="tanggal transaksi">
                </div>

                <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                               <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                    </span>
                    <input type="hidden" name="kode_pelanggan" id="kode_pelanggan">
                    <input type="text" class="form-control" name="namapelanggan" id="namapelanggan" placeholder="pelanggan">
                </div>

                <div class="mb-3">
                	<select name="jenistransaksi" id="jenistransaksi" class="form-select">
                		<option value="">Pilih Jenis Transaksi</option>
                		<option value="tunai">Tunai</option>
                		<option value="kredit">Kredit</option>
                	</select>
                </div>

                <div class="input-icon mb-3" id="jt">
                    <span class="input-icon-addon">
                               <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                    </span>
                    <input type="text" class="form-control" name="jatuhtempo" id="jatuhtempo" placeholder="jatuh tempo" readonly>
                </div>

                <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                               <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                    </span>
                    <input type="hidden" value="<?= $this->session->userdata('id_user');  ?>" name="id_user" id="id_user">
                    <input type="text" value="<?= $this->session->userdata('id_user')." - ".$this->session->userdata('nama_lengkap');  ?>" class="form-control" name="username" id="username" placeholder="kasir" readonly>
                </div>
			   </div>			
			</div>
		</div>

		<div class="col-md-7">
			<div class="card card-sm">
                <div class="card-body d-flex align-items-center">
                  <span class="bg-blue text-white avatar mr-3" style="height: 9rem; width: 9rem;">
                  	<i class="fa fa-shopping-cart" style="font-size: 5rem;"></i>
                  </span>
                  <div class="mr-3">
                    <div class="font-weight-large">
                      <h2 id="totalpenjualan" style="font-size: 5rem;">0</h2>
                    </div>
                  </div>
                </div>
              </div>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Data barang</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-2">
							<div class="input-icon mb-3">
                             <span class="input-icon-addon">
                               <i class="fa fa-barcode"></i>
                             </span>
			                    <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="kode barang">
			                </div>
						</div>
						<div class="col-md-4">
							<div class="input-icon mb-3">
                             <span class="input-icon-addon">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="6" height="6" rx="1" /><rect x="14" y="4" width="6" height="6" rx="1" /><rect x="4" y="14" width="6" height="6" rx="1" /><rect x="14" y="14" width="6" height="6" rx="1" /></svg>
                             </span>
			                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="nama barang" readonly>
			                </div>
						</div>
						<div class="col-md-2">
							<div class="input-icon mb-3">
                             <span class="input-icon-addon">
                               <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                             </span>
			                    <input type="text" class="form-control" name="harga" id="harga" placeholder="harga" style="text-align: right;" readonly>
			                </div>
						</div>
						<div class="col-md-2">
							<div class="input-icon mb-3">
                             <span class="input-icon-addon">
                               <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect width="6" height="6" x="9" y="5" rx="1" /><line x1="4" y1="7" x2="5" y2="7" /><line x1="4" y1="11" x2="5" y2="11" /><line x1="19" y1="7" x2="20" y2="7" /><line x1="19" y1="11" x2="20" y2="11" /><line x1="4" y1="15" x2="20" y2="15" /><line x1="4" y1="19" x2="20" y2="19" /></svg>
                             </span>
			                    <input type="text" class="form-control" name="qty" id="qty" placeholder="qty">
			                </div>
						</div>
						<div class="col-md-2">
							<a href="#" class="btn btn-primary" id="tambahbarang">
								<i class="fa fa-cart-plus" style="font-size: 1.5rem"></i>
							</a>
						</div>
					</div>

					<div class="row">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
								    <th>NO</th>
									<th>KODE BARANG</th>
									<th>NAMA BARANG</th>
									<th>HARGA</th>
									<th>QTY</th>
									<th>TOTAL</th>
									<th>AKSI</th>	
								</tr>
							</thead>
							<tbody id="loaddatabarang">
								
							</tbody>
							
						</table>
					</div>
					<div class="row mt-3">
						<button type="submit" class="btn btn-primary w-100"><i class="fa fa-send mr-2"></i>SIMPAN</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>


 <div class="modal modal-blur fade" id="modalpelanggan" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Data pelanggan</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table class="table table-striped table-bordered" id="tabelpelanggan">
					<thead>
						<tr class="text-center">
							<th>NO</th>
							<th>KODE PELANGGAN</th>
							<th>NAMA PELANGGAN</th>
							<th>ALAMAT</th>
							<th>NO HP</th>
							<th>CABANG</th>
							<th>aksi</th>	
						</tr>
					</thead>
					<tbody>
                     <?php 
					  $no = 1;
					  foreach ($pelanggan as $p) { ?>
						<tr class="text-center">
						   <td><?php echo $no; ?></td>
						   <td><?php echo $p->kode_pelanggan; ?></td>
						   <td><?php echo $p->nama_pelanggan; ?></td>
						   <td><?php echo $p->alamat_pelanggan; ?></td>
						   <td><?php echo $p->no_hp; ?></td>
						   <td><?php echo $p->nama_cabang; ?></td>
						   <td>
						   	  <a href="#" data-kodepelanggan="<?php echo $p->kode_pelanggan; ?>" data-namapel="<?php echo $p->nama_pelanggan; ?>" class="btn btn-sm btn-primary text-center pilih">
						   	  	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" /><line x1="13.5" y1="6.5" x2="17.5" y2="10.5" /></svg>
						   	    Pilih
						   	  </a>
						   </td>
						</tr>
					<?php
                      $no++;
					   } ?>
					</tbody>
				</table>
          </div>
        </div>
      </div>
</div>

<div class="modal modal-blur fade" id="modalbarangharga" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Data barang</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
             <table class="table table-striped table-bordered" id="tabelharga">
					<thead>
						<tr class="text-center">
							<th>NO</th>
							<th>KODE HARGA</th>
							<th>NAMA BARANG</th>
							<th>SATUAN</th>
							<th>HARGA</th>
							<th>STOK</th>
							<th>CABANG</th>
							<th>AKSI</th>	
						</tr>
					</thead>
					<tbody>

					<?php 
					  $no = 1;
					  foreach ($harga as $h) { ?>
						<tr class="text-center">
						   <td><?php echo $no; ?></td>
						   <td><?php echo $h->kode_harga; ?></td>
						   <td><?php echo $h->nama_barang; ?></td>
						   <td><?php echo $h->satuan; ?></td>
						   <td>Rp <?php echo number_format($h->harga,'0','','.'); ?></td>
						   <td><?php echo $h->stok; ?></td>
						   <td><?php echo $h->kode_cabang; ?></td>
						   <td>
						   	 <a href="#" data-kodebarang="<?php echo $h->kode_barang; ?>" data-namabarang="<?php echo $h->nama_barang; ?>" data-harga="<?php echo $h->harga; ?>" class="btn btn-sm btn-primary text-center pilihbarang">
						   	  	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" /><line x1="13.5" y1="6.5" x2="17.5" y2="10.5" /></svg>
						   	    Pilih
						   	  </a>
						   </td>
						</tr>
					<?php
                      $no++;
					   } ?>
					</tbody>
				</table>
          </div>
        </div>
      </div>
</div>


<script>
  document.addEventListener("DOMContentLoaded", function () {
  	flatpickr(document.getElementById('tgltransaksi'), {
  	});
  });
</script>
<script>
	$(function(){
		function hidejatuhtempo(){
           $('#jt').hide();
		}

		function showjt(){
			$('#jt').show();
		}

		function getJatuhTempo(){
			let tgltransaksi = $('#tgltransaksi').val();

			$.ajax({
				type : 'POST',
				url : '<?php echo base_url(); ?>penjualan/getJatuhTempo',
				data : {tgltransaksi:tgltransaksi},
				cache : false,
				success :function(respond){
					$('#jatuhtempo').val(respond);
				}
			})
		}

		function cekBarang(){
			$.ajax({
				type : 'POST',
				url : '<?php echo base_url(); ?>penjualan/cekBarang',
				cache : false,
				success :function(respond){
					$('#cekBarang').val(respond);
				}
			})
		}

		function loaddatabarang()
		{
			let id_user = $('#id_user').val();

			$.ajax({
				type : 'POST',
				url  : '<?php echo base_url(); ?>penjualan/getDataBarangTemp',
				data : {
					id_user : id_user
				},
				cache : false,
				success : function(respond){
                    $('#loaddatabarang').html(respond);
				}
			})
		}

		loaddatabarang();

		cekBarang();

        getJatuhTempo();

		hidejatuhtempo();

		$('#jenistransaksi').change(function(){
           let jenistransaksi = $(this).val();

           if (jenistransaksi == "kredit") {
           	  showjt();
           }else{
           	  hidejatuhtempo();
           }
		});

		$('#tgltransaksi').change(function(){
            getJatuhTempo();
		});


		$('#formPenjualan').submit(function(){
			let no_faktur = $('#no_faktur').val();
			let tgltransaksi = $('#tgltransaksi').val();
			let kode_pelanggan = $('#kode_pelanggan').val();
			let jenistransaksi = $('#jenistransaksi').val();

			if (no_faktur == "") {
				swal("Oop!", "no faktur harus diisi","warning");
				return false;
			}else if(tgltransaksi == ""){
				swal("Oop!", "tanggal transaksi harus diisi","warning");
				return false;
			}else if(kode_pelanggan == ""){
				swal("Oop!", "kode pelanggan harus diisi","warning");
				return false;
			}else if(jenistransaksi == ""){
				swal("Oop!", "jenis transaksi harus diisi","warning");
				return false;
			}else{
				return true;
			}
		});


		$('#namapelanggan').click(function(){
			$('#modalpelanggan').modal('show');
		});

		$('#tabelpelanggan').DataTable();

		$('.pilih').click(function(){
			let kodepelanggan = $(this).attr('data-kodepelanggan');
			let namapelanggan = $(this).attr('data-namapel');

            $('#kode_pelanggan').val(kodepelanggan);
            $('#namapelanggan').val(namapelanggan);

            $('#modalpelanggan').modal('hide');
		});

		$('#kode_barang').click(function(){
           $('#modalbarangharga').modal('show');
		});

		$('#tabelharga').DataTable();

		$('.pilihbarang').click(function(){
			let kodebarang = $(this).attr('data-kodebarang');
			let namabarang = $(this).attr('data-namabarang');
			let harga      = $(this).attr('data-harga');

            $('#kode_barang').val(kodebarang);
            $('#nama_barang').val(namabarang);
            $('#harga').val(harga);

            $('#modalbarangharga').modal('hide');
		});

		$('#tambahbarang').click(function(){
			let kode_barang = $('#kode_barang').val();
			let harga = $('#harga').val();
			let qty = $('#qty').val();
            let id_user = $('#id_user').val();

            if (kode_barang == "") {
            	swal('Ooops','Kode barang harus di isi','warning');
            	return false;
            }else if(qty == "" || qty == 0 ){
            	swal('Ooops','Kode barang harus di isi','warning');	
            }else{

               $.ajax({
                  type : "POST",
                  url  : "<?php echo base_url(); ?>penjualan/simpanbarangtemp",
                  data : {
                  	 kode_barang : kode_barang,
                  	 harga : harga,
                  	 qty : qty,
                  	 id_user : id_user
                  },
                  cache : false,
                  success : function(respond){
                     if (respond==1) {
                     	swal('Ooops','data sudah ada !','warning');
                     }else{
                     	loaddatabarang();
                     }
                   }
                });

            }

          

		});
	});
</script>

