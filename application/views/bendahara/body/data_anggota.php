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
                        <h3></h3>
                    </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2 style="height: 25px;">Data Anggota Koperasi</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <p class="text-muted font-13 m-b-30">
                                </p>
                                <button type="button" class="btn btn-success btn-lg" data-toggle="modal"
                                        data-target="#tambahAnggota"><i class="fa fa-plus-square"> Tambah Anggota</i>
                                </button>
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Id Anggota</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Alamat</th>
                                        <th>No. Telephone</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($sql1->result() as $pemohon_kredit) {
                                        ?>
                                        <tr>
                                            <td><?php echo $pemohon_kredit->id_anggota; ?></td>
                                            <td><?php echo $pemohon_kredit->nama_anggota; ?></td>
                                            <td><?php echo $pemohon_kredit->username_anggota; ?></td>
                                            <td><?php echo $pemohon_kredit->alamat; ?></td>
                                            <td><?php echo $pemohon_kredit->no_telp; ?></td>
                                            <td><?php echo $pemohon_kredit->jenis_kelamin; ?></td>
                                            <td>
                                                <button type="submit" class="btn btn-info btn-xs" data-toggle="modal"
                                                        data-target="#editAnggota<?php echo $pemohon_kredit->id_anggota; ?>">
                                                    <i class="fa fa-pencil"> </i> Edit
                                                </button>
                                                <a href="javascript:if(confirm('Hapus Data?')){document.location='<?php echo base_url(); ?>/Bendahara/Data_anggota/hapus_dataAnggota/<?php echo $pemohon_kredit->id_anggota; ?>'}"
                                                   class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>
                                                    Delete </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /FORM TAMBAH ANGGOTA-->
        <div class="modal fade" id="tambahAnggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Tambah Anggota</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <button class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form action="<?php echo base_url(); ?>Bendahara/Data_anggota/tambah_dataAnggota"
                              method="post" class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Anggota</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" id="nama_anggota" name="nama_anggota"
                                           placeholder="Nama Anggota">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" id="username_anggota"
                                           name="username_anggota" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="password" class="form-control" id="password_anggota"
                                           name="password_anggota" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Gaji</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" id="jml_gaji" name="jml_gaji"
                                           placeholder="Jumlah Gaji">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control" id="alamat" name="alamat"
                                              placeholder="Alamat"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">No. Telephone</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                                           placeholder="No. Telephone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="jenis_kelamin">
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="reset" class="btn btn-primary">Reset</button>
                                    <button type="submit" class="btn btn-success">Tambah Anggota</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- /FORM EDIT ANGGOTA-->
        <?php
        foreach ($sql1->result_array() as $item):
            $id_anggota = $item['id_anggota'];
            $nama_anggota = $item['nama_anggota'];
            $username_anggota = $item['username_anggota'];
            $password_anggota = $item['password_anggota'];
            $alamat = $item['alamat'];
            $no_telp = $item['no_telp'];
            $jenis_kelamin = $item['jenis_kelamin'];
            ?>
            <div class="modal fade" id="editAnggota<?php echo $id_anggota; ?>" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form Edit Data Anggota</h2>
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
                                  action="<?php echo base_url(); ?>/Bendahara/Data_anggota/edit_dataAnggota/<?php echo $id_anggota; ?>"
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

        <div class="row"></div>
    </div>

    <?php $this->load->view('bendahara/footer/footer') ?>

</body>
</html>
