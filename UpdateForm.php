<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require "functions.php";

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
                document.location.href = 'anggota.php';
            </script>
        ";
    }else{
        echo "
        <script>
            alert('data gagal diubah');
            document.location.href = 'anggota.php';
        </script>
    ";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="stylesheet" href="home.css" />
    <!-- BootStrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" />
    <script src="validForm.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">BROGRAMMER CODING CLUB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="anggota.php">Anggota Aktif</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="galeri.html">Galeri</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Daftar Sekarang</a>
            </li>
            <div class="icon mt-2ms-auto">
              <h3>
                <i class="bi bi-person-circle"></i>
              </h3>
            </div>
          </ul>
        </div>
      </div>
    </nav>

    <section class="form" id="form">
      <div class="container">
        <h2 class="alert alert-primary text-center mt-3">FORMULIR PENDAFTARAN Anggota BARU</h2>
        <!--Form  -->
        <p id="pesanErrorBox" style="color: red;"></p>
        <form action="" method="POST" name="myform" onsubmit=" return validate()" >
        <input type="hidden" name="id" id="id" value=" <?= $anggota["id"];?>">

          <label for="nama">Nama Lengkap</label>
          <input type="text" id="nama" name="nama"  value=" <?= $anggota["nama"];?>" >
          <br><br>
          <label for="bday" >Tanggal Lahir:</label>
          <input type="date" id="bday" name="tanggal_lahir" value=" <?= $anggota["tanggal_lahir"];?>" >
          <br><br>
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" value=" <?= $anggota["email"];?>" >
          <br><br>
          <label >Jenis Kelamin:</label>
          <input type="radio" id="male" name="jenis_kelamin" value="Laki-Laki"  checked=" <?= $anggota["jenis_kelamin"];?>" >
          <label for="male" >Laki Laki</label>
          <input type="radio" id="female" name="jenis_kelamin" value="Perempuan" checked=" <?= $anggota["jenis_kelamin"];?>" >
          <label for="female">Perempuan</label>
          <br><br>
          <label >Bahasa Pemograman yang ingin dipelajari:</label> <br>
          <input type="checkbox" name="is_php" id="bahasa1"  checked=" <?= $anggota["is_php"];?>" >
          <label for="bahasa1">PHP</label>
          <input type="checkbox" name="is_java" id="bahasa2"  checked=" <?= $anggota["is_java"];?>" >
          <label for="bahasa2">Java</label>
          <input type="checkbox" name="is_python" id="bahasa3"  checked=" <?= $anggota["is_python"];?>" >
          <label for="bahasa1">Python</label>
          <br><br>
          <label for="alasan">Alasan Bergabung:</label>
          <textarea name="alasan" id="alasan" cols="50" rows="4" value=" <?= $anggota["alasan"];?>" ></textarea>
          <br><br>
          <label for="matkul_fav">Mata Kuliah Favorit</label>
          <select name="matkul_fav" id="matkul_fav">
            <option value="">Pilih Mata Kuliah</option>
            <option value="PTI" selected=" <?= $anggota["matkul_fav"];?>">Pengantar Teknologi Informasi</option>
            <option value="PBW" selected=" <?= $anggota["matkul_fav"];?>">Website</option>
          </select>
          <br><br>
         <button type="submit" name="submit">Submit Sekarang</button>
        </form>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#7209b7"
          fill-opacity="1"
          d="M0,32L48,58.7C96,85,192,139,288,149.3C384,160,480,128,576,122.7C672,117,768,139,864,176C960,213,1056,267,1152,245.3C1248,224,1344,128,1392,80L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg>
    </section>

    <!-- Footer -->
    <footer class="text-white text-center pb-5">
      <p>Created with <i class="bi bi-heart-fill text-danger"></i> by <a href="google.com" class="text-white fw-bold">Muhammad Arya Septa</a></p>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>


