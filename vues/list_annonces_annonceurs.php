<h4 class="title"><?=($_app->can_do_user->view_infos_annonce)?"Listes de vos annonces":"Vous n'avez pas accès à vos annonces, car votre niveau VIP n'est pas assez haut"; ?></h4><hr>
<h4 class='title' data-fct="return_fct_annonce" style='display:none; color:green;'></h4><?


if($_app->can_do_user->view_infos_annonce)
{
    require("pagination_annonces_profil.php");?>
    <ul class="list-unstyled list_annonces_max"><?

        foreach($annonces as $row_annonce)
        {?>
            <li><hr>
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
                        <span class="text-muted statut_active"><small>Active : <?=($row_annonce->active)?"<b style='color:green;'>Oui</b>":"<b style='color:red;'>Non</b>" ?></b></small></span>
                    </div>

                    <div class="col-xs-6 text-right">
                        <a href="/Recherche/<?= $row_annonce->name_type_vacances; ?>/Annonces/<?= $row_annonce->id; ?>" class="opt_annonce btn btn-success"><small><i class="fa fa-angle-double-right "></i>&nbsp;Voir l'annonce</small></a>

                        <btn class="opt_annonce btn btn-info" data-toggle="modal" data-target="#view_avis_<?= $row_annonce->id ?>"><small><i class="fa fa-angle-double-right "></i>&nbsp;Voir les avis</small></btn><?
                        
                        if($_app->can_do_user->edit_active)
                        {?>
                            <button data-toggle="modal" data-current-status="<?=($row_annonce->active)?'activate':'desactivate'; ?>" data-id="<?= $row_annonce->id; ?>" data-target="#set_active_<?= $row_annonce->id; ?>" class="opt_annonce btn">
                                <small><i class="fa fa-angle-double-right "></i><span></span></small>
                            </button><?
                        }?>

                        <?=($_app->can_do_user->edit_annonce)?'<btn class="opt_annonce btn btn-warning"><small><i class="fa fa-angle-double-right "></i>&nbsp;Editer</small></btn>':'';?>

                        <?=($_app->can_do_user->view_private_message)?'<btn class="opt_annonce btn btn-info"><small><i class="fa fa-angle-double-right "></i>&nbsp;Voir les messages</small></btn>':'';?>
                    </div>
                </div>
                <hr>
            </li>

            <!-- Modal Desactivate annonce -->
            <div class="modal fade" id="set_active_<?= $row_annonce->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Désactivation de l'annonce : <?= $row_annonce->name_annonce ?></h4>
                        </div>
                        <div class="modal-body" style="height:340px;">
                            <p class="text-center text-muted">Désactivation / Activation : <?= $row_annonce->name_annonce ?></p>

                            <button data-current-status="<?=($row_annonce->active)?'activate':'desactivate'; ?>" data-toggle="modal" data-id="<?= $row_annonce->id; ?>" class="opt_annonce btn">
                                <small><i class="fa fa-angle-double-right "></i><span></span></small>
                            </button>

                            <hr>
                            <p class="text-center text-muted">Désactiver une annonce permet de l'enlever de la liste des annonces sur le site et sur les moteurs de recherches, pour par exemple la completée ou simplement car vous êtes en pour parler pour une réservation ou tout autre choses qui vous semble important au point de vouloir la désactivée.</p>

                            <hr>
                            <p class="text-center text-muted">Activer une annonce la rendra active sur le site et sur les moteur de recherche, les client pourront donc la trouver et mettre une offre dessus ou vous poser des questions, poser des avis, et possiblement, la louée.</p>
                        </div>
                    </div>
                </div>
            </div>


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

        require("pagination_annonces_profil.php");?>
    </ul><?
}?>

    
<script src="/js/activate_desactivate_annonce.js"></script>