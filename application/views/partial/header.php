<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>my shop</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url(); ?>template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url(); ?>template/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>template/css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top" class="sidebar-toggled">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="<?php echo site_url(); ?>">my shop</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
      
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <?php 
               $nama=$this->session->has_userdata('firstName') ? $this->session->userdata('firstName') : false;

               if($nama){
                  
                  echo "<span class='dropdown-item'><b>Hai ,</b>$nama</span>";
                } 
            ?>
            <div class="dropdown-divider"></div>

            <?php 

              $iduserHeader=$this->session->has_userdata('id_user') ? $this->session->userdata('id_user') : false; 

              if($iduserHeader):
            ?>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            <?php else:?>  
            <a class="dropdown-item" href="<?php echo site_url('panel/login'); ?>">Silahkan Login</a>
          <?php endif; ?>
          </div>
        </li>
        
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav toggled">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo site_url(); ?>">
            <i class="fas fa-home"></i>
            <span>Home</span>
          </a>
        </li>

        <?php 

              $levelHeader=$this->session->has_userdata('level') ? $this->session->userdata('level') : false;

              if($levelHeader == "superadmin"):
        ?>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="far fa-folder"></i>
            <span>Pages Admin</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admindatauser'); ?>">Data User</a>
            <a class="dropdown-item" href="<?php echo site_url('admindatakategori'); ?>">Kategori</a>
            <a class="dropdown-item" href="<?php echo site_url('admindatabarang'); ?>">Barang</a>
            <a class="dropdown-item" href="">Pembayaran</a>
          </div>
        </li>
        <?php elseif($levelHeader == "customer"): ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="far fa-folder"></i>
            <span>Pages User</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="">Keranjang Saya</a>
            <a class="dropdown-item" href="">Pembayaran Saya</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-filter"></i>
            <span>kategori</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <?php foreach ($kategorihome as $row):?>
            <a class="dropdown-item" href=""><?php echo $row->nama_kategori; ?></a>
            <?php endforeach; ?>
          </div>
        </li>
        <?php else: ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-filter"></i>
            <span>kategori</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <?php foreach ($kategorihome as $row):?>
            <a class="dropdown-item" href=""><?php echo $row->nama_kategori; ?></a>
            <?php endforeach; ?>
          </div>
        </li>
      <?php endif; ?>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">