<header id="head" class="secondary"></header><?
if(empty($annonces))
{?>
    <div class="container text-center">
        <div class="row">
            <h1 class="thin">Oups!... </h1>
            <h3 class="thin">Aucune annonces ne corresponds exactement à ce que vous cherchez, essayer peux être d'élargir vos horizons ?</h3>
            <p class="text-center"><a href="/Recherche" class="btn btn-default" role="button">Je veux changer de type de vacances</a></p>
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
                <?
                if($type_selected != null)
                {?>
                    <p class="text-center">
                        <a href="/Recherche/<?= $type_selected; ?>" class="btn btn-success" role="button" style="padding:10px 17px;">Changer de pays/habitat</a>
                    </p><?
                }?>

                <p class="text-center">
                    <a href="/Recherche" class="btn btn-success" role="button" style="padding:10px 10px;">Changer de type de Vacances</a>
                </p>
            </div>
        </div>
    </div>

    <div class="container text-center">
        <div class="row">
            <h2 class="thin">Toutes les annonces selon vos critères de recherche</h2>
            <p class="text-muted">
               Voila toutes les annonces que nous avons trouvés dans votre sélection, avec les filtres ci dessous vous pouvez affiner votre recherche par rapport à ces annonces
            </p><?
            
            require("bar_view.php");

            if(isset($_GET["type_of_view"]))
            {
                $vue_selected = $_GET["type_of_view"];

                if($vue_selected == "large")
                    require("large_view_annonce.php");

                else if($vue_selected == "inline")
                    require("inline_view_annonce.php");
            }
            else
                require("large_view_annonce.php");?>
         </div>
    </div><?
}?>



