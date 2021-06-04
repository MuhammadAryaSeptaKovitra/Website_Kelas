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

    $nama = isset($data["nama"]) ? $data["nama"] : "";  
    $tanggal_lahir = isset($data["tanggal_lahir"]) ? $data["tanggal_lahir"] : "";  
    $email = isset($data["email"]) ? $data["email"] : "";  
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["pwd2"]);

    $jenis_kelamin = isset($data["jenis_kelamin"]) ? $data["jenis_kelamin"] : "";  
    $is_php = isset($data["is_php"]) ? $data["is_php"] : "Tidak";  
    $is_java = isset($data["is_java"]) ? $data["is_java"] : "Tidak";  
    $is_python = isset($data["is_python"]) ? $data["is_python"] : "Tidak";  
    $alasan = isset($data["alasan"]) ? $data["alasan"] : "";  
    $matkul_fav = isset($data["matkul_fav"]) ? $data["matkul_fav"] : "";  
    // Upload Gambar
    $gambar = upload();
    if(!$gambar){
        return false;
    }



    // Cek username sudah ada atau belum
    $result =mysqli_query($conn,"SELECT email FROM anggota WHERE email = '$email '");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert ('email sudah terdaftar');
        document.location.href = 'form.php';
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
$query = "INSERT INTO `anggota`  ( `nama`, `tanggal_lahir`, `email`, `password`, `jenis_kelamin`, `is_php`, `is_java`, `is_python`, `alasan`, `matkul_fav`,`gambar`) VALUES ('$nama','$tanggal_lahir','$email','$password','$jenis_kelamin','$is_php','$is_java','$is_python','$alasan','$matkul_fav','$gambar')";
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
    move_uploaded_file($tmpName,"../img/anggota/" .$namaFileBaru);
    return $namaFileBaru;
}

// function hapus
function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM anggota WHERE id =$id");
    return mysqli_affected_rows($conn);
}
// Function ubah
function ubah($data){
    global $conn;
    // htmlspecialchars -->untuk menghindari hacker
    $id =$data["id"];
    $nama = isset($data["nama"]) ? $data["nama"] : "";  
    $tanggal_lahir = isset($data["tanggal_lahir"]) ? $data["tanggal_lahir"] : "";  
    $email = isset($data["email"]) ? $data["email"] : "";  
    $jenis_kelamin = isset($data["jenis_kelamin"]) ? $data["jenis_kelamin"] : "";  
    $is_php = isset($data["is_php"]) ? $data["is_php"] : "Tidak";  
    $is_java = isset($data["is_java"]) ? $data["is_java"] : "Tidak";  
    $is_python = isset($data["is_python"]) ? $data["is_python"] : "Tidak";  
    $alasan = isset($data["alasan"]) ? $data["alasan"] : "";  
    $matkul_fav = isset($data["matkul_fav"]) ? $data["matkul_fav"] : "";  
    $gambarLama=htmlspecialchars($data["gambarLama"]);
    
    // Cek apakah user pilih gambar baru apa tidak
    
    if($_FILES['gambar']['error'] === 4){
        $gambar =$gambarLama;
    }else{
        $gambar = upload();
    }
    // query ubah data
    $query = "UPDATE  anggota SET
            nama  = '$nama',
            tanggal_lahir  = '$tanggal_lahir',
            email  = '$email',
            jenis_kelamin  = '$jenis_kelamin',
            is_php  = '$is_php',
            is_java  = '$is_java',
            is_python  = '$is_python',
            alasan  = '$alasan',
            matkul_fav  = '$matkul_fav',
            gambar = '$gambar'
        WHERE id = $id ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
// function cari
function cari($keyword){
    $query = "SELECT * FROM anggota
                WHERE
                    nama LIKE '%$keyword%' OR 
                    email LIKE '%$keyword%'              
                    ";
    return query($query);
}

?>