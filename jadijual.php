<?php
session_start();
require 'function.php';
if($_SESSION['level']==""){
		header("location: index.php");
	} 

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pasar Wisata/Seller</title>
    <!-- Favicon-->
    <link rel="shorcut icon" href="favicon.ico" />
    <link rel="icon" type="image/png" href="ico/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="ico/favicon-16x16.png" sizes="16x16" />  
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Css -->
    <link rel="stylesheet" href="css/baru.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/282f37c3b4.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="bg-info p-2 text-dark bg-opacity-10">
    <!-- Navigation-->
    <nav class="navbar navbar-light stiky-top ">
  <div class="container-fluid">  
    <a class="navbar-brand fs-6" href="index.php" ><img src="assets/img/LOGOBARU.png" alt="" width="25" height="25" class="d-inline-block align-text-top"> <font face="Amina Reska" style="color: #c08457"; size="3" >Pasar Wisata | seller</font></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h1 class="offcanvas-title" id="offcanvasNavbarLabel"><font face="Pink Chicken" style="color: #c08457">MENU</font></h1>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <?php
        if($_SESSION['level']=='admin'){?>
        <li class="nav-item">
         <a class="nav-link active" aria-current="page" href="admin/home.php"><font face="Pink Chicken" style="color: #c08457" size="5">Dashboard Admin</font></a>
        </li>
        <?php
        }
        ?>
        <li class="nav-item">
         <a class="nav-link active" aria-current="page" href="index.php"><font face="Pink Chicken" style="color: #c08457" size="5">Home</font></a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="produk.php"><font face="Pink Chicken" style="color: #c08457"  size="5">Product</font></a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="jadijual.php"><font face="Pink Chicken" style="color: #c08457" size="5">Seller</font></a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="Faq.php"><font face="Pink Chicken" style="color: #c08457"  size="5">FAQ</font></a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="logout.php"><font face="Pink Chicken" style="color: #c08457"  size="5">Logout</font></a>
        </li>
  </ul>
      </div>
    </div>
  </div>
</nav>

<div class="d-flex justify-content-center shadow p-3 mb-5"><embed type="application/pdf" src="dokumen/Seller.pdf" width="500" height="700"></embed><div class="d-flex justify-content-end"><a class="btn btn-warning" href="https://api.whatsapp.com/send?phone=+6281394671261" role="button">
  <font face="Pink Chicken" style="color: #fffff" size="5">
<br>
<br>
<br>
K
<br>
i
<br>
r
<br>
i
<br>
m
<br>
<br>
<br>
K
<br>
e
<br>
s
<br> 
i
<br>
n
<br>
i
<br>
<br>
</font>
<img src="assets/img/whatsapp.png" alt="" width="30" height="30" >
</a></div>
  </div>

  <div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
      </a>
      <span class="text-muted"><font face="Amina Reska" size="2">&copy; Pasar Wisata</font></span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-1"><a href="https://api.whatsapp.com/send?phone=+6281394671261" class=""><img src="assets/img/whatsapp.png" alt="" width="24" height="24" ></a></li>
      <li class="ms-1"><a href="https://www.instagram.com/pasarwisata.pangandaran/" class=""><img src="assets/img/instagram.png" alt="" width="24" height="24" ></a></li>
      <li class="ms-1"><a href="https://mail.google.com/mail/u/0/?hl=en/#inbox" class=""><img src="assets/img/email.png" alt="" width="24" height="24" ></a></li>
    </ul>
  </footer>
</div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  <!-- AOS -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>