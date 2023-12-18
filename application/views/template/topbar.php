<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?= base_url(); ?>">
        <img src="<?= base_url('assets/img/logo.avif'); ?>" class="brand-image">
      </a>
      <span class="d-block d-sm-none"><b>Fast Print</b></span>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="nav navbar-nav">
            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                <?php 
                if( ($this->uri->segment('1') == 'produk' AND $this->uri->segment('2') == 'index') OR ($this->uri->segment('1') == 'produk' AND $this->uri->segment('2') == 'bisa-dijual') )
                {  
                    echo'<span class="text-info text-bold"><i class="fa fa-cubes"></i> Produk</span>'; 
                }else
                { 
                    echo'<i class="fa fa-cubes"></i> Produk'; 
                } 
                ?>
                </a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="<?= base_url('produk/index'); ?>" class="dropdown-item">Master Produk </a></li>
                <li><a href="<?= base_url('produk/bisa-dijual'); ?>" class="dropdown-item">Produk Bisa Dijual</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                <?php 
                if( ($this->uri->segment('1') == 'produk-api' AND $this->uri->segment('2') == 'index') OR ($this->uri->segment('1') == 'produk-api' AND $this->uri->segment('2') == 'bisa-dijual') )
                { 
                    echo'<span class="text-info text-bold"><i class="fa fa-cubes"></i> Produk API</span>'; 
                }else
                { 
                    echo'<i class="fa fa-cubes"></i> Produk API'; 
                } 
                ?>
                </a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="<?= base_url('produk-api/index'); ?>" class="dropdown-item">Master Produk </a></li>
                <li><a href="<?= base_url('produk-api/bisa-dijual'); ?>" class="dropdown-item">Produk Bisa Dijual</a></li>
                </ul>
            </li>
        </ul>
      </div>
  </nav>