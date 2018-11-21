<header id="head" class="secondary"></header>
<form action="/Recherche/<?= $selected_type ?>/Selection_destination" method="post">
     <div class="col-sm-6 col-md-4 col-lg-2 text-center pos_fixed">
        <br><br><br>
            <div class="thumbnail asset_left">
                <div class="caption">
                    <h4>Type de vacances : </h4>
                    <?if(isset($array_type[0]->icon_1))
                        echo $array_type[0]->icon_1."&nbsp;";

                    if(isset($array_type[0]->icon_2))
                        echo $array_type[0]->icon_2."&nbsp;";

                    if(isset($array_type[0]->icon_3))
                        echo $array_type[0]->icon_3."&nbsp;";

                    if(isset($array_type[0]->icon_4))
                        echo $array_type[0]->icon_4."&nbsp;";

                    if(isset($array_type[0]->icon_5))
                        echo $array_type[0]->icon_5."&nbsp;";?>
                    <p class="text-muted"><?= $array_type[0]->name; ?></p>
                </div>
                 <hr>           
            </div>
        
        <p class="p_fixed"><center><a href="/Recherche" class="btn btn-default" role="button">Je veux changer</a></center></p>
    </div>

    <!-- clone -->
    <div class="clone_caption" data-value="" style="display:none;">
        <h4></h4>
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
                            <a data-type="pays" data-etat="inactive" data-id="<?= $row_pays->id; ?>" data-name="<?= $row_pays->name; ?>" class="btn btn-primary">Je sélectionne</a>
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
                                <a data-type="habitat" data-etat="inactive" data-id="<?= $row_habitat->id; ?>" data-name="<?= $row_habitat->name; ?>" class="btn btn-primary">Je sélectionne</a>
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
            <p><button type="submit" class="btn btn-primary" role="button">Je veux voir ce qu'il s'offre à moi</button></p>
        </div>
    </div>
</form>
<script>
    //*quand on clique sur un des élement avec data-id et data-name, l'ajouter dans la list sur le coté, comme selection, changer le bouton en j'ai choisi au lieu de je sélectionne,
    //ensuite changer la couleur du bouton, et permettre de recliqué dessus pour enelver de la liste
    //le script suivant aura cette liste sur le coté comme POST donc ne pas oublier de générer le form a chauqe ajout de selections
    $(document).ready(function()
    {
        var i = 0;

        $("a[data-etat='inactive']").click(function()
        {
            if($(this).attr("data-etat") == "inactive")
            {
                //on receuille les infos utile pour l'ajout dans le left caption
                var img = '<img class="small_img" src="'+ $(this).parent().parent().find('img').attr('src') +'">';
                var text = '<p class="text-muted">'+ $(this).attr("data-name") +'</p>';
                var form_input = '<input name="'+ $(this).attr("data-type") +'[]" value="'+$(this).attr("data-id")+'" type="hidden">';

                //on clone le caption vide pour le remplir et l'ajouter
                var clone_caption = $("div.clone_caption").clone();
                clone_caption.removeClass("clone_caption").addClass("caption");
                clone_caption.attr("data-value", $(this).attr("data-name"));

                // on différencie le stype de caption a ajouter
                if($(this).attr("data-type") == "pays")
                    clone_caption.find("h4").text("Pays choisi : ").after(text).after(img).after(form_input);
                else if($(this).attr("data-type") == "habitat")
                    clone_caption.find("h4").text("Habitat choisi : ").after(text).after(img).after(form_input);

                //on ajoute le catpion créer et on le show
                $("div.asset_left").append(clone_caption);
                $("div.asset_left div.caption").last().show();

                //action sur le bouton pour le rendre inactif
                $(this).addClass('active');
                $(this).attr('data-etat', 'active');
                $(this).text("J'enlève ma selection");
                i++;
            }
            else{

                //on enelve le caption selectionner
                $("div.caption[data-value='" + $(this).attr('data-name') + "']").remove();
                //on reset les état du boutton
                $(this).attr('data-etat', 'inactive');
                $(this).removeClass('active');
                $(this).text("Je sélectionne");

            }
            
        });
    });
</script>