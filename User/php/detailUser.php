<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require "functions.php";

// ambil data di URL
$id = $_GET["id"];
// query data anggota berdasarkan ID nya
$anggota = query("SELECT * FROM anggota WHERE id =$id")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../css/detailUser.css">
    <title>Document</title>
</head>
<body >
<!-- Navbar -->
<nav class="menu">
      <div class="menu-toggle">
        <input type="checkbox" name="menu" id="menu" />
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="brand">  
      </div>
      <ul class="menu-list">
        <li><a href="event.php">Event</a></li>
        <li><a href="galeri.php">Gallery</a></li>       
        <li><a href="User.php">home</a></li>          
        <li><a href="berita.php">Berita</a></li>          
        <li><a href="logout.php">Logout</a></li>    
      </ul>
    </nav>
<!-- Profil -->
<section  id="profil">
      <div class="profil-left-col">
        <img src="../img/anggota/<?=$anggota["gambar"]  ?>" alt="gambar" />
      </div>
      <div class="profil-right-col">
        <div class="profil-text">
          <h1>Profil</h1>
          <div class="line">
            <span class="line-1"></span> <br />
            <span class="line-2"></span> <br />
            <span class="line-3"></span>
        </div>
        <br><br>
          <div class="">
          <table>
                    <tr>
                        <td><b>Nama Lengkap</b></td>
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