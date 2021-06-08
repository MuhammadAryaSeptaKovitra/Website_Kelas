<?php 
require "../php/functionsEvent.php";
$keyword =$_GET["keyword"];
$query  ="SELECT * FROM `event`
            WHERE
            nama_event LIKE '%$keyword%'
    ";
$event =query($query);

?>
<section class="cards">
              <?php foreach( $event as $row) :?>
                <a href="updateEvent.php?id= <?= $row["id"]; ?>"  class="card">
                  <div class="card__overlay">
                    <span > Read More</span>
                  </div>
                  <div class="card__image" style="background-image: url('../assets/event/<?=$row["gambar"];?>')"></div>
                  <div class="card__content">
                    <div class="card__title"> <?= $row["nama_event"] ?></div>
                    <div class="card__description">
                    <?=$row["rincian_event"]; ?>
                    </div>
                  </div>
                  <div class="card__date"> <?= $row["tanggal_event"] ?></div>
                </a>
              <?php endforeach;?>
</section>  