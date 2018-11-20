<header id="head" class="secondary"></header>

 <div class="col-sm-6 col-md-4 col-lg-2 text-center">
    <br><br><br>
    <div class="thumbnail asset_left">
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
        </div>
                    
        
        
    </div>
    <p><a href="/recherche" class="btn btn-default" role="button">Je veux changer</a></p>
</div>

<!-- clone -->
<div class="clone_part" style="display:none;">
    <h4></h4>
    <p class="text-muted"></p>
</div> 
<!-- end of clone -->

<div class="container text-center">
    <div class="row">
        <h2 class="thin">Il est temps de sélectionner un ou des Pays de destinations</h2>
         <p class="text-muted">
           Vous pouvez choisir plusieurs pays sans aucun problèmes.
        </p><br><?
        foreach($array_pays as $row_pays)
        {?>
            <div class="col-sm-6 col-md-3" style="padding-left:7.5px; padding-right:7.5px;">
                <div class="thumbnail">
                    <i style="font-size:25px; color:#737effb3;" class="fas fa-globe"></i>
                    <i style="font-size:25px; color:#737effb3;" class="fas fa-map-marked-alt"></i>
                    <i style="font-size:25px; color:#737effb3;" class="fas fa-map-marker-alt"></i>
                    <hr>
                    <img src="/images/drapeaux/<?= $row_pays->img; ?>" class="img-responsive" style="max-height:100px;" alt="<?= $row_pays->name; ?>">
                    <div class="caption">
                        <h3><?= $row_pays->name; ?></h3>
                        (1500 annonces)
                        <p class="text-muted"><?= $row_pays->text; ?></p>
                        <button id="<?= $row_pays->url; ?>" data-img="" data-id="<?= $row_pays->id; ?>" data-name="<?= $row_pays->name; ?>" class="inactive btn btn-primary">Je sélectionne</button>
                    </div>
                </div>
            </div><?
        }?>
    </div>
</div>


<div class="container text-center">
    <div class="row">
        <h2 class="thin">Sélectionner à présent le ou les types de bien que vous chercher</h2>
        <p class="text-muted">
           Le tout n'est pas de savoir avec qui ou pour quoi vous partez, ni dans quel pays, il faut aussi savoir quelle genre de locations de vacances vous voulez
        </p><br>

        <?  
            foreach($array_habitat as $row_habitat)
            {?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <i style="font-size:30px; color:#65b45199;" class="fas fa-home"></i>
                        <hr>
                        <img src="/images/habitats/<?= $row_habitat->img; ?>" class="img-responsive" alt="<?= $row_habitat->name; ?>">
                        <div class="caption">
                            <h3><?= $row_habitat->name; ?></h3>(1200 annonces)
                            <p class="text-muted"><?= $row_habitat->text; ?></p>
                            <button id="<?= $row_habitat->url; ?>" data-id="<?= $row_habitat->id; ?>" data-name="<?= $row_habitat->name; ?>" class="inactive btn btn-primary">Je sélectionne</button>
                        </div>
                    </div>
                </div><?
            }?>
    </div>
</div>


<div class="container text-center">
    <div class="row">
        <p class="text-muted">
           Et voilà nous y somme déjà, vous n'avez plus qu'a valider et voir ce que l'on vous propose
        </p><br>
        <p><a href="/recherche/<?= $selected_type ?>/Selection_destination" class="btn btn-primary" role="button">Je veux voir ce qu'il s'offre à moi</a></p>
    </div>
</div>

<script>
    //*quand on clique sur un des élement avec data-id et data-name, l'ajouter dans la list sur le coté, comme selection, changer le bouton en j'ai choisi au lieu de je sélectionne,
    //ensuite changer la couleur du bouton, et permettre de recliqué dessus pour enelver de la liste
    //le script suivant aura cette liste sur le coté comme POST donc ne pas oublier de générer le form a chauqe ajout de selections
    $(document).ready(function()
    {
        $("button.inactive[data-id]").click(function()
        {

            var img = '<img src="'+ $(this).parent().parent().find('img').attr('src') +'">';
            var text = '<p class="text-muted">'+ $(this).attr("id") +'</p>';

            console.log(img);

            var clone_caption = $("div.clone_part").clone();
            clone_caption.removeClass("clone_part").addClass("caption");
            clone_caption.find("h4").text("Type de vacances : ").after(text).after(img);
            $("div.asset_left").append(clone_caption);
            $("div.asset_left div.caption").last().show();
        });
    });
</script>