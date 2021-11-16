<form action="<?php echo base_url(); ?>Cabang/simpancabang" class="formCabang" method="post">
	 <div class="form-group mb-3">
         <label class="form-label">Kode cabang</label>
         <input type="text" class="form-control" name="kodecabang" placeholder="kode cabang">
     </div>
     <div class="form-group mb-3">
         <label class="form-label">Nama Cabang</label>
         <input type="text" class="form-control" name="namacabang" placeholder="nama cabang">
     </div>
     <div class="form-group mb-3">
         <label class="form-label">Alamat cabang</label>
         <input type="text" class="form-control" name="alamatcabang" placeholder="alamat cabang">
     </div>
     <div class="form-group mb-3">
         <label class="form-label">No telepon</label>
         <input type="text" class="form-control" name="telepon" placeholder="no telepon">
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
		$('.formCabang').bootstrapValidator({
	      fields: {
	        kodecabang: {
	          message: 'kode cabang tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'kode cabang harus di isi!'
	            }
	          }
	        },
	        namacabang: {
	          message: 'nama cabang tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'nama cabang harus di isi!'
	            }
	          }
	        },
	        alamatcabang: {
	          message: 'alamat tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'alamat harus di isi!'
	            }
	          }
	        },
	        telepon: {
	          message: 'no telepon tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'no telepon harus di isi!'
	            }
	          }
	        },
	    }
	  });
	})
</script>