<div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url();?>assets/production/images/img.jpg" alt=""><?= $this->session->userdata('nama_anggota') ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="http://localhost/Kredit/Pemohon_kredit/Dashboard/v_profil"><i class="fa fa-user pull-right"></i> Profile</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
                  <li role="presentation" class="dropdown">
                      <a href="<?php echo base_url('Pemohon_kredit/Pengajuan_kredit/index')?>" class="info-number" aria-expanded="false">
                          <i class="fa fa-envelope-o"></i>
                          <span class="badge bg-green" id="notif_anggota"></span>
                      </a>
                  </li>
              </ul>
            </nav>
          </div>
        </div>
<script>
    $.ajax({
        url: "<?php echo base_url('Pemohon_kredit/Pengajuan_kredit/notif_anggota');?>",
        type: "POST",
        success: function (data) {
            if (data==0){
                $('#notif_anggota').hide();
            }
            else {
                $('#notif_anggota').show();
            }
            $('#notif_anggota').html(data);
        }
    });
</script>