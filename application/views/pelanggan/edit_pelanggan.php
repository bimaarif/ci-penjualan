<form action="<?php echo base_url(); ?>Pelanggan/updatepelanggan" class="formPelanggan" method="post">
	 <div class="form-group mb-3">
         <label class="form-label">Kode pelanggan</label>
         <input type="text" value="<?= $pelanggan['kode_pelanggan'] ?>" readonly class="form-control" name="kodepelanggan" placeholder="kode pelanggan">
     </div>
     <div class="form-group mb-3">
         <label class="form-label">Nama pelanggan</label>
         <input type="text" value="<?= $pelanggan['nama_pelanggan'] ?>" class="form-control" name="namapelanggan" placeholder="nama pelanggan">
     </div>
     <div class="form-group mb-3">
         <label class="form-label">Alamat</label>
         <input type="text" class="form-control" value="<?= $pelanggan['alamat_pelanggan'] ?>" name="alamatpelanggan" placeholder="alamat pelanggan">
     </div>
     <div class="form-group mb-3">
         <label class="form-label">No hp</label>
         <input type="text" class="form-control" value="<?= $pelanggan['no_hp'] ?>" name="nohp" placeholder="no hp">
     </div>
     <div class="form-group mb-3">
         <label class="form-label">Satuan</label>
         <select name="cabang" class="form-select">
         	<option value="">pilih-cabang</option>
         	<?php foreach ($cabang as $c): ?>
                <option <?php if($pelanggan['kode_cabang'] == $c->kode_cabang){echo "selected";} ?> value="<?php echo $c->kode_cabang ?>"><?php echo $c->nama_cabang; ?></option>
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
		$('.formPelanggan').bootstrapValidator({
	      fields: {
	        kodepelanggan: {
	          message: 'kode pelanggan tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'kode pelanggan harus di isi!'
	            }
	          }
	        },
	        namapelanggan: {
	          message: 'nama pelanggan tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'nama pelanggan harus di isi!'
	            }
	          }
	        },
	        alamat: {
	          message: 'alamat tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'alamat harus di isi!'
	            }
	          }
	        },
	        nohp: {
	          message: 'no hp tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'no hp harus di isi!'
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
	})
</script>