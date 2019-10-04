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
			        	<div class="col-xs-4"><button class="btn btn-info" data-toggle="modal" data-target="#send_message_to_annoncer">Prendre contact avec l'annonceur</button></div>
			        	<div class="col-xs-4"><button class="btn btn-info" data-toggle="modal" data-target="#modal_date">Faire une demande de dates</button></div><?
					}
					else
					{
		    			?><div class="col-xs-12"><button disabled class="btn btn-info">Pour toute options, veuillez vous connecter</button></div><?	    			
		    		}?>
				</div>
			</div>
		</div><?
		$data = $annonce;
		require($_app->base_dir."/vues/modal_messagery.php");
	}
}?>


<script>
    $(document).ready(function()
    {
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