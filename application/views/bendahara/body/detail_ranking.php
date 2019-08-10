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
                                    <h2 style="height: 25px;">Detail Data Ranking</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <p class="text-muted font-13 m-b-30">
                                    </p>
                                    <button type="button" data-toggle="modal" data-target="#modal-ranking" id="btn-rekomendasi" class="btn btn-success btn-lg hidden"><i class="fa fa-plus-square"> Buat
                                        Rekomendasi</i></button>

                                        <table class="table table-striped table-bordered bulk_action">
                                            <thead>
                                            <tr>
                                                <th>Pilih data rekomendasi</th>
                                                <th>Ranking</th>
                                                <th>Id Pengajuan</th>
                                                <th>Tgl Pengajuan</th>
                                                <th>Nama Anggota</th>
                                                <th>Jumlah Kredit</th>
                                                <th>Lama Angsuran</th>
                                                <th>Sisa utang di tempat lain</th>
                                                <th>Nilai Preferensi</th>
                                                <th>Status Kelayakan</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $ranking = 1;
                                            foreach ($pengajuan_kredit->result_array() as $data) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox"
                                                               class="icheckbox_flat-green checkbox-rekomendasi <?php echo ($data['id_persetujuan'] != 3) ? '' : 'hidden' ?>"
                                                               name="rekomendasi[]"
                                                               value="<?php echo $data['id_pengajuan']; ?>"
                                                               data-rank="<?= $ranking; ?>">

                                                        <input type="hidden" id="id-anggota-<?php echo $data['id_pengajuan'] ?>" value="<?php echo $data['id_anggota'] ?>">
                                                    </td>
                                                    <td id="ranking-<?php echo $data['id_pengajuan'] ?>"
                                                        data-rank="<?php echo $ranking ?>">
                                                        <?= $ranking++; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data['id_pengajuan']; ?> <input name="id_pengajuan"
                                                                                                    value="<?php echo $data['id_pengajuan']; ?>" hidden>
                                                    </td>
                                                    <td><?php echo $data['tgl_pengajuan']; ?> <input
                                                                name="tgl_pengajuan"
                                                                value="<?php echo $data['tgl_pengajuan']; ?>" hidden></td>
                                                    <td><?php echo $data['nama_anggota']; ?><input name="nama_anggota"
                                                                                                   value="<?php echo $data['nama_anggota']; ?>" hidden>
                                                    </td>
                                                    <td><?php echo "Rp. " . number_format($data['jml_kredit'], 0, ".", "."); ?>
                                                        <input name="jml_kredit"
                                                               value="<?php echo $data['jml_kredit']; ?>" hidden></td>
                                                    <td><?php echo $data['lama_angsuran']; ?><input name="lama_angsuran"
                                                                                                    value="<?php echo $data['lama_angsuran']; ?>" hidden>
                                                    </td>
                                                    <td><?php echo "Rp. " . number_format($data['sisa_utang_di_tempat_lain'], 0, ".", "."); ?>
                                                        <input name="sisa_utang_di_tempat_lain"
                                                               value="<?php echo $data['sisa_utang_di_tempat_lain']; ?>" hidden>
                                                    </td>
                                                    </td>
                                                    <td><?php echo $data['nilai_preferensi']; ?><input
                                                                name="nilai_preferensi"
                                                                value="<?php echo $data['nilai_preferensi']; ?>" hidden></td>
                                                    <td><?php echo $data['keterangan']; ?><input name="keterangan"
                                                                                                 value="<?php echo $data['keterangan']; ?>" hidden>
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
        <div class="modal fade" id="modal-ranking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h5 class="modal-title" id="exampleModalLabel">Buat Rekomendasi?</h5>
                    </div>
                    <div class="modal-body">Apakah anda yakin membuat rekomendasi?</div>
                    <div class="modal-footer">
                        <form action="<?php echo base_url(); ?>Bendahara/Data_ranking/updateRekomendasi"
                              method="post">
                            <input type="text" name="ids" id="input-rekomendasi" hidden>
                            <button type="submit" class="btn btn-primary">Ya, buat rekomendasi</button>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('bendahara/footer/footer') ?>

        <script>
            var btnRekomendasi = $('#btn-rekomendasi');

            $('input[type=checkbox]').change(function () {
                getData();
            });

            window.onload = function () {
                getData()
            }

            function getData() {
                var checkboxes = $('input[type=checkbox]');
                var length = checkboxes.length;
                var data = [];

                for (var i = 0; i < length; i++) {
                    data[i] = {
                        id: checkboxes[i].value,
                        rank: $('#ranking-' + checkboxes[i].value).data('rank'),
                        anggota: $('#id-anggota-' + checkboxes[i].value).val(),
                        status: checkboxes[i].checked,
                    };
                }

                $('#input-rekomendasi').val(JSON.stringify(data));
                btnRekomendasi.removeClass('hidden');
            }

        </script>

</body>
</html>
