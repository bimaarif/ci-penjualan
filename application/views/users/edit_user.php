<form action="<?php echo base_url(); ?>user/updateuser" class="formUser" method="post">
	 <div class="form-group mb-3">
         <label class="form-label">ID USER</label>
         <input type="text" value="<?= $users['id_user']; ?>" class="form-control" name="id_user" placeholder="ID USER" readonly>
     </div>
     <div class="form-group mb-3">
         <label class="form-label">Nama Lengkap</label>
         <input type="text" value="<?= $users['nama_lengkap']; ?>" class="form-control" name="nama_lengkap" placeholder="nama lengkap">
     </div>
     <div class="form-group mb-3">
         <label class="form-label">No hp</label>
         <input type="text" value="<?= $users['no_hp']; ?>" class="form-control" name="no_hp" placeholder="no hp">
     </div>
     <div class="form-group mb-3">
         <label class="form-label">Username</label>
         <input type="text" value="<?= $users['username']; ?>" class="form-control" name="username" placeholder="username">
     </div>
     <div class="form-group mb-3">
         <label class="form-label">Password</label>
         <input type="text" value="<?= $users['password']; ?>" class="form-control" name="password" placeholder="password">
     </div>
     <div class="form-group mb-3">
         <label class="form-label">level</label>
         <select name="level" class="form-select">
         	<option value="">-pilih hak akses-</option>
         	<?php foreach ($useredit as $user) { ?>
                  <option <?php if($users['level'] == $user->level){echo "selected";} ?> value="<?php echo $user->level ?>"><?php echo $user->level; ?></option>
         	<?php } ?>	
         </select>
     </div>
     <div class="form-group mb-3">
         <label class="form-label">cabang</label>
         <select name="kode_cabang" class="form-select">
         	<option value="">pilih-cabang</option>
         	<?php foreach ($cabang as $c): ?>
                <option <?php if($users['kode_cabang'] == $c->kode_cabang){echo "selected";} ?> value="<?php echo $c->kode_cabang ?>"><?php echo $c->nama_cabang; ?></option>
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
		$('.formUser').bootstrapValidator({
	      fields: {
	        id_user: {
	          message: 'id user tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'id user harus di isi!'
	            }
	          }
	        },
	        nama_lengkap: {
	          message: 'nama tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'nama harus di isi!'
	            }
	          }
	        },
	        no_hp: {
	          message: 'no hp tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'no hp harus di isi!'
	            }
	          }
	        },
	        username: {
	          message: 'username tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'username harus di isi!'
	            }
	          }
	        },
	        password: {
	          message: 'password tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'password harus di isi!'
	            }
	          }
	        },
	        level: {
	          message: 'level tidak valid !',
	          validators: {
	            notEmpty: {
	              message: 'level harus di isi!'
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
	        }
	    }
	  });
	})
</script>