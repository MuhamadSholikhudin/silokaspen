<body class="nav-md">
  <div class="container body">
    <div class="main_container kiri">
      <?= $this->session->flashdata('message'); ?>
      <?php
      function rupiah($angka)
      {

        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
      }

      function rupiah1($angka)
      {

        $hasil_rupiah = number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
      }
      ?>
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view kiri">
          <div class="navbar nav_title kiri_pojok" style="border: 0;">
            <a href="<?= base_url('') . $this->session->userdata('hakakses') . '/index' ?>" class="site_title"><span>SILOKASPEN</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?= base_url('assets/') ?>gambar_pkl/guru.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <!-- <span>Welcome, </span> -->

              <h2><?= $this->session->userdata('username') ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <?php if ($this->session->userdata('hakakses') == 'pembantu') { ?>

                  <li>
                    <a href="<?= base_url('pembantu/index') ?>">
                      <i class="fa fa-home"></i> Dashboard
                    </a>
                  </li>

                  <li>
                    <a href="<?= base_url('pembantu/data_transaksi') ?>">
                      <i class="fa fa-money"></i> Transaksi
                    </a>
                  </li>
                  <li>
                    <a href="<?= base_url('pembantu/data_pajak') ?>">
                      <i class="fa fa-indent"></i> Pajak
                    </a>
                  </li>
                  <li class="bg-light text-dark text-center">

                    <a class="bg-light text-dark">
                      Sisa Saldo Hari Ini
                      <?php
                      $saldolama = $this->db->query(" SELECT id_saldo, jumlahsaldosisa FROM tb_saldoawal ORDER BY tglsaldosisa DESC LIMIT 1");
                      $row = $saldolama->row();
                      $li = $row->id_saldo;
                      $lo = $row->jumlahsaldosisa;
                      ?>
                      <h4>

                        <?= rupiah($lo) ?>
                      </h4>
                    </a>
                  </li>


                <?php } elseif ($this->session->userdata('hakakses') == 'bendahara') { ?>

                  <li>
                    <a href="<?= base_url('bendahara/index') ?>">
                      <i class="fa fa-home"></i> Dashboard
                    </a>
                  </li>
                  <li>
                    <a href="<?= base_url('bendahara/data_saldo_awal') ?>">
                      <i class="fa fa-archive"></i> Saldo Awal
                    </a>
                  </li>
                  <li>
                    <a href="<?= base_url('bendahara/data_jenis_pengeluaran') ?>">
                      <i class="fa fa-share-square-o"></i> Jenis Pengeluaran
                    </a>
                  </li>
                  <li>
                    <a href="<?= base_url('bendahara/pengguna') ?>">
                      <i class="fa fa-user"></i> Pengguna
                    </a>
                  </li>
                  <li>




                  <li class=""><a><i class="fa fa-file"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('bendahara/bku') ?>">Laporan BKU</a></li>
                      <li><a href="<?= base_url('bendahara/laporan_saldo') ?>">Laporan Data Saldo</a></li>
                      <li><a href="<?= base_url('bendahara/laporan_transaksi') ?>">Laporan Transaksi</a></li>
                      <li><a href="<?= base_url('bendahara/laporan_pajak') ?>">Laporan Pajak</a></li>
                    </ul>
                  </li>

                  <li class="bg-white text-dark text-center">

                    <a class="bg-light text-dark">
                      Sisa Saldo Hari Ini
                      <?php
                      $saldolama = $this->db->query(" SELECT id_saldo, jumlahsaldosisa FROM tb_saldoawal ORDER BY tglsaldosisa DESC LIMIT 1");
                      $row = $saldolama->row();
                      $li = $row->id_saldo;
                      $lo = $row->jumlahsaldosisa;
                      ?>
                      <h4>

                        <?= rupiah($lo) ?>
                      </h4>
                    </a>
                  </li>
                <?php } elseif ($this->session->userdata('hakakses') == 'kadin') { ?>
                  <li>
                    <a href="<?= base_url('kadin/index') ?>">
                      <i class="fa fa-home"></i> Dashboard
                    </a>
                  </li>
                  <li class=""><a><i class="fa fa-file"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('kadin/bku') ?>">Laporan BKU</a></li>
                      <li><a href="<?= base_url('kadin/laporan_saldo') ?>">Laporan Data Saldo</a></li>
                      <li><a href="<?= base_url('kadin/laporan_transaksi') ?>">Laporan Transaksi</a></li>
                      <li><a href="<?= base_url('kadin/laporan_pajak') ?>">Laporan Pajak</a></li>
                    </ul>
                  </li>
                  <!-- <li>
                    <a href="<?= base_url('kadin/bku') ?>">
                      <i class="fa fa-file"></i> Laporan BKU
                    </a>
                  </li> -->
                <?php } ?>
              </ul>
            </div>


          </div>
          <!-- /sidebar menu -->


        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?= base_url('assets/') ?>img/user.png" alt=""><?= $this->session->userdata('username') ?>
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">

                  <a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                </div>
              </li>


            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->