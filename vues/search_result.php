<header id="head" class="secondary"></header>

 <div class="col-sm-6 col-md-4 col-lg-2 text-center">
    <br><br><br>
    <div class="thumbnail">
        <?
        if(isset($array_type[0]->icon_1))
            echo $array_type[0]->icon_1."&nbsp;";

        if(isset($array_type[0]->icon_2))
            echo $array_type[0]->icon_2."&nbsp;";

        if(isset($array_type[0]->icon_3))
            echo $array_type[0]->icon_3."&nbsp;";

        if(isset($array_type[0]->icon_4))
            echo $array_type[0]->icon_4."&nbsp;";

        if(isset($array_type[0]->icon_5))
            echo $array_type[0]->icon_5."&nbsp;";?>

        <hr>
        <div class="caption">
            <h4>Type de vacances : </h4>
            <p class="text-muted"><?= $array_type[0]->name; ?></p>
            <p><a href="/<?= $array_type[0]->url; ?>" class="btn btn-default" role="button">Je veux changer</a></p>
        </div>
    </div>
</div>

<div class="container text-center">
    <div class="row">
        <h2 class="thin">Toutes les annonces selon vos critères de recherche</h2>
        <p class="text-muted">
           Voila toutes les annonces que nous avons trouvés dans votre sélection, avec les filtres ci dessous vous pouvez affiner votre recherche par rapport à ces annonces
        </p><br><?
        $i = 0;
        while($i < 20)
        {?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <hr>
                    <img src="/images/habitats/bungalow.jpg" class="img-responsive" alt="">
                    <div class="caption">
                        <h3>Nom de l'annonce</h3>
                        <h4>prix de la location</h4>
                        <p class="text-muted">Valable du 04/11/2018 au 11/11/2018</p>
                        <p><a href="#" class="btn btn-primary" role="button">en savoir plus sur cette annonce</a></p>
                    </div>
                </div>
            </div><?
            $i++;
        }?>
        
    </div>
</div>
