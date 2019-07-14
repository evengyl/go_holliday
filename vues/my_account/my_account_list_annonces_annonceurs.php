<h4 class="title">Listes de vos annonces</h4><hr>
<h4 class='title' data-fct="return_fct_annonce" style='display:none; color:green;'></h4><?

require($_app->base_dir. "/vues/my_account/my_account_pagination_annonces_profil.php");?>

<ul class="list-unstyled list_annonces_max"><?

    foreach($annonces as $row_annonce)
    {?>
        <li class="annonce">
            <hr>
            <div class="row" style="padding-left:15px; padding-right:15px;">
                <div class="col-xs-2">
                    <div class="img_annonce">
                        <a href="#" disabled class="thumbnail" style="cursor:default;">
                            <img src="/images/annonces/<?= $row_annonce->id; ?>/1.jpg" class="img-responsive">
                        </a>
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
                    <span class="text-muted statut_active"><small>Active : <?=($row_annonce->active)?"<b style='color:green;'>Oui</b>":"<b style='color:red;'>Non</b>" ?></b></small></span>
                </div>

                <div class="col-xs-6 text-right">
                    <a href="/Recherche/<?= $row_annonce->name_type_vacances; ?>/Annonces/<?= $row_annonce->id; ?>" class="opt_annonce btn btn-success"><small><i class="fa fa-angle-double-right "></i>&nbsp;Voir l'annonce</small></a>

                    <btn class="opt_annonce btn btn-info" data-toggle="modal" data-target="#view_avis_<?= $row_annonce->id ?>"><small><i class="fa fa-angle-double-right "></i>&nbsp;Voir les avis</small></btn>
                    
                    <button <?= (!$_app->can_do_user->edit_active)?"disabled":""; ?> data-toggle="modal" data-current-status="<?=($row_annonce->active)?'activate':'desactivate'; ?>" data-id="<?= $row_annonce->id; ?>" data-target="#set_active_<?= $row_annonce->id; ?>" class="opt_annonce btn">
                        <small><i class="fa fa-angle-double-right "></i><span></span></small>
                    </button>

                    <btn <?= (!$_app->can_do_user->edit_annonce)?"disabled":""; ?> class="opt_annonce btn btn-warning"><small><i class="fa fa-angle-double-right "></i>&nbsp;Editer</small></btn>

                    <btn <?= (!$_app->can_do_user->view_private_message)?"disabled":""; ?> class="opt_annonce btn btn-info"><small><i class="fa fa-angle-double-right "></i>&nbsp;Voir les messages</small></btn>
                </div>
            </div>
            <hr>
        </li>

        <!-- Modal Desactivate annonce -->
        <? require($_app->base_dir. "/vues/my_account/my_account_modal_active_annonce.php"); ?>


        <!-- Modal List avis-->
        <div class="modal fade" id="view_avis_<?= $row_annonce->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Liste des avis sur votre annonces</h4>
                    </div>
                    <div class="modal-body" style="height:100px;">
                        <p class="text-center text-muted">Blabla pas encore fait id annonce : <?= $row_annonce->id ?></p>
                    </div>
                </div>
            </div>
        </div>

        <?
    }

    require($_app->base_dir. "/vues/my_account/my_account_pagination_annonces_profil.php");?>
</ul>
    
<script src="/js/activate_desactivate_annonce.js"></script>