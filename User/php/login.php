<?php 
// start session
session_start();
require "functions.php";

// cek Cookie
if(isset($_COOKIE["id"]) && isset($_COOKIE['key'])){
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    // Ambil username berdasarkan id
    $result = mysqli_query($conn,"SELECT email FROM anggota WHERE id =$id");
    $row =mysqli_fetch_assoc($result);
    // cek cookie dan email
    if($key === hash('sha256',$row["email"])){
        $_SESSION["login"] =true;
    }
}

if(isset($_SESSION["login"])){
    header("Location: User.php");
    exit;
}

if( isset($_POST["login"])){

    $email = $_POST["email"];
    $password = $_POST["password"];



    $result =mysqli_query($conn, "SELECT * FROM anggota WHERE 
        email = '$email'");

    // Cek email
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
              setcookie("key",hash('sha256',$row['email']),time()+60);
              //  $email=setcookie("email",$row["email"],time()+60);
            }
            $_SESSION["id"]= $row["id"];
          header("Location: User.php");
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
    <link rel="stylesheet" href="../css/login.css"?version=<?=filemtime('../css/login.css');?>>
    <title>Login</title>
</head>
<body>
    <section>
      <div class="imgBx">
        <!-- <img src="" alt="" srcset="" /> -->
      </div>
      <div class="contentBx">
        <div class="formBx">
          <h2>login</h2>
            <?php if(isset($error)) :?>
                <p style="color: red;"> Username / password Salah</p>
            <?php  endif; ?>
          <form action="" method="POST">
            <div class="inputBx">
              <span>Email</span>
              <input type="text" name="email" />
            </div>
            <div class="inputBx">
              <span>Password</span>
              <input type="password" name="password" />
            </div>
            <div class="remember">
              <label for=""> <input type="checkbox" name="remember" />Remember Me</label>
            </div>
            <div class="inputBx">
              <input type="submit" value="Sign in" name="login" />
            </div>
            <div class="inputBx">
              <p>Dont have an account? <a href="form.php">Sign-Up</a></p>
            </div>
          </form>
          <h3>Contact Us</h3>
          <ul class="sci">
            <li><img src="../img/layout/instagram.png " alt="" /></li>
            <li><img src="../img/layout/facebook.png " alt="" /></li>
            <li><img src="../img/layout/linkedin.png " alt="" /></li>
          </ul>
        </div>
      </div>
    </section>

</body>
</html>