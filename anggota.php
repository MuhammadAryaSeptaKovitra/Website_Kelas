<?php
// Cek user sudah login atau belum
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

$anggota = query("SELECT * FROM anggota");

// Jika Tombol cari ditekan maka buat function
if(isset($_POST["cari"])){
  $anggota = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

   
    <link rel="stylesheet" href="home.css" />
    <!-- BootStrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous" />

    <title>Hello, world!</title>
  </head>
  <body>
  <nav>
  <ul>
        <li> <a href="anggota.php"> Anggota Aktif</a></li>
        <li> <a href="galeri.html"> Galeri</a></li>
        <li> <a href=""> Profil</a></li>
        <li><a href="logout.php">Logout</a>
    </ul>
  </nav>
    
    <!--Bagian Utama  -->
          <h3><i class="fas fa-user-graduate mx-2"></i>DAFTAR Anggota</h3>
          <hr />
          <br><br>
            <form action="" method="post">
                <input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword Pencarian..." autocomplete="off" id="keyword">
                <button type="submit" name="cari" id="tombol-cari">CARI!</button>
            </form>
          <br><br>
        <div id="container">
          <table  border="1" cellpadding="20" cellspacing="0">
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Edit</th>
              </tr>
            
            <?php $i=1; ?>
            <?php foreach($anggota as $row) :?>
              <tr>
                <td><?= $i; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td> <?= $row["email"]; ?></td>
                <td><a href="UpdateForm.php?id= <?= $row["id"]; ?>">Update</a></td>
                <td><a href="hapus.php?id=<?= $row["id"] ;?>">Hapus</a></td>
              </tr>
              <?php $i++ ?>
            <?php endforeach; ?>
          </table>
          </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#7209b7"
          fill-opacity="1"
          d="M0,32L48,58.7C96,85,192,139,288,149.3C384,160,480,128,576,122.7C672,117,768,139,864,176C960,213,1056,267,1152,245.3C1248,224,1344,128,1392,80L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg>
  
    <!-- Footer -->
    <footer class="text-white text-center pb-5">
      <p>Created with <i class="bi bi-heart-fill text-danger"></i> by <a href="google.com" class="text-white fw-bold">Muhammad Arya Septa</a></p>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="js/script.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
