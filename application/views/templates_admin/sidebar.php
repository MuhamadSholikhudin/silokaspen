<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2>John Doe</h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <?php if ($this->session->userdata('hakakses') == 'kadin') { ?>
            <li>
              <a href="https://google.com">
                <i class="fa fa-home"></i> Dashboard
              </a>
            </li>
            <li>
              <a href="https://google.com">
                <i class="fa fa-home"></i> Pajak
              </a>
            </li>
            <li>
              <a href="https://google.com">
                <i class="fa fa-home"></i> Transaksi
              </a>
            </li>
            <li>
              <a href="https://google.com">
                <i class="fa fa-home"></i> Laporan BKU
              </a>
            </li>
            <li>
              <a href="https://google.com">
                <i class="fa fa-home"></i> Laporan Pajak
              </a>
            </li>


            </li>
          <?php } elseif ($this->session->userdata('hakakses') == 'bendahara') { ?>
            <li>
              <a href="https://google.com">
                <i class="fa fa-home"></i> Dashboard
              </a>
            </li>
            <li>
              <a href="https://google.com">
                <i class="fa fa-home"></i> Saldo Awal
              </a>
            </li>
            <li>
              <a href="https://google.com">
                <i class="fa fa-home"></i> Jenis Pengeluaran
              </a>
            </li>
            <li>
              <a href="https://google.com">
                <i class="fa fa-home"></i> Laporan BKU
              </a>
            </li>
            <li>
              <a href="https://google.com">
                <i class="fa fa-home"></i> Laporan Pajak
              </a>
            </li>
          <?php } elseif ($this->session->userdata('hakakses') == 'pembantu') { ?>
            <li>
              <a href="https://google.com">
                <i class="fa fa-home"></i> Dashboard
              </a>
            </li>
            
            <li>
              <a href="https://google.com">
                <i class="fa fa-home"></i> Laporan BKU
              </a>
            </li>
            <li>
              <a href="https://google.com">
                <i class="fa fa-home"></i> Laporan Pajak
              </a>
            </li>
          <?php } ?>
        </ul>
      </div>
      <div class="menu_section">
        <h3>Live On</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="e_commerce.html">E-commerce</a></li>
              <li><a href="projects.html">Projects</a></li>
              <li><a href="project_detail.html">Project Detail</a></li>
              <li><a href="contacts.html">Contacts</a></li>
              <li><a href="profile.html">Profile</a></li>
            </ul>
          </li>
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
            <img src="images/img.jpg" alt="">John Doe
          </a>
          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="javascript:;"> Profile</a>
            <a class="dropdown-item" href="javascript:;">
              <span class="badge bg-red pull-right">50%</span>
              <span>Settings</span>
            </a>
            <a class="dropdown-item" href="javascript:;">Help</a>
            <a class="dropdown-item" href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
          </div>
        </li>

        <li role="presentation" class="nav-item dropdown open">
          <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green">6</span>
          </a>
          <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
            <li class="nav-item">
              <a class="dropdown-item">
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="dropdown-item">
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="dropdown-item">
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="dropdown-item">
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li class="nav-item">
              <div class="text-center">
                <a class="dropdown-item">
                  <strong>See All Alerts</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->