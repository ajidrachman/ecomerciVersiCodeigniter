<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url(); ?>template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>template/css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <?php echo $this->session->flashdata('notif'); ?>
          <?php echo validation_errors(); ?>
          <?php echo form_open('panel/login'); ?>

            <div class="form-group">
              <div class="form-label-group">
                <?php echo form_input('email',null,'class="form-control" placeholder="Email address" autofocus="autofocus" id="inputEmail"'); ?>
                <label for="inputEmail">Email address</label>
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <?php echo form_password('pw',null,'class="form-control" placeholder="Password" autofocus="autofocus" id="inputPassword"'); ?>
                <label for="inputPassword">Password</label>
              </div>
            </div>

            <?php echo form_submit('btn','Login','class="btn btn-primary btn-block"'); ?>

          <?php echo form_close(); ?>

          <div class="text-center">
            <a class="d-block small mt-3" href="<?php echo site_url('panel/register'); ?>">Register an Account</a>
            <a class="d-block small mt-3" href="<?php echo site_url('home'); ?>">Back to home</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>template/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>template/vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
