<?php 
  session_start();
  include 'config.php';
  if(isset($_SESSION['admin_Id'])) {
      header('Location: Admin/dashboard.php');
  } elseif(isset($_SESSION['user_Id'])) {
      header('Location: Users2/index.php');
  } else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Online Catering Reservation System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets-homepage/img/unnamed.png" rel="icon">
  <link href="assets-homepage/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  
  
  <!-- Vendor CSS Files -->
  <link href="assets-homepage/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets-homepage/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets-homepage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets-homepage/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets-homepage/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets-homepage/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets-homepage/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets-homepage/css/style.css" rel="stylesheet">

  
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+639123456789</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 08AM - 05PM</span></i>
      </div>

      <div class="languages d-none d-md-flex align-items-center">
        <ul>
          <li>Welcome! <a href="#">User</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.php">E-Catering Reservation</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="index.php?#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php?#about">About</a></li>
          <li><a class="nav-link scrollto" href="index.php?#menu">Menu</a></li>
          <!-- <li><a class="nav-link scrollto" href="#specials">Specials</a></li> -->
          <li><a class="nav-link scrollto" href="index.php?#events">Events</a></li>
          <li><a class="nav-link scrollto" href="index.php?#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="login.php">Login</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="index.php? #book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Schedule a reservation</a>

    </div>
  </header><!-- End Header -->


  <?php } ?>