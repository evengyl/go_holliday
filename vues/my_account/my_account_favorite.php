<h4 class="title">Mes annonces Favorites</h4><hr>
<ul class="list-unstyled list_annonces_max"><?
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

                <div class="col-xs-10">
                    <div class="col-xs-6">
                        <b><?= $row_annonce->title ?></b>
                        <br>

                        <span class="text-muted"><small>Date d'ajout : <?= $row_annonce->create_date ?></small></span>
                        <br>

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
                            <small><i class="fa fa-angle-double-right "></i>&nbsp;Voir les avis</small>
                        </a>                        
                    </div>

                    <div class="col-xs-6">
                        <span class="text-muted statut_active"><small title="Activer ou désactiver cette annonce, attention tout abonnement non terminé ne prendra ni pause ni fin lors de la désactivation. prenez garde à ce boutton">Active : <?=($row_annonce->active)?"<b style='color:green;'>Oui</b>":"<b style='color:red;'>Non</b>" ?></b></small></span>
                    </div>
                </div>
            </div>
        </li><?
    }?>
</ul>