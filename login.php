<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/ionicons.min.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/blue.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Database</b></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Sign In</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-4">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Log In</button>
        </div>
      </div>
    </form>
<?php
  if (isset($_POST['login'])) {
    include 'koneksi.php';
    $pass= md5($_POST['password']);
    $cek= mysql_query("SELECT * FROM users WHERE email='$_POST[email]' AND password='$pass'");
    $data= mysql_fetch_array($cek);
    $result= mysql_num_rows($cek);
    if($result==1){
      session_start();
      $_SESSION['user'] = $data['email'];
      header("location:index.php");
    }
    else{
?>
    <script type="text/javascript">alert('Username atau Password Salah')</script>
<?php
    }
  }
?>
  </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
