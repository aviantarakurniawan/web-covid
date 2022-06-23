<!--Counter Inbox-->
<?php 
    $query=$this->db->query("SELECT * FROM faq WHERE jawaban=''");
    $jum_faq=$query->num_rows();
?>
<header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url().'backend/beranda' ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">C19</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Info-COVID19</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- faq: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-question-circle"></i>
              <span class="label label-success"><?php echo $jum_faq;?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Anda memiliki <?php echo $jum_faq;?> pertanyaan</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                <?php 
                    $faq=$this->db->query("SELECT * FROM faq WHERE jawaban='' ORDER BY id_faq DESC LIMIT 5");
                    foreach ($faq->result_array() as $fa) :
                        $id_faq=$fa['id_faq'];
                        $nama_tamu=$fa['nama_tamu'];
                        $pertanyaan=$fa['pertanyaan'];
                        $jawaban=$fa['jawaban'];
                ?>
                  <li><!-- start faq -->
                    <a href="<?php echo base_url().'backend/faq'?>">
                      <div class="pull-left">
                        <img src="<?php echo base_url().'assets/images/user.png'?>" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        <?php echo $nama_tamu;?>
                        <!-- <small><i class="fa fa-clock-o"></i> <?php echo $inbox_tgl;?></small> -->
                      </h4>
                      <p><?php echo $pertanyaan;?></p>
                    </a>
                  </li>
                  <!-- end faq -->
                  <?php endforeach;?>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo base_url().'backend/faq'?>">Lihat Semua FAQ</a></li>
            </ul>
          </li>
          
          <?php
              $id_user=$this->session->userdata('id_user');
              $q=$this->db->query("SELECT * FROM petugas WHERE id_user='$id_user'");
              $c=$q->row_array();
          ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url().'assets/images/user.png'?>" class="user-image" alt="">
              <span class="hidden-xs"><?php echo $c['nama'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url().'assets/images/user.png'?>" class="img-circle" alt="">

                <p>
                  <?php echo $c['nama'];?>
                  <?php if($c['level']=='1'):?>
                    <small>Administrator</small>
                  <?php else:?>
                    <small>Petugas</small>
                  <?php endif;?>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <?php if ($this->session->userdata('akses')=='1'): ?>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo base_url().'admin/logout'?>" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
              <?php else: ?>
                <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url().'backend/profil'?>" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url().'admin/logout'?>" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
              <?php endif;?>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="<?php echo base_url().''?>" target="_blank" title="Lihat Website"><i class="fa fa-globe"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>