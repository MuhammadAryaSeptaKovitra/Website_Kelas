<?php 

session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'functions.php';

$id_user = $_SESSION["id"];
$anggota = query("SELECT * FROM anggota WHERE id =$id_user")[0];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/layout.css"?version=<?=filemtime('../css/layout.css');?>>
    <link rel="stylesheet" href="../css/user.css"?version=<?=filemtime('../css/user.css');?>>
</head>
<body>
    <!-- Navbar -->
    <nav class="menu">
      <div class="menu-toggle">
        <input type="checkbox" name="" id="" />
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="brand">
      </div>
      <ul class="menu-list">
        <li><a href="anggota.php">Daftar Anggota</a></li>
        <li><a href="galeri.php">Gallery</a></li>       
        <li><a href="event.php">Event</a></li>       
        <li><a href="berita.php">Berita</a></li>       
        <li><a href="logout.php">Logout</a></li>       
      </ul>
    </nav>
    <!-- Header -->
    <header id="header">
    <div class="container">
        <img src="../img/layout/Logo.jpg" class="logo" />
        <div class="header-text">
        <h1>
        Selamat datang, <br>
        <?= $anggota["nama"]; ?>
        </h1>
        <span class="square"></span>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi nihil neque esse laudantium qui saepe? Aliquid adipisci nam doloremque amet?</p>
        <!-- <button class="common-btn">Read-More</button> -->
        <div class="line">
            <span class="line-1"></span> <br />
            <span class="line-2"></span> <br />
            <span class="line-3"></span>
        </div>
        </div>
    </div>
    </header>

    <!-- social icons -->
    <div class="social-icons">
      <img src="../img/layout/instagram.png" alt="" srcset="">
      <img src="../img/layout/twitter.png" alt="" srcset="">
      <img src="../img/layout/linkedin.png" alt="" srcset="">
      <img src="../img/layout/facebook.png" alt="" srcset="">
    </div> 
    <!-- Profil -->
    <section  id="profil">
      <div class="profil-left-col">
        <img src="../img/anggota/<?=$anggota["gambar"]  ?>" alt="" />
      </div>
      <div class="profil-right-col">
        <div class="profil-text">
          <h1>Profil</h1>
          <div class="line">
            <span class="line-1"></span> <br />
            <span class="line-2"></span> <br />
            <span class="line-3"></span>
        </div>
          <div class="wrap">
        <table>
            <tr>
                <td><b>Nama Lengkap </b></td>
                <td>:</td> <td><?= $anggota["nama"]; ?></td>
            </tr>
            <tr>
                <td><b>Tanggal Lahir</b></td><td>:</td> <td><?= $anggota["tanggal_lahir"]; ?></td>
            </tr>
            <tr>
                <td><b>Jenis Kelamin</b></td><td>:</td> <td><?= $anggota["jenis_kelamin"]; ?></td>
            </tr>
            <tr>
                <td><b>Kampus</b></td><td>:</td> <td><a href="https://stis.ac.id/">Politeknik Statistika STIS</a></td>
            </tr>
            <>
                <td><b>Email</b></td><td>:</td><td><a href="mailto:<?= $anggota["nama"]; ?>"><?= $anggota["email"]; ?></a></td>
            <tr>
                <td><b>Matkul Favorite</b></td><td>:</td> <td><?= $anggota["matkul_fav"]; ?></td>
            </tr>
        </table>
    </div>
    <br><br>
          <button class="common-btn"> <a href="UpdateForm.php?id= <?= $anggota["id"]; ?>">Ubah data</a> </button>
          <div class="line">
            <span class="line-1"></span> <br />
            <span class="line-2"></span> <br />
            <span class="line-3"></span>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container footer-row">
        <hr>
        <div class="footer-col">
          <div class="footer-links">
            <div class="link-title">
              <p> Created With  <span class="hearth">&hearts;</span> by Muhammad Arya Septa Kovitra (221910940)</p>
            </div>
          </div>
        </div>  
      </div>
    </footer>
    <script src="../script/responsive.js"></script>
  </body>
</html>