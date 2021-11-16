<h2 class="page-title">
    Data cabang
</h2>
<div class="row mt-3">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<a href="#" class="btn btn-primary mb-3" id="tambahcabang">
				  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>	
				  Tambah data
				</a>
				<div class="mb-3"><?php echo $this->session->flashdata('msg'); ?></div>
				<div class="table-responsive">
				<table class="table table-striped table-bordered" id="tabelcabang">
					<thead>
						<tr class="text-center">
							<th>NO</th>
							<th>KODE CABANG</th>
							<th>NAMA CABANG</th>
							<th>ALAMAT</th>
							<th>NO HP</th>
							<th>aksi</th>	
						</tr>
					</thead>
					<tbody>
                     <?php 
					  $no = 1;
					  foreach ($cabang as $c) { ?>
						<tr class="text-center">
						   <td><?php echo $no; ?></td>
						   <td><?php echo $c->kode_cabang; ?></td>
						   <td><?php echo $c->nama_cabang; ?></td>
						   <td><?php echo $c->alamat_cabang; ?></td>
						   <td><?php echo $c->telepon; ?></td>
						   <td>
						   	  <a href="#" data-kodecabang="<?php echo $c->kode_cabang; ?>" class="btn btn-sm btn-primary text-center edit">
						   	  	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" /><line x1="13.5" y1="6.5" x2="17.5" y2="10.5" /></svg>
						   	    edit
						   	  </a>
						   	  <a href="#" data-href="<?php echo base_url() ?>cabang/hapuscabang/<?php echo $c->kode_cabang; ?>" class="btn btn-sm btn-danger text-center hapus" >
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

    <div class="modal modal-blur fade" id="modalcabang" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Input cabang</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadforminputcabang"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal modal-blur fade" id="modaleditcabang" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit cabang</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadformeditcabang"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal modal-blur fade" id="modalhapuscabang" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		  <div class="modal-content">
		    <div class="modal-body">
		      <div class="modal-title">Anda yakin hapus data ini?</div>
		      <div>jika dihapus maka anda akan kehilangan data ini.</div>
		    </div>
		    <div class="modal-footer">
		      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
		      <a href="#" class="btn btn-danger" id="hapuscabang">Yes, delete</a>
		    </div>
		  </div>
		</div>
	</div>

<script>
	$(function() {
		$("#tambahcabang").click(function(){
           $("#modalcabang").modal("show");
           $("#loadforminputcabang").load("<?php echo base_url(); ?>cabang/inputcabang");
		});

		$(".edit").click(function(){
		   let kodecabang = $(this).attr("data-kodecabang");	
		   $("#modaleditcabang").modal("show");
           $("#loadformeditcabang").load("<?php echo base_url(); ?>cabang/editcabang/" + kodecabang);
		});

		$(".hapus").click(function(){
		   let href = $(this).attr("data-href");	
		   $("#modalhapuscabang").modal("show");
		   $("#hapuscabang").attr("href", href);
		});

		// $('#tabelcabang').DataTable();

		var table = $('#tabelcabang').DataTable({
			rowReorder: {
              selector: 'td:nth-child(2)'
	        },
	        responsive: true
		});
	});
</script>