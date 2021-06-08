<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require "functionsAdmin.php";
// cek apakah tombol submit sudah ditekan apa belum
if(isset ($_POST["submit"])){

    //cek apakah data berhasil ditambah atau tidak
    if(tambah($_POST)> 0){
        echo "
            <script>
                alert('data Admin berhasil ditambahkan');
                document.location.href = 'dashboard.php';
            </script>
        ";
    }else{
        echo "
        <script>
            alert('data admin gagal ditambahkan');
            document.location.href = 'dashboard.php';
        </script>
    ";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../css/form.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrasi Admin</title>
  </head>
  <body>
  <div class="container">
      <div class="title">Registration Admin</div>
      <div class="content">
        <p id="pesanErrorBox" style="color: red"></p>
        <form action="#" method="POST" enctype="multipart/form-data" name="myform" onsubmit="return validate()">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Full Name</span>
              <input type="text" placeholder="Enter your name"  name="username" />
            </div>
            <div class="input-box">
              <span class="details">Password</span>
              <input type="password" placeholder="Password min  karakter dan harus ada huruf besar"  name="password" />
            </div>
            <div class="input-box">
              <span class="details">Confirm Password</span>
              <input type="password" placeholder="Confirm your password"  name="password2" />
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
    <!-- <script src="validForm.js"></script> -->
      </body>
</html>


