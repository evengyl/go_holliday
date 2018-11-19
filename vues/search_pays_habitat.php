<header id="head" class="secondary"></header>

 <div class="col-sm-6 col-md-4 col-lg-2 text-center">
    <br><br><br>
    <div class="thumbnail">
        <?= $type_selected['icone']; ?>
        <hr>
        <div class="caption">
            <h4>Type de vacances : </h4>
            <p class="text-muted"><?= $type_selected['name']; ?></p>
            <p><a href="/recherche" class="btn btn-default" role="button">Je veux changer</a></p>
        </div>
    </div>
</div>

<div class="container text-center">
    <div class="row">
        <h2 class="thin">Il est temps de sélectionner un ou des Pays de destinations</h2><br><?
            foreach($array_pays_disponible as $key_pays => $row_pays)
            {?>
                <div class="col-sm-6 col-md-3" style="padding-left:7.5px; padding-right:7.5px;">
                    <div class="thumbnail">
                        <i style="font-size:25px; color:#737effb3;" class="fas fa-globe"></i>
                        <i style="font-size:25px; color:#737effb3;" class="fas fa-map-marked-alt"></i>
                        <i style="font-size:25px; color:#737effb3;" class="fas fa-map-marker-alt"></i>
                        <hr>
                        <img src="/images/drapeaux/<?= $row_pays['img']; ?>" class="img-responsive" style="max-height:100px;" alt="<?= $key_pays; ?>">
                        <div class="caption">
                            <h3><?= $key_pays; ?></h3>(<?= $row_pays['nb_annonce']; ?> annonces)
                            <p class="text-muted"><?= $row_pays['text']; ?></p>
                            <input name="<?= $row_pays['url']; ?>" type="checkbox">
                        </div>
                    </div>
                </div><?
            }?>
    </div>
</div>


<div class="container text-center" style="width:1600px;">
    <div class="row">
        <h2 class="thin">Sélectionner à présent le ou les types de bien que vous chercher</h2>
        <p class="text-muted">
           Le tout n'est pas de savoir avec qui ou pour quoi vous partez, ni dans quel pays, il faut aussi savoir quelle genre de locations de vacances vous voulez
        </p><br>

        <?  
            foreach($array_habitat_disponible as $habitat => $row_habitat)
            {?>
                <div class="col-sm-6 col-md-2">
                    <div class="thumbnail">
                        <i style="font-size:30px; color:#65b45199;" class="fas fa-home"></i>
                        <hr>
                        <img src="/images/habitats/<?= $row_habitat['img']; ?>" class="img-responsive" alt="<?= $habitat; ?>">
                        <div class="caption">
                            <h3><?= $habitat; ?></h3>(<?= $row_habitat['nb_annonce']; ?> annonces)
                            <p class="text-muted"><?= $row_habitat['text']; ?></p>
                            
                            <input name="<?= $row_pays['url']; ?>" type="checkbox">
                        </div>
                    </div>
                </div><?
            }?>
    </div>
</div>


<div class="container text-center" style="width:1600px;">
    <div class="row">
        <p class="text-muted">
           Et voilà nous y somme déjà, vous n'avez plus qu'a valider et voir ce que l'on vous propose
        </p><br>
        <p><a href="/recherche/<?= strtolower($type_selected['name']); ?>/pays-habitat" class="btn btn-primary" role="button">Je veux voir ce qu'il s'offre à moi</a></p>
    </div>
</div>

