<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require "../../User/php/functions.php";

// ambil data di URL
$id = $_GET["id"];
// query data mahasiswa berdasarkan ID nya
$anggota = query("SELECT * FROM anggota WHERE id =$id")[0];

// cek apakah tombol submit sudah ditekan apa belum
if(isset ($_POST["submit"])){
    
    //cek apakah data berhasil diubah atau tidak
    if(ubah($_POST)> 0){
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'daftarUser.php';
            </script>
        ";
    }else{
        echo "
        <script>
            alert('data gagal diubah');
            document.location.href = 'daftarUser.php';
        </script>
    ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../css/form.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
  <body>
  <div class="container">
      <div class="title">Update Data </div>
      <div class="content">
        <p id="pesanErrorBox" style="color: red"></p>
        <form action="#" method="POST" enctype="multipart/form-data" name="myform" onsubmit="return validate()">
          <div class="user-details">
            <input type="hidden" name="id" id="id" value="<?= $anggota["id"];?>">
            <input type="hidden" name="gambarLama"value="<?=$anggota["gambar"];?>">
            <div class="input-box">
              <span class="details">Full Name</span>
              <input type="text" placeholder="Enter your name"  name="nama" value="<?= $anggota["nama"];?>" />
            </div>
            <div class="input-box">
              <span class="details">Tanggal Lahir</span>
              <input type="date"  name="tanggal_lahir" value="<?=$anggota["tanggal_lahir"];?>"/>
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="email" placeholder="Enter your email"  name="email" value=" <?= $anggota["email"];?>"/>
            </div>
            <div class="input-box">
              <span class="details">Mata Kuliah Favorite</span>
              <select name="matkul_fav" id="matkul_fav">
                <option value=""  <?php if($anggota["matkul_fav"]=="") echo "selected";?>>Pilih Matkul Favorite:</option>
                <option value="PTI" <?php if($anggota["matkul_fav"]=="PTI") echo "selected";?>>Pengantar Teknologi Informasi</option>
                <option value="PBW" <?php if($anggota["matkul_fav"]=="PBW") echo "selected";?>>Pemrograman Berbasis Web</option>
                <option value="PBO" <?php if($anggota["matkul_fav"]=="PBO") echo "selected";?>>Pemrograman Berbasis Object</option>
                <option value="KOMSTAT" <?php if($anggota["matkul_fav"]=="KOMSTAT") echo "selected";?>>Komputasi Statistik</option>
                <option value="STRUKDAT" <?php if($anggota["matkul_fav"]=="STRUKDAT") echo "selected";?>>Struktur Data</option>
              </select>
            </div>
          </div>
          <div class="gender-details">
            <input type="radio" name="jenis_kelamin" id="dot-1" value="Laki-Laki" <?php if($anggota["jenis_kelamin"]=="Laki-Laki") echo "checked";?> />
            <input type="radio" name="jenis_kelamin" id="dot-2" value="Perempuan" <?php if($anggota["jenis_kelamin"]=="Perempuan") echo "checked";?> />
            <span class="gender-title">Jenis Kelamin</span>
            <div class="category">
              <label for="dot-1">
                <span class="dot one"></span>
                <span class="gender">Laki-Laki</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="gender">Perempuan</span>
              </label>
            </div>
          </div>
          <div class="gender-details">
            <input type="checkbox" name="is_php" id="box-1" value="Ya" <?php if ($anggota["is_php"]=="Ya") echo "checked";?> />
            <input type="checkbox" name="is_java" id="box-2" value="Ya" <?php if ($anggota["is_java"]=="Ya") echo "checked";?>/>
            <input type="checkbox" name="is_python" id="box-3" value="Ya" <?php if ($anggota["is_python"]=="Ya") echo "checked";?> />
            <span class="gender-title">Bahasa Pemograman Yang Dikuasai</span>
            <div class="category">
              <label for="box-1">
                <span class="box one"></span>
                <span class="gender">PHP</span>
              </label>
              <label for="box-2">
                <span class="box two"></span>
                <span class="gender">JAVA</span>
              </label>
              <label for="box-3">
                <span class="box three"></span>
                <span class="gender">PYTHON</span>
              </label>
            </div>
            <div class="gender-details">
              <span class="gender-title">Upload Gambar</span>
              <br>
              <img src="../../User/img/anggota/<?=$anggota['gambar'];?> " width="100" alt="">
              <br>
              <input type="file"   name="gambar" />
              <h5>Ukuran Maks 1 MB</h5>
            </div>
          </div>
          <div class="button">
            <input type="submit" value="Update" name="submit" />
          </div>
        </form>
      </div>
    </div>
    <script src="../script/validForm.js"></script>
  </body>
</html>


