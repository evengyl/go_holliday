<h4 class="title">Listes de mes annonces</h4><hr>
<p class="text-muted title"><small>Attention !, une annonce créée mais non validée de votre pars ne vous permettra pas d'en créer une nouvelles, ni de l'activée ni que nous puissions l'autorisée</small></p><hr>
<h4 class='title' data-fct="return_fct_annonce" style='display:none; color:green;'></h4>
<h4 class='title' style='color:orange;'><?=(isset($_SESSION['infos_annonce'])?$_SESSION['infos_annonce']:''); ?></h4>

<ul class="list-unstyled list_annonces_max"><?
    if(!empty($annonces))
    {
        foreach($annonces as $row_annonce)
        {?>
            <li class="annonce" style="padding-top:15px;">
                <div class="row" style="padding-left:15px; padding-right:15px;">

                    <div class="col-xs-2">
                        <a title="Voir l'annonce" style="margin-top:0px;" href="/Annonces/<?= $row_annonce->id; ?>" class="opt_annonce btn btn-success">
                            <small><i class="far fa-eye"></i></small>
                        </a>

                        <a title="Editer l'annonce" href="/Mon_compte/Edition-Annonce/<?= $row_annonce->id ?>" style="<?= (!$_app->can_do_user->edit_annonce)?"display:none;":""; ?>margin-top:0px;" class="opt_annonce btn btn-warning">
                            <small><i class="far fa-edit"></i></small>
                        </a>

                        <button title="Supprimer l'annonce" class="btn btn-danger" style="padding:5px 10px 5px 10px;" data-action="delete_announce" data-id="<?= $row_annonce->id; ?>">
                            <i class="far fa-trash-alt"></i>
                        </button>

                        

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

                            <span class="text-muted"><small>Nombre de date validées : <b style="color:green;"><?= $row_annonce->nb_reserved; ?></b></small></span>
                            <br>

                            <span class="text-muted"><small>Nombre de demande en cours : <b style="color:#f0ad4e;"><?= $row_annonce->nb_waiting; ?></b></small></span>
                            <br>

                            <span class="text-muted"><small>Somme gagnée estimée : <b style="color:green;"><?= $row_annonce->total_price_win; ?>&nbsp;€</b></small></span>
                            <br>

                            <span class="text-muted"><small>Somme dormante estimée : <b style="color:red;"><?= $row_annonce->total_price_afk; ?>&nbsp;€</b></small></span>
                            <br>

                                                  
                        </div>

                        <div class="col-xs-6">
                            <span class="text-muted"><small title="Le nombre de message que vous avez reçu concernant votre annonce">Nombre de Messages : <b style="color:green;"><?= (!empty($row_annonce->private_message))?count($row_annonce->private_message):0; ?></b></small></span>
                            <br>

                            <span class="text-muted" ><small title="Votre validation pour l'envoi à l'administration">Validée par vous : <?=($row_annonce->user_validate)?"<b style='color:green;'>Oui</b>":"<b style='color:red;'>Non</b>" ?></b></small></span>
                            </br>
                            
                            <span class="text-muted"><small title="Validation final, quand cela est fait vous pourrez souscrire une formule pour celle-ci">Validée par l'administration : <?=($row_annonce->admin_validate)?"<b style='color:green;'>Oui</b>":"<b style='color:red;'>Non</b>" ?></b></small></span>
                            <br>

                            <span class="text-muted statut_active"><small title="Activer ou désactiver cette annonce, attention tout abonnement non terminé ne prendra ni pause ni fin lors de la désactivation. prenez garde à ce boutton">Active : <?=($row_annonce->active)?"<b style='color:green;'>Oui</b>":"<b style='color:red;'>Non</b>" ?></b></small></span><br>

                            <span class="text-muted"><small style="color:#5bc0de;"><?= $row_annonce->vues ?></small> <small>Vues</small></span>

                            <a role="button" 
                                class="opt_annonce" 
                                data-toggle="modal" 
                                data-target="#view_avis_<?= $row_annonce->id ?>"
                            >
                                <small><i class="fa fa-angle-double-right "></i>&nbsp;Voir les avis (<?=$row_annonce->total_avis; ?>)</small>
                            </a>  
                        </div>
                    </div>
                    <div class="col-xs-10"><?
                        if(!empty($row_annonce->habitat_name_sql) && !empty($row_annonce->title) && !empty($row_annonce->sub_title) && !$row_annonce->user_validate)
                        {?>
                            <btn class="opt_annonce btn btn-success" 
                            data-toggle="modal" 
                            data-target="#validate_<?= $row_annonce->id ?>"
                            >
                                <small><i class="fas fa-check"></i>&nbsp;Valider cette annonce</small>
                            </btn><?
                        }

                        else if($row_annonce->user_validate && !$row_annonce->admin_validate)
                        {
                            echo '<span  style="color:#d9534f;" class="thin text-muted">
                                    <small>
                                        <i class="fas fa-exclamation"></i>
                                        &nbsp;Cette annonce n\'a pas encore été validée par l\'administration&nbsp;
                                        <i class="fas fa-exclamation"></i>
                                    </small>
                                </span>';
                        }
                        
                        else if($row_annonce->admin_validate && $row_annonce->user_validate && $row_annonce->active == 0)
                        {?>
                            <btn 
                                data-toggle="modal" 
                                data-id="<?= $row_annonce->id; ?>" 
                                data-target="#set_active_<?= $row_annonce->id; ?>" 
                                class="opt_annonce btn btn-success"
                            >
                                <small><span><i class="fas fa-euro-sign"></i>&nbsp;Mettre en ligne</span></small>
                            </btn><?
                        }

                        else if($row_annonce->active == 1)
                        {?>
                            <btn 
                                data-toggle="modal" 
                                data-id="<?= $row_annonce->id; ?>" 
                                data-target="#set_desactive_<?= $row_annonce->id; ?>" 
                                class="opt_annonce btn btn-danger"
                            >
                                <small><span><i class="fas fa-times"></i>&nbsp;Retirer la mise en ligne</span></small>
                            </btn><?
                        }

                        else
                        {
                            echo '<span style="color:#f0ad4e;" class="thin text-muted">
                                    <small>
                                        <i class="fas fa-exclamation"></i>
                                        &nbsp;Pour valider l\'annonce vous devez d\'adord la completée&nbsp;
                                        <i class="fas fa-exclamation"></i>
                                    </small>
                                </span>';
                        }?>

                    </div>

                    <? require($_app->base_dir. "/vues/my_account/my_account_list_demand_per_annonce.php"); ?>

                </div>
            </li>

            <!-- Modal activate annonce -->
            <? require($_app->base_dir. "/vues/my_account/my_account_modal_active_annonce.php"); ?>
            <? require($_app->base_dir. "/vues/my_account/my_account_modal_desactive_annonce.php"); ?>


            <!-- Modal List avis-->
            <? require($_app->base_dir. "/vues/my_account/my_account_modal_list_avis.php"); ?>


            <!-- Modal activate announce by client-->
            <? require($_app->base_dir. "/vues/my_account/my_account_modal_validate_annonce.php");
        }

    }

    require($_app->base_dir. "/vues/my_account/my_account_legend_annonce.php");?>

