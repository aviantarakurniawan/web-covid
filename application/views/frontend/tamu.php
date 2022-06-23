<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com">

  <title>Info-C19 | Buku Tamu</title>

  <link rel="stylesheet" href="<?= base_url().'assets/frontend/vendor/animate/animate.css' ?>">

  <link rel="stylesheet" href="<?= base_url().'assets/frontend/css/bootstrap.css' ?>">

  <link rel="stylesheet" href="<?= base_url().'assets/frontend/css/maicons.css' ?>">

  <link rel="stylesheet" href="<?= base_url().'assets/frontend/vendor/owl-carousel/css/owl.carousel.css' ?>">

  <link rel="stylesheet" href="<?= base_url().'assets/frontend/css/theme.css' ?>">

</head>
<body>

  <div id="myModal" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" style="font-size: medium; font-weight: bold;">Form Buku Tamu</h3>
        </div>
        <form class="form-horizontal" method="POST" action="<?php echo base_url().'buku_tamu/input_tamu' ?>" enctype="multipart/form-data">
          <div class="modal-body">

          <div class="mb-3">
            <label class="form-label">Nama :</label>
            <input type="text" class="form-control" name="nama_tamu" placeholder="Nama" required>
          </div>
          
          <div class="mb-3">
            <label class="form-label">Jabatan :</label>
            <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" required>
          </div>

          <div class="mb-3 row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="form-label">Dari :</label>
                <input type="text" class="form-control" name="dari" placeholder="Dari" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label class="form-label">Tujuan :</label>
                <input type="text" class="form-control" name="tujuan" placeholder="Tujuan" required>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Saran :</label>
            <textarea name="saran" class="form-control" placeholder="Masukkan saran anda." rows="4"></textarea>
          </div>

          </div>
          <div class="modal-footer">
            <button class="btn btn-primary btn-sm">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script src="<?= base_url().'assets/frontend/js/jquery-3.5.1.min.js' ?>"></script>

  <script src="<?= base_url().'assets/frontend/js/bootstrap.bundle.min.js' ?>"></script>

  <script src="<?= base_url().'assets/frontend/vendor/wow/wow.min.js' ?>"></script>

  <script src="<?= base_url().'assets/frontend/vendor/owl-carousel/js/owl.carousel.min.js' ?>"></script>

  <script src="<?= base_url().'assets/frontend/vendor/waypoints/jquery.waypoints.min.js' ?>"></script>

  <script src="<?= base_url().'assets/frontend/vendor/animateNumber/jquery.animateNumber.min.js' ?>"></script>

  <script src="<?= base_url().'assets/frontend/js/google-maps.js' ?>"></script>

  <script src="<?= base_url().'assets/frontend/js/theme.js' ?>"></script>

  <!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script> -->

  <script>
    $('#myModal').modal('show');
  </script>

</body>
</html>