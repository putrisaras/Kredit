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
                <form action="<?php echo base_url(); ?>Pemohon_kredit/Pengajuan_kredit/tambah_Pengajuan"
                      method="post" class="form-horizontal form-label-left">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Anggota</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" id="nama_anggota" name="nama_anggota">
                                <?php foreach ($anggota->result() as $data) { ?>
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