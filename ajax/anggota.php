<?php 
require "../functions.php";
$keyword =$_GET["keyword"];
$query  ="SELECT * FROM anggota
            WHERE
            nama LIKE '%$keyword%' OR 
            email LIKE '%$keyword%'
    ";
$anggota =query($query);

?>
<table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td>No.</td>
            <td>Aksi</td>
            <td>Nama</td>
            <td>Email</td>
        </tr>
        <?php $i = 1; ?>
        <?php foreach( $anggota as $row) :?>
        <tr>
            <td><?= $i?></td>
            <td>
                <a href="ubah.php?id= <?= $row["id"]; ?>" >ubah </a> |
                <br>
                <a href="hapus.php?id= <?= $row["id"]; ?>">hapus</a>
            </td>
            <td><?= $row["nama"]?></td>
            <td><?= $row["email"]?></td>
        </tr>
        <?php $i++ ?>
        <?php endforeach;?>
    </table>