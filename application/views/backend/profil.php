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
  <title>Info-C19 | Profil</title>
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

        <li class="active">
          <a href="<?php echo base_url().'backend/profil'?>">
            <i class="fa fa-user"></i> <span>Profil</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

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
        Profil
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <?php
          foreach ($data->result_array() as $a):
              $id=$a['id_user'];
              $nama=$a['nama'];
              $username=$a['username'];
              $password=$a['password'];
              $level=$a['level'];
          ?>
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url().'assets/images/user.png'?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $nama;?></h3>

              <?php if($level=='1'):?>
              <p class="text-muted text-center">Administrator</p>
              <?php else:?>
              <p class="text-muted text-center">Petugas</p>
              <?php endif;?>
              
              <a data-toggle="modal" data-target="#ModalUpdate<?php echo $id;?>" class="btn btn-primary btn-block btn-sm"><b>Edit Profil</b></a>
              <a href="<?php echo base_url().'backend/profil/reset_password/'.$id;?>" class="btn btn-primary btn-block btn-sm"><b>Reset Password</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <?php endforeach;?>
          <!-- /.box -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Aktivitas</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <?php
                foreach ($faq->result_array() as $f):
                    $id_faq=$f['id_faq'];
                    $id_user=$f['id_user'];
                    $nama=$f['nama'];
                    $nama_tamu=$f['nama_tamu'];
                    $pertanyaan=$f['pertanyaan'];
                    $jawaban=$f['jawaban'];
                    $status=$f['status'];
                    $tanggal=$f['tanggal'];
                ?>
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url().'assets/images/user.png'?>" alt="User Image">
                        <span class="username">
                          <a href="#"><?php echo $nama_tamu?></a>
                          <a data-toggle="modal" data-target="#ModalJawab<?php echo $id_faq;?>" class="pull-right btn-box-tool"><i class="fa fa-reply"></i></a>
                        </span>
                    <span class="description"><?php echo $tanggal;?></span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    <?php echo $pertanyaan;?>
                  </p>
                </div>
                <?php endforeach;?>
                <!-- /.post -->
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
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

<!-- MODAL JAWAB -->
<?php
foreach ($faq->result_array() as $f):
    $id_faq=$f['id_faq'];
    $id_user=$f['id_user'];
    $nama=$f['nama'];
    $nama_tamu=$f['nama_tamu'];
    $pertanyaan=$f['pertanyaan'];
    $jawaban=$f['jawaban'];
    $status=$f['status'];
    $tanggal=$f['tanggal'];
?>
<div class="modal fade" id="ModalJawab<?php echo $id_faq;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Jawab Pertanyaan</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/profil/balas'?>" enctype="multipart/form-data">
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
            <button class="btn btn-primary btn-flat">Kirim</button>
        </div>
    </form>
    </div>
    </div>
</div>
<?php endforeach;?>
<!-- /.MODAL JAWAB -->

<?php
    $no=0;
    foreach($data->result_array() as $a):
      $no++;
      $id=$a['id_user'];
      $nama=$a['nama'];
      $username=$a['username'];
      $password=$a['password'];
      $level=$a['level'];
?>
<!-- ============ MODAL EDIT DATA =============== -->
<div class="modal fade" id="ModalUpdate<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Update Profil</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/profil/edit_profil'?>" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <label class="control-label col-xs-3" >Nama</label>
                <div class="col-xs-8">
                    <input name="nama" value="<?php echo $nama;?>" class="form-control" type="text" placeholder="Nama" required>
                </div>
            </div>
                   
            <div class="form-group">
                <label class="control-label col-xs-3" >Username</label>
                <div class="col-xs-8">
                    <input name="user" value="<?php echo $username;?>" class="form-control" type="text" placeholder="username" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Password</label>
                <div class="col-xs-8">
                    <input name="pass" class="form-control" type="password" placeholder="Password" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Ulangi Password</label>
                <div class="col-xs-8">
                    <input name="pass2" class="form-control" type="password" placeholder="Ulangi Password" required>
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
	
  <!-- MODAL RESET PASSWORD -->
        <div class="modal fade" id="ModalResetPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
                    </div>
                    
                    <div class="modal-body">
                                
                            <table>
                                <tr>
                                    <th style="width:120px;">Username</th>
                                    <th>: </th>
                                    <th><?php echo $this->session->flashdata('uname');?></th>
                                </tr>
                                <tr>
                                    <th style="width:120px;">Password Baru</th>
                                    <th>: </th>
                                    <th><?php echo $this->session->flashdata('upass');?></th>
                                </tr>
                            </table>                     
                                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


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
    
    <?php if($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: 2800,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-jawab'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "FAQ berhasil di jawab",
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
                    text: "Profil berhasil di edit",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: 2800,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='show-modal'):?>
        <script type="text/javascript">
                $('#ModalResetPassword').modal('show');
        </script>
    <?php else:?>

    <?php endif;?>
</body>
</html>
