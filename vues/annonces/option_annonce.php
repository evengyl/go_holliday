<?
if(Config::$is_connect)
{
	if($_app->user->id_utilisateurs != $annonce->id_utilisateurs)
	{?>
		<div class="jumbotron" style="margin-top:15px;">
			<h3 class="text-center thin" style="margin-top:0px;">Elle vous intéresse ? Vous souhaiter aller plus loin ?</h3><?

			if($_app->user->as_reserved == 1 && $_app->user->can_let_avis == 0)
			{?>
				<div class="alert alert-info">
				<strong>Patience</strong>, vous avez déjà des dates pour cette endroits <i class="far fa-lg fa-smile-wink"></i>
				<strong>&nbsp;(vous pourrez laisser un avis par après en revenant ici !</strong></div><?
			}
			else if($_app->user->as_reserved == 0)
			{?>
				<div class="alert alert-info">
					Vous n'avez pas encore de dates réservée et validée pour cette annonce&nbsp;<i class="far fa-lg fa-grin-beam-sweat"></i>
				</div><?
			}?>
			
			<div class="row" style="margin-top:25px;"><?
				if(Config::$is_connect)
				{?>
					<div class="btn-group btn-group-justified" role="group" aria-label="...">
						<div class="btn-group" role="group">
							<button class="btn btn-danger" 
				        	<?=(isset($_app->user->login))?"":"disabled"; ?> 
				        	<?=(in_array($annonce->id, $_app->user->id_favorite))?"disabled":""; ?> 

				        	data-action="place_to_fav" data-id="<?= $annonce->id?>">
				        	<i class="far fa-lg fa-heart"></i>&nbsp;&nbsp;
				        	<?=(in_array($annonce->id, $_app->user->id_favorite))?"Cette annonce est déjà dans vos favorites":"Placer cette annonce dans mes favorites"; ?>
			        		</button>
						</div>

						<div class="btn-group" role="group">
							<button class="btn btn-info" 
		        				id="modal_<?= $annonce->id;?>" 
	        					data-toggle="modal" 
	        					data-id_message="<?= $annonce->id;?>" 
	        					data-target="#send_message_<?= $annonce->id;?>">
	        						<i class="far fa-lg fa-comments"></i>&nbsp;&nbsp;&nbsp;Prendre contact avec l'annonceur
    						</button>
						</div>

						<div class="btn-group" role="group">
							<button class="btn btn-success" data-toggle="modal" data-target="#modal_date">
								<i class="far fa-lg fa-calendar-alt"></i>&nbsp;&nbsp;&nbsp;Faire une demande de dates
							</button>
						</div><?
						if($_app->user->can_let_avis == 1)
						{?>
							<div class="btn-group" role="group">
								<button class="btn btn-warning" data-toggle="modal" data-target="#modal_avis">
									<i class="far fa-lg fa-star"></i>&nbsp;&nbsp;&nbsp;Laisser un avis de votre passage
								</button>

								<div class="modal fade" id="modal_avis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								    <div class="modal-dialog modal-lg" role="document">
								        <div class="modal-content">
								            <div class="modal-header">
								                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								                <h4 class="modal-title">Laisser un avis pour <?= $annonce->title ?></h4>
								            </div>
								            <div class="modal-body">
								            	<form action="#" method="post">
								            		<? require($_app->base_dir."/vues/annonces/notation_etoile.php"); ?>
								                    <textarea rows="2" name="message" class="form-control" placeholder="Laisser votre avis"></textarea>
								                    <input type="hidden" name="note" value="" id="note"/>
								                    <input type="hidden" name="rand_id_for_avis" value="<?= $_SESSION['rand_id_for_avis']; ?>" id="note"/>
								                    <button style="margin-top:15px;" class="btn btn-info" type="submit" role="button">
								                        Envoyer
								                    </button>
							                    </form>
								            </div>
								        </div>
								    </div>
								</div>

							</div><?
						}?>
					</div><?
				}
				else
				{
	    			?><div class="col-xs-12"><button disabled class="btn btn-info">Pour toutes actions, veuillez vous connecter</button></div><?	    			
	    		}?>
			</div>
		</div><?
		$data = $annonce;?>
		__MOD2_messagery("id_annonce=<?= $annonce->id; ?>","id_receiver=<?= $annonce->id_utilisateurs; ?>","specific_id_modal=<?= $annonce->id; ?>")__<?
	}
}
else
{?>
	<div class="alert alert-danger">
		<strong>Attention</strong> Veuillez vous connecter ou créer un compte pour voir plus d'informations <i class="far fa-lg fa-smile-wink"></i>
		<strong>&nbsp;(vous pouvez le faire ici <a href="/Connexion">Se connecter / s'inscrire</a>)</strong>
	</div><?
}?>



<script>
    $(document).ready(function()
    {

	    $("button[data-id_message='<?= $annonce->id;?>']").click(function(e)
	    {
	        $('.zone_message').animate({scrollTop : 9999999});
	    });

    	    
        $("button[data-action='place_to_fav']").click(function(){
            var button_clicked = $(this);
            $.ajax({
                type : 'POST',
                url  : '/ajax/controller/add_del_announce_favorite.php',
                dataType : "HTML",
                data : {"app_fct" : "add_to_favorite", "id_annonce" : button_clicked.attr("data-id")},
                success : function(data_return)
                {
                    button_clicked.attr("disabled", true).html("<i class='far fa-heart'></i>&nbsp;Cette annonce est déjà dans vos favorites");
                },
            });
        });
        
    });
</script>