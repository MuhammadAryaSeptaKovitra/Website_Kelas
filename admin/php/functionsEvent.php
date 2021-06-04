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

    $nama_event = isset($data["nama_event"]) ? $data["nama_event"] : "";  
    $tanggal_event = isset($data["tanggal_event"]) ? $data["tanggal_event"] : "";  
    $rincian_event = isset($data["rincian_event"]) ? $data["rincian_event"] : "";  

    // Upload Gambar
    $gambar = upload();
    if(!$gambar){
        return false;
    }

    // Cek username sudah ada atau belum
    $result =mysqli_query($conn,"SELECT nama_event FROM `event` WHERE nama_event = '$nama_event '");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert ('Nama Event sudah terdaftar');
    </script>";
    return false;
    } 
    // query insert data
    $query = "INSERT INTO `event` ( `nama_event`, `tanggal_event`, `rincian_event`, `gambar`) VALUES ( '$nama_event', '$tanggal_event', '$rincian_event', '$gambar');";
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
    move_uploaded_file($tmpName,"../assets/event/" .$namaFileBaru);
    return $namaFileBaru;
}

// function hapus
function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM `event` WHERE id =$id");
    return mysqli_affected_rows($conn);
}
// Function ubah
function ubah($data){
    global $conn;
    // htmlspecialchars -->untuk menghindari hacker
    $id =$data["id"];
    $nama_event = isset($data["nama_event"]) ? $data["nama_event"] : "";  
    $tanggal_event = isset($data["tanggal_event"]) ? $data["tanggal_event"] : "";  
    $rincian_event = isset($data["rincian_event"]) ? $data["rincian_event"] : "";  
    $gambarLama=htmlspecialchars($data["gambarLama"]);

    // Cek apakah user pilih gambar baru apa tidak
    if($_FILES['gambar']['error'] === 4){
        $gambar =$gambarLama;
    }else{
        $gambar = upload();
    }
    // query ubah data
    $query = "UPDATE  `event` SET
            nama_event  = '$nama_event',
            tanggal_event  = '$tanggal_event',
            rincian_event  = '$rincian_event',
            gambar = '$gambar'
        WHERE id = $id ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
// function cari
function cari($keyword){
    $query = "SELECT * FROM `event`
                WHERE
                    nama_event LIKE '%$keyword%'       
                    ";
    return query($query);
}

?>