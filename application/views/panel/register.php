<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url(); ?>template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>template/css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">

          <?php echo validation_errors(); ?>
          <?php echo form_open('panel/register'); ?>

            <div class="form-group">
              <div class="form-row">

                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input('firstName',set_value('firstName'),'id="firstName" class="form-control" placeholder="First name" autofocus="autofocus"'); ?>
                    <label for="firstName">First name</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input('lastName',set_value('lastName'),'id="lastName" class="form-control" placeholder="lastName" autofocus="autofocus"'); ?>
                    <label for="lastName">Last name</label>
                  </div>
                </div>

              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <?php echo form_input('email',set_value('email'),'id="inputEmail" class="form-control" placeholder="Email address"'); ?>
                <label for="inputEmail">Email address</label>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">

                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_password('pw',null,'id="inputPassword" class="form-control" placeholder="Password"'); ?>
                    <label for="inputPassword">Password</label>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_password('re_pw',null,'id="confirmPassword" class="form-control" placeholder="Confirm password"'); ?>
                    <label for="confirmPassword">Confirm password</label>
                  </div>
                </div>

              </div>
            </div>

            <?php echo form_submit('btn','Register','class="btn btn-primary btn-block"'); ?>
          <?php echo form_close(); ?>
          <div class="text-center">
            <a class="d-block small mt-3" href="<?php echo site_url('panel/login'); ?>">Login Page</a>
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
