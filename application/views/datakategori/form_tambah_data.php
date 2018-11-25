          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo site_url('admindatakategori'); ?>">Data Kategori</a>
            </li>
            <li class="breadcrumb-item active">Form Tambah Data kategori</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
      
              Form Tambah Data kategori</div>
            <div class="card-body">
              <?php echo validation_errors(); ?>
              <?php echo form_open(); ?>

              <div class="form-group">
                <label>Nama Kategori</label>
                <?php echo form_input('nama_kategori',set_value('nama_kategori'),'class="form-control"'); ?>
              </div>

              <div class="form-group">
              <label>Status</label>
              <div class="custom-control custom-radio custom-control-inline">
                <?php echo form_radio('status','on',false,'id="customRadioInline1" class="custom-control-input"'); ?>
                <label class="custom-control-label" for="customRadioInline1">on</label>
              </div>

              <div class="custom-control custom-radio custom-control-inline">
               <?php echo form_radio('status','off',false,'id="customRadioInline2" class="custom-control-input"'); ?>
                <label class="custom-control-label" for="customRadioInline2">off</label>
              </div>
              </div>

              <?php echo form_submit('btn','Submit','class="btn btn-primary mb-2"'); ?>

              <?php echo form_close(); ?>

            <div class="card-footer small text-muted">Form Tambah Data kategori</div>
          </div>
          </div>