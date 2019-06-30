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
                                    <h2 style="height: 25px;">Data Ranking</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <p class="text-muted font-13 m-b-30">
                                    </p>
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Id Pengajuan</th>
                                            <th>Tgl Pengajuan</th>
                                            <th>Nama Anggota</th>
                                            <th>Jumlah Kredit</th>
                                            <th>Lama Angsuran</th>
                                            <th>Sisa utang di tempat lain</th>
                                            <th>Nilai Preferensi</th>
                                            <th>Status Kelayakan</th>
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
                                                <td><?php echo $data['nilai_preferensi']; ?></td>
                                                <td></td>
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

            <!-- /top tiles -->
            <div class="row"></div>
        </div>

        <?php $this->load->view('bendahara/footer/footer') ?>

</body>
</html>
