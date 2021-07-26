<?php 
include("./config.php"); 
if (@$_SESSION['users_id'] != ""){
  echo "<meta http-equiv='refresh' content='0;admin/index.php'>";
}
if (@$_POST['registerProses']){
    extract($_POST);
    var_dump($_POST);
    $password = sha1(md5($password));
    $config = new Config();
    $saveData = $config->con->query("INSERT INTO tb_users(users_nama, email, password, role_id) VALUES('".$users_nama."', '".$email."', '".$password."', 2)");
    if ($saveData){
        header("location:fLogin.php?status=succ&msg=Pendaftaran berhasil!", true, 301);
    }else{
      header("location:fRegister.php?status=err&msg=Silahkan ulangi pendaftaran!", true, 301);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=base_name?> | Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url?>assets/back/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?=base_url?>" class="h1"><?=base_name?></a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Register a new membership</p>

        <?php if (@$_GET['status'] == "err"){ ?>
            <p class="login-box-msg">
                <div class="alert alert-danger">
                    <span class="fas fa-times"></span> <?=@$_GET['msg']?>
                </div>
            </p>
        <?php } ?>

      <form action="fRegister.php?" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="users_nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
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
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="registerProses" value="1">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="<?=base_url?>fLogin.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?=base_url?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url?>assets/back/js/adminlte.min.js"></script>
</body>
</html>
