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
                </div>
                <div class="clearfix"></div>
                <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2 style="height: 25px;">Data Piutang Anggota Koperasi</h2>
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
                                        <th>Id Anggota</th>
                                        <th>Nama</th>
                                        <th>Sisa Utang di koperasi</th>
                                        <th>Lama Angsuran</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $total_piutang = 0;
                                    foreach ($sql1->result() as $anggota) {
                                        $total_piutang += $anggota->sisa_utang_di_koperasi;?>
                                        <tr>
                                            <td><?php echo $anggota->id_anggota; ?></td>
                                            <td><?php echo $anggota->nama_anggota; ?></td>
                                            <td><?php echo "Rp. ". number_format($anggota->sisa_utang_di_koperasi,0,".","."); ?></td>
                                            <td><?php echo $anggota->total_lama_angsuran; ?></td>
                                            <td>
                                                <button type="submit" class="btn btn-info btn-xs" data-toggle="modal"
                                                        data-target="#editPiutang<?php echo $anggota->id_anggota; ?>">
                                                    <i class="fa fa-pencil"> </i> Edit
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            Total Modal
                                        </td>
                                        <td colspan="3">
                                            <?= "Rp. ". number_format($total_piutang,0,".","."); ?>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /FORM EDIT GAJI-->
        <?php
        foreach ($sql1->result_array() as $item):
            $id_anggota = $item['id_anggota'];
            $nama_anggota = $item['nama_anggota'];
            $sisa_utang_di_koperasi = $item['sisa_utang_di_koperasi'];
            $total_lama_angsuran= $item['total_lama_angsuran'];
            ?>
            <div class="modal fade" id="editPiutang<?php echo $id_anggota; ?>" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form Edit Data Piutang</h2>
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
                                  action="<?php echo base_url(); ?>/index.php/Bendahara/Data_piutang/edit_dataPiutang/<?php echo $id_anggota; ?>"
                                  method="post">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Anggota</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="nama_anggota"
                                               value="<?php echo $nama_anggota; ?>" placeholder="Nama Anggota" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Sisa Utang</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="sisa_utang_di_koperasi"
                                               value="<?php echo $sisa_utang_di_koperasi; ?>"
                                               placeholder="Sisa Utang di Koperasi">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Lama Angsuran</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="total_lama_angsuran"
                                               value="<?php echo $total_lama_angsuran; ?>"
                                               placeholder="Lama Angsuran">
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

        <?php $this->load->view('bendahara/footer/footer') ?>

</body>
</html>
