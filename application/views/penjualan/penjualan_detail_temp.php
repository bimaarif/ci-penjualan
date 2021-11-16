<?php
   $no=1; 
   $totalpenjualan = 0;
   foreach ($barangtemp as $bt) : 

   $totalpenjualan = $totalpenjualan + $bt->total;	
 ?>

<tr>
	<td><?php echo $no; ?></td>
	<td><?php echo $bt->kode_barang; ?></td>
	<td><?php echo $bt->nama_barang; ?></td>
	<td align="right"><?php echo number_format($bt->harga,'0','','.'); ?></td>
	<td><?php echo $bt->qty; ?></td>
	<td align="right"><?php echo number_format($bt->total,'0','','.'); ?></td>
	<td>
		<a href="#" class="btn btn-danger btn-sm hapus" data-kodebarang="<?php echo $bt->kode_barang; ?>" data-iduser="<?php echo $bt->id_user; ?>">
		  hapus
		</a>
	</td>
</tr>

 	
<?php $no++; endforeach; ?>


	<tr>
	    <th colspan="5">TOTAL</th>
	    <th style="text-align: right;">
	    	<p id="grandtotal"><?php echo number_format($totalpenjualan,'0','','.'); ?></p>
	    </th>
		<th></th>
	</tr>

<script>
	$(function(){
         
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

		function loadgrandtotal()
		{
			let grandtotal = $('#grandtotal').text();

			$('#totalpenjualan').text(grandtotal);

		} 

		loadgrandtotal();


       $(".hapus").click(function(){
           let kodebarang = $(this).attr("data-kodebarang");
           let iduser = $(this).attr("data-iduser");

       	   $.ajax({
       	   	  type : 'POST',
       	   	  url  : '<?php echo base_url(); ?>penjualan/hapusBarangTemp',
       	   	  data : {
       	   	  	  kodebarang : kodebarang,
       	   	  	  iduser : iduser
       	   	  },
       	   	  cache : false,
       	   	  success : function(respond){
       	   	  	 if (respond==1) {
       	   	  	 	swal('deleted','data berhasil dihapus','success');
       	   	  	 	loaddatabarang();
       	   	  	 }
       	   	  }
       	   });
        });
	});
</script>