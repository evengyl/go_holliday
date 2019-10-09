<h4 class="title">Mes annonces Favorites</h4><hr>
<ul class="list-unstyled"><?
    if(!empty($array_annonce_fav))
    {
        foreach($array_annonce_fav as $row_annonce)
        {?>
            <li class="annonce" style="padding-top:15px;">
                <div class="row" style="padding-left:15px; padding-right:15px;">

                    <div class="col-xs-2">
                        <div class="img_annonce">
                            <a href="#" disabled class="thumbnail" style="cursor:default;">
                                <img src="<?= $row_annonce->img_principale; ?>" class="img-responsive">
                            </a>
                        </div>
                    </div>

                    <div class="col-xs-4">
                            <b><a href="/Annonces/<?= $row_annonce->id?>"><?= $row_annonce->title ?></a></b>
                            <br>
                            <span class="text-muted"><small>Date d'ajout : <?= $row_annonce->create_date ?></small></span>
                            <br>
                            <span class="text-muted"><small>Lieu : <?= $row_annonce->address[0]->address_lieux_dit." à ".$row_annonce->address[0]->address_localite ?></small></span>
                            
                    </div>
                    <div class="col-xs-4">
                            <span class="text-muted"><small>Nombre de date validées : <b><?=(!empty($row_annonce->date_reserved))?count($row_annonce->date_reserved):0 ?></b></small></span>
                            <br>

                            <span class="text-muted"><small>Nombre de demande en cours : <b><?=(!empty($row_annonce->date_waiting))?count($row_annonce->date_waiting):0 ?></b></small></span>
                            <br>

                            <span class="text-muted"><small style="color:#5bc0de;"><?= $row_annonce->vues ?></small> <small>Vues</small></span>

                            <a role="button" 
                                class="opt_annonce" 
                                data-toggle="modal" 
                                data-target="#view_avis_<?= $row_annonce->id ?>"
                            >
                                <small><i class="fa fa-angle-double-right "></i>&nbsp;Voir les avis (<?=(isset($row_annonce->avis))?count($row_annonce->avis):"0"; ?>)</small>
                            </a>                        
                    </div>
                    <div class="col-xs-2">
                        <button class="btn btn-xs btn-danger" title="Retirer de la liste des favoris" data-action="Delete_fav" data-id_annonce="<?= $row_annonce->id; ?>"><span class="glyphicon glyphicon-remove"></span></button>
                    </div>
                </div>
            </li><?
            require($_app->base_dir. "/vues/my_account/my_account_modal_list_avis.php");
        }
    }
    else
    {
        ?><div class="alert alert-info"><strong>Désolé</strong>, mais vous ne disposez pas d'annonce dans vos <strong>favoris</strong></div><?
    }?>
</ul>



<script>
    $(document).ready(function()
    {
        $("button[data-action='Delete_fav']").click(function(e)
        {

            var confirmate = confirm("Voulez-vous vraiment supprimer cette annonce de vos favoris ?");

            e.stopPropagation()

            if(confirmate === true)
            {
                var button_clicked = $(this);
                $.ajax({
                    type : 'POST',
                    url  : '/ajax/controller/add_del_announce_favorite.php',
                    dataType : "HTML",
                    data : {"app_fct" : "del_to_favorite", "id_annonce" : button_clicked.attr("data-id_annonce")},
                    success : function(data_return)
                    {
                        document.location.reload(true);
                    },
                });
            }
        });
        
    });
</script>


