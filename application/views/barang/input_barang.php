<form action="<?php echo base_url(); ?>Barang/simpanbarang" class="formBarang" method="post">
	 <div class="form-group mb-3">
         <label class="form-label">Kode barang</label>
         <input type="text" class="form-control" name="kodebarang" placeholder="kode barang">
     </div>
     <div class="form-group mb-3">
         <label class="form-label">Nama barang</label>
         <input type="text" class="form-control" name="namabarang" placeholder="nama barang">
     </div>
     <div class="form-group mb-3">
         <label class="form-label">Satuan</label>
         <select name="satuan" class="form-select">
         	<option value="">satuan</option>
         	<option value="pcs">Pcs</option>
         	<option value="unit">Unit</option>
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
		$('.formBarang').bootstrapValidator({
	      fields: {
	        kodebarang: {
	          message: 'kode barang tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'kode barang harus di isi!'
	            }
	          }
	        },
	        namabarang: {
	          message: 'nama barang tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'nama barang harus di isi!'
	            }
	          }
	        },
	        satuan: {
	          message: 'satuan barang tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'satuan barang harus di isi!'
	            }
	          }
	        },
	    }
	  });
	})
</script>