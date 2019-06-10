<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('pemohon_kredit//header/header') ?>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        <!-- Side Bar -->
        <?php $this->load->view('pemohon_kredit//header/sidebar') ?>
        <!-- /Side Bar -->

        <!-- top navigation -->
        <?php $this->load->view('pemohon_kredit//header/navbar') ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3></h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Riwayat Pengajuan Kredit</h2>
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
                                        <th>Jumlah Kredit</th>
                                        <th>Lama Angsuran</th>
                                        <th>Sisa utang di tempat lain</th>
                                        <th>Nilai Normalisasi</th>
                                        <th>Nilai Preferansi</th>
                                        <th>Status Kelayakan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($sql1->result() as $pengajuan_kredit) {
                                        ?>
                                        <tr>
                                            <td><?php echo $pengajuan_kredit->Id_pengajuan; ?></td>
                                            <td><?php echo $pengajuan_kredit->Tgl_pengajuan; ?></td>
                                            <td><?php echo $pengajuan_kredit->Jlm_kredit; ?></td>
                                            <td><?php echo $pengajuan_kredit->Lama_angsuran; ?></td>
                                            <td><?php echo $pengajuan_kredit->Sisa_utang_di_tempat_lain; ?></td>
                                            <td><?php echo $pengajuan_kredit->Nilai_normalisasi; ?></td>
                                            <td><?php echo $pengajuan_kredit->Nilai_preferensi; ?></td>
                                            <td><?php echo $pengajuan_kredit->Status_Kelayakan; ?></td>
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
        <!-- /top tiles -->

        <div class="row"></div>
    </div>

    <?php $this->load->view('pemohon_kredit/footer/footer') ?>

</body>
</html>
