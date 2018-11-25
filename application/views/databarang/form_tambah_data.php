          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo site_url('admindatabarang'); ?>">Data Barang</a>
            </li>
            <li class="breadcrumb-item active">Form Tambah Data Barang</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
      
              Form Tambah Data Barang</div>
            <div class="card-body">
              <?php 
              
                echo validation_errors(); 
              ?>
              <?php echo form_open_multipart(); ?>

               <div class="form-group">
                <label>Pilih Kategori</label>
                <?php 

                foreach($kategori as $row){
                   
                   $option[$row->id_kategori]=$row->nama_kategori;

                } 

                echo form_dropdown('id_kategori',$option,null,'class="form-control"');

                ?>
              </div>


              <div class="form-group">
                <label>Nama Barang</label>
                <?php echo form_input('nb',set_value('nb'),'class="form-control"'); ?>
              </div>

              <div class="form-group">
                <label>Harga Barang</label>
                <?php echo form_input('harga_barang',set_value('harga_barang'),'class="form-control"'); ?>
              </div>

              <div class="form-group">
                <label>Spesifikasi Barang</label>
                <?php echo form_textarea('spek_barang',set_value('spek_barang'),'class="form-control"'); ?>
              </div>

               <div class="form-group">
              <label>Status Stok Barang</label><br>
              <div class="custom-control custom-radio custom-control-inline">
                <?php echo form_radio('status','tersedia',false,'id="customRadioInline1" class="custom-control-input"'); ?>
                <label class="custom-control-label" for="customRadioInline1">tersedia</label>
              </div>

              <div class="custom-control custom-radio custom-control-inline">
               <?php echo form_radio('status','habis',false,'id="customRadioInline2" class="custom-control-input"'); ?>
                <label class="custom-control-label" for="customRadioInline2">habis</label>
              </div>
              </div>

              <div class="form-group">
                <label>Jumlah Barang</label>
                <?php echo form_input('jumlah_barang',set_value('jumlah_barang'),'class="form-control"'); ?>
              </div>

              <div class="form-group">
                <label>Uploud Gambar</label>
                <?php echo form_upload('gambar_barang',null,'class="form-control"'); ?>
              </div>

              <?php echo form_submit('btn','Submit','class="btn btn-primary mb-2"'); ?>

              <?php echo form_close(); ?>

            <div class="card-footer small text-muted">Form Tambah Data Barang</div>
          </div>
          </div>