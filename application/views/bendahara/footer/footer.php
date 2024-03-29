<div class="modal fade" id="editBendahara" tabindex="-1" role="dialog"
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
                <form class="form-horizontal form-label-left"  method="post"
                      action="<?php echo base_url(); ?>Login_pengurus/edit_Profil2/">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Id Pengurus</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="id_pengurus"
                                   value="<?= $this->session->userdata('id_pengurus'); ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pengurus</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="nama_pengurus"
                                   value="<?= $this->session->userdata('nama_pengurus'); ?>" required >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="jabatan"
                                   value="<?= $this->session->userdata('jabatan'); ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="email" class="form-control" name="email_pengurus"
                                   value="<?= $this->session->userdata('email_pengurus'); ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="username_pengurus"
                                   value="<?= $this->session->userdata('username_pengurus'); ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="password" class="form-control" name="password_pengurus" id="password_pengurus"
                                   value="<?= $this->session->userdata('password_pengurus'); ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control customcheckbox small">
                            <div class="col-md-9 col-sm-9 col-xs-12" style="padding-left: 150px;">
                                <input type="checkbox" class="custom-control-input" id="customCheck"
                                       onclick="showPasswordPengurus();">
                                <label class="custom-control-label" for="customCheck">Show Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Anda yakin keluar?</h5>
            </div>
            <div class="modal-body">Tekan "logout" jika anda ingin keluar dari halaman ini</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url(); ?>Login_pengurus/logout">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?php echo base_url(); ?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?php echo base_url(); ?>assets/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?php echo base_url(); ?>assets/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.time.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?php echo base_url(); ?>assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?php echo base_url(); ?>assets/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url(); ?>assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url(); ?>assets/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/google-code-prettify/src/prettify.js"></script>
<!-- Datatables -->
<script src="<?php echo base_url(); ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>
<!-- jQuery Tags Input -->
<script src="<?php echo base_url(); ?>assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="<?php echo base_url(); ?>assets/vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="<?php echo base_url(); ?>assets/vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="<?php echo base_url(); ?>assets/vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="<?php echo base_url(); ?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="<?php echo base_url(); ?>assets/vendors/starrr/dist/starrr.js"></script>
<script src="<?php echo base_url(); ?>assets/sweetalert/sweetalert2.all.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>

<script type="text/javascript">
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    function showPasswordPengurus() {
        var x = document.getElementById("password_pengurus");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    var flashdata = $('.flash-data').data('flashdata');
    if (flashdata === "berhasil"){
        Swal.fire({
            title: 'Success',
            text: 'Data Berhasil Di Tambahkan',
            fontSize : '5000px',
            type: 'success'
        });
    } else if (flashdata === "hitung"){
        Swal.fire({
            title: 'Success',
            text: 'Data Rekomendasi Berhasil Di Buat',
            fontSize : '5000px',
            type: 'success'
        });
    }  else if (flashdata === "gagalhitung"){
        Swal.fire({
            title: 'Failure',
            text: 'Data Rekomendasi Gagal Di Buat',
            fontSize : '5000px',
            type: 'error'
        });
    }else if (flashdata === "updated"){
        Swal.fire({
            title: 'Success',
            text: 'Data Berhasil Di Edit',
            fontSize : '5000px',
            type: 'success'
        });
    } else if (flashdata === "failure"){
        Swal.fire({
            title: 'Failure',
            text: 'Data Gagal Di Update',
            fontSize : '5000px',
            type: 'error'
        });
    }
    else if (flashdata === "gagal"){
        Swal.fire({
            title: 'Gagal',
            text: 'Data Gagal Di Tambah',
            fontSize : '5000px',
            type: 'error'
        });
    }
    $(document).on("click", "#deleteAnggota", function () {
        var id_anggota = $(this).data('id');
        console.log(id_anggota);
        Swal.fire({
            title: 'Apa Anda yakin?',
            text: "Apakah anda ingin menghapus data ini?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url();?>Bendahara/Data_anggota/hapus_dataAnggota/",
                    data: {'id_anggota':id_anggota},
                    success: function () {
                        Swal.fire('Deleted!',
                            'Your file has been deleted.',
                            'success').then((willDelete) => {
                            if (willDelete) {
                                window.location.href = '<?= base_url(); ?>Bendahara/Data_anggota/index';
                            }
                        });
                    }
                });
            } else {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        });
    });
    $(document).on("click", "#deletePengajuan", function () {
        var id_pengajuan = $(this).data('id');
        console.log(id_pengajuan);
        Swal.fire({
            title: 'APe Anda yakin?',
            text: "Apakah anda ingin menghapus data ini?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url();?>Bendahara/Data_pengajuan/hapus_dataPengajuan/",
                    data: {'id_pengajuan':id_pengajuan},
                    success: function () {
                        Swal.fire('Deleted!',
                            'Your file has been deleted.',
                            'success').then((willDelete) => {
                            if (willDelete) {
                                window.location.href = '<?= base_url(); ?>Bendahara/Data_pengajuan/index';
                            }
                        });
                    }
                });
            } else {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        });
    });
    $(document).on("click", "#hitungspk", function () {
        var id_anggota = $(this).data('id');
        console.log(id_anggota);
        Swal.fire({
            title: 'Ranking data Pengajuan?',
            text: "Apakah anda ingin melakukan perankingan?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url();?>Bendahara/Data_pengajuan/hitungSPK",
                    success: function () {
                        Swal.fire('Berhasil',
                            'Perankingan data pengajuan telah berhasil dilakukan',
                            'success').then((willDelete) => {
                            if (willDelete) {
                                window.location.href = '<?= base_url(); ?>Bendahara/Data_ranking/index';
                            }
                        });
                    }
                });
            } else {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        });
    });
</script>