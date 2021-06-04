<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'functionsAdmin.php';

$id_admin = $_SESSION["id"];
$admin = query("SELECT * FROM `admin` WHERE id =$id_admin")[0];

$get1 = mysqli_query($conn,"SELECT * FROM `event`");
$count1 = mysqli_num_rows($get1);

$get2 = mysqli_query($conn,"SELECT * FROM `anggota`");
$count2 = mysqli_num_rows($get2);

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/layout.css" />
    <title>Dashboard|Admin</title>
  </head>
  <body id="body">
    <div class="container">
    <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a  class="active_link" href="dashboard.php">Dashboard</a>
          <a href="event.php">Event</a>
          <a  href="daftarUser.php">User</a>
        </div>
      </nav>

      <main>
        <div class="main__container">
          <!-- MAIN TITLE STARTS HERE -->

          <div class="main__title">
            <img src="../assets/hello.svg" alt="" />
            <div class="main__greeting">
              <h1>Hello <?= $admin["username"]; ?></h1>
              <p>Welcome to your admin dashboard</p>
            </div>
          </div>

          <!-- MAIN TITLE ENDS HERE -->

          <!-- MAIN CARDS STARTS HERE -->
          <div class="main__cards">
            <div class="card">
              <i class="fas fa-users fa-2x text-pink" aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">Jumlah Anggota</p>
                <span class="font-bold text-title"><?=$count2 ?></span>
              </div>
            </div>

            <div class="card">
              <i class="fa fa-calendar fa-2x text-pink" aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">Jumlah Event</p>
                <span class="font-bold text-title"><?=$count1 ?></span>
              </div>
            </div>
          <!-- MAIN CARDS ENDS HERE -->
        </div>
      </main>
      <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <img src="../assets/admin/<?= $admin["gambar"]; ?>" alt="logo" />
            <h1><?= $admin["username"] ?></h1>
          </div>
          <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
        </div>

        <div class="sidebar__menu">
          <div class="sidebar__link active_menu_link ">
            <i class="fa fa-home"></i>
            <a href="dashboard.php">Dashboard</a>
          </div>
          <h2>MNG</h2>
          <div class="sidebar__link ">
            <i class="fas fa-users fa-2x text-white"></i>
            <a href="daftarUser.php">Daftar User</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-calendar fa-2x text-white"></i>
            <a href="event.php">Daftar Event</a>
          </div>
          <div class="sidebar__logout">
            <i class="fa fa-power-off"></i>
            <a href="logout.php">Log out</a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../script/script.js"></script>
  </body>
</html>
