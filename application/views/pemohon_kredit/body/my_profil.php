<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('pemohon_kredit/header/header') ?>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        <!-- Side Bar -->
        <?php $this->load->view('pemohon_kredit/header/sidebar') ?>
        <!-- /Side Bar -->

        <!-- top navigation -->
        <?php $this->load->view('pemohon_kredit/header/navbar') ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <!-- top tiles -->
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>
            <div class="col-md-12">
                <div class="panel panel-body">
                    <div class="x_title">
                        <h4>My Profil</h4>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal"
                                data-target="#editProfil"><i class="fa fa-pencil"> Edit Profil</i>
                        </button>
                        <tr>
                            <th style="width:20%"></th>
                            <th style="width:50%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($anggota->result_array() as $data) {
                            ?>
                            <tr>
                                <th>Id Anggota</th>
                                <td>:  <?php echo $data['id_anggota']; ?></td>
                            </tr>
                            <tr>
                                <th>Username Anggota</th>
                                <td>:  <?php echo $data['username_anggota']; ?></td>
                            </tr>
                            <tr>
                                <th>Password Anggota</th>
                                <td>:  <?php echo $data['password_anggota']; ?></td>
                            </tr>
                            <tr>
                                <th>Nama Anggota</th>
                                <td>:  <?php echo $data['nama_anggota']; ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>:  <?php echo $data['jenis_kelamin']; ?></td>
                            </tr>
                            <tr>
                                <th>Alamat Anggota</th>
                                <td>:  <?php echo $data['alamat']; ?></td>
                            </tr>
                            <tr>
                                <th>No. Telephone</th>
                                <td>:  <?php echo $data['no_telp']; ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah Gaji</th>
                                <td>:  <?php echo "Rp. ". number_format($data['jml_gaji'] ,0,".","."); ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah Modal</th>
                                <td>:  <?php echo "Rp. ". number_format($data['jml_modal'],0,".","."); ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah Utang di Koperasi</th>
                                <td>:  <?php echo "Rp. ". number_format($data['sisa_utang_di_koperasi'],0,".","."); ?></td>
                            </tr>
                            <tr>
                                <th>Total Lama Angsuran</th>
                                <td>:  <?php echo $data['total_lama_angsuran']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /FORM EDIT ANGGOTA-->
            <?php
            foreach ($anggota->result_array() as $item):
                $id_anggota = $item['id_anggota'];
                $nama_anggota = $item['nama_anggota'];
                $username_anggota = $item['username_anggota'];
                $password_anggota = $item['password_anggota'];
                $alamat = $item['alamat'];
                $no_telp = $item['no_telp'];
                $jenis_kelamin = $item['jenis_kelamin'];
                ?>
                <div class="modal fade" id="editProfil" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Form Edit Profil</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <button class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br/>
                                <form class="form-horizontal form-label-left"
                                      action="<?php echo base_url(); ?>/Pemohon_kredit/My_profil/edit_Profil/<?php echo $id_anggota; ?>"
                                      method="post">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Anggota</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" name="nama_anggota"
                                                   value="<?php echo $nama_anggota; ?>" placeholder="Nama Anggota">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" name="username_anggota"
                                                   value="<?php echo $username_anggota; ?>" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="password" class="form-control" name="password_anggota"
                                                   value="<?php echo $password_anggota; ?>" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea class="form-control" name="alamat" value=""
                                                  placeholder="Alamat"><?php echo $alamat; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Telephone</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" name="no_telp"
                                                   value="<?php echo $no_telp; ?>" placeholder="No. Telephone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control" name="jenis_kelamin">
                                                <option value="Laki-laki" <?php if ($jenis_kelamin == 'Laki-laki') {
                                                    echo 'selected';
                                                } else {
                                                    echo '';
                                                } ?>>Laki-laki
                                                </option>
                                                <option value="Perempuan" <?php if ($jenis_kelamin == 'Perempuan') {
                                                    echo 'selected';
                                                } else {
                                                    echo '';
                                                } ?>>Perempuan
                                                </option>
                                            </select>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                            <button class="btn btn-primary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- /top tiles -->

            <div class="row">

            </div>
        </div>
            <?php $this->load->view('pemohon_kredit/footer/footer') ?>

</body>
</html>
