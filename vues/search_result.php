<header id="head" class="secondary"></header>

 <div class="col-sm-6 col-md-4 col-lg-2">
    <br><br><br>
    <div class="thumbnail">
        <img src="/images/logo.png" class="img-responsive" alt="">
        <hr>
        <div class="caption">
            <p class="text-muted">Vacances pour : <?= $annonces[0]->name_type_vacances; ?></p>
            <p class="text-muted">Pays : <?= $pays_selected; ?></p>
            <p class="text-muted">Habitat(s) : <?= $habitat_selected; ?></p>
            <p class="text-muted">Nombre d'annonces trouvées : <?= count($annonces); ?></p>
            <p class="text-center"><a href="/<?= $type_selected->url; ?>" class="btn btn-default" role="button">Je veux changer</a></p>
        </div>
    </div>
</div>

<div class="container text-center">
    <div class="row">
        <h2 class="thin">Toutes les annonces selon vos critères de recherche</h2>
        <p class="text-muted">
           Voila toutes les annonces que nous avons trouvés dans votre sélection, avec les filtres ci dessous vous pouvez affiner votre recherche par rapport à ces annonces
        </p><br><?

        foreach($annonces as $row_annonces)
        {?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <h3><?= $row_annonces->name_annonce; ?></h3>
                    <hr>
                    <img src="/images/habitats/bungalow.jpg" class="img-responsive" alt="">
                    <div class="caption">
                        
                        <h4>A <?= $row_annonces->lieu_annonce; ?>, Pays : <?= $row_annonces->name_pays; ?></h4>
                        <p class="text-muted">Type de résidence : <?= $row_annonces->name_habitat; ?></p>
                        
                        <?
                        if(count($row_annonces->dates) > 1)
                        {
                            echo '<p class="text-muted">Plusieurs périodes et prix disponibles</p>';
                        }
                        else
                        {
                            echo '<h5>Pour : <b style="color:#65b45199;">'. $row_annonces->dates[0]->prix .'€</b></h5>';
                            echo '<p class="text-muted">Du '. date("d/n/Y", strtotime($row_annonces->dates[0]->start_date)) .' au '. date("d/n/Y", strtotime($row_annonces->dates[0]->end_date)) .'</p>';
                        }
                        ?>
                        
                        <p><a href="/Recherche/<?= $annonces[0]->name_type_vacances; ?>/Selection_destination/<?= $row_annonces->id; ?>" class="btn btn-primary" role="button">Elle m'intéresse !</a></p>
                    </div>
                </div>
            </div><?
        }?>
        
    </div>
</div>
<?
affiche_pre($annonces);
?>