<?php 
session_start();
if(!isset($_SESSION["login"])){
header("Location: login.php");
exit;

}
?>
<?php 

$indo = json_decode(file_get_contents('https://api.kawalcorona.com/indonesia/'),true);
$prov = json_decode(file_get_contents('https://api.kawalcorona.com/indonesia/provinsi/'),true);


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/layout.css">
<link rel="stylesheet" href="../css/anggota.css">
<link rel="stylesheet" href="../css/berita.css">
<title>Berita</title>
<body>
<!-- social icons -->
<div class="social-icons">
<img src="../img/layout/instagram.png" alt="" srcset="">
<img src="../img/layout/twitter.png" alt="" srcset="">
<img src="../img/layout/linkedin.png" alt="" srcset="">
<img src="../img/layout/facebook.png" alt="" srcset="">
</div> 
<!-- table -->
<div class="table_responsive">
<!-- Navbar -->
<nav class="menu">
<div class="menu-toggle">
<input type="checkbox" name="" id="" />
<span></span>
<span></span>
<span></span>
</div>
<div class="brand"> 
</div>
<ul class="menu-list">
<li><a href="event.php">Event</a></li>
<li><a href="galeri.php">Gallery</a></li>       
<li><a href="anggota.php">Daftar Anggota</a></li>    
<li><a href="logout.php">Logout</a></li>    
</ul>
</nav>
<!-- MAIN CARDS STARTS HERE -->
<h1>Jumlah Covid-19 di Indonesia</h1>
<div class="main__cards">
        <div class="card">
            <i class="fas fa-users fa-2x text-pink" aria-hidden="true"></i>
            <div class="card_inner">
            <p class="text-primary-p"> Total Positif:</p>
            <span class="font-bold text-title"><?=$indo['0']['positif'];?></span>
            </div>
        </div>
        <div class="card">
            <i class="fa fa-calendar fa-2x text-pink" aria-hidden="true"></i>
            <div class="card_inner">
            <p class="text-primary-p">Total Sembuh:</p>
            <span class="font-bold text-title"><?=$indo['0']['sembuh'];?></span>
            </div>
        </div>
        <div class="card">
            <i class="fa fa-calendar fa-2x text-pink" aria-hidden="true"></i>
            <div class="card_inner">
            <p class="text-primary-p">Total Dirawat:</p>
            <span class="font-bold text-title"><?=$indo['0']['dirawat'];?></span>
            </div>
        </div>
        <div class="card">
            <i class="fa fa-calendar fa-2x text-pink" aria-hidden="true"></i>
            <div class="card_inner">
            <p class="text-primary-p">Total Meninggal</p>
            <span class="font-bold text-title"><?=$indo['0']['meninggal'];?></span>
            </div>
        </div>
</div>
        <!-- MAIN CARDS ENDS HERE -->
<br><br>
<div id="container">
<table>
<thead>
<tr>
    <th class="text-center">No</th>
    <th class="text-center">Provinsi</th>
    <th class="text-center">Positif</th>
    <th class="text-center">Sembuh</th>
    <th class="text-center">Meninggal</th>
</tr>
</thead>

<tbody>
    <?php $no=1; foreach($prov as $key) :?>
        <tr>
            <td><?= $no++;?></td>
            <td> <span ><?= $key["attributes"]["Provinsi"];?></span></td>
            <td> <span class="badge badge-red "><?= $key["attributes"]["Kasus_Posi"];?></span></td>
            <td> <span class="badge badge-success"><?= $key["attributes"]["Kasus_Semb"];?></span></td>
            <td> <span class="badge badge-danger"><?= $key["attributes"]["Kasus_Meni"];?></span></td>
        </tr>
    <?php endforeach; ?>

</tbody>
</table>
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
</div>
<script src="../script/searchAnggota.js"></script>
<script src="../script/responsive.js"></script>
</body>
</html>