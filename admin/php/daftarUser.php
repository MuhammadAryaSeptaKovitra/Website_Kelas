<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}


//user
require '../../User/php/functions.php';
$id_admin = $_SESSION["id"];
$admin = query("SELECT * FROM `admin` WHERE id =$id_admin")[0];
// Pagination
// Konfigurasi
$jumlahDataPerHalaman =4;
$jumlahData = count(query("SELECT * FROM `anggota`"));
$jumlahHalaman = ceil($jumlahData /$jumlahDataPerHalaman);
// pakai if else carra cepet,jika berhasil ke halaman,jika salah ke halaman satu
$halamanAktif = ( isset($_GET["halaman"]))? $_GET["halaman"] :1 ;
// contoh jika jumlahdataperhalaman 2 dan jumlah data ada 3 maka awal data 1 = 0
$awalData = ($jumlahDataPerHalaman*$halamanAktif) -$jumlahDataPerHalaman;

// Menghasilkan berapa mahasiswa di data tersebut
$anggota = query("SELECT * FROM `anggota` LIMIT  $awalData, $jumlahDataPerHalaman ");

// Jika Tombol cari ditekan maka buat function
if(isset($_POST["cari"])){
  $anggota = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/layout.css" />
    <link rel="stylesheet" href="../css/daftarUser.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

    <title>Daftar User|Admin</title>
  </head>
  <body id="body">
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a href="dashboard.php">Dashboard</a>
          <a href="event.php">Event</a>
          <a class="active_link" href="daftarUser.php">User</a>
        </div>
      </nav>

      <main>
        <div class="main__container">
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
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Matkul Favorite</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
          <?php $i=1+$awalData; ?>
          <?php foreach($anggota as $row) :?>
          <tr>
            <td><?= $i; ?></td>
            <td><img src="../../User/img/anggota/<?=$row["gambar"]; ?>" alt="" /></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["tanggal_lahir"]; ?></td>
            <td><?= $row["jenis_kelamin"]; ?></td>
            <td><?= $row["matkul_fav"]; ?></td>
            <td>
              <span class="action_btn">
                <a href="UpdateForm.php?id=<?= $row["id"]; ?>">Edit</a>
                <a href="hapusUser.php?id=<?= $row["id"] ;?>" onclick="return confirm('Apakah Ingin Dihapus?')">Hapus</a>
              </span>
            </td>
          </tr>
          <?php $i++ ?>
          <?php endforeach; ?>
        </tbody>
      </table>
      </div>
        </div>
      </main>

      <div id="sidebar">
        <div class="sidebar__title">
        <div class="sidebar__img">
          <img src="../assets/admin/<?= $admin["gambar"]; ?>" alt="logo" />
            <h1> <?=$admin["username"]; ?></h1>
          </div>
          <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
        </div>

        <div class="sidebar__menu">
          <div class="sidebar__link ">
            <i class="fa fa-home"></i>
            <a href="dashboard.php">Dashboard</a>
          </div>
          <h2>MNG</h2>
          <div class="sidebar__link active_menu_link">
            <i class="fa fa-users"></i>
            <a href="daftarUser.php">Daftar User</a>
          </div>
          <div class="sidebar__link">
          <i class="fa fa-calendar fa-2x text-white"></i>
            <a href="event.php">Daftar Event</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-plus fa-2x text-white"></i>
            <a href="formAdmin.php">Tambah Admin</a>
          </div>
          <div class="sidebar__logout">
            <i class="fa fa-power-off"></i>
            <a href="logout.php">Log out</a>
          </div>
        </div>
      </div>
    </div>
    <script src="../script/script.js"></script>
    <script src="../script/searchUser.js"></script>

  </body>
</html>
