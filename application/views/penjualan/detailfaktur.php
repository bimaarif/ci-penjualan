<h2 class="page-title">
    Data Faktur
</h2>
	<input type="hidden" name="" id="cekBarang">
	<div class="row">
		<div class="col-md-5">
			<div class="card">
			   <div class="card-body">
			   	  <table class="table table-bordered table-striped">
			   	  	<tr>
			   	  		<th>No Faktur</th>
			   	  		<th><?php echo $penjualan['no_faktur']; ?></th>
			   	  	</tr>
			   	  	<tr>
			   	  		<th>Tgl Transaksi</th>
			   	  		<th><?php echo $penjualan['tgltransaksi']; ?></th>
			   	  	</tr>
			   	  	<tr>
			   	  		<th>Kode Pelanggan</th>
			   	  		<th><?php echo $penjualan['kode_pelanggan']; ?></th>
			   	  	</tr>
			   	  	<tr>
			   	  		<th>Nama Pelanggan</th>
			   	  		<th><?php echo $penjualan['nama_pelanggan']; ?></th>
			   	  	</tr>
			   	  	<tr>
			   	  		<th>Jenis Transaksi</th>
			   	  		<th><?php echo $penjualan['jenistransaksi']; ?></th>
			   	  	</tr>
			   	  	<?php if($penjualan['jenistransaksi'] == 'kredit'): ?>
				   	  	<tr>
				   	  		<th>Jatuh Tempo</th>
				   	  		<th><?php echo $penjualan['jatuhtempo']; ?></th>
				   	  	</tr>
			   	    <?php endif; ?>
			   	  </table>
			   </div>			
			</div>
		</div>

		<div class="col-md-7 col-sm-7">
			<div class="card card-xs">
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
						<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
								    <th>NO</th>
									<th>KODE BARANG</th>
									<th>NAMA BARANG</th>
									<th>HARGA</th>
									<th>QTY</th>
									<th>TOTAL</th>
								</tr>
							</thead>
							<tbody>
								<?php 

								   $no = 1;

								   $grandtotal = 0;

								   foreach($detail as $d) : 

								   $totalharga = $d->harga * $d->qty;	
								   $grandtotal += $totalharga;
								?>
  									<tr>
  										<td><?php echo $no; ?></td>
  										<td><?php echo $d->kode_barang; ?></td>
  										<td><?php echo $d->nama_barang; ?></td>
  										<td align="right"><?php echo number_format($d->harga,'0','','.'); ?></td>
  										<td><?php echo $d->qty; ?></td>
  										<td align="right"><?php echo number_format($totalharga,'0','','.'); ?></td>
  									</tr>
							    <?php 

							       $no++;

							       endforeach; 

							    ?>		
							</tbody>
							<tfoot>
								<tr>
									<th colspan="5">Grandtotal</th>
									<th style="text-align: right;" id="grandtotal"><?php echo number_format($grandtotal,'0','','.');?></th>
								</tr>
							</tfoot>
						</table>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="row mt-3">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Histori bayar</h4>
			</div>
			<div class="card-body">
				<a href="#" class="btn btn-success mb-3" id="bayar"><i class="fa fa-money"></i>bayar</a>
				<div><?php echo $this->session->flashdata('msg') ?></div>
				<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<th>No</th>
						<th>No Bukti</th>
						<th>Tanggal Bayar</th>
						<th>Jumlah bayar</th>
						<th>Aksi</th>
					</thead>
					<tbody>
						<?php 
						    $totalbayar = 0; 
						    $no=1; 
						    foreach($bayar as $b): 

						    $totalbayar = $totalbayar + $b->bayar;	
						?>
                           <tr>
                           	 <td><?php echo $no;  ?></td>
                           	 <td><?php echo $b->nobukti;  ?></td>
                           	 <td><?php echo $b->tglbayar; ?></td>
                           	 <td><?php echo number_format($b->bayar,'0','','.'); ?></td>
                           	 <td>
                           	 	<a href="#" data-href="<?php echo base_url(); ?>penjualan/hapusbayar/<?php echo $b->nobukti; ?>/<?php echo $penjualan['no_faktur']; ?>" 
                           	 		class="btn btn-danger hapus"><i class="fa fa-trash-o"></i>delete</a>
                           	 </td>
                           </tr>
						<?php $no++; endforeach; ?>	
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>

	 <div class="modal modal-blur fade" id="modalbayar" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Input bayar</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadforminputbayar"></div>
          </div>
        </div>
      </div>
    </div>

     <!-- modal delete -->
    <div class="modal modal-blur fade" id="modalhapusbayar" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		  <div class="modal-content">
		    <div class="modal-body">
		      <div class="modal-title">Anda yakin hapus data ini?</div>
		      <div>jika dihapus maka anda akan kehilangan data ini.</div>
		    </div>
		    <div class="modal-footer">
		      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
		      <a href="#" class="btn btn-danger" id="hapusbayar">Yes, delete</a>
		    </div>
		  </div>
		</div>
	</div>

	<script>
		$(function(){
			let grandtotal = $('#grandtotal').text();

			 $(".hapus").click(function(){
			   let href = $(this).attr("data-href");	
			   $("#modalhapusbayar").modal("show");
			   $("#hapusbayar").attr("href", href);
			});
			
			$('#totalpenjualan').text(grandtotal);

			$('#bayar').click(function(){
				let no_faktur = "<?php echo $penjualan['no_faktur']; ?>";
				let grandtotal = "<?php echo $grandtotal; ?>";
				let totalbayar = "<?php echo $totalbayar; ?>";

				$('#modalbayar').modal('show');

				$.ajax({
					type : 'POST',
					url : '<?php echo base_url(); ?>penjualan/inputbayar',
					data :{
						no_faktur  : no_faktur,
						grandtotal : grandtotal,
						totalbayar : totalbayar
					},
					cache : false,
					success:function(respond){
						$('#loadforminputbayar').html(respond);
					}
				});
			});
		});
	</script>
