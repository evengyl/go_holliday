<header id="head" class="secondary"></header><?

if(count($annonces) < 1)
{?>
    <div class="container text-center">
        <div class="row">
            <h1 class="thin">Oups!... </h1>
            <h3 class="thin">Aucune annonces ne corresponds exatcement à ce que vous cherchez, essayer peux être d\'élargir vos horizons ?</h3>
            <p class="text-center"><a href="/Recherche" class="btn btn-default" role="button">Je veux changer de type</a></p>
        </div>
    </div><?
}
else
{?>
     <div class="col-sm-6 col-md-4 col-lg-2 pos_fixed_left">
        <div class="thumbnail">
            <img src="/images/logo.png" class="img-responsive" alt="">
            <hr>
            <div class="caption">
                <p class="text-muted">Vacances pour : <?= $type_selected; ?></p>
                <p class="text-muted">Pays : <?= $pays_selected; ?></p>
                <p class="text-muted">Habitat(s) : <?= $habitat_selected; ?></p>
                <p class="text-muted">Nombre d'annonces trouvées : <?= count($annonces); ?></p>
                <p class="text-center"><a href="/Recherche/<?= $type_selected; ?>" class="btn btn-default" role="button" style="padding:10px 17px;">Je veux changer de pays/habitat</a></p>
            </div>
        </div>
    </div>

    <? require("asset_right.php"); ?>


    <div class="container text-center">
        <div class="row">
            <h2 class="thin">Toutes les annonces selon vos critères de recherche</h2>
            <p class="text-muted">
               Voila toutes les annonces que nous avons trouvés dans votre sélection, avec les filtres ci dessous vous pouvez affiner votre recherche par rapport à ces annonces
            </p><br><?
            foreach($annonces as $row_annonce)
            {?>
                <div class="col-sm-6 col-md-4">
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
                            
                            <p><a href="/Recherche/<?= $type_selected; ?>/Annonces/<?= $row_annonce->id; ?>" class="btn btn-primary" role="button">Elle m'intéresse !</a></p>
                        </div>
                    </div>
                </div><?
            }?>
        </div>
    </div><?
}?>



