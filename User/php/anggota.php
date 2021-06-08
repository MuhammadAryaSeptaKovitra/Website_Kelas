<?php 
// Cek user sudah login atau belum
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

// Pagination
// Konfigurasi
$jumlahDataPerHalaman =4;
$jumlahData = count(query("SELECT * FROM anggota"));
$jumlahHalaman = ceil($jumlahData /$jumlahDataPerHalaman);
// pakai if else carra cepet,jika berhasil ke halaman,jika salah ke halaman satu
$halamanAktif = ( isset($_GET["halaman"]))? $_GET["halaman"] :1 ;
// contoh jika jumlahdataperhalaman 2 dan jumlah data ada 3 maka awal data 1 = 0
$awalData = ($jumlahDataPerHalaman*$halamanAktif) -$jumlahDataPerHalaman;

// Menghasilkan berapa mahasiswa di data tersebut
$anggota = query("SELECT * FROM anggota LIMIT  $awalData, $jumlahDataPerHalaman ");

// Jika Tombol cari ditekan maka buat function
if(isset($_POST["cari"])){
  $anggota = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/layout.css"/>
    <link rel="stylesheet" href="../css/anggota.css" />
    <title>Daftar Anggota</title>
  </head>
  <body>
  <!-- social icons -->
  <div class="social-icons">
      <img src="../img/layout/instagram.png" alt="ig" >
      <img src="../img/layout/twitter.png" alt="twit" >
      <img src="../img/layout/linkedin.png" alt="linked" >
      <img src="../img/layout/facebook.png" alt="fb" >
  </div> 
    <!-- table -->
    <div class="table_responsive">
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
      <li><a href="logout.php">Logout</a></li>    
      <li><a href="berita.php">Berita</a></li>    
      </ul>
    </nav>
      <h3>Daftar Anggota</h3>
      <form action="#" method="post">
          <input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword Pencarian..." autocomplete="off" id="keyword">
          <button type="submit" name="cari" id="tombol-cari">CARI!</button>
      </form>
      <br><br>
    <!-- Navigasi -->
      <?php  if($halamanAktif>1) :?>
          <a href="?halaman= <?= $halamanAktif-1 ?>">&laquo;</a>
      <?php endif; ?>
      <?php for($i=1;$i<=$jumlahHalaman; $i++) :?>
          <?php if($i == $halamanAktif) :?>
              <a href="?halaman= <?= $i;?>" style ="font-weight:bold;color:red;"> <?= $i ?></a>
          <?php else : ?>
              <a href="?halaman= <?= $i;?>"> <?= $i ?></a>        
          <?php endif; ?>
      <?php endfor; ?>
      <?php  if($halamanAktif < $jumlahHalaman) :?>
          <a href="?halaman= <?= $halamanAktif + 1 ?>">&raquo;</a>
      <?php endif; ?>
      <br><br>
      <div id="container">
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>         
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php $i=1+ $awalData; ?>
          <?php foreach($anggota as $row) :?>
          <tr>
            <td><?= $i; ?></td>
            <td><img src="../img/anggota/<?=$row["gambar"]; ?>" alt="gambar" /></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td>
              <span class="action_btn">
                <a href="detailUser.php?id= <?= $row["id"]; ?>">Detail</a>
              </span>
            </td>
          </tr>
          <?php $i++ ?>
          <?php endforeach; ?>
        </tbody>
      </table>
      </div>
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
    </div>
    <script src="../script/searchAnggota.js"></script>
    <script src="../script/responsive.js"></script>
  </body>
</html>
