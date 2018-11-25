          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo site_url('admindatauser'); ?>">Data User</a>
            </li>
            <li class="breadcrumb-item active">Form Edit Data user</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
      
              Form Edit Data User</div>
            <div class="card-body">
              
              <?php 

                  $username=$edit->firstName;
                  $status=$edit->status;
                  $statuson=false;
                  $statusoff=false;

                  if($status == "on") {
                    
                      $statuson=true;

                  }elseif($status == "off"){

                      $statusoff=true;
                  }
              ?>

              <?php echo form_open(); ?>

              <div class="form-group">
                <label>Username</label>
                <?php echo form_input('username',$username,'class="form-control" readonly'); ?>
              </div>

              <div class="form-group">
              <label>Status</label>
              <div class="custom-control custom-radio custom-control-inline">
                <?php echo form_radio('status','on',$statuson,'id="customRadioInline1" class="custom-control-input"'); ?>
                <label class="custom-control-label" for="customRadioInline1">on</label>
              </div>

              <div class="custom-control custom-radio custom-control-inline">
               <?php echo form_radio('status','off',$statusoff,'id="customRadioInline2" class="custom-control-input"'); ?>
                <label class="custom-control-label" for="customRadioInline2">off</label>
              </div>
              </div>

              <?php echo form_submit('btn','Update','class="btn btn-primary mb-2"'); ?>

              <?php echo form_close(); ?>

            <div class="card-footer small text-muted">Form Edit Data User</div>
          </div>
          </div>