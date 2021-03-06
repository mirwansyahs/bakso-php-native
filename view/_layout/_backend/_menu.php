<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge"><?=$data['dataNotifikasi']->num_rows?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-header"><?=$data['dataNotifikasi']->num_rows?> Notifikasi</span>
              <div class="dropdown-divider"></div>
              <?php
              while ($key = $data['dataNotifikasi']->fetch_object()){
                $text = "";
                if ($_SESSION['role_id'] == "2"){
                  $text = "Ada barang yang sedang dikirim";
                }else{
                  $text = "Ada transaksi baru, ayo konfirmasi sekarang";
                }
              ?>
              <a href="<?=base_url?>admin/invoices.php?aksi=view&id=<?=$key->invoices_id?>" class="dropdown-item">
                <i class="fas fa-bell mr-2"></i> <?=$text?>
              </a>
              <div class="dropdown-divider"></div>
              <?php } ?>
            </div>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-user"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-lg">
              <span class="dropdown-header"></span>
              <div class="dropdown-divider"></div>
              <a href="<?=base_url?>admin/profile.php?aksi=edit" class="dropdown-item">
                <div class="media">
                  <img
                  src="<?=base_url?>assets/back/img/<?=($_SESSION['image'] != "")?$_SESSION['image']:'avatar5.png'?>"
                    alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body" style="margin-top: 10px;">
                    <h3 class="dropdown-item-title">
                      <?=$_SESSION['users_nama']?>

                    </h3>
                    <p class="text-sm"><?=$_SESSION['role_id']?></p>
                  </div>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?=base_url?>admin/logout.php" class="dropdown-item dropdown-footer">Keluar</a>
            </div>
          </li>
          <li class="nav-item">
            <a href="<?=base_url?>admin/keranjang.php" class="nav-link">
              <i class="fas fa-shopping-cart"></i>
              
              <span class="badge badge-warning navbar-badge"><?=@count($_SESSION['cart'])?></span>
            </a>
          </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?=@base_url?>assets/back/img/<?=@favicon?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?=@base_name?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url?>assets/back/img/<?=($_SESSION['image'] != "")?$_SESSION['image']:'avatar5.png'?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION['users_nama']?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="<?=base_url?>admin/" class="nav-link <?=($data['judul'] == "Dashboard")?'active':''?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php if ($_SESSION['role_id'] == "2"){ ?>
          <li class="nav-item">
            <a href="<?=base_url?>admin/grid.php" class="nav-link <?=($data['judul'] == "Katalog")?'active' : ''?>">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Katalog Produk
              </p>
            </a>
          </li>
          <?php } ?>
            
          <?php if ($_SESSION['role_id'] == "0"){ ?>
            
          <li class="nav-item">
            <a href="<?=base_url?>admin/produk.php" class="nav-link <?=($data['judul'] == "Produk")?'active' : ''?>">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Data Produk
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url?>admin/voucher.php" class="nav-link <?=($data['judul'] == "Voucher")?'active' : ''?>">
              <i class="nav-icon fas fa-gift"></i>
              <p>
                Voucher
              </p>
            </a>
          </li>

          <li class="nav-item <?=($data['judul'] == "Pengguna")?'menu-open' : ''?>">
            <a href="#" class="nav-link <?=($data['judul'] == "Pengguna")?'active' : ''?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pengguna
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url?>admin/admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url?>admin/pemilik.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pemilik</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url?>admin/user.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          
          <li class="nav-item">
            <a href="<?=base_url?>admin/invoices.php" class="nav-link <?=($data['judul'] == "Invoices")?'active' : ''?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Invoices
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url?>admin/voucher.php" class="nav-link <?=($data['judul'] == "Voucher")?'active' : ''?>">
              <i class="nav-icon fas fa-gifts"></i>
              <p>
                Redeem Voucehr
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url?>admin/chat.php" class="nav-link <?=($data['judul'] == "Chat")?'active' : ''?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Chatting
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url?>admin/profile.php" class="nav-link <?=($data['judul'] == "Profile")?'active' : ''?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

		<div class="content-wrapper">
      	<!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0"><?=$data['judul']?></h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        
        <!-- Main content -->
        <div class="content">
          <div class="container">