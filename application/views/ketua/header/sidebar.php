<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="index.html" class="site_title"><img src="<?php echo base_url();?>assets/production/images/koperasi.png" style="width: 55px"><span>Jnana Partha</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url();?>assets/production/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= $this->session->userdata('jabatan') ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="http://localhost/Kredit/Ketua/Dashboard"><i class="fa fa-home"></i> Home </a>
                  </li>
                  <li><a href="http://localhost/Kredit/Ketua/Rekomendasi"><i class="fa fa-tags"></i> Rekomendasi Pengaju </a>
                  </li>
                    <li><a href="http://localhost/Kredit/Ketua/Rekomendasi/v_historyPersetujuan"><i class="fa fa-history"></i> History Persetujuan </a>
                    </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a a href="#" data-toggle="modal" data-target="#logoutModal" data-toggle="tooltip" data-placement="top" style="width: 230px;">
                <span class="glyphicon glyphicon-off" aria-hidden="true" style="width: 230px;"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>