<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('bendahara/header/header') ?>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        <!-- Side Bar -->
        <?php $this->load->view('bendahara/header/sidebar') ?>
        <!-- /Side Bar -->

        <!-- top navigation -->
        <?php $this->load->view('bendahara/header/navbar') ?>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                    </div>

                    <div class="title_right">
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Form Daftar Anggota </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <form action="<?php echo base_url(); ?>Bendahara/Data_anggota/validation"
                                      method="post" class="form-horizontal form-label-left" >

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Anggota</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" value="<?php echo set_value('nama_anggota'); ?>" name="nama_anggota"
                                                   placeholder="Nama Anggota">
                                            <span class="text-danger"><?php echo form_error('nama_anggota'); ?></span>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Username
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="username_anggota"
                                                   name="username_anggota" placeholder="Username" value="<?php echo set_value('username_anggota'); ?>">
                                            <span class="text-danger"><?php echo form_error('username_anggota'); ?></span>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Password
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="password" class="form-control" id="password_anggota"
                                                   name="password_anggota" placeholder="Password" value="<?php echo set_value('password_anggota') ?>">
                                            <span class="text-danger"><?php echo form_error('password_anggota'); ?></span>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Masukkan Ulang Password
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="password" class="form-control" id="password_anggota"
                                                   name="repassword" placeholder="Masukkan Ulang Password" value="<?php echo set_value('repassword') ?>">
                                            <span class="text-danger"><?php echo form_error('repassword'); ?></span>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Jumlah Gaji <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="jml_gaji" name="jml_gaji"
                                                   placeholder="Jumlah Gaji" onkeypress="return hanyaAngka(event);" value="<?php echo set_value('jml_gaji') ?>">
                                            <span class="text-danger"><?php echo form_error('jml_gaji'); ?></span>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Alamat <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                             <textarea class="form-control" id="alamat" name="alamat"
                                                       placeholder="Alamat"><?php echo set_value('alamat') ?></textarea>
                                            <span class="text-danger"><?php echo form_error('alamat'); ?></span>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="password" class="control-label col-md-3">No. Telephone</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" id="no_telp" name="no_telp"
                                                   placeholder="No. Telephone" onkeypress="return hanyaAngka(event);" maxlength="13" value="<?php echo set_value('no_telp') ?>">
                                            <span class="text-danger"><?php echo form_error('no_telp'); ?></span>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin </label>
                                        <?php $jk = set_value('jenis_kelamin'); ?>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control" name="jenis_kelamin" >
                                                <option value="laki-laki" <?= ($jk == "laki-laki") ? 'selected' : ''; ?>>Laki-laki</option>
                                                <option value="perempuan" <?= ($jk == "perempuan") ? 'selected' : ''; ?>>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <a href="<?php echo base_url(); ?>Bendahara/Data_anggota/index/"><button type="button" class="btn btn-primary">Batal</button></a>
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
</div>

<?php $this->load->view('bendahara/footer/footer') ?>

</body>
</html>