</ul>
<? 
unset($_SESSION['infos_annonce']);
?>
    


<script>
$(document).ready(function()
{


    $("button[data-action='accept_demand_dates']").click(function(e)
    {
        var confirmate = confirm("Voulez-vous vraiment accepter cette date ?");

        if(confirmate === true)
        {
            $("div.loading_ajax").show();

            e.stopPropagation()
            var id_demand = $(this).data("id_demand");

            $.ajax({
                type : 'POST',
                url  : '/ajax/controller/gestion_demand_dates.php',
                dataType : "HTML",
                data : {"action" : "accept", "id_demand" : id_demand},
                success : function(data_return)
                {
                    reload_page();
                },
                complete : function(){
                    $("div.loading_ajax").hide();
                }
            });
        }
    });

    $("button[data-action='refuse_demand_dates']").click(function(e)
    {
        var confirmate = confirm("Voulez-vous vraiment refuser cette date ?");

        if(confirmate === true)
        {
            $("div.loading_ajax").show();

            e.stopPropagation()
            var id_demand = $(this).data("id_demand");

            $.ajax({
                type : 'POST',
                url  : '/ajax/controller/gestion_demand_dates.php',
                dataType : "HTML",
                data : {"action" : "refuse", "id_demand" : id_demand},
                success : function(data_return)
                {
                    reload_page();
                },
                complete : function(){
                    $("div.loading_ajax").hide();
                }

            });
        }
    });



    $("button[data-action='activate_annonce']").click(function(e){
        $("div.loading_ajax").show();

        e.stopPropagation()

        var btn_clicked = $(this);
        var id_annonce = btn_clicked.attr("data-id");


        $.ajax({
            type : 'POST',
            url  : '/ajax/controller/activate_desactivate_annonce.php',
            dataType : "HTML",
            data : {"action" : "activate", "id_annonce": id_annonce},
            success : function(){
                reload_page()
            },
            complete : function(){
                $("div.loading_ajax").hide();
            }
        });
    });


    $("button[data-action='desactivate_annonce']").click(function(e){
        
        var confirmate = confirm("Voulez-vous vraiment désactiver cette annonce ?");

        if(confirmate === true)
        {

            $("div.loading_ajax").show();

            e.stopPropagation()

            var btn_clicked = $(this);
            var id_annonce = btn_clicked.attr("data-id");

            

            $.ajax({
                type : 'POST',
                url  : '/ajax/controller/activate_desactivate_annonce.php',
                dataType : "HTML",
                data : {"action" : "desactivate", "id_annonce": id_annonce},
                success : function(){
                    reload_page()
                },
                complete : function(){
                    $("div.loading_ajax").hide();
                }
            });
        }
    });



    $(".modal btn[data-action='validate_annonce']").click(function(){
        $("div.loading_ajax").addClass('loaded');

        var btn_clicked = $(this);
        var id_annonce = btn_clicked.attr("data-id");
        var id_user = btn_clicked.attr("data-id-user");

        $.ajax({
            type : 'POST',
            url  : '/ajax/controller/validate_annonce_by_user.php',
            dataType : "HTML",
            data : {"action" : "validate_annonce", "id_annonce" : id_annonce, "id_user" : id_user},
            success : function(data_return)
            {
                $('#validate_'+id_annonce).modal('hide');
                
                $("h4[data-fct='return_fct_annonce']").html("Vous avez bien validé votre annonce, Merci").show(500).delay(3000).hide(500);
                setTimeout(reload_page, 2000);
            },
            complete : function(){
                $("div.loading_ajax").removeClass('loaded');
            }
        });
    });




    $("button[data-action='delete_announce']").click(function(e)
    {
        var confirmate = confirm("Voulez-vous vraiment supprimer cette annonce ?");


        if(confirmate === true)
        {
            e.stopPropagation()

            var id = $(this).data("id");

            $.ajax({
                type : 'POST',
                url  : '/ajax/controller/delete_announce.php',
                dataType : "HTML",
                data : {"action" : "delete_announce", "id" : id},
                success : function(data_return)
                {
                    setTimeout(reload_page,400);
                },
            });
        }
    });


    $("button[data-action='Delete_avis']").click(function(e)
    {

        var confirmate = confirm("Voulez-vous vraiment supprimer cette avis ?");

        e.stopPropagation()

        if(confirmate === true)
        {
            var button_clicked = $(this);
            $.ajax({
                type : 'POST',
                url  : '/ajax/controller/del_avis.php',
                dataType : "HTML",
                data : {"action" : "del_avis", "id_avis" : button_clicked.attr("data-id_avis")},
                success : function(data_return)
                {
                    //reload_page();
                },
            });
        }
    });
});


</script>