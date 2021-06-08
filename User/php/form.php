<?php
require "functions.php";
// cek apakah tombol submit sudah ditekan apa belum
if(isset ($_POST["submit"])){

    //cek apakah data berhasil ditambah atau tidak
    if(tambah($_POST)> 0){
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'login.php';
            </script>
        ";
    }else{
        echo "
        <script>
            alert('data gagal ditambahkan');
            document.location.href = 'home.html';
        </script>
    ";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../css/form.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrasi Form</title>
  </head>
  <body>
  <div class="container">
      <div class="title">Registrasi Akun</div>
      <div class="content">
        <p id="pesanErrorBox" style="color: red"></p>
        <form action="#" method="POST" enctype="multipart/form-data" name="myform" onsubmit="return validate()">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Nama Lengkap</span>
              <input type="text" placeholder="Enter your name"  name="nama" />
            </div>
            <div class="input-box">
              <span class="details">Tanggal Lahir</span>
              <input type="date"  name="tanggal_lahir" />
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="email" placeholder="Enter your email"  name="email" />
            </div>
            <div class="input-box">
              <span class="details">Password</span>
              <input type="password" placeholder="Password Min 8 Karakter"  name="password" />
            </div>
            <div class="input-box">
              <span class="details">Konfirmasi Password</span>
              <input type="password" placeholder="Confirm your password"  name="pwd2" />
            </div>
            <div class="input-box">
              <span class="details">Matkul Pemrograman Favorite</span>
              <select name="matkul_fav" id="matkul_fav">
                <option value="">Pilih Mata Kuliah</option>
                <option value="PTI">Pengantar Teknologi Informasi</option>
                <option value="PBW">Pemrograman Berbasis Web</option>
                <option value="PBO">Pemrograman Berbasis Object</option>
                <option value="KOMSTAT">Komputasi Statistik</option>
                <option value="STRUKDAT">Struktur Data</option>
              </select>
            </div>
          </div>
          <div class="gender-details">
            <input type="radio" name="jenis_kelamin" id="dot-1" value="Laki-Laki" />
            <input type="radio" name="jenis_kelamin" id="dot-2" value="Perempuan" />
            <input type="hidden" name="jenis_kelamin" id="dot-2" value="Perempuan" />
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
              <label for="">
                <span class=""></span>
                <span class=""></span>
              </label>
            </div>
          </div>
          <div class="gender-details">
            <input type="checkbox" name="is_php" id="box-1" value="Ya" />
            <input type="checkbox" name="is_java" id="box-2" value="Ya" />
            <input type="checkbox" name="is_python" id="box-3" value="Ya" />
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
              <input type="file"   name="gambar" />
              <h5>Ukuran Maks 1 MB</h5>
            </div>
          </div>
          <div class="button">
            <input type="submit" value="Register" name="submit" />
          </div>
        </form>
      </div>
    </div>
    <script src="../script/validForm.js"></script>
      </body>
</html>


