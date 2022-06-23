<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com">

  <title>Info-C19 | Penanggulangan</title>

  <link rel="stylesheet" href="<?php echo base_url().'assets/frontend/vendor/animate/animate.css' ?>">

  <link rel="stylesheet" href="<?php echo base_url().'assets/frontend/css/bootstrap.css' ?>">

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
                                <li class="breadcrumb-item active">Penanggulangan</li>
                            </ul>
                        </nav>
                        <h1 class="text-center">Penanggulangan</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="page-section">
            <div class="container">
                <div class="row">

                    <?php
                    foreach ($data->result_array() as $d):
                        $id = $d['id_penanggulangan'];
                        $id_user = $d['id_user'];
                        $nama = $d['nama'];
                        $deskripsi = substr($d['deskripsi'], 0, 60);
                        $keterangan = $d['keterangan'];
                        $jenis = $d['jenis'];
                        $tanggal = $d['tanggal'];
                    ?>
                    <div class="col-md-6 col-lg-4 py-3">
                        <div class="card-blog">
                            <div class="header">
                                <div class="avatar">
                                    <img src="<?php echo base_url().'assets/images/user.png' ?>" alt="">
                                </div>
                                <div class="entry-footer">
                                    <div class="post-author"><?php echo $nama; ?></div>
                                    <a href="#" class="post-date"><?php echo $tanggal; ?></a>
                                </div>
                            </div>
                            <div class="body">
                                <div class="post-title"><a href="blog-single.html"><?php echo $keterangan; ?></a></div>
                                    <div class="post-excerpt"><?php echo $deskripsi; ?></div>
                             </div>
                            <div class="footer">
                                <a href="<?php echo base_url().'penanggulangan/detail/'.$id; ?>">Lihat Selengkapnya <span class="mai-chevron-forward text-sm"></span></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>

                    <div class="col-12 mt-5">
                        <?php echo $pagination; ?>
                    </div>

                </div>
        
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php $this->load->view('frontend/footer'); ?>
    <!-- .Footer -->


  <script src="<?php echo base_url().'assets/frontend/js/jquery-3.5.1.min.js' ?>"></script>

  <script src="<?php echo base_url().'assets/frontend/js/bootstrap.bundle.min.js' ?>"></script>

  <script src="<?php echo base_url().'assets/frontend/vendor/wow/wow.min.js' ?>"></script>

  <script src="<?php echo base_url().'assets/frontend/vendor/owl-carousel/js/owl.carousel.min.js' ?>"></script>

  <script src="<?php echo base_url().'assets/frontend/vendor/waypoints/jquery.waypoints.min.js' ?>"></script>

  <script src="<?php echo base_url().'assets/frontend/vendor/animateNumber/jquery.animateNumber.min.js' ?>"></script>

  <script src="<?php echo base_url().'assets/frontend/js/google-maps.js' ?>"></script>

  <script src="<?php echo base_url().'assets/frontend/js/theme.js' ?>"></script>

</body>
</html>