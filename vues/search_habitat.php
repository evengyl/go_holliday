<header id="head" class="secondary"></header>
 <div class="col-sm-6 col-md-4 col-lg-2 text-center">
    <br><br><br>
    <div class="thumbnail">
        <div class="caption">
            <h4>Type de vacances : </h4>
            <p class="text-muted"><?= $type_selected['name']; ?></p>
             <?= $type_selected['icone']; ?>
        </div>
        <div class="caption">
            <h4>Pays sélectionné : </h4>
            <p class="text-muted"><?= $pays_selected['name']; ?></p>
            <center><img src="/images/drapeaux/<?= $pays_selected['img']; ?>" class="img-responsive" style="max-height:80px" alt="<?= $pays_selected['name']; ?>"></center>
            <hr>
            <p><a href="/recherche" class="btn btn-default" role="button">Je veux changer</a></p>
        </div>
    </div>
</div>

<div class="container text-center">
    <div class="row">
        <h2 class="thin">Sélectionner à présent le type de bien que vous chercher</h2>
        <p class="text-muted">
           Le tout n'est pas de savoir avec qui ou pour quoi vous partez, ni dans quel pays, il faut aussi savoir quelle genre de locations de vacances vous voulez
        </p><br>

        <?  
            foreach($array_habitat_disponible as $habitat => $row_habitat)
            {?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <i style="font-size:56px; color:#65b45199;" class="fas fa-home"></i>
                        <hr>
                        <img src="/images/habitats/<?= $row_habitat['img']; ?>" class="img-responsive" alt="<?= $habitat; ?>">
                        <div class="caption">
                            <h3><?= $habitat; ?></h3>(<?= $row_habitat['nb_annonce']; ?> annonces)
                            <p class="text-muted"><?= $row_habitat['text']; ?></p>
                            <p><a href="/recherche/<?= strtolower($type_selected['name'])."/".$pays_selected['url']."/".$row_habitat['url']; ?>" class="btn btn-primary" role="button">Je choisi ce type de logement</a></p>
                        </div>
                    </div>
                </div><?
            }?>
    </div>
</div>