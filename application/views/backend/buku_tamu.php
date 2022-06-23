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
    <title>Admin | Buku Tamu</title>
  <?php else: ?>
    <title>Info-C19 | Buku Tamu</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
  
	<?php 
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
                
    ?>
	
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

        <li class="active">
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

        <li>
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
        Buku Tamu
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Buku Tamu</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
          <div class="box">
            <div class="box-header"></div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="example1" class="table table-striped" style="font-size:13px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Dari</th>
                            <th>Jabatan</th>
                            <th>Tujuan</th>
                            <th>Saran</th>
                            <th style="text-align:right;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=0;
                            foreach($data->result_array() as $a):
                                $no++;
                                $id=$a['id_tamu'];
                                $tanggal=$a['tanggal'];
                                $nama_tamu=$a['nama_tamu'];
                                $dari=$a['dari'];
                                $jabatan=$a['jabatan'];
                                $tujuan=$a['tujuan'];
                                $saran=$a['saran'];
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $tanggal;?></td>
                            <td><?php echo $nama_tamu;?></td>
                            <td><?php echo $dari;?></td>
                            <td><?php echo $jabatan;?></td>
                            <td><?php echo $tujuan;?></td>
                            <td><?php echo $saran;?></td>
                            <td style="text-align:right;">
                                    <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id;?>"><span class="fa fa-trash"></span></a>
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
	
	<?php
        $no=0;
        foreach($data->result_array() as $a):
            $no++;
            $id=$a['id_tamu'];
            $tanggal=$a['tanggal'];
            $nama_tamu=$a['nama_tamu'];
            $dari=$a['dari'];
            $jabatan=$a['jabatan'];
            $tujuan=$a['tujuan'];
            $saran=$a['saran'];
    ?>
	<!-- MODAL HAPUS DATA -->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Tamu</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'backend/buku_tamu/hapus_tamu'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
							       <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                          <p>Apakah Anda yakin mau menghapus Tamu <b><?php echo $nama_tamu;?></b> ?</p>
                               
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
	<script src="<?php echo base_url();?>assets/dist/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url();?>assets/dist/js/buttons.bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/dist/js/jszip.min.js"></script>
	<script src="<?php echo base_url();?>assets/dist/js/pdfmake.min.js"></script>
	<script src="<?php echo base_url();?>assets/dist/js/vfs_fonts.js"></script>
	<script src="<?php echo base_url();?>assets/dist/js/buttons.html5.min.js"></script>
	<script src="<?php echo base_url();?>assets/dist/js/buttons.print.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
	<!-- page script -->

    <script>
		$(document).ready(function() {
		//replace the <textarea id="editor1"> with a CKEditor
		//instance, using default configuration

			$('#example1').DataTable( {

				dom: 'lBfrtip',
				lengthMenu: [
					[ 10, 25, 50, -1],
					[ '10', '25', '50', 'Show All']
				],
				buttons: [
          {
            extend: 'excel',
            filename: 'Data Pengunjung',
            title: 'Data Pengunjung'
          },
          {
            extend: 'pdf',
            filename: 'Data Pengunjung',
            orientation: 'portrait',
            title: 'Data Pengunjung',
            pageSize: 'A4'
          },
					'copy', 'print'
				]
			});

			$('#example2').DataTable( {
				'paging'		: true,
				'lengthChange'	: false,
				'searching'		: false,
				'ordering'		: true,
				'info'			: true,
				'autoWidth'		: false
			});
		});
	</script>
    
    <?php if($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Tamu Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 2800,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>
</body>
</html>
