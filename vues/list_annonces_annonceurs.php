<h4 class="title"><?=($_app->can_do_user->view_infos_annonce)?"Listes de vos annonces":"Vous n'avez pas accès à vos annonces, car votre niveau VIP n'est pas assez haut"; ?></h4><hr>
<ul class="list-unstyled list_annonces_max"><?
    if($_app->can_do_user->view_infos_annonce)
    {
        foreach($annonces as $row_annonce)
        {?>
            <li>
                <div class="row" style="padding-left:15px; padding-right:15px;">
                    <div class="col-xs-2">
                        <div class="avatar_annonce">
                            <img src="/images/autre_licences/face-0.jpg" alt="Circle Image" class="img-circle img-responsive">
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <b><?= $row_annonce->name_annonce ?></b>
                        <br>
                        <span class="text-muted"><small>Date d'ajout : <?= $row_annonce->create_date ?></small></span>
                        <br>
                        <span class="text-muted"><small><?= $row_annonce->vues ?> Vues</small></span>
                        <br>
                        <span class="text-muted"><small>Date : du <b><?= $row_annonce->start_date ?></b> au <b><?= $row_annonce->end_date ?></b></small></span>
                        <br>
                        <span class="text-muted"><small>Prix demandé : <b style="color:orange;"><?= $row_annonce->prix ?> €</b></small></span>
                        <br>
                        <span class="text-muted"><small>Nombre de demandes : <b style="color:green;"><?= $row_annonce->message ?></b></small></span>
                        <br>
                        <span class="text-muted"><small>Active : <?=($row_annonce->active)?"<b style='color:green;'>Oui</b>":"<b style='color:red;'>Non</b>" ?></b></small></span>
                    </div>

                    <div class="col-xs-6 text-right">
                        <btn class="opt_annonce btn btn-success"><small><i class="fa fa-angle-double-right "></i>&nbsp;Voir l'annonce</small></btn>
                        <btn class="opt_annonce btn btn-info"><small><i class="fa fa-angle-double-right "></i>&nbsp;Voir les avis</small></btn>

                        <?=($_app->can_do_user->edit_active)?'<btn class="opt_annonce btn btn-danger"><small><i class="fa fa-angle-double-right "></i>&nbsp;Marquer comme supprimée</small></btn>':'';?>

                        <?=($_app->can_do_user->edit_annonce)?'<btn class="opt_annonce btn btn-warning"><small><i class="fa fa-angle-double-right "></i>&nbsp;Editer</small></btn>':'';?>

                        <?=($_app->can_do_user->view_private_message)?'<btn class="opt_annonce btn btn-info"><small><i class="fa fa-angle-double-right "></i>&nbsp;Voir les messages</small></btn>':'';?>
                    </div>
                </div>
                <hr><hr>
            </li><?
        }
    }?>

</ul>