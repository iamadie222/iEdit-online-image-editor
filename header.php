<?php 
require_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>iEdit - Online Image Editing Tool</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/all.css" rel="stylesheet">
    <link href="css/notie.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/notie.min.js"></script>
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">iEdit</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="features.php">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="public-gallery.php">Public Gallery</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="ieditor.php">iEditor</a>
            </li>
            
            

            <?php 
            	if(isset($_SESSION['userLogged'])){
            		//echo "welcome ".$_SESSION['userLogged'];
			?>
				<li class="nav-item">
	              <a class="nav-link" href="logout.php">Logout</a>
	            </li>
            <?php
            	}else{
			?>
				<li class="nav-item">
	              <a class="nav-link" href="login.php">Login</a>
	            </li>
	            <li class="nav-item">
	              <a class="nav-link" href="register.php">Register</a>
	            </li> 
            <?php
            	}
            ?>           
          </ul>
        </div>
      </div>
    </nav>