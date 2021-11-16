<form method="POST" action="<?php echo base_url(); ?>penjualan/simpanbayar" id="formBayar">
	<input type="hidden" value="<?php echo $no_faktur; ?>" name="no_faktur">
	<input type="hidden" value="<?php echo $grandtotal; ?>" name="totalpenj" id="totalpenj">
	<input type="hidden" value="<?php echo $totalbayar; ?>" name="totalbayar" id="totalbayar">
	<div class="input-icon mb-3">
        <span class="input-icon-addon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
        </span>
        <input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="tglbayar" id="tglbayar" placeholder="tanggal bayar">
    </div>
    <div class="input-icon mb-3">
        <span class="input-icon-addon">
           <i class="fa fa-money"></i>
        </span>
        <input type="text" style="text-align: right;" class="form-control" name="jmlbayar" id="jmlbayar" placeholder="jumlah bayar">
    </div>
    <div class="mb-3">
    	<button type="submit" class="btn btn-primary w-100">
    	  <i class="fa fa-send mr-2"></i>	
    	  bayar
    	</button>
    </div>
</form>

<script>
  	flatpickr(document.getElementById('tglbayar'), {
  	});
</script>
<script>
	$(function(){
        $('#formBayar').submit(function(){
        	let jmlbayar   = $('#jmlbayar').val();
        	let totalpenj = $('#totalpenj').val();
        	let totalbayar = $('#totalbayar').val();
        	let sisabayar  = parseInt(totalpenj) - parseInt(totalbayar); 

        	if (jmlbayar == "" || jmlbayar == 0) {
        		swal('Ooops','jumlah bayar tidak boleh kosong','warning');
        		return false;
        	}else if(parseInt(jmlbayar) > parseInt(sisabayar)){
        		swal('Ooops','jumlah bayar tidak boleh melebihi sisa bayar, sisa bayar anda adalah ' + sisabayar,'warning');
        		return false;
        	}else{
        		return true;
        	}
        })
	});
</script>