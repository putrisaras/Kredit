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
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Data Status Kelayakan</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <p class="text-muted font-13 m-b-30">
                                </p>
                                <table id="" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Id Kelayakan</th>
                                        <th>Batas Atas</th>
                                        <th>Batas Bawah</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($sql1->result() as $status_kelayakan) {
                                        ?>
                                        <tr>
                                            <td><?php echo $status_kelayakan->id_kelayakan; ?></td>
                                            <td><?php echo $status_kelayakan->batas_atas; ?></td>
                                            <td><?php echo $status_kelayakan->batas_bawah; ?></td>
                                            <td><?php echo $status_kelayakan->keterangan; ?></td>
                                            <td>
                                                <button type="submit" class="btn btn-info btn-xs" data-toggle="modal"
                                                        data-target="#editKelayakan<?php echo $status_kelayakan->id_kelayakan; ?>">
                                                    <i class="fa fa-pencil"> </i> Edit
                                                </button>
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
        <!-- /FORM EDIT ANGGOTA-->
        <?php
        foreach ($sql1->result_array() as $item):
            $id_kelayakan = $item['id_kelayakan'];
            $batas_atas = $item['batas_atas'];
            $batas_bawah = $item['batas_bawah'];
            $keterangan = $item['keterangan'];
            ?>
            <div class="modal fade" id="editKelayakan<?php echo $id_kelayakan; ?>" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form Edit Status Kelayakan</h2>
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
                                  action="<?php echo base_url(); ?>/Bendahara/Status_kelayakan/edit_StatusKelayakan/<?php echo $id_kelayakan; ?>"
                                  method="post">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Id Kelayakan</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="id_kelayakan"
                                               value="<?php echo $id_kelayakan; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Batas Atas</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="batas_atas"
                                               value="<?php echo $batas_atas; ?>" placeholder="Batas_atas">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Batas Bawah</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="batas_bawah"
                                               value="<?php echo $batas_bawah; ?>" placeholder="Batas_bawah">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" name="keterangan"
                                               value="<?php echo $keterangan; ?>" placeholder="Keterangan">
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
    </div>
    <!-- /top tiles -->

    <div class="row"></div>
</div>

<?php $this->load->view('bendahara/footer/footer') ?>

</body>
</html>
