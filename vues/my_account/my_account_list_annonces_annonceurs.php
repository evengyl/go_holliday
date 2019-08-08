<h4 class="title">Listes de mes annonces</h4><hr>
<p class="text-muted title"><small>Attention !, une annonce créée mais non validée de votre pars ne vous permettra pas d'en créer une nouvelles, ni de l'activée ni que nous puissions l'autorisée</small></p><hr>
<h4 class='title' data-fct="return_fct_annonce" style='display:none; color:green;'></h4><?

 // require($_app->base_dir. "/vues/my_account/my_account_pagination_annonces_profil.php");?>

<ul class="list-unstyled list_annonces_max"><?

    foreach($annonces as $row_annonce)
    {?>
        <li class="annonce" style="padding-top:15px;">
            <div class="row" style="padding-left:15px; padding-right:15px;">

                <div class="col-xs-2">
                    <a  href="/Mon_compte/Edition-Annonce/<?= $row_annonce->id ?>" style="<?= (!$_app->can_do_user->edit_annonce)?"display:none;":""; ?>margin-top:0px;" class="opt_annonce btn btn-warning">
                        <small><i class="fa fa-angle-double-right "></i>&nbsp;Editer</small>
                    </a><br>
                    <div class="img_annonce">
                        <a href="#" disabled class="thumbnail" style="cursor:default;">
                            <img src="/images/annonces/<?= $row_annonce->id; ?>/<?= $row_annonce->img_principale; ?>" class="img-responsive">
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
                        <br>

                        <a href="/Recherche/Vues/Annonces/<?= $row_annonce->id; ?>" 
                        class="opt_annonce"
                        >
                            <small><i class="fa fa-angle-double-right "></i>&nbsp;Voir l'annonce</small>
                        </a>
                    </div>

                    <div class="col-xs-6">
                        <span class="text-muted"><small title="Le nombre de message que vous avez reçu concernant votre annonce">Nombre de Messages : <b style="color:green;"><?= $row_annonce->message ?></b></small></span>
                        <br>

                        <span class="text-muted" ><small title="Votre validation pour l'envoi à l'administration">Validée par vous : <?=($row_annonce->user_validate)?"<b style='color:green;'>Oui</b>":"<b style='color:red;'>Non</b>" ?></b></small></span>
                        </br>
                        
                        <span class="text-muted"><small title="Validation final, quand cela est fait vous pourrez souscrire une formule pour celle-ci">Validée par l'administration : <?=($row_annonce->admin_validate)?"<b style='color:green;'>Oui</b>":"<b style='color:red;'>Non</b>" ?></b></small></span>
                        <br>

                        <span class="text-muted statut_active"><small title="Activer ou désactiver cette annonce, attention tout abonnement non terminé ne prendra ni pause ni fin lors de la désactivation. prenez garde à ce boutton">Active : <?=($row_annonce->active)?"<b style='color:green;'>Oui</b>":"<b style='color:red;'>Non</b>" ?></b></small></span>
                    </div>
                </div>
                <div class="col-xs-10"><?
                    
                    if(
                        !empty($row_annonce->name_type_vacances) 
                        && !empty($row_annonce->title) 
                        && !empty($row_annonce->sub_title)
                        && !$row_annonce->user_validate
                    )
                    {?>
                        <btn class="opt_annonce btn btn-success" 
                        data-toggle="modal" 
                        data-target="#validate_<?= $row_annonce->id ?>"
                        >
                            <small><i class="fa fa-angle-double-right "></i>&nbsp;Valider cette annonce</small>
                        </btn><?
                    }
                    else if(
                        $row_annonce->user_validate
                        && !$row_annonce->admin_validate 
                    )
                        echo '<span class="thin text-muted"><small>Cette annonce n\'a pas encore été validée par l\'administration</small></span>';
                    
                    else if($row_annonce->admin_validate && $row_annonce->user_validate)
                    {?>
                        <button 
                            data-toggle="modal" 
                            data-current-status="<?=($row_annonce->active)?'activate':'desactivate'; ?>" 
                            data-id="<?= $row_annonce->id; ?>" 
                            data-target="#set_active_<?= $row_annonce->id; ?>" 
                            class="opt_annonce btn"
                        >
                            <small><i class="fa fa-angle-double-right "></i><span></span></small>
                        </button><?
                    }
                    else
                        echo '<span class="thin text-muted"><small>Pour valider l\'annonce vous devez d\'adord la completée</small></span>';?>

                </div>

                <div class="col-xs-12" style="border-bottom:1px solid #eeeeee; margin-bottom:10px; margin-top:10px;"><?
                    if(!empty($row_annonce->date_waiting))
                    {
                        foreach($row_annonce->date_waiting as $row_wait)
                        {?>
                            <div class="col-sm-6 col-md-6">
                                <div class="thumbnail">
                                    <span style="font-size: 30px" class="glyphicon glyphicon-star-empty"></span>
                                    <hr style="margin-top:5px; margin-bottom:5px;">
                                    <div class="caption">
                                        <p>
                                            Date d'arrivée : 25/05/2019
                                            &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                                            Date de départ : 25/05/2019
                                        </p>
                                        
                                        <p class="text-muted">
                                            <span class="glyphicon glyphicon-user"></span>
                                            &nbsp;&nbsp;Jean&nbsp;&nbsp;
                                            <span style="color:#5bc0de;" class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                                            <span style="color:#5cb85c;" class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                                            <span style="color:#d9534f;" class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                                            Prix moyen estimé : 450€<br>
                                        </p>
                                    </div>
                                </div>
                            </div><?
                        }
                    }?> 
                </div> 

                <div class="col-xs-12"><?
                    if(!empty($row_annonce->date_reserved))
                    {
                        foreach($row_annonce->date_reserved as $row_reserved)
                        {?>
                            <div class="col-sm-6 col-md-6">
                                <div class="thumbnail">
                                    <span style="font-size: 30px; color:#f0f000;" class="glyphicon glyphicon-star"></span>
                                    <hr style="margin-top:5px; margin-bottom:5px;">
                                    <div class="caption">
                                        <p>
                                            Date d'arrivée : 25/05/2019
                                            &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                                            Date de départ : 25/05/2019
                                        </p>
                                        
                                        <p class="text-muted">
                                            <span class="glyphicon glyphicon-user"></span>
                                            &nbsp;&nbsp;Jean&nbsp;&nbsp;
                                            <span style="color:#5bc0de;" class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                                            <span style="color:#5cb85c;" class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                                            <span style="color:#d9534f;" class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                                            Prix moyen estimé : 450€
                                        </p>
                                    </div>
                                </div>
                            </div><?
                        }
                    }?>
                </div>

                <p class="text-muted col-xs-12" style="margin-top:15px;">
                    <span style="color:#5bc0de;" class="glyphicon glyphicon-envelope"></span>&nbsp;Envoyer un message / prendre contact&nbsp;&nbsp;|
                    <span style="color:#5cb85c;" class="glyphicon glyphicon-ok"></span>&nbsp;Accepter la demande directement&nbsp;&nbsp;|
                    <span style="color:#d9534f;" class="glyphicon glyphicon-remove"></span>&nbsp;Refuser directement la demande&nbsp;&nbsp;<br>
                    <span style="color:#f0f000;" class="glyphicon glyphicon-star"></span>&nbsp;Date déjà réservée&nbsp;&nbsp;|
                    <span style="" class="glyphicon glyphicon-star-empty"></span>&nbsp;Date encore non traîtée&nbsp;&nbsp;
                </p> 

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


        <!-- Modal activate announce by client-->
        <div class="modal fade" id="validate_<?= $row_annonce->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Valider cette annonce</h4>
                    </div>
                    <div class="modal-body" style="height:230px;">
                        <p class="text-muted text-center">Valider une annonce va permettre de prévenir l'administration qu'une annonce à été crée, elle sera vérifiée pour contrôler la véracité de cette annonce, au besoin vous serez contacté.<br>un mail vous sera envoyé pour vous prévenir que l'annonce à été validée par l'administration<br>Il vous sera ensuite demande de souscrire à tout petit abonement pour la rendre public.</p>
                        <hr>
                        <btn data-action="validate_announce" data-id-user="<?= $_app->user->id_utilisateurs ?>" data-id="<?= $row_annonce->id ?>" class="btn btn-warning">OK je valide mon annonce</btn>
                        <div class="loading_ajax col-xs-12">
                            <img src="/images/loading.gif">
                        </div>
                    </div>
                </div>
            </div>
        </div><?
    }

   // require($_app->base_dir. "/vues/my_account/my_account_pagination_annonces_profil.php");?>
</ul>
    
<script src="/js/validate_annonce.js"></script>
<script src="/js/activate_desactivate_annonce.js"></script>

