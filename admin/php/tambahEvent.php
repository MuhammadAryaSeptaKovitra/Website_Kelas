<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require "functionsEvent.php";
// cek apakah tombol submit sudah ditekan apa belum
if(isset ($_POST["submit"])){

    //cek apakah data berhasil ditambah atau tidak
    if(tambah($_POST)> 0){
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'event.php';
            </script>
        ";
    }else{
        echo "
        <script>
            alert('data gagal ditambahkan');
            document.location.href = 'event.php';
        </script>
    ";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../css/tambah.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Event</title>
  </head>
  <body>
  <div class="container">
      <div class="title">Registration</div>
      <div class="content">
        <p id="pesanErrorBox" style="color: red"></p>
        <form action="#" method="POST" enctype="multipart/form-data" name="myform" onsubmit="return validate()">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Nama Event</span>
              <input type="text" placeholder="Enter your name"  name="nama_event" />
            </div>
            <div class="input-box">
              <span class="details">Tanggal Event</span>
              <input type="date"  name="tanggal_event" />
            </div>
            <div class="input-box">
              <span class="details">Rincian Event</span>
              <textarea name="rincian_event" id="rincian" cols="50" rows="4"></textarea>
            </div>
            <div class="gender-details">
              <span class="gender-title">Upload Gambar</span>
              <br>
              <input type="file"   name="gambar" />
              <h5>Ukuran Maks 1 MB</h5>
            </div>
          </div>
          <div class="button">
            <input type="submit" value="Tambah" name="submit" />
          </div>
        </form>
      </div>
    </div>
      </body>
</html>


