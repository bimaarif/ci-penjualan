<form action="<?php echo base_url(); ?>Barang/updateharga" class="formHarga" method="post">
	 <div class="form-group mb-3">
         <label class="form-label">Kode harga</label>
         <input type="text" value="<?= $harga['kode_harga']; ?>" class="form-control" name="kodeharga" id="kodeharga" placeholder="kode harga" readonly>
     </div>

     <div class="form-group mb-3">
         <label class="form-label">Barang</label>
         <select name="kodebarang" id="kodebarang" class="form-select" disabled="true">
         	<option value="">pilih-Barang</option>
         	<?php foreach($barang as $b) : ?>
         		<option <?php if($harga['kode_barang'] == $b->kode_barang){echo "selected";} ?> value="<?php echo $b->kode_barang; ?>"><?php echo $b->kode_barang." ".$b->nama_barang; ?></option>
            <?php endforeach; ?>
         </select>
     </div>

     <div class="form-group mb-3">
         <label class="form-label">harga</label>
         <input type="text" value="<?= $harga['harga'] ?>" class="form-control" name="harga" id="harga" placeholder="kode harga">
     </div>

     <div class="form-group mb-3">
         <label class="form-label">stok</label>
         <input type="text" value="<?= $harga['stok']; ?>" class="form-control" name="stok" id="stok" placeholder="stok">
     </div>

     <div class="form-group mb-3">
         <label class="form-label">Cabang</label>
         <select name="cabang" id="cabang" class="form-select" disabled="true">
         	<option value="">pilih-cabang</option>
         	<?php foreach($cabang as $c) : ?>
         		<option <?php if($harga['kode_cabang'] == $c->kode_cabang){echo "selected";} ?> value="<?php echo $c->kode_cabang; ?>"><?php echo $c->kode_cabang." ".$c->nama_cabang; ?></option>
            <?php endforeach; ?>
         </select>
     </div>

     <div class="mb-3">
     	<button type="submit" class="btn btn-primary w-100">
     	  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg>	
     	  simpan
     	</button>
     </div>
</form>

<script>
	$(function(){
		$('.formHarga').bootstrapValidator({
	      fields: {
	        kodeharga: {
	          message: 'kode harga tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'kode harga harus di isi!'
	            }
	          }
	        },
	        kodebarang: {
	          message: 'nama barang tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'nama barang harus di isi!'
	            }
	          }
	        },
	        harga: {
	          message: 'harga tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'harga harus di isi!'
	            }
	          }
	        },
	        stok: {
	          message: 'stok tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'stok harus di isi!'
	            }
	          }
	        },
	        cabang: {
	          message: 'cabang tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'cabang harus di isi!'
	            }
	          }
	        },
	    }
	  });

	  function loadkodeharga(){
    	let kodebarang = $('#kodebarang').val();
    	let kodecabang = $('#cabang').val();
        let kodeharga  = kodebarang + kodecabang;
        
        $('#kodeharga').val(kodeharga);
      }

      $('#kodebarang').change(function(){
         loadkodeharga();
      });

      $('#cabang').change(function(){
         loadkodeharga();
      });

	});
    
    

</script>