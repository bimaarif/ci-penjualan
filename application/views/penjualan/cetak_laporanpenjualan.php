<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width:device, initial-scale=1.0">
	<title>Laporan penjualan</title>
	<style>
		body{
			font-family: Tahoma;
		}

		table, th, td{
			border-collapse: collapse;
			border:2px solid black;
		}

		table, th, td {
			padding: 5px;
		}

		th {
			font-size: 14px;
			background-color: #2972ba;
			color : white;
		}
	</style>
</head>
<body onload="window.print()";>
    <h4>
       LAPORAN PENJUALAN <br>
       <?php if(empty($cabang)):?>
         <?php echo "semua cabang"; ?>
       <?php else : ?>
         <?php echo "cabang ".$cabang; ?>
       <?php endif; ?>
       <br>
       PERIODE <?php echo $dari; ?> s/d <?php echo $sampai; ?>  	
   </h4>
   <br>
   <table>
   	  <tr>
   	  	<th>NO</th>
   	  	<th>NO FAKTUR</th>
   	  	<th>TGL TRANSAKSI</th>
   	  	<th>KODE PELANGGAN</th>
   	  	<th>NAMA PELANGGAN</th>
   	  	<th>JENIS TRANSAKSI</th>
   	  	<th>JATUH TEMPO</th>
   	  	<th>TOTAL PENJUALAN</th>
   	  	<th>TOTAL BAYAR</th>
   	  	<th>SISA BAYAR</th>
   	  	<th>KETERANGAN</th>
   	  	<th>kasir</th>
   	  </tr>
   	  <?php 
   	      $totalpenjualan = 0;
   	      $totalbayar = 0;
   	      $totalsisabayar = 0;
   	      $no = 1; 
   	      foreach ($laporanpn as $d) { 

   	      $totalpenjualan += $d->totalpenjualan;
   	      $totalbayar += $d->totalbayar;	
          $sisabayar = $d->totalpenjualan - $d->totalbayar;

          $totalsisabayar += $sisabayar;

          if ($sisabayar != 0) {
          	 $keterangan = "belum lunas";
          	 $colorbg = "#ba2b4f";
          	 $colortext ="white";
          }else{
          	 $keterangan = "lunas";
          	 $colorbg = "";
          	 $colortext ="";
          }
   	  	?>
   	  	<tr style="background-color:<?php echo $colorbg; ?>; color: <?php echo $colortext; ?>">
   	  		<td><?= $no; ?></td>
   	  		<td><?= $d->no_faktur; ?></td>
   	  		<td><?= $d->tgltransaksi; ?></td>
   	  		<td><?= $d->kode_pelanggan; ?></td>
   	  		<td><?= $d->nama_pelanggan; ?></td>
   	  		<td><?= $d->jenistransaksi; ?></td>
   	  		<td><?= $d->jatuhtempo; ?></td>
   	  		<td><?= $d->totalpenjualan; ?></td>
   	  		<td><?= $d->totalbayar; ?></td>
   	  		<td><?= $sisabayar; ?></td>
   	  		<td><?= $keterangan; ?></td>
   	  		<td><?= $d->nama_lengkap; ?></td>
   	  	</tr>
   	  <?php 
   	      $no++; 
   	  } ?>
   	  <tr>
   	  	<th colspan="8">TOTAL</th>
   	  	<th><?= $totalpenjualan; ?></th>
   	  	<th><?= $totalbayar; ?></th>
   	  	<th><?= $totalsisabayar; ?></th>
   	  	<th colspan="2"></th>
   	  </tr>
   </table>
</body>
</html>
