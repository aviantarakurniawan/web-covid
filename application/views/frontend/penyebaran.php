<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com">

  <title>Info-C19 | Penyebaran</title>

  <link rel="stylesheet" href="<?php echo base_url().'assets/frontend/vendor/animate/animate.css' ?>">

  <link rel="stylesheet" href="<?php echo base_url().'assets/frontend/css/bootstrap.css' ?>">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">

  <link rel="stylesheet" href="<?php echo base_url().'assets/frontend/css/maicons.css' ?>">

  <link rel="stylesheet" href="<?php echo base_url().'assets/frontend/vendor/owl-carousel/css/owl.carousel.css' ?>">

  <link rel="stylesheet" href="<?php echo base_url().'assets/frontend/css/theme.css' ?>">

</head>
<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <!-- Navbar -->
        <?php $this->load->view('frontend/navbar'); ?>

        <div class="container mt-5">
            <div class="page-banner" style="margin-top: 140px;">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-md-6">
                        <nav aria-label="Breadcrumb">
                            <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                                <li class="breadcrumb-item"><a href="<?php echo base_url().'beranda' ?>">Beranda</a></li>
                                <li class="breadcrumb-item active">Penyebaran</li>
                            </ul>
                        </nav>
                        <h1 class="text-center">Penyebaran</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 py-3">
                        <h2 class="title-section">Indeks Penyebaran <span class="marked">COVID-19</span> di Kelurahan Pancoran Mas, Kota Depok</h2>
                        <div class="divider"></div>
                        <p class="mb-5">Berikut adalah indeks penyebaran Covid-19 berdasarkan wilayah-wilayah RW yang terdapat di Kelurahan Pancoran Mas, Kota Depok.</p>
                    </div>
                    <div class="col-lg-6 py-3">
                        <div class="img-place text-center">
                            <a data-toggle="modal" href="#modalWilayah" role="button"><img src="<?php echo base_url().'assets/frontend/img/wilayah/wilayah.jpeg' ?>" style="height: 450px;" alt=""></a>
                        </div>
                    </div>
                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->
    
        <div class="page-section">
            <div class="container">
                <div class="text-center">
                    <div class="subhead">Penyebaran</div>
                    <h2 class="title-section">Indeks Penyebaran <span class="marked">Covid-19</span> berdasarkan wilayah berikut:</h2>
                    <div class="divider mx-auto"></div>
                </div>
        
                <div class="row mt-5 text-center">
                    <?php
                    foreach ($wilayah->result_array() as $w):
                        $id_wilayah=$w['id_wilayah'];
                        $rw=$w['rw'];
                        $penduduk=$w['penduduk'];
                        $suspek=$w['suspek'];
                        $dirawat=$w['dirawat'];
                        $sembuh=$w['sembuh'];
                        $meninggal=$w['meninggal'];
                        $total=$w['total'];
                        $konfirmasi=$w['konfirmasi'];
                    ?>
                    <div class="col-lg-4 py-3">

                        <?php if ($sembuh > $dirawat AND $sembuh > $meninggal): ?>
                            <div class="display-3"><span><img src="<?php echo base_url().'assets/frontend/img/wilayah/'.$rw.'/'.$rw.'-G.png' ?>" style="width: 150px; height: 150px;"></span></div>
                        <?php elseif ($dirawat > $sembuh AND $dirawat > $meninggal): ?>
                            <div class="display-3"><span><img src="<?php echo base_url().'assets/frontend/img/wilayah/'.$rw.'/'.$rw.'-Y.png' ?>" style="width: 150px; height: 150px;"></span></div>
                        <?php elseif ($meninggal > $sembuh AND $meninggal > $dirawat): ?>
                            <div class="display-3"><span><img src="<?php echo base_url().'assets/frontend/img/wilayah/'.$rw.'/'.$rw.'-R.png' ?>" style="width: 150px; height: 150px;"></span></div>
                        <?php endif;?>

                        <h5>RW. <?php echo $rw;?></h5>
                        <p><a style="color: white;" data-toggle="modal" data-target="#modalLihat<?php echo $id_wilayah;?>" class="btn btn-primary btn-sm">Lihat</a></p>
                    </div>
                    <?php endforeach;?>
                </div>
            </div> <!-- .container -->
        </div> <!-- .page-section -->
    </main>

    <!-- Footer -->
    <?php $this->load->view('frontend/footer'); ?>
    <!-- .Footer -->

    <!-- Modal -->
    <?php
    foreach ($penyebaran->result_array() as $p):
        $id_penyebaran=$p['id_penyebaran'];
        $id_wilayah=$p['id_wilayah'];
        $rw=$p['rw'];
        $penduduk=$p['penduduk'];
        $suspek=$p['suspek'];
        $dirawat=$p['dirawat'];
        $sembuh=$p['sembuh'];
        $meninggal=$p['meninggal'];
        $total=$p['total'];
        $konfirmasi=$p['konfirmasi'];
    ?>
    <div id="modalLihat<?php echo $id_wilayah;?>" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" style="font-size: medium; font-weight: bold;">Indeks Penyebaran Covid-19 RW. <?php echo $rw;?></h3>
                </div>
                <div class="modal-body">
                <div class="row">

                    <?php if ($sembuh > $dirawat AND $sembuh > $meninggal): ?>
                        <div class="col-md-4">
                            <img src="<?php echo base_url().'assets/frontend/img/wilayah/'.$rw.'/'.$rw.'-G.png' ?>">
                        </div>
                    <?php elseif ($dirawat > $sembuh AND $dirawat > $meninggal): ?>
                        <div class="col-md-4">
                            <img src="<?php echo base_url().'assets/frontend/img/wilayah/'.$rw.'/'.$rw.'-Y.png' ?>">
                        </div>
                    <?php elseif ($meninggal > $sembuh AND $meninggal > $dirawat): ?>
                        <div class="col-md-4">
                            <img src="<?php echo base_url().'assets/frontend/img/wilayah/'.$rw.'/'.$rw.'-R.png' ?>">
                        </div>
                    <?php endif;?>

                    <div class="col-md-8">
                        <div class="chart-container">
                            <canvas id="myChart<?php echo $id_wilayah;?>"></canvas>
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modalWilayah" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" style="font-size: medium; font-weight: bold;">Peta Wilayah</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        </div>
          <div class="modal-body">
            <img src="<?php echo base_url().'assets/frontend/img/wilayah/wilayah.jpeg' ?>" style="height: 1100px;" alt="">
          </div>
      </div>
    </div>
  </div>


    <script src="<?php echo base_url().'assets/frontend/js/jquery-3.5.1.min.js' ?>"></script>

    <script src="<?php echo base_url().'assets/frontend/js/bootstrap.bundle.min.js' ?>"></script>

    <script src="<?php echo base_url().'assets/frontend/vendor/wow/wow.min.js' ?>"></script>

    <script src="<?php echo base_url().'assets/frontend/vendor/owl-carousel/js/owl.carousel.min.js' ?>"></script>

    <script src="<?php echo base_url().'assets/frontend/vendor/waypoints/jquery.waypoints.min.js' ?>"></script>

    <script src="<?php echo base_url().'assets/frontend/vendor/animateNumber/jquery.animateNumber.min.js' ?>"></script>

    <script src="<?php echo base_url().'assets/frontend/js/google-maps.js' ?>"></script>

    <script src="<?php echo base_url().'assets/frontend/js/theme.js' ?>"></script>

    <script src="<?php echo base_url().'assets/frontend/chart/dist/chart.js' ?>"></script>

    <script>
		var ctx = document.getElementById("myChart<?php echo $id_wilayah;?>").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["Suspek", "Sembuh", "Dirawat", "Meninggal"],
				datasets: [{
					label: 'Penyebaran COVID-19',
					data: [
                        <?php echo $suspek;?>,
                        <?php echo $sembuh;?>,
                        <?php echo $dirawat;?>,
                        <?php echo $meninggal;?>
                    ],
					backgroundColor: [
                        'rgb(72, 212, 217)',
                        'rgb(18, 133, 5)',
                        'rgb(255, 192, 84)',
                        'rgb(186, 6, 6)'
					],
					hoverOffset: 4
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
    <?php endforeach;?>

</body>
</html>