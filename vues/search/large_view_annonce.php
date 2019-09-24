<?
foreach($annonces as $row_annonce)
{?>
    <div class="col-xs-4">
        <div class="thumbnail">
            <h3 style="font-size:20px;"><?= $row_annonce->title; ?></h3>
            <h4 class="thin text-muted"><?= $row_annonce->sub_title; ?></h4>
            <hr>
            <img src="<?= $row_annonce->img_principale; ?>" class="img-responsive" alt="">
            <div class="caption">
                <h5><?= $row_annonce->address[0]->address_lieux_dit; ?>, Pays : <?= $row_annonce->pays_name_human; ?></h5>
                <p class="text-muted">Type de résidence : <?= $row_annonce->habitat_name_human; ?></p>
                <h5>Pour : <b style="color:#65b45199;"><?= $row_annonce->price_one_night ?>€ par nuit (Moyenne)</b></h5>
                <p class="text-muted">Du <?= $row_annonce->date_start_saison .' au '. $row_annonce->date_end_saison ?></p>
                
                <p><a href="/Annonces/<?= $row_annonce->id; ?>" class="btn btn-primary" role="button">Elle m'intéresse !</a></p>
            </div>
        </div>
    </div><?
}?>
   