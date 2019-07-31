<div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url();?>assets/production/images/img.jpg" alt=""><?= $this->session->userdata('jabatan') ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="#" data-toggle="modal" data-target="#editBendahara"><i class="fa fa-user pull-right"></i> Profile</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>

                  <li role="presentation" class="dropdown">
                      <a href="<?php echo base_url('Bendahara/Data_ranking/v_rekomendasi')?>" class="info-number" aria-expanded="false">
                          <i class="fa fa-bell-o"></i>
                          <span class="badge bg-green" id="notif_persetujuan"></span>
                      </a>
                  </li>
                <li role="presentation" class="dropdown">
                      <a href="<?php echo base_url('Bendahara/Data_pengajuan/index')?>" class="info-number" aria-expanded="false">
                          <i class="fa fa-envelope-o"></i>
                          <span class="badge bg-green" id="notif"></span>
                      </a>
                  </li>
              </ul>
            </nav>
          </div>
        </div>

<script>
    $.ajax({
        url: "<?php echo base_url('Bendahara/Data_pengajuan/notif');?>",
        type: "POST",
        success: function (data) {
            if (data==0){
                $('#notif').hide();
            }
            else {
                $('#notif').show();
            }
            $('#notif').html(data);
        }
    });

    $.ajax({
        url: "<?php echo base_url('Bendahara/Data_ranking/notif_persetujuan');?>",
        type: "POST",
        success: function (data) {
            if (data==0){
                $('#notif_persetujuan').hide();
            }
            else {
                $('#notif_persetujuan').show();
            }
            $('#notif_persetujuan').html(data);
        }
    });
</script>