<?php 
session_start();
if(empty($_SESSION['adm']))
{
  header("location:login");
}
require "fx.php";
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="https://bs-travel.id/wp-content/uploads/2023/12/Logo-BST-Final.png">
  <link rel="icon" type="image/png" href="https://bs-travel.id/wp-content/uploads/2023/12/Logo-BST-Final.png">
  <title>
    BST - ADMIN
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../../material/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../material/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../../material/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. --><!-- 
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script> -->
</head>

<body class="g-sidenav-show  bg-gray-300">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-light" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="https://bs-travel.id/wp-content/uploads/2023/12/Logo-BST-Final.png" class="navbar-brand-img h-100" alt="main_logo">
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-dark " href="./">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-home-alt opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark " href="pelanggan">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-users-cog opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pelanggan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark " href="paket">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-plane opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Paket Perjalanan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark " href="bayar">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-money-check opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pembayaran</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark " href="mitra">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-user-secret opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Mitra</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark " href="web">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-globe opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pengaturan Website</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark " href="web">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-donate opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Keuangan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark " href="akun">
            <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-user-cog opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pengaturan Akun</span>
          </a>
        </li>

    <div class="sidenav-footer w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn btn-danger mt-4 w-100" href="keluar" type="button"><i class="fas fa-sign-out-alt"></i> Keluar</a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-2" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">