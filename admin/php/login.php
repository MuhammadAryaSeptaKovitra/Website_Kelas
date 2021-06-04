<!-- username:aryasepta -->
<!-- pass:123 -->

<?php 
// start session
session_start();
require "functionsAdmin.php";

// cek Cookie
if(isset($_COOKIE["id"]) && isset($_COOKIE['key'])){
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    // Ambil username berdasarkan id
    $result = mysqli_query($conn,"SELECT username FROM `admin` WHERE id =$id");
    $row =mysqli_fetch_assoc($result);
    // cek cookie dan username
    if($key === hash('sha256',$row["username"])){
        $_SESSION["login"] =true;
    }
}

if(isset($_SESSION["login"])){
    header("Location: dashboard.php");
    exit;
}

if( isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];



    $result =mysqli_query($conn, "SELECT * FROM `admin` WHERE 
        username = '$username'");

    // Cek username
    if(mysqli_num_rows($result)===1){

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password,$row["password"])){
          // set session
          $_SESSION["login"] =true;
            // Cek remember me
            if(isset($_POST["remember"])){
               // buat cookie
              setcookie("id",$row["id"],time()+60);
              // hash untuk mengacak username
              setcookie("key",hash('sha256',$row['username']),time()+60);
            }
            $_SESSION["id"]= $row["id"];
          header("Location: dashboard.php");
          exit;  
        }
    }
    $error =true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>
<body>
    <section>
      <div class="imgBx">
        <!-- <img src="img/bg-login.jpg" alt="" srcset="" /> -->
      </div>
      <div class="contentBx">
        <div class="formBx">
          <h2>login Admin</h2>
            <?php if(isset($error)) :?>
                <p style="color: red;"> Username / password Salah</p>
            <?php  endif; ?>

          <form action="" method="POST">
            <div class="inputBx">
              <span>Username</span>
              <input type="text" name="username" />
            </div>
            <div class="inputBx">
              <span>Password</span>
              <input type="password" name="password" />
            </div>
            <div class="remember">
              <label for=""> <input type="checkbox" name="remember" />remember me</label>
            </div>
            <div class="inputBx">
              <input type="submit" value="Sign in" name="login" />
            </div>
            <div class="inputBx">
              <p>Daftar Akun Admin: <a href="formAdmin.php">Sign-Up</a></p>
            </div>
          </form>
        
        </div>
      </div>
    </section>

</body>
</html>