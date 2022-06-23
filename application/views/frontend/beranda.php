<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com">

  <title>Info-C19 | Beranda</title>

  <link rel="stylesheet" href="<?= base_url().'assets/frontend/vendor/animate/animate.css' ?>">

  <link rel="stylesheet" href="<?= base_url().'assets/frontend/css/bootstrap.css' ?>">

  <link rel="stylesheet" href="<?= base_url().'assets/frontend/css/maicons.css' ?>">

  <link rel="stylesheet" href="<?= base_url().'assets/frontend/vendor/owl-carousel/css/owl.carousel.css' ?>">

  <link rel="stylesheet" href="<?= base_url().'assets/frontend/css/theme.css' ?>">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>

  <?php
    function limit_words($string, $word_limit){
      $words = explode(" ",$string);
      return implode(" ",array_splice($words,0,$word_limit));
    }
  ?>

</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <!-- Header -->
  <header>
    <!-- Navbar -->
    <?php $this->load->view('frontend/navbar'); ?>
    <!-- .Navbar -->

    <div class="page-banner home-banner" style="height: 550px; margin-top: 20px; margin-bottom: -100px;">
      <div class="container h-100">
        <div class="row align-items-center h-100">
          <div class="col-lg-9 py-3 wow fadeInUp">
            <h1 class="mb-4">Temukan informasi seputar COVID-19 secara tepat dan akurat.</h1>
            <p class="text-lg mb-5">Situs ini merupakan sumber informasi inisiatif sukarela warganet Indonesia pro-data, terdiri dari praktisi kesehatan, akademisi & profesional.</p>

            <a href="#" class="btn btn-outline border text-secondary">Info lebih lanjut</a>
          </div>

          <!-- Images for header -->
          <!-- <div class="col-lg-6 py-3 wow zoomIn">
            <div class="img-place">
              <img src="../assets/img/bg_image_1.png" alt="">
            </div>
          </div> -->
          <!-- ./Images for header -->
        </div>
      </div>
    </div>
  </header>
  <!-- .Header -->

  <main>
    <div class="page-section counter-section">
      <div class="container">
        <div class="text-center wow fadeInUp">
          <div class="subhead">DATA COVID-19</div>
          <h2 class="title-section">Jumlah Kasus di <span class="marked">Kelurahan Pancoran Mas</span> saat ini.</h2>
          <div class="divider mx-auto"></div>
        </div>

        <div class="row align-items-center text-center">
          <div class="col-lg-4">
            <h1 style="font-weight: bold; color: blue;"><span class="number" data-number="<?php echo $subtotal; ?>"></span></h1>
            <p style="font-weight: bold;">Total</p>
          </div>
          <div class="col-lg-4">
            <h1 style="font-weight: bold; color: purple;"><span class="number" data-number="<?php echo $total_konfirmasi; ?>"></span></h1>
            <p style="font-weight: bold;">Terkonfirmasi</p>
          </div>
          <div class="col-lg-4">
            <h1 style="font-weight: bold; color: aqua;"><span class="number" data-number="<?php echo $total_suspek; ?>"></span></h1>
            <p style="font-weight: bold;">Suspek</p>
          </div>
          <div class="col-lg-4">
            <h1 style="font-weight: bold; color: green;"><span class="number" data-number="<?php echo $total_sembuh; ?>"></span></h1>
            <p style="font-weight: bold;">Sembuh</p>
          </div>

          <div class="col-lg-4">
            <h1 style="font-weight: bold; color: orange;"><span class="number" data-number="<?php echo $total_dirawat; ?>"></span></h1>
            <p style="font-weight: bold;">Dalam Perawatan</p>
          </div>

          <div class="col-lg-4">
            <h1 style="font-weight: bold; color: red;"><span class="number" data-number="<?php echo $total_meninggal; ?>"></span></h1>
            <p style="font-weight: bold;">Meninggal</p>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  
    <div class="page-section bg-light">
      <div class="container">
        
        <div class="owl-carousel wow fadeInUp" id="testimonials">
          <?php
            foreach ($faq->result_array() as $f):
              $id_faq=$f['id_faq'];
              $id_user=$f['id_user'];
              $nama=$f['nama'];
              $level=$f['level'];
              $nama_tamu=$f['nama_tamu'];
              $pertanyaan=$f['pertanyaan'];
              $jawaban=$f['jawaban'];
              $status=$f['status'];
            ?>
          <div class="item">
            <div class="row align-items-center">
              <div class="col-md-3 py-3"></div>
              <div class="col-md-6 py-3">
                <div class="testi-content">
                  <div class="entry-footer">
                    <strong><?php echo $nama_tamu;?></strong>
                  </div>
                  <p><?php echo $pertanyaan;?></p>
                </div>
                <div class="testi-content" style="text-align: right;">
                  <div class="entry-footer">
                    <strong><?php echo $nama;?></strong> &mdash; 
                    <?php if ($level=='1'): ?>
                    <span class="text-grey">Administrator</span>
                    <?php elseif ($level=='2'): ?>
                    <span class="text-grey">Petugas</span>
                    <?php else:?>
                    <?php endif;?>
                  </div>
                  <p><?php echo $jawaban;?></p>
                </div>
              </div>
              <div class="col-md-3 py-3"></div>
            </div>
            
          </div>
          <?php endforeach;?>
        </div>
        
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  
    <div class="page-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-3 py-3 wow fadeInUp">
          </div>
          <div class="col-lg-6 py-3 wow fadeInUp">
            <div class="subhead">FAQ</div>
            <h3 class="title-section">Berikan pertanyaan kalian.</h3>
            <div class="divider"></div>
                
            <form action="<?php echo base_url().'faq/kirim_faq2' ?>" method="POST">
              <div class="py-2">
                <input type="text" class="form-control" name="nama_tamu" placeholder="Nama Lengkap" oninvalid="this.setCustomValidity('Tolong masukkan nama lengkap anda.')" oninput="setCustomValidity('')" required>
              </div>
              <div class="py-2">
                <textarea rows="6" class="form-control" name="pertanyaan" placeholder="Masukkan pertanyaan kalian" oninvalid="this.setCustomValidity('Tolong masukkan pertanyaan anda.')" oninput="setCustomValidity('')" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary rounded-pill mt-4">Kirim</button>
            </form>
          </div>
          <div class="col-lg-3 py-3 wow fadeInUp">
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  
    <div class="page-section border-top">
      <div class="container">
        <div class="text-center wow fadeInUp">
          <div class="subhead">Penanggulangan</div>
          <h2 class="title-section">Baca <span class="marked">Informasi</span> terbaru kami.</h2>
          <div class="divider mx-auto"></div>
        </div>
        <div class="row my-5 card-blog-row">
          
          <?php
          $no=0;
          foreach ($penanggulangan->result_array() as $p):
            $id = $p['id_penanggulangan'];
            $id_user = $p['id_user'];
            $nama = $p['nama'];
            $deskripsi = substr($p['deskripsi'], 0, 60);
            $keterangan = $p['keterangan'];
            $jenis = $p['jenis'];
            $tanggal = $p['tanggal'];
          ?>
          <div class="col-md-6 col-lg-3 py-3 wow fadeInUp">
            <div class="card-blog">
              <div class="header">
                <div class="avatar">
                  <img src="<?php echo base_url().'assets/images/user.png' ?>" alt="">
                </div>
                <div class="entry-footer">
                  <div class="post-author"><?php echo $nama;?></div>
                  <a href="#" class="post-date"><?php echo $tanggal;?></a>
                </div>
              </div>
              <div class="body">
                <div class="post-title"><a href="<?php echo base_url().'penanggulangan/detail/'.$id; ?>"><?php echo $keterangan;?></a></div>
                <div class="post-excerpt"><?php echo $deskripsi;?></div>
              </div>
              <div class="footer">
                <a href="<?php echo base_url().'penanggulangan/detail/'.$id; ?>">Lihat Selengkapnya <span class="mai-chevron-forward text-sm"></span></a>
              </div>
            </div>
          </div>
          <?php endforeach;?>
          
        </div>
  
        <div class="text-center">
          <a href="<?php echo base_url().'penanggulangan' ?>" class="btn btn-outline-primary rounded-pill">Temukan Lebih Banyak</a>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  </main>

  <!-- Footer -->
  <?php $this->load->view('frontend/footer'); ?>
  <!-- .Footer -->


    <script src="<?= base_url().'assets/frontend/js/jquery-3.5.1.min.js' ?>"></script>

    <script src="<?= base_url().'assets/frontend/js/bootstrap.bundle.min.js' ?>"></script>

    <script src="<?= base_url().'assets/frontend/vendor/wow/wow.min.js' ?>"></script>

    <script src="<?= base_url().'assets/frontend/vendor/owl-carousel/js/owl.carousel.min.js' ?>"></script>

    <script src="<?= base_url().'assets/frontend/vendor/waypoints/jquery.waypoints.min.js' ?>"></script>

    <script src="<?= base_url().'assets/frontend/vendor/animateNumber/jquery.animateNumber.min.js' ?>"></script>

    <script src="<?= base_url().'assets/frontend/js/google-maps.js' ?>"></script>

    <script src="<?= base_url().'assets/frontend/js/theme.js' ?>"></script>

    <script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>

    <?php if($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "FAQ tidak terkirim.",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 3000,
                    position: 'top-right',
                    bgColor: '#FF4859'
                });
        </script>
      <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "FAQ terkirim.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 2800,
                    position: 'top-right',
                    bgColor: '#7EC857'
                });
        </script>
      <?php else:?>
      <?php endif;?>
</body>
</html>