<header id="head" class="secondary"></header>
<form action="/Recherche/<?= $type_vacances_selected->type_vacances_name_human ?>/Selection_destination" method="post">

    <h2 class="thin text-center">Il est temps de sélectionner un ou des Pays de destinations</h2>
    <p class="text-muted text-center">
       Vous pouvez choisir plusieurs pays sans aucun problèmes.
    </p><br>
    
    <div class="col-xs-2 text-center">
        <div class="thumbnail asset_left">
            <div class="caption">
                <h4>Type de vacances : </h4>
                <?if(isset($type_vacances_selected->icon))
                    echo $type_vacances_selected->icon;?>
                <p class="text-muted"><?= $type_vacances_selected->type_vacances_name_human; ?></p>
                    
            </div>
            <hr>
            <div class="thumbnail">
                <div class="caption">
                    <a href="/Contact" class="btn btn-success btn-xs" style="">Prendre contact<br>avec le service Client</a>
                    <a href="/Recherche/Toutes-les-annonces" class="btn btn-success btn-xs" style="margin-top:15px;">
                        Je veux voir<br>toutes les annonce disponible<br>sur <?= $_app->site_name?></a>
                </div>
            </div>
                  
        </div>
        <p class="p_fixed"><center><a href="/Recherche" class="btn btn-default" role="button" style="padding:10px 10px;">Je veux changer de type de Vacances</a></center></p>
    </div>


<!-- clone -->
    <div class="clone_caption" data-value="" style="display:none;">
        <h4></h4>
    </div> 
    <!-- end of clone -->



    <div class="col-xs-8 text-center">
        <div class="row"><?
            
            foreach($list_pays as $row_pays)
            {
                if($row_pays->nb_annonces == 0) continue;?>
                <div class="col-sm-6 col-md-3" style="padding-left:7.5px; padding-right:7.5px;">
                    <div class="thumbnail">
                        <img src="/images/drapeaux/<?= $row_pays->img; ?>" class="img-responsive" style="max-height:100px;" alt="<?= $row_pays->name_human; ?>">
                        <div class="caption">
                            <h3 style="margin-top:5px;"><?= $row_pays->name_human; ?></h3>
                            <small class="thin text-muted">(<?= $row_pays->nb_annonces ?> Annonces)</small><br>
                            <a style="margin-top:5px;" 
                                data-type="pays" 
                                data-etat="inactive" 
                                data-id="<?= $row_pays->id; ?>" 
                                data-name="<?= $row_pays->name_human; ?>" 
                                class="btn btn-primary">
                                    Je sélectionne
                            </a>
                        </div>
                    </div>
                </div><?
            }?>
        </div>
    </div>
    


    <div class="col-xs-8 text-center">
        <h2 class="thin">Sélectionner à présent le ou les types de bien que vous chercher</h2>
        <p class="text-muted">
           Le tout n'est pas de savoir avec qui ou pour quoi vous partez, ni dans quel pays, il faut aussi savoir quelle genre de locations de vacances vous voulez.
        </p><br><?
        foreach($list_habitat as $row_habitat)
        {
            if($row_habitat->nb_annonces == 0) continue;?>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="/images/habitats/<?= $row_habitat->habitat_img; ?>" class="img-responsive" alt="<?= $row_habitat->habitat_name_human; ?>">
                    <div class="caption">
                        <h3 style="margin-top:10px;" data-toggle="tooltip" data-placement="top" title="<?= $row_habitat->habitat_text; ?>" ><?= $row_habitat->habitat_name_human; ?></h3>
                        <small class="thin text-muted">(<?= $row_habitat->nb_annonces ?> Annonces)</small><br>
                        <a style="margin-top:10px;" 
                            data-type="habitat" 
                            data-etat="inactive" 
                            data-id="<?= $row_habitat->id; ?>" 
                            data-name="<?= $row_habitat->habitat_name_sql; ?>" 
                            class="btn btn-primary">
                                Je sélectionne
                        </a>
                    </div>
                </div>
            </div><?
        }?>
    </div>

    <script> $(function () { $('[data-toggle="tooltip"]').tooltip() }); </script>


    <div class="container text-center">
        <div class="row">
            <p class="text-muted">
               Et voilà nous y somme déjà, vous n'avez plus qu'à valider et voir ce que <?= $_app->site_name ?> vous propose.
            </p><br>
            <p><button type="submit" class="btn btn-primary" role="button">Je veux voir ce qu'il s'offre à moi</button></p>
        </div>
    </div>





</form>
<script>
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
                var form_input_id = '<input name="'+ $(this).attr("data-type") +'_id[]" value="'+$(this).attr("data-id")+'" type="hidden">';
                var form_input_name = '<input name="'+ $(this).attr("data-type") +'_name[]" value="'+$(this).attr("data-name")+'" type="hidden">';

                //on clone le caption vide pour le remplir et l'ajouter
                var clone_caption = $("div.clone_caption").clone();
                clone_caption.removeClass("clone_caption").addClass("caption");
                clone_caption.attr("data-value", $(this).attr("data-name"));

                // on différencie le stype de caption a ajouter
                if($(this).attr("data-type") == "pays")
                    clone_caption.find("h4").text("Pays choisi : ").after(text).after(img).after(form_input_id).after(form_input_name);
                else if($(this).attr("data-type") == "habitat")
                    clone_caption.find("h4").text("Habitat choisi : ").after(text).after(img).after(form_input_id).after(form_input_name);

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