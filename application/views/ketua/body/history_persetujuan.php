<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('ketua/header/header') ?>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        <!-- Side Bar -->
        <?php $this->load->view('ketua/header/sidebar') ?>
        <!-- /Side Bar -->

        <!-- top navigation -->
        <?php $this->load->view('ketua/header/navbar') ?>
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
                                    <h2 style="height: 25px;">History Persetujuan Kredit</h2>
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
                                            <th>No.</th>
                                            <th>Id Rekomendasi</th>
                                            <th>Tanggal Rekomendasi</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no =1;
                                        foreach ($sql1->result_array() as $data) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $data['id_rekomendasi']; ?></td>
                                                <td><?php echo $data['keterangan_rekomen']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>Ketua/History_persetujuan/v_detailPersetujuan/<?= $data['id_rekomendasi']; ?>"><button type="button" class="btn btn-round btn-primary" data-toggle="modal"
                                                                                                                                                                         data-target="#" ><i class="fa fa-file-text-o">    Detail</i>
                                                        </button></a>
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

        <?php $this->load->view('ketua/footer/footer') ?>

</body>
</html>
