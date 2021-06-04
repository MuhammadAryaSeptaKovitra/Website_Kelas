<?php 
//Koneksi ke Database
$conn = mysqli_connect("localhost", "root", "", "brogrammer");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;

    $username = isset($data["username"]) ? $data["username"] : "";  
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);
    // Upload Gambar
    $gambar = upload();
    if(!$gambar){
        return false;
    }



     // Cek username sudah ada atau belum
    $result =mysqli_query($conn,"SELECT username FROM `admin` WHERE username = '$username '");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert ('Username sudah terdaftar');
    </script>";
    return false;
    }
    // cek konfirmasi password
    if($password !== $password2){
        echo "<script>
                alert ('Konfirmasi password tidak sesuai');
            </script>";
        return false;
    }
     // Enskripsi Password
    $password = password_hash($password,PASSWORD_DEFAULT);

    // query insert data
    $query = "INSERT INTO `admin` (`username`, `password`,`gambar`) VALUES ('$username', '$password','$gambar')";
    mysqli_query($conn,$query);
    
    return mysqli_affected_rows($conn);
    
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFIle =$_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Cek apakah ada gambar yg diupload
    if($error == 4){
        echo " <script>
            alert('Pilih gambar terlebih dahulu');
        </script>";
        return false;
    }
    // Cek apakah itu gambar atau bukan
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    // explode u/ pecah cth arya.jpg jadi arya dan jpg
    $ekstensiGambar = explode('.',$namaFile);
    // End berfungsi agar jpg diambil dri akhir dan strlower untuk JPG jdi jpg
    $ekstensiGambar = strtolower (end($ekstensiGambar));
    if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
        echo " <script>
            alert('anda bukan upload gambar');
        </script>";
        return false;
    }
    // cek apakah ukuran terlalu besar
    // 1000000 ->1 mb
    if($ukuranFIle > 1000000 ){
        echo " <script>
        alert('Ukuran terlalu besar');
    </script>";
    return false;
    }

    // Jika lolos pengecekan ,maka gambar siapp di upload
    // Generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .='.';
    $namaFileBaru .=$ekstensiGambar;
    move_uploaded_file($tmpName,"../assets/admin/" .$namaFileBaru);
    return $namaFileBaru;
}

?>