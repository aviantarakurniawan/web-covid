<!--Counter Inbox-->
<?php 
    $query=$this->db->query("SELECT * FROM faq WHERE status='1'");
    $jum_faq=$query->num_rows();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php if ($this->session->userdata('akses')=='1'): ?>
    <title>Admin | FAQ</title>
  <?php else: ?>
    <title>Info-C19 | FAQ</title>
  <?php endif;?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.css'?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datepicker/datepicker3.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   <?php 
    $this->load->view('backend/header');
  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar User Panel -->
      <?php
        $this->load->view('backend/user_panel');
      ?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU UTAMA</li>
        <li>
          <a href="<?php echo base_url().'backend/beranda'?>">
            <i class="fa fa-home"></i> <span>Beranda</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        <?php if ($this->session->userdata('akses')=='1'): ?>
        <li>
          <a href="<?php echo base_url().'backend/petugas'?>">
            <i class="fa fa-users"></i> <span>Petugas</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <?php elseif ($this->session->userdata('akses')=='2'): ?>
        <li>
          <a href="<?php echo base_url().'backend/profil'?>">
            <i class="fa fa-user"></i> <span>Profil</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <?php else: ?>
        <?php endif; ?>

        <li>
          <a href="<?php echo base_url().'backend/buku_tamu'?>">
            <i class="fa fa-book"></i> <span>Buku Tamu</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'backend/penyebaran' ?>"><i class="fa fa-bar-chart-o"></i> Penyebaran Covid-19</a></li>
            <li><a href="<?php echo base_url().'backend/penanggulangan' ?>"><i class="fa fa-file-text-o"></i> Penanggulangan Covid-19</a></li>
            <li><a href="<?php echo base_url().'backend/wilayah' ?>"><i class="fa fa-globe"></i> Wilayah</a></li>
          </ul>
        </li>

        <li class="actice">
          <a href="<?php echo base_url().'backend/faq'?>">
            <i class="fa fa-question-circle"></i> <span>Faq</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php echo $jum_faq;?></small>
            </span>
          </a>
        </li>
        
        <li>
          <a href="<?php echo base_url().'admin/logout'?>">
            <i class="fa fa-sign-out"></i> <span>Keluar</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        FAQ
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">FAQ</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped" style="font-size:12px;">
                <thead>
                <tr>
					<th>No</th>
                    <th>Nama Petugas</th>
                    <th>Nama</th>
                    <th>Pertanyaan</th>
                    <th>Jawaban</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$no=0;
  					foreach ($data->result_array() as $i) :
  					   $no++;
                       $id_faq=$i['id_faq'];
                       $id_user=$i['id_user'];
                       $nama=$i['nama'];
                       $nama_tamu=$i['nama_tamu'];
                       $pertanyaan=$i['pertanyaan'];
                       $jawaban=$i['jawaban'];
                       $status=$i['status'];
                       
                    ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $nama;?></td>
                  <td><?php echo $nama_tamu;?></td>
                  <td><?php echo $pertanyaan;?></td>
                  <td><?php echo $jawaban;?></td>
                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalJawab<?php echo $id_faq;?>"><span class="fa fa-reply"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id_faq;?>"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
				<?php endforeach;?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    $this->load->view('backend/footer');
  ?>

  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

	<!-- Modal Edit Faq -->
    <?php foreach ($data->result_array() as $i) :
              $id_faq=$i['id_faq'];
              $id_user=$i['id_user'];
              $nama=$i['nama'];
              $nama_tamu=$i['nama_tamu'];
              $pertanyaan=$i['pertanyaan'];
              $jawaban=$i['jawaban'];
              $status=$i['status'];
            ?>
        <div class="modal fade" id="ModalJawab<?php echo $id_faq;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Jawab Pertanyaan</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/faq/edit_faq'?>" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Petugas</label>
                        <div class="col-xs-8">
                            <input name="nama" value="<?php echo $this->session->userdata('nama') ?>" class="form-control" type="text" placeholder="Nama Petugas" required="required" readonly>
                            <input name="id_user" value="<?php echo $this->session->userdata('id_user') ?>" class="form-control" type="hidden" required="required" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Tamu</label>
                        <div class="col-xs-8">
                            <input name="nama_tamu" value="<?php echo $nama_tamu;?>" class="form-control" type="text" placeholder="Nama" required="required" readonly>
                        </div>
                    </div>
                        
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pertanyaan</label>
                        <div class="col-xs-8">
                            <textarea name="pertanyaan" class="form-control" rows="4" readonly><?php echo $pertanyaan;?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jawaban</label>
                        <div class="col-xs-8">
                            <textarea name="jawaban" class="form-control" rows="4" ></textarea>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <input type="hidden" name="id_faq" value="<?php echo $id_faq;?>">
                    <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-primary btn-flat">Jawab</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <?php endforeach;?>
    <!-- Modal Edit Faq -->

	<?php foreach ($data->result_array() as $i) :
              $id_faq=$i['id_faq'];
              $id_user=$i['id_user'];
              $nama=$i['nama'];
              $nama_tamu=$i['nama_tamu'];
              $pertanyaan=$i['pertanyaan'];
              $jawaban=$i['jawaban'];
              $status=$i['status'];
            ?>
	<!--Modal Hapus Faq-->
        <div class="modal fade" id="ModalHapus<?php echo $id_faq;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Pertanyaan</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'backend/faq/hapus_faq'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
							       <input type="hidden" name="id_faq" value="<?php echo $id_faq;?>"/> 
                            <p>Apakah Anda yakin mau menghapus pertanyaan dari </b><?php echo $nama_tamu;?> ?</p>
                               
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach;?>
	
	


<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker3').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker4').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $(".timepicker").timepicker({
      showInputs: true
    });

  });
</script>
    
    <?php if($this->session->flashdata('msg')=='success-jawab'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "FAQ berhasil di jawab",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#2800'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "FAQ Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#2800'
                });
        </script>
    <?php else:?>

    <?php endif;?>
</body>
</html>