<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/layout.css"<?=time(); ?> />
    <link rel="stylesheet" href="../css/galeri.css"<?=time(); ?> />
    <title>Gallery</title>
  </head>
  <body>
    <!-- social icons -->
    <div class="social-icons">
        <img src="../img/layout/instagram.png" alt="" srcset="">
        <img src="../img/layout/twitter.png" alt="" srcset="">
        <img src="../img/layout/linkedin.png" alt="" srcset="">
        <img src="../img/layout/facebook.png" alt="" srcset="">
    </div> 
    <!-- Navbar -->
    <nav class="menu">
      <div class="menu-toggle">
        <input type="checkbox" name="" id="" />
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
    <section>
      <div class="container1">
        <img src="../img/gallery/1.png" alt="" class="jumbo" />
        <div class="thumbnail" class="thumb"></div>
        <img src="../img/gallery/1.png" alt="" class="thumb" />
        <img src="../img/gallery/2.png" alt="" class="thumb" />
        <img src="../img/gallery/3.png" alt="" class="thumb" />
        <img src="../img/gallery/4.png" alt="" class="thumb" />
        <img src="../img/gallery/5.png" alt="" class="thumb" />
        <img src="../img/gallery/6.png" alt="" class="thumb" />
      </div>
    </section>
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
