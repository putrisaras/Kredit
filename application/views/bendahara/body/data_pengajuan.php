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
        <div class="right_col" role="main" style="min-height: 587px;">
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
                                    <h2 style="height: 25px;">Data Pengajuan Kredit</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <p class="text-muted font-13 m-b-30">
                                    </p>
                                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal"
                                            data-target="#tambahPengajuan"><i class="fa fa-plus-square"> Tambah
                                            Pengajuan</i>
                                    </button>
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Id Pengajuan</th>
                                            <th>Tgl Pengajuan</th>
                                            <th>Nama Anggota</th>
                                            <th>Jumlah Kredit</th>
                                            <th>Lama Angsuran</th>
                                            <th>Sisa utang di tempat lain</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($pengajuan_kredit->result_array() as $data) {
                                            ?>
                                            <tr>
                                                <td><?php echo $data['id_pengajuan']; ?></td>
                                                <td><?php echo $data['tgl_pengajuan']; ?></td>
                                                <td><?php echo $data['nama_anggota']; ?></td>
                                                <td><?php echo "Rp. " . number_format($data['jml_kredit'], 0, ".", "."); ?></td>
                                                <td><?php echo $data['lama_angsuran']; ?></td>
                                                <td><?php echo "Rp. " . number_format($data['sisa_utang_di_tempat_lain'], 0, ".", "."); ?></td>
                                                <td>
                                                    <button type="submit" class="btn btn-info btn-xs"
                                                            data-toggle="modal"
                                                            data-target="#editPengajuan<?php echo $data['id_pengajuan']; ?>">
                                                        <i class="fa fa-pencil"> </i> Edit
                                                    </button>
                                                    <a href="javascript:if(confirm('Hapus Data?')){document.location='<?php echo base_url(); ?>/Bendahara/Data_pengajuan/hapus_dataPengajuan/<?php echo $data['id_pengajuan']; ?>'}"
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
            <!-- /FORM TAMBAH PENGAJUAN-->
            <div class="modal fade" id="tambahPengajuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form Tambah Pengajuan</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <button class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br/>
                            <form action="<?php echo base_url(); ?>Bendahara/Data_pengajuan/tambah_dataPengajuan"
                                  method="post" class="form-horizontal form-label-left">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Anggota</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select class="form-control" id="nama_anggota" name="nama_anggota">
                                            <?php foreach ($pemohon_kredit->result() as $data) { ?>
                                                <option value="<?php echo $data->id_anggota; ?>"><?php echo $data->nama_anggota; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Kredit</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" id="jml_kredit"
                                               name="jml_kredit" placeholder="Jumlah Kredit">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Lama Angsuran</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" id="lama_angsuran"
                                               name="lama_angsuran" placeholder="Lama Angsuran">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Sisa Utang di Tempat
                                        Lain</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" id="sisa_utang_di_tempat_lain"
                                               name="sisa_utang_di_tempat_lain"
                                               placeholder="Sisa Utang di Tempat Lain">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                        <button type="submit" class="btn btn-success">Tambah Data Pengajuan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /FORM EDIT ANGGOTA-->
            <?php
            foreach ($pengajuan_kredit->result_array() as $item):

                $nama_anggota = $item['nama_anggota'];
                $id_pengajuan = $item['id_pengajuan'];
                $jml_kredit = $item['jml_kredit'];
                $lama_angsuran = $item['lama_angsuran'];
                $sisa_utang_di_tempat_lain = $item['sisa_utang_di_tempat_lain'];
                ?>
                <div class="modal fade" id="editPengajuan<?php echo $id_pengajuan; ?>" tabindex="-1" role="dialog"
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
                                      action="<?php echo base_url(); ?>/Bendahara/Data_pengajuan/edit_dataPengajuan/<?php echo $id_pengajuan; ?>"
                                      method="post">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Anggota</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" name="nama_anggota"
                                                   value="<?php echo $nama_anggota; ?>" placeholder="Nama Anggota">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Kredit</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" name="jml_kredit"
                                                   value="<?php echo $jml_kredit ; ?>" placeholder="Jumlah kredit">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Lama Angsuran</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" name="lama_angsuran"
                                                   value="<?php echo $lama_angsuran ; ?>" placeholder="Lama Angsuran">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sisa Utang Di Tempat Lain</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" name="sisa_utang_di_tempat_lain"
                                                   value="<?php echo $sisa_utang_di_tempat_lain; ?>" placeholder="Sisa Utang Di Tempat Lain">
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
