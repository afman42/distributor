<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Masuk</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php  echo base_url('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php  echo base_url('adminlte/bower_components/font-awesome/css/font-awesome.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php  echo base_url('adminlte/bower_components/Ionicons/css/ionicons.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php  echo base_url('adminlte/dist/css/AdminLTE.min.css');?>">
  <!-- iCheck -->
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Selamat Datang</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan Masuk</p>

    <form action="<?= base_url('index.php/loginadmin/login');?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="row">
        <div class="col-xs-8"></div>
        <!-- /.col -->
        <div class="col-xs-4">

          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  
    
    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php  echo base_url('adminlte/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php  echo base_url('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- iCheck -->

</body>
</html>
