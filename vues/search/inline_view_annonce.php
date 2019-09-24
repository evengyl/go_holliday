<div class="col-xs-12">
    <ul class="list-unstyled"><?
    foreach($annonces as $row_annonce)
    {?>
        <li class="annonce" style="padding-top:15px;">
            <div class="row" style="padding-left:15px; padding-right:15px;">

                <div class="col-xs-2">
                    <div class="img_annonce">
                        <a href="#" disabled class="thumbnail" style="cursor:default;">
                            <img src="<?= $row_annonce->img_principale; ?>" class="img-responsive">
                        </a>
                    </div>
                </div>

                <div class="col-xs-10">
                    <div class="col-xs-6">
                        <b><?= $row_annonce->title ?></b>
                        <br>
                        <small><?= $row_annonce->title ?></small>
                        <br>
                        <h5><?= $row_annonce->address[0]->address_lieux_dit; ?>, Pays : <?= $row_annonce->pays_name_human; ?></h5>
                        <span class="text-muted"><small style="color:#5bc0de;">Type de résidence : <?= $row_annonce->habitat_name_human; ?></small> <small></small></span>
                        <h5>Pour : <b style="color:#65b45199;"><?= $row_annonce->price_one_night ?>€ par nuit (Moyenne)</b></h5>
                        <p class="text-muted">Du <?= $row_annonce->date_start_saison .' au '. $row_annonce->date_end_saison ?></p>
                        <p><a href="/Annonces/<?= $row_annonce->id; ?>" class="btn btn-primary" role="button">Elle m'intéresse !</a></p>
                    </div>
                </div>
            </div>
        </li><?
    }?>
    </ul>
</div>
