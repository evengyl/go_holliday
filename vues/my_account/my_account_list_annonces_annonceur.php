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
                        <span class="text-muted"><small title="Le nombre de message que vous avez reçu concernant votre annonce">Nombre de Messages : <b style="color:green;"><?= (!empty($row_annonce->private_message))?count($row_annonce->private_message):0; ?></b></small></span>
                        <br>

                        <span class="text-muted" ><small title="Votre validation pour l'envoi à l'administration">Validée par vous : <?=($row_annonce->user_validate)?"<b style='color:green;'>Oui</b>":"<b style='color:red;'>Non</b>" ?></b></small></span>
                        </br>
                        
                        <span class="text-muted"><small title="Validation final, quand cela est fait vous pourrez souscrire une formule pour celle-ci">Validée par l'administration : <?=($row_annonce->admin_validate)?"<b style='color:green;'>Oui</b>":"<b style='color:red;'>Non</b>" ?></b></small></span>
                        <br>

                        <span class="text-muted statut_active"><small title="Activer ou désactiver cette annonce, attention tout abonnement non terminé ne prendra ni pause ni fin lors de la désactivation. prenez garde à ce boutton">Active : <?=($row_annonce->active)?"<b style='color:green;'>Oui</b>":"<b style='color:red;'>Non</b>" ?></b></small></span>
                    </div>
                </div>
                <div class="col-xs-10"><?
                    if(!empty($row_annonce->habitat_name_sql) && !empty($row_annonce->title) && !empty($row_annonce->sub_title) && !$row_annonce->user_validate)
                    {?>
                        <btn class="opt_annonce btn btn-success" 
                        data-toggle="modal" 
                        data-target="#validate_<?= $row_annonce->id ?>"
                        >
                            <small><i class="fa fa-angle-double-right "></i>&nbsp;Valider cette annonce</small>
                        </btn><?
                    }
                    else if($row_annonce->user_validate && !$row_annonce->admin_validate)
                        echo '<span class="thin text-muted"><small>Cette annonce n\'a pas encore été validée par l\'administration</small></span>';
                    
                    else if($row_annonce->admin_validate && $row_annonce->user_validate)
                    {?>
                        <btn 
                            data-toggle="modal" 
                            data-current-status="<?=($row_annonce->active)?'activate':'desactivate'; ?>" 
                            data-id="<?= $row_annonce->id; ?>" 
                            data-target="#set_active_<?= $row_annonce->id; ?>" 
                            class="opt_annonce btn btn-success"
                        >
                            <small><i class="fa fa-angle-double-right "></i>&nbsp;<span><?=(!$row_annonce->active)?'Mettre en ligne':'Retirer la mise en ligne'; ?></span></small>
                        </btn><?
                    }
                    else
                        echo '<span class="thin text-muted"><small>Pour valider l\'annonce vous devez d\'adord la completée</small></span>';?>

                </div>

                <? require($_app->base_dir. "/vues/my_account/my_account_list_demand_per_annonce.php"); ?>

            </div>
        </li>

        <!-- Modal Desactivate annonce -->
        <? require($_app->base_dir. "/vues/my_account/my_account_modal_active_annonce.php"); ?>


        <!-- Modal List avis-->
        <? require($_app->base_dir. "/vues/my_account/my_account_modal_list_avis.php"); ?>


        <!-- Modal activate announce by client-->
        <? require($_app->base_dir. "/vues/my_account/my_account_modal_validate_annonce.php");
    }

   // require($_app->base_dir. "/vues/my_account/my_account_pagination_annonces_profil.php");
    require($_app->base_dir. "/vues/my_account/my_account_legend_annonce.php");?>

</ul>
    
<script src="/js/validate_annonce.js"></script>


