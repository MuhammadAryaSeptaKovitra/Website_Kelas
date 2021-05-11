
<?php 
// start session
session_start();
require "functions.php";

// cek Cookie
if(isset($_COOKIE["id"]) && isset($_COOKIE['key'])){
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    // Ambil username berdasarkan id
    $result = mysqli_query($conn,"SELECT nama FROM anggota WHERE id =$id");
    $row =mysqli_fetch_assoc($result);
    // cek cookie dan nama
    if($key === hash('sha256',$row["nama"])){
        $_SESSION["login"] =true;
    }
}

if(isset($_SESSION["login"])){
    header("Location: User.php");
    exit;
}

if( isset($_POST["login"])){

    $nama = $_POST["nama"];
    $password = $_POST["password"];



    $result =mysqli_query($conn, "SELECT * FROM anggota WHERE 
        nama = '$nama'");

    // Cek nama
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
               setcookie("key",hash('sha256',$row['nama']),time()+60);
               $nama=setcookie("nama",$row["nama"],time()+60);
            }
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
    <title>Document</title>
</head>
<body>
    <h1>Halaman Login</h1>
    <?php if(isset($error)) :?>
        <p style="color: red;"> Username / password Salah</p>
    <?php  endif; ?>

    <form action=""  method="post">
        <ul>
            <li>
            <label for="nama">nama</label>
            <input type="text" name="nama" id="nama">
            </li>
            <li>
            <label for="password">password</label>
            <input type="password" name="password" id="password">
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me:</label>
            </li>
            <li>
                <button type="submit" name="login">login</button>
            </li>
        </ul>
    </form>

</body>
</html>