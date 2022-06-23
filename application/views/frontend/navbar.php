    <nav class="navbar navbar-expand-lg navbar-light navbar-float">
      <div class="container">
        <a href="<?php echo base_url().'beranda' ?>" class="navbar-brand">Info<span class="text-primary">COVID-19</span></a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-lg-4 pt-3 pt-lg-0">
            <li class="nav-item <?= $this->uri->segment(1) == 'beranda' ? 'active' : ''?>">
              <a href="<?php echo base_url().'beranda' ?>" class="nav-link">Beranda</a>
            </li>
            <li class="nav-item <?= $this->uri->segment(1) == 'penyebaran' ? 'active' : ''?>">
              <a href="<?php echo base_url().'penyebaran' ?>" class="nav-link">Penyebaran</a>
            </li>
            <li class="nav-item <?= $this->uri->segment(1) == 'penanggulangan' ? 'active' : ''?>">
              <a href="<?php echo base_url().'penanggulangan' ?>" class="nav-link">Penanggulangan</a>
            </li>
          </ul>

          <div class="ml-auto">
            <a href="<?php echo base_url().'faq' ?>" class="btn btn-outline rounded-pill">FAQ</a>
          </div>
        </div>
      </div>
    </nav>