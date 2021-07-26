<?php 
include("./config.php"); 
if (@$_SESSION['users_id'] != ""){
  echo "<meta http-equiv='refresh' content='0;admin/index.php'>";
}
if (@$_POST['loginProses']){
    extract($_POST);
    $password = sha1(md5($password));
    $config = new Config();
    $cekUser = $config->con->query("SELECT * FROM tb_pengguna WHERE email='".$email."' AND password='".$password."'");

    if ($cekUser->num_rows > 0){
      $cekUser                = $cekUser->fetch_array();
      $_SESSION['users_id']   = $cekUser['users_id'];
      $_SESSION['users_nama'] = $cekUser['users_nama'];
      $_SESSION['points']     = $cekUser['points'];
      $_SESSION['image']      = $cekUser['image'];
      $_SESSION['email']      = $cekUser['email'];
      $_SESSION['password']   = $cekUser['password'];
      $_SESSION['role_id']    = $cekUser['role_id'];

      header("location:admin/index.php", true, 301);
    }else{
      header("location:fLogin.php?status=err&msg=Username atau password salah!", true, 301);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=@base_name?> | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=@base_url?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=@base_url?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=@base_url?>assets/back/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?=@base_url?>" class="h1"><?=@base_name?></a>
    </div>
    <div class="card-body">
    <?php if (@$_GET['status'] == "err"){ ?>
        <p class="login-box-msg">
            <div class="alert alert-danger">
                <span class="fas fa-times"></span> <?=@$_GET['msg']?>
            </div>
        </p>
    <?php }else if  (@$_GET['status'] == "succ"){ ?>
        <p class="login-box-msg">
            <div class="alert alert-success">
                <span class="fas fa-check"></span> <?=@$_GET['msg']?>
            </div>
        </p>
    <?php } ?>

      <form action="fLogin.php?" method="POST">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8"></div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="loginProses" value="submit">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-0">
        <a href="<?=base_url?>fRegister.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=@base_url?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=@base_url?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=@base_url?>assets/back/js/adminlte.min.js"></script>
</body>
</html>



