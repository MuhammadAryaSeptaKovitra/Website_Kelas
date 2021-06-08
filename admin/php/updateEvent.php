<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require "functionsEvent.php";

// ambil data di URL
$id = $_GET["id"];
// query data mahasiswa berdasarkan ID nya
$event = query("SELECT * FROM `event` WHERE id =$id")[0];

// cek apakah tombol submit sudah ditekan apa belum
if(isset ($_POST["submit"])){
    
    //cek apakah data berhasil diubah atau tidak
    if(ubah($_POST)> 0){
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'event.php';
            </script>
        ";
    }else{
        echo "
        <script>
            alert('data gagal diubah');
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
<title>Update Event</title>
</head>
<body>
<div class="container">
    <div class="title">Update Event</div>
    <div class="content">
    <p id="pesanErrorBox" style="color: red"></p>
    <form action="#" method="POST" enctype="multipart/form-data" name="myform" onsubmit="return validate()">
        <div class="user-details">
        <input type="hidden" name="id" id="id" value="<?= $event["id"];?>">
        <input type="hidden" name="gambarLama"value="<?=$event["gambar"];?>">
        <div class="input-box">
            <span class="details">Nama Event</span>
            <input type="text" placeholder="Enter your Event Name"  name="nama_event" value=" <?= $event["nama_event"] ?>" />
        </div>
        <div class="input-box">
            <span class="details">Tanggal Event</span>
            <input type="date"  name="tanggal_event" value="<?= $event["tanggal_event"]; ?>"  />
        </div>
        <div class="input-box">
            <span class="details">Rincian Event</span>
            <textarea name="rincian_event" id="rincian" cols="50" rows="4"    > <?= $event["rincian_event"];?></textarea>
        </div>
        <div class="gender-details">
            <span class="gender-title">Upload Gambar</span>
            <br>
            <img src="../assets/event/<?= $event["gambar"]; ?>" width="100" alt="">
            <br>
            <input type="file"   name="gambar" value="<?=$event["gambar"]; ?>" />
            <h5>Ukuran Maks 1 MB</h5>
        </div>
        </div>
        <a href="hapusEvent.php?id=<?= $event["id"];  ?>" onclick="return confirm('Apakah Ingin Dihapus?')">Hapus Data</a>
        <div class="button">
        <input type="submit" value="Update" name="submit" />
        </div>
    </form>
    </div>
</div>
    </body>
</html>


