<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/layout.css" />
    <link rel="stylesheet" href="../css/galeri.css" />
    <title>Gallery</title>
  </head>
  <body>
    <!-- social icons -->
    <div class="social-icons">
        <img src="../img/layout/instagram.png" alt="ig">
        <img src="../img/layout/twitter.png" alt="twit" >
        <img src="../img/layout/linkedin.png" alt="linked" >
        <img src="../img/layout/facebook.png" alt="fb" >
    </div> 
    <!-- Navbar -->
    <nav class="menu">
      <div class="menu-toggle">
        <input type="checkbox" name="menu" id="menu" />
        <span></span>
        <span></span>
        <span></span>
      </div>

      <div class="brand"></div>
      <ul class="menu-list">
      <li><a href="event.php">Event</a></li>
      <li><a href="anggota.php">Daftar Anggota</a></li>       
      <li><a href="User.php">Home</a></li>          
      <li><a href="berita.php">Berita</a></li>          
      <li><a href="logout.php">Logout</a></li>    
      </ul>
    </nav>
    <aside>
      <div class="container1">
        <img src="../img/gallery/1.png" alt="" class="jumbo" />
        <div class="thumbnail" class="thumb"></div>
        <img src="../img/gallery/1.png" alt="pic" class="thumb" />
        <img src="../img/gallery/2.png" alt="pic" class="thumb" />
        <img src="../img/gallery/3.png" alt="pic" class="thumb" />
        <img src="../img/gallery/4.png" alt="pic" class="thumb" />
        <img src="../img/gallery/5.png" alt="pic" class="thumb" />
        <img src="../img/gallery/6.png" alt="pic" class="thumb" />
      </div>
    </aside>
    <!-- Footer -->
    <footer>
      <div class="container footer-row">
        <hr />
        <div class="footer-col">
          <div class="footer-links">
            <div class="link-title">
              <p>Created With <span class="hearth">&hearts;</span> by Muhammad Arya Septa Kovitra (221910940)</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Akhir Footer -->
      
    <script src="../script/gallery.js"></script>
    <script src="../script/responsive.js"></script>
  </body>
</html>
