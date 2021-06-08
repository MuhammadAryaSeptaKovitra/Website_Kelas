<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require '../../admin/php/functionsEvent.php';
// Pagination
// Konfigurasi
$jumlahDataPerHalaman =4;
$jumlahData = count(query("SELECT * FROM `event`"));
$jumlahHalaman = ceil($jumlahData /$jumlahDataPerHalaman);
// pakai if else carra cepet,jika berhasil ke halaman,jika salah ke halaman satu
$halamanAktif = ( isset($_GET["halaman"]))? $_GET["halaman"] :1 ;
// contoh jika jumlahdataperhalaman 2 dan jumlah data ada 3 maka awal data 1 = 0
$awalData = ($jumlahDataPerHalaman*$halamanAktif) -$jumlahDataPerHalaman;

// Menghasilkan berapa mahasiswa di data tersebut
$event = query("SELECT * FROM `event` LIMIT  $awalData, $jumlahDataPerHalaman ");

// Jika Tombol cari ditekan maka buat function
if(isset($_POST["cari"])){
$event = cari($_POST["keyword"]);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/event.css">
    <title>Event</title>
</head>
<!-- social icons -->
<body>
    <div class="social-icons">
        <img src="../img/layout/instagram.png" alt="ig" >
        <img src="../img/layout/twitter.png" alt="twit" >
        <img src="../img/layout/linkedin.png" alt="linked" >
        <img src="../img/layout/facebook.png" alt="fb" >
    </div> 
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
    <li><a href="anggota.php">Daftar Anggota</a></li>
    <li><a href="galeri.php">Gallery</a></li>       
    <li><a href="berita.php">Berita</a></li>          
    <li><a href="logout.php">Logout</a></li>       
    </ul>
</nav>
<br><br>
<h2>Daftar Event</h2>
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
        <aside class="cards">
            <?php foreach( $event as $row) :?>
            <a  class="card">
                <div class="card__overlay">
                <span > Read More</span>
                </div>
                <div class="card__image" style="background-image: url('../../admin/assets/event/<?=$row["gambar"];?>')"></div>
                <div class="card__content">
                <div class="card__title"> <?= $row["nama_event"] ?></div>
                <div class="card__description">
                <?=$row["rincian_event"]; ?>
                </div>
                </div>
                <div class="card__date"> <?= $row["tanggal_event"] ?></div>
            </a>
            <?php endforeach;?>
        </aside>  
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
<script src="../script/responsive.js"></script>
<script src="../script/searchEvent.js"></script>

</body>
</html>