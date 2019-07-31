<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/matrix-login.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/image/icon/"/>
    <link href="<?php echo base_url(); ?>assets/login/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/production/images/koperasi.png" type="image/ico"/>

    <title>Koperasi Jnana Partha</title>
</head>

<body class="login">
<div id="loginbox">
    <a><img src="<?php echo base_url(); ?>assets/production/images/koperasi.png"
            style="width: 150px; padding-left: 140px"></a>
    <div class="control-group normal_text"><h4> LOGIN PENGURUS</h4><h3>KOPERASI JNANA PARTHA</h3></div>
    <form id="loginform" class="form-vertical" method="post" action="<?= base_url(); ?>Login_pengurus/login">
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                    <input type="text" class="form-control" name="username_pengurus" placeholder="Username"
                           required=""/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-lock"> </i></span>
                    <input type="password" class="form-control" placeholder="password" name="password_pengurus"
                           required=""/>
                </div>
            </div>
        </div>
        <div>
            <button class="btn btn-success" type="submit" style="margin-left: 160px">Login</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </div>
        <div class="form-actions">
        </div>
        <div class="text-center">
            <?php echo $this->session->flashdata("error"); ?>
        </div>
        <div class="clearfix"></div>
    </form>
</div>
<script src="<?php echo base_url(); ?>assets/login/js/excanvas.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/jquery.ui.custom.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/jquery.flot.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/jquery.flot.resize.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/jquery.peity.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/matrix.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/matrix.dashboard.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/jquery.gritter.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/matrix.interface.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/matrix.chat.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/matrix.form_validation.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/jquery.wizard.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/jquery.uniform.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/matrix.popover.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/login/js/matrix.tables.js"></script>
</body>
</html>
