<?php 

session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'functions.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  

    <h2>Selamat datang, <?= $_COOKIE["nama"]; ?></h2>
    <ul>
        <li> <a href="anggota.php"> Anggota Aktif</a></li>
        <li> <a href="galeri.html"> Galeri</a></li>
        <li> <a href=""> Profil</a></li>
        <li><a href="logout.php">Logout</a>
    </ul>
    
    <br>
   
</body>
</html>