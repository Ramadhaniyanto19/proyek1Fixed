<?php
session_start();
require_once "../function.php";
// login("admin");
if($_SESSION['level']=="admin"){

	}else{
        header("Location:../index.php");
    } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin HP2WP</title> 
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
    <!-- Css -->
    <link rel="stylesheet" href="css/gayaku.css">
</head>

<!-- <body class="sb-nav-fixed"> -->
<body class="sb-nav-fixed">

     <nav class="sb-topnav navbar navbar-expand navbar-light" style="background-color: #8FD0F6" > 
        <!-- Navbar Brand-->
         <a class="navbar-brand ps-3 fw-bold text-center" href="home.php"><font face="Pink Chicken" style="color: #181818"  size="5">ADMIN HP2WP</font></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-2 me-lg-0" id="sidebarToggle" ><i
                class="fas fa-bars"></i></button>
                
        <p class="navbar-nav ms-auto ms-md-0  me-lg-4"></p>
    </nav>

    <font face="Pink Chicken" style="color: #c08457"  size="3">
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion" style="background-color: #8FD0F6;">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <img src="../assets/img/LOGOBARU.png" width="150px" class="rounded-circle mx-auto" alt="">
                        <a class="nav-link text-dark" href="home.php">
                            <div class="sb-nav-link-icon"><i class="text-dark fas fa-laptop-house"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="produk.php">
                            <div class="sb-nav-link-icon"><i class="text-dark fas fa-umbrella-beach"></i></div>
                            Kelola Product
                        </a>
                        <a class="nav-link" href="data_penjual.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users text-dark"></i></div>
                            Kelola Seller
                        </a>
                        <a class="nav-link" href="kelola_admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users text-dark"></i></div>
                            Kelola Admin Sistem
                        </a>
                        <a class="nav-link" href="../logout.php">
                            <div class="sb-nav-link-icon"><i class="fas text-dark fa-sign-out-alt"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>
</font>