<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> EMEDIREC SYSTEM </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo $resources;?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $resources;?>font-awesome/css/font-awesome.min.css">
    <!-- Custome -->
    <link rel="stylesheet" href="<?php echo $resources;?>css/custom.css">
    <link rel="stylesheet" href="<?php echo $resources;?>css/font.css">
    <!-- Ionicons -->
    <!--<link rel="stylesheet" href="<?php echo $resources;?>ionicons/css/ionicons.min.css">-->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $resources;?>dist/css/AdminLTE.min.css">
    
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo $resources;?>dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
 <!--   <link rel="stylesheet" href="<?php echo $resources;?>plugins/iCheck/flat/blue.css">-->
    <!-- Morris chart -->
    <!--<link rel="stylesheet" href="<?php echo $resources;?>plugins/morris/morris.css">-->
    <link rel="stylesheet" href="<?php echo $resources;?>css/jquery-ui.css">
    <!-- jvectormap -->
    <!--<link rel="stylesheet" href="<?php echo $resources;?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">-->
    <!-- Date Picker -->
    <!--<link rel="stylesheet" href="<?php echo $resources;?>plugins/datepicker/datepicker3.css">-->
    <!-- Daterange picker -->
    <!--<link rel="stylesheet" href="<?php echo $resources;?>plugins/daterangepicker/daterangepicker-bs3.css">-->
    <!-- bootstrap wysihtml5 - text editor -->
    <!--<link rel="stylesheet" href="<?php echo $resources;?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">-->
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo $resources;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo $resources;?>js/jquery-ui.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
   <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo $base_url;?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img style="width: 40px;" src="<?php echo @$hospitalLogo;?>"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg" style="font-family: Moul !important;"><b> <?php echo @$hospitalName;?> </b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
	    <span style="font-size: 15px;"></span>
          </a>

