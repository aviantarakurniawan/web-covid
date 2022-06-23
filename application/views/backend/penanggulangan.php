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
    <title>Admin | Penanggulangan</title>
  <?php else: ?>
    <title>Info-C19 | Penanggulangan</title>
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
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
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

        <li>
          <a href="<?php echo base_url().'backend/buku_tamu'?>">
            <i class="fa fa-book"></i> <span>Buku Tamu</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'backend/penyebaran' ?>"><i class="fa fa-bar-chart-o"></i> Penyebaran Covid-19</a></li>
            <li class="active"><a href="<?php echo base_url().'backend/penanggulangan' ?>"><i class="fa fa-file-text-o"></i> Penanggulangan Covid-19</a></li>
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
      Penanggulangan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Penanggulangan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Baru</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
          			<th>No</th>
          			<th>Nama Petugas</th>
                    <th>Deskripsi</th>
                    <th>Keterangan</th>
                    <th>Jenis</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
          			<?php
                    $no=0;
                        foreach($data->result_array() as $a):
                            $no++;
                            $id=$a['id_penanggulangan'];
                            $id_user=$a['id_user'];
                            $nama=$a['nama'];
                            $deskripsi=$a['deskripsi'];
                            $keterangan=$a['keterangan'];
                            $jenis=$a['jenis'];
                    ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $nama;?></td>
                  <td><?php echo $deskripsi;?></td>
                  <td><?php echo $keterangan;?></td>
                  <td><?php echo $jenis;?></td>
                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalUpdate<?php echo $id;?>"><span class="fa fa-pencil"></span></a>
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


<!-- ============ MODAL TAMBAH DATA =============== -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Penanggulangan</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/penanggulangan/tambah_penanggulangan'?>" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <label class="control-label col-xs-3" >Nama</label>
                <div class="col-xs-8">
                    <input name="nama" class="form-control" type="text" value="<?php echo $this->session->userdata('nama') ?>" placeholder="Nama" required="required" readonly>
                    <input name="id_user" class="form-control" type="hidden" value="<?php echo $this->session->userdata('id_user') ?>" placeholder="Nama" required="required" readonly>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Keterangan</label>
                <div class="col-xs-8">
                    <input name="keterangan" class="form-control" type="text" placeholder="Judul" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Jenis</label>
                <div class="col-xs-8">
                    <select name="jenis" class="form-control" required>
                      <option value="">-Pilih-</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Deskripsi</label>
                <div class="col-xs-8">
                    <textarea name="deskripsi" class="ckeditor" rows="10" cols="10" required></textarea>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-primary btn-flat">Simpan</button>
        </div>
    </form>
    </div>
    </div>
</div>

<?php
    $no=0;
    foreach($data->result_array() as $a):
      $no++;
      $id=$a['id_penanggulangan'];
      $id_user=$a['id_user'];
      $nama=$a['nama'];
      $deskripsi=$a['deskripsi'];
      $keterangan=$a['keterangan'];
      $jenis=$a['jenis'];
?>
<!-- ============ MODAL EDIT DATA =============== -->
<div class="modal fade" id="ModalUpdate<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Update Penanggulangan</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/penanggulangan/edit_penanggulangan'?>" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <label class="control-label col-xs-3" >Nama Petugas</label>
                <div class="col-xs-8">
                    <input name="nama" value="<?php echo $this->session->userdata('nama') ?>" class="form-control" type="text" placeholder="Nama" required="required" readonly>
                    <input name="id_user" value="<?php echo $this->session->userdata('id_user') ?>" class="form-control" type="hidden" placeholder="ID Petugas" required="required" readonly>
                </div>
            </div>
                   
            

            <div class="form-group">
                <label class="control-label col-xs-3" >Keterangan</label>
                <div class="col-xs-8">
                    <input name="keterangan" value="<?php echo $keterangan;?>" class="form-control" type="text" placeholder="Judul" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Jenis</label>
                <div class="col-xs-8">
                    <select name="jenis" class="form-control" required>
                      <option value="">-Pilih-</option>
                      <?php if($level=='1'):?>
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                      <?php else:?>
                        <option value="1">1</option>
                        <option value="2" selected>2</option>
                      <?php endif;?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Deskripsi</label>
                <div class="col-xs-8">
                  <textarea name="deskripsi" class="ckeditor" rows="10" cols="10" required><?php echo $deskripsi;?></textarea>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <input type="hidden" name="kode" value="<?php echo $id;?>">
            <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-primary btn-flat">Update</button>
        </div>
    </form>
    </div>
    </div>
</div>

<?php endforeach;?>
	
<?php
    $no=0;
    foreach($data->result_array() as $a):
      $no++;
      $id=$a['id_penanggulangan'];
      $id_user=$a['id_user'];
      $nama=$a['nama'];
      $deskripsi=$a['deskripsi'];
      $keterangan=$a['keterangan'];
      $jenis=$a['jenis'];
?>
	<!-- MODAL HAPUS DATA -->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Penanggulangan</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'backend/penanggulangan/hapus_penanggulangan'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
							       <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                          <p>Apakah Anda yakin mau menghapus data ?</p>
                               
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
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
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
    CKEDITOR.replace('ckeditor');
  });
</script>
    
    <?php if($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Penanggulangan Berhasil disimpan ke database.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: 2800,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Penanggulangan berhasil di edit",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: 2800,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Penanggulangan Berhasil dihapus.",
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
