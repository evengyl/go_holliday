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
        <h2 class="thin">Il est temps de sélectionner un Pays de destination</h2>
        <p class="text-muted">
           vous pouvez à tout moment revenir en arrière pour modifier vos préférences
        </p><br>

        <?  
            foreach($array_pays_disponible as $key_pays => $row_pays)
            {?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <i style="font-size:56px; color:#ef6b6b;" class="fas fa-globe"></i>
                        <i style="font-size:56px; color:#ef6b6b;" class="fas fa-map-marked-alt"></i>
                        <i style="font-size:56px; color:#ef6b6b;" class="fas fa-map-marker-alt"></i>
                        <hr>
                        <img src="/images/drapeaux/<?= $row_pays['img']; ?>" class="img-responsive" alt="<?= $key_pays; ?>">
                        <div class="caption">
                            <h3><?= $key_pays; ?></h3>(<?= $row_pays['nb_annonce']; ?> annonces)
                            <p class="text-muted"><?= $row_pays['text']; ?></p>
                            <p><a href="/recherche/<?= strtolower($type_selected['name'])."/".$row_pays['url']; ?>" class="btn btn-primary" role="button">Je choisi ce pays</a></p>
                        </div>
                    </div>
                </div><?
            }?>
    </div>
</div>