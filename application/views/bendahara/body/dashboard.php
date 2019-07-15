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
          <!-- top tiles -->
          <div class="row tile_count">
          </div>
            <br><br>
            <h1 align="center" style="font-family: sans-serif;"><img src="<?php echo base_url();?>assets/production/images/logo.png" style="padding-top: 100px;"></h1>

          <!-- /top tiles -->

              <div class="row">

    </div>

    <?php $this->load->view('bendahara/footer/footer') ?>
	
  </body>
</html>
