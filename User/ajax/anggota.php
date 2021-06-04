<?php 
require "../php/functions.php";
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
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php $i=1; ?>
          <?php foreach($anggota as $row) :?>
          <tr>
            <td><?= $i; ?></td>
            <td><img src="../img/anggota/<?=$row["gambar"]; ?>" alt="" /></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td>
              <span class="action_btn">
                <a href="detailUser.php?id= <?= $row["id"]; ?>">Detail</a>
                <!-- <a href="hapus.php?id=<?= $row["id"] ;?>">Remove</a> -->
              </span>
            </td>
          </tr>
          <?php $i++ ?>
          <?php endforeach; ?>
        </tbody>
      </table>