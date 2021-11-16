<h2 class="page-title">
    Dashboard
</h2>
<div class="alert alert-success alert-dismissible" role="alert">
  <svg xmlns="http://www.w3.org/2000/svg" class="icon mr-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>	
  Selamat Datang <b><?php echo ucwords($this->session->userdata('nama_lengkap')); ?></b> sebagai <b><?php echo ucwords($this->session->userdata('level')); ?></b>
</div>

<div class="row">
	<div class="col-md-6 col-xl-3">
        <div class="card card-sm">
            <div class="card-body d-flex align-items-center">
                  <span class="bg-red text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                  </span>
                  <div class="mr-3">
                    <div class="font-weight-medium">
                      <?php echo $jmlpelanggan; ?> pelanggan
                    </div>
                    <div class="text-muted">Data pelanggan</div>
                  </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
              <div class="card card-sm">
                <div class="card-body d-flex align-items-center">
                  <span class="bg-blue text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                  </span>
                  <div class="mr-3">
                    <div class="font-weight-medium">
                      <?php echo $jmltransaksi; ?> Transaksi
                    </div>
                    <div class="text-muted">Transaksi hari ini</div>
                  </div>
                </div>
              </div>
    </div>
    <div class="col-md-6 col-xl-3">
              <div class="card card-sm">
                <div class="card-body d-flex align-items-center">
                  <span class="bg-green text-white avatar mr-3">
                  	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="3" y1="21" x2="21" y2="21" /><line x1="3" y1="10" x2="21" y2="10" /><polyline points="5 6 12 3 19 6" /><line x1="4" y1="10" x2="4" y2="21" /><line x1="20" y1="10" x2="20" y2="21" /><line x1="8" y1="14" x2="8" y2="17" /><line x1="12" y1="14" x2="12" y2="17" /><line x1="16" y1="14" x2="16" y2="17" /></svg>
                  </span>
                  <div class="mr-3">
                    <div class="font-weight-medium">
                      <?php echo $jmlcabang; ?> cabang
                    </div>
                    <div class="text-muted">Data cabang</div>
                  </div>
                </div>
              </div>
    </div>

    <div class="col-md-6 col-xl-3">
              <div class="card card-sm">
                <div class="card-body d-flex align-items-center">
                  <span class="bg-orange text-white avatar mr-3">
                  	<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                  </span>
                  <div class="mr-3">
                    <div class="font-weight-medium">
                      <?php
                          if ($jmlbayar['totalbayar'] == "") {
                             echo $jmlbayar = 0;
                          }else{
                             echo $jmlbayar['totalbayar'];
                          }  
                      ?>
                    </div>
                    <div class="text-muted">Pendapatan hari ini</div>
                  </div>
                </div>
              </div>
    </div>
</div>
<div class="row mt-3">
   <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Grafik penjualan</h3>
            </div>
            <div class="card-body">
               <?php 

                  foreach ($rekappenjualan as $d) {
                     $bulan[] = $d->namabulan;
                     $totalpenjualan[] = $d->totalpenjualan; 
                  }

                ?>
               <div id="chart-tasks-overview"></div>
            </div>
        </div>
    </div>
</div>

<script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-tasks-overview'), {
          chart: {
            type: "bar",
            fontFamily: 'inherit',
            height: 320,
            parentHeightOffset: 0,
            toolbar: {
              show: false,
            },
            animations: {
              enabled: false
            },
          },
          plotOptions: {
            bar: {
              columnWidth: '50%',
            }
          },
          dataLabels: {
            enabled: false,
          },
          fill: {
            opacity: 1,
          },
          series: [{
            name: "A",
            data: <?php echo json_encode($totalpenjualan); ?>
          }],
          grid: {
            padding: {
              top: -20,
              right: 0,
              left: -4,
              bottom: -4
            },
            strokeDashArray: 4,
          },
          xaxis: {
            labels: {
              padding: 0
            },
            tooltip: {
              enabled: false
            },
            axisBorder: {
              show: false,
            },
            categories: <?php echo json_encode($bulan); ?>,
          },
          yaxis: {
            labels: {
              padding: 4
            },
          },
          colors: ["#206bc4"],
          legend: {
            show: false,
          },
        })).render();
      });
      // @formatter:on
    </script>