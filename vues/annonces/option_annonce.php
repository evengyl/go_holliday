<?
if(Config::$is_connect)
{
	if($_app->user->id_utilisateurs != $annonce->id_utilisateurs)
	{?>
		<div class="jumbotron" style="margin-top:15px;">
			<div class="container">
				<h3 class="text-center thin" style="margin-top:0px;">Elle vous intéresse ? Vous souhaiter aller plus loin ?</h3>
				<div class="row" style="margin-top:25px;"><?
					if(Config::$is_connect)
					{?>
				        <div class="col-xs-4">
				        	<button class="btn btn-danger" 
				        	<?=(isset($_app->user->login))?"":"disabled"; ?> 
				        	<?=(in_array($annonce->id, $_app->user->id_favorite))?"disabled":""; ?> 

				        	data-action="place_to_fav" data-id="<?= $annonce->id?>">
				        	<i class="far fa-heart"></i>&nbsp;
				        	<?=(in_array($annonce->id, $_app->user->id_favorite))?"Cette annonce est déjà dans vos favorites":"Placer cette annonce dans mes favorites"; ?>
			        		</button>
			        	</div>
			        	<div class="col-xs-4">
			        		<button class="btn btn-info" 
			        				id="modal_<?= $annonce->id;?>" 
		        					data-toggle="modal" 
		        					data-id_message="<?= $annonce->id;?>" 
		        					data-target="#send_message_<?= $annonce->id;?>">
		        						Prendre contact avec l'annonceur
        					</button>
        				</div>
			        	<div class="col-xs-4"><button class="btn btn-info" data-toggle="modal" data-target="#modal_date">Faire une demande de dates</button></div>
			        	prvoir un bouton laisser un avis, mais uniquement sur les user qui on une date reserved et le end date supérieur à la date actuel<?
					}
					else
					{
		    			?><div class="col-xs-12"><button disabled class="btn btn-info">Pour toutes actions, veuillez vous connecter</button></div><?	    			
		    		}?>
				</div>
			</div>
		</div><?
		$data = $annonce;?>
		__MOD2_messagery("id_annonce=<?= $annonce->id; ?>","id_receiver=<?= $annonce->id_utilisateurs; ?>","specific_id_modal=<?= $annonce->id; ?>")__<?
	}
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