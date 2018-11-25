          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo site_url(); ?>">Home</a>
            </li>
            <li class="breadcrumb-item active">Data Barang</li>
          </ol>

           <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5">26 New Messages!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5">11 New Tasks!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5">123 New Orders!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5">13 New Tickets!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
          
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Barang <span class="float-right"><a href="<?php echo site_url('admindatabarang/tambahbarang'); ?>" class="btn btn-outline-primary">Tambah Barang</a></span>
              </div>
            <div class="card-body">
            <?php 
            echo $this->session->flashdata('kesalahanupload');
            echo $this->session->flashdata('insertdatabarang');
            echo $this->session->flashdata('deletebarangsukses');
            echo $this->session->flashdata('deletebaranggagal'); 
            ?>
              <div class="table-responsive">
                <table class="table">

                 <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Nama Kategori</th>
                      <th class="text-center">Nama Barang</th>
                      <th class="text-center">Harga Barang</th>
                      <th class="text-center">Jumlah Barang</th>
                      <th class="text-center">Status Stok</th>
                      <th class="text-center">Action</th>
                 </tr>

                 <?php 
                 $no=1;
                 foreach ($barang as $row):?>
                  <?php $idbarang=$row->id_barang; ?>
                 <tr>
                     <td class="text-center"><?php echo $no; ?></td>
                     <td class="text-center"><?php echo $row->nama_kategori; ?></td>
                     <td class="text-center"><?php echo $row->nama_barang; ?></td>
                     <td class="text-center"><?php echo $row->harga_barang; ?></td>
                     <td class="text-center"><?php echo $row->jumlah_barang; ?></td>
                     <td class="text-center"><?php echo $row->status_stok; ?></td>
                     <td class="text-center">
                       <div class="d-inline-flex">
                       <a class="btn btn-primary" href="<?php echo site_url('admindatabarang/edit/'.$idbarang); ?>">Edit</a>
                       </div>

                        <div class="d-inline-flex mt-1">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#delete<?php echo $idbarang; ?>">
                          Delete
                        </button>
                        </div>

                        <!--Delete Modal-->
                        <div class="modal fade" id="delete<?php echo $idbarang; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">mau dihapus ?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">klik Yes jika mau dihapus</div>
                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="<?php echo site_url('admindatabarang/delete/'.$idbarang); ?>">Yes</a>
                              </div>
                            </div>
                          </div>
                        </div>


                     </td>
                 </tr>
                 <?php $no++; ?>
                 <?php endforeach; ?>
                </table>
              </div>

            <div class="card-footer small text-muted">Data Barang</div>
          </div>
          </div>