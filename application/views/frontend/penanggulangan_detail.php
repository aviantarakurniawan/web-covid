<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com">

  <title>Info-C19 | Artikel</title>

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
    <!-- .Navbar -->
  </header>

  <main>
    <div class="page-section pt-5" style="margin-top: 75px;">
        <?php
        $no=0;
        foreach ($detail->result_array() as $d):
            $id = $d['id_penanggulangan'];
            $id_user = $d['id_user'];
            $nama = $d['nama'];
            $deskripsi = $d['deskripsi'];
            $keterangan = $d['keterangan'];
            $jenis = $d['jenis'];
            $tanggal = $d['tanggal'];
        ?>
        <div class="container">
            <nav aria-label="Breadcrumb">
            <ul class="breadcrumb p-0 mb-0 bg-transparent">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'beranda' ?>">Beranda</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url().'penanggulangan' ?>">Penanggulangan</a></li>
                <li class="breadcrumb-item active"><?php echo $keterangan;?></li>
            </ul>
            </nav>
            
            <div class="row">
                <div class="col-lg-8">

                    <div class="blog-single-wrap">
                        <div class="header">
                            <div class="post-thumb">
                                <img src="<?php echo base_url().'assets/frontend/img/blog/img-1.jpg' ?>" alt="">
                            </div>
                            <div class="meta-header">
                                <div class="post-author">
                                    <div class="avatar">
                                    <img src="<?php echo base_url().'assets/images/user.png' ?>" alt="">
                                    </div>
                                    oleh <a href="#"><?php echo $nama;?></a>
                                </div>
                            </div>
                        </div>
                        <h1 class="post-title"><?php echo $keterangan;?></h1>
                        <div class="post-meta">
                            <div class="post-date">
                                <span class="icon">
                                    <span class="mai-time-outline"></span>
                                </span> <a href="#"><?php echo $tanggal;?></a>
                            </div>
                        </div>
                        <div class="post-content">
                            <p><?php echo $deskripsi;?></p>
                        </div>
                    </div>
        
                </div>

                <div class="col-lg-4">
                    <div class="widget">
        
                        <!-- Widget recent post -->
                        <div class="widget-box">
                            <h4 class="widget-title">Informasi Terbaru</h4>
                            <div class="divider"></div>
            
                            <?php
                            $no=0;
                            foreach ($penanggulangan->result_array() as $p):
                                $id = $p['id_penanggulangan'];
                                $id_user = $p['id_user'];
                                $nama = $p['nama'];
                                $deskripsi = substr($p['deskripsi'], 0, 60);
                                $keterangan = $p['keterangan'];
                                $jenis = $p['jenis'];
                                $tanggal = substr($p['tanggal'], 0, 11);
                            ?>
                            <div class="blog-item">
                                <a class="post-thumb" href="">
                                <img src="<?php echo base_url().'assets/frontend/img/blog/images.png' ?>" alt="">
                                </a>
                                <div class="content">
                                <h6 class="post-title"><a href="<?php echo base_url().'penanggulangan/detail/'.$id; ?>"><?php echo $keterangan;?></a></h6>
                                <div class="meta">
                                    <a href="#"><span class="mai-calendar"></span> <?php echo $tanggal;?></a>
                                    <a href="#"><span class="mai-person"></span> <?php echo $nama;?></a>
                                </div>
                                </div>
                            </div>
                            <?php endforeach;?>
            
                        </div>
        
                    </div>
                </div>
            </div>
    
        </div>
        <?php endforeach;?>
    </div>
  </main>

    <!-- Footer -->
    <?php $this->load->view('frontend/footer'); ?>
    <!-- ./Footer -->


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