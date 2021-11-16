<h2 class="page-title">
    Data users
</h2>
<div class="row mt-3">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<a href="#" class="btn btn-primary mb-3" id="tambahuser">
				  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>	
				  Tambah data
				</a>
				<div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
				<div class="table-responsive">
				<table class="table table-striped table-bordered" id="tabeluser">
					<thead>
						<tr class="text-center">
							<th>NO</th>
							<th>ID USER</th>
							<th>NAMA LENGKAP</th>
							<th>NO HP</th>
							<th>USERNAME</th>
							<th>PASSWORD</th>
							<th>LEVEL</th>
							<th>KODE CABANG</th>
							<th>AKSI</th>	
						</tr>
					</thead>
					<tbody>

					<?php 
					  $no = 1;
					  foreach ($user as $u) { ?>
						<tr class="text-center">
						   <td><?php echo $no; ?></td>
						   <td><?php echo $u->id_user; ?></td>
						   <td><?php echo $u->nama_lengkap; ?></td>
						   <td><?php echo $u->no_hp; ?></td>
						   <td><?php echo $u->username; ?></td>
						   <td><?php echo $u->password; ?></td>
						   <td><?php echo $u->level; ?></td>
						   <td><?php echo $u->kode_cabang ?></td>
						   <td>
						   	  <a href="#" data-iduser="<?php echo $u->id_user; ?>" class="btn btn-sm btn-primary text-center edit">
						   	  	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" /><line x1="13.5" y1="6.5" x2="17.5" y2="10.5" /></svg>
						   	    edit
						   	  </a>
						   	  <a href="#" data-href="<?php echo base_url() ?>user/hapususer/<?php echo $u->id_user; ?>" class="btn btn-sm btn-danger text-center hapus" >
						   	  	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
						   	    hapus
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
</div>


   <!--modal form input -->
    <div class="modal modal-blur fade" id="modaluser" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Input user</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadforminputuser"></div>
          </div>
        </div>
      </div>
    </div>
   
   <!-- modal form edit barang -->
    <div class="modal modal-blur fade" id="modaledituser" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit user</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadformedituser"></div>
          </div>
        </div>
      </div>
    </div>

   <!-- modal delete -->
    <div class="modal modal-blur fade" id="modalhapususer" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		  <div class="modal-content">
		    <div class="modal-body">
		      <div class="modal-title">Anda yakin hapus data ini?</div>
		      <div>jika dihapus maka anda akan kehilangan data ini.</div>
		    </div>
		    <div class="modal-footer">
		      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
		      <a href="#" class="btn btn-danger" id="hapususer">Yes, delete</a>
		    </div>
		  </div>
		</div>
	</div>

<script>
	$(function() {
		$("#tambahuser").click(function(){
           $("#modaluser").modal("show");
           $("#loadforminputuser").load("<?php echo base_url(); ?>user/inputuser");
		});

		$(".edit").click(function(){
		   let id_user = $(this).attr("data-iduser");	
		   $("#modaledituser").modal("show");
           $("#loadformedituser").load("<?php echo base_url(); ?>user/edituser/" + id_user);
		});

		$(".hapus").click(function(){
		   let href = $(this).attr("data-href");	
		   $("#modalhapususer").modal("show");
		   $("#hapususer").attr("href", href);
		});

		var table = $('#tabeluser').DataTable({
			rowReorder: {
              selector: 'td:nth-child(2)'
	        },
	        responsive: true
		});

	});
</script>