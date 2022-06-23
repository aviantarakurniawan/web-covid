<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com">

  <title>Info-C19 | FAQ</title>

  <link rel="stylesheet" href="<?= base_url().'assets/frontend/vendor/animate/animate.css' ?>">

  <link rel="stylesheet" href="<?= base_url().'assets/frontend/css/bootstrap.css' ?>">

  <link rel="stylesheet" href="<?= base_url().'assets/frontend/css/maicons.css' ?>">

  <link rel="stylesheet" href="<?= base_url().'assets/frontend/vendor/owl-carousel/css/owl.carousel.css' ?>">

  <link rel="stylesheet" href="<?= base_url().'assets/frontend/css/theme.css' ?>">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>

</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <!-- Navbar -->
    <?php $this->load->view('frontend/navbar'); ?>
    <!-- .Navbar -->

    <div class="container mt-5">
      <div class="page-banner" style="margin-top: 140px;">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="<?php echo base_url().'beranda' ?>">Beranda</a></li>
                <li class="breadcrumb-item active">FAQ</li>
              </ul>
            </nav>
            <h1 class="text-center">FAQ</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <main>
    <div class="page-section">
      <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-3 py-3">
            </div>
          
            <div class="col-lg-6 py-3">
                <div class="subhead">FAQ</div>
                <h3 class="title-section">Berikan pertanyaan kalian.</h3>
                <div class="divider"></div>
                
                <?php echo $this->session->flashdata('pesan') ?>
                <form action="<?php echo base_url().'faq/kirim_faq' ?>" method="POST">
                <div class="py-2">
                    <input type="text" class="form-control" name="nama_tamu" placeholder="Nama Lengkap" oninvalid="this.setCustomValidity('Tolong masukkan nama lengkap anda.')" oninput="setCustomValidity('')" required>
                </div>
                <div class="py-2">
                    <textarea rows="6" class="form-control" name="pertanyaan" placeholder="Masukkan pertanyaan kalian" oninvalid="this.setCustomValidity('Tolong masukkan pertanyaan anda.')" oninput="setCustomValidity('')" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary rounded-pill mt-4">Kirim</button>
                </form>
            </div>

            <div class="col-lg-3 py-3">
            </div>
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

  <!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script> -->

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