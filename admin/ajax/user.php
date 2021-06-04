<?php 
require '../../User/php/functions.php';
$keyword =$_GET["keyword"];
$query  ="SELECT * FROM anggota
            WHERE
            nama LIKE '%$keyword%' OR 
            email LIKE '%$keyword%'
    ";
$anggota =query($query);

?>

 <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Umur</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alasan</th>
            <th>Matkul Favorite</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php $i=1; ?>
          <?php foreach($anggota as $row) :?>
          <tr>
          <td><?= $i; ?></td>
            <td><img src="../../User/img/anggota/<?=$row["gambar"]; ?>" alt="" /></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td>Umur</td>
            <td><?= $row["tanggal_lahir"]; ?></td>
            <td><?= $row["jenis_kelamin"]; ?></td>
            <td><?= $row["alasan"]; ?></td>
            <td><?= $row["matkul_fav"]; ?></td>
            <td>
              <span class="action_btn">
              <a href="../../User/UpdateForm.php <?= $row["id"]; ?>">Edit</a>
                <a href="hapusUser.php?id=<?= $row["id"] ;?>">Hapus</a>
              </span>
            </td>
          </tr>
          <?php $i++ ?>
          <?php endforeach; ?>
        </tbody>
      </table>