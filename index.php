<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tes Bootcamp Kloter 3</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/ionicons.min.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <logo class="logo">
      <span class="logo-mini"><b>Db</b></span>
      <span class="logo-lg"><b>Database</b></span>
    </logo>
    <nav class="navbar navbar-static-top">
      <button class="btn sidebar-toggle" data-toggle="push-menu"></button>
        
    </nav>
  </header>
    <section class="sidebar main-sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Aditya Aulia Anza</p>
          <a href="logout.php"><button type="button" class="btn btn-xs btn-success"> Log Out</button></a>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header text-center">Navigation Menu</li>
<?php
$li=isset($_GET['p']) ? $_GET['p'] : 'home';
?>
        <li class="<?php if($li=='home') echo "active"; ?>">
          <a href="index.php">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>
        <li class="<?php if($li=='region') echo "active"; ?>">
          <a href="index.php?p=region">
            <i class="fa fa-list"></i> <span>Region</span>
          </a>
        </li>
        <li class="<?php if($li=='person') echo "active"; ?>">
          <a href="index.php?p=person">
            <i class="fa fa-user"></i> <span>Person</span>
          </a>
        </li>
        <li class="<?php if($li=='data') echo "active"; ?>">
          <a href="index.php?p=data">
            <i class="fa fa-university"></i> <span>Data Penduduk</span>
          </a>
        </li>
      </ul>
    </section>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
<?php
  if(isset($_SESSION['user'])){
    $page=isset($_GET['p']) ? $_GET['p'] : 'home';
    if($page=='home') include ('home.php');
    if($page=='region') include ('region.php');
    if($page=='person') include ('person.php');
    if($page=='data') include ('datapenduduk.php');
  }
  else {
?>
<script type="text/javascript">window.location.href="login.php";</script>
<?php
  }
?>
    </section>
  </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/adminlte.min.js"></script>
</body>
</html>
