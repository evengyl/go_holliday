<footer id="footer" class="top-space">
	<div class="footer1">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-4 widget">
					<h3 class="widget-title">Détails de contact</h3>
					<div class="widget-body">
						<p>
							Email de contact : <a href="mailto:<?= Config::$mail; ?>"><?= $_app->site_name; ?></a><br>
							<br>
							<b>Téléphone Administrateur : </b><?= Config::$tel_technical ?><br>
							<b>Téléphone Commercial : </b><?= Config::$tel_commercial ?><br>
						</p>	
					</div>
				</div>

				<div class="col-lg-3 widget">
					<h3 class="widget-title">Suivez-nous sur facebook</h3>
					<div class="widget-body">
						<p class="follow-me-icons">
							<a href=""><i class="fa fa-facebook fa-2"></i></a>
						</p>	
					</div>
				</div>

				<div class="col-lg-5 widget">
					<h3 class="widget-title"><?= $_app->site_name; ?></h3>
					<div class="widget-body">
						<p>Nous vous proposons une interface simple et intuitive pour chercher / trouver / réservez vos vacances en familles etc..</br>
		Vous aurez accès a une interface gratuite et sans limite d'utilisation pour gérer vos vacances car :<br> nous vous mettons directement en relation avec un propriétaire 
		de bungalow, appartement, maison d'hôtes, maison de vacances, caravanes, appartement.<br>
	</p>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="footer2">
		<div class="container">
			<div class="row">
				
				<div class="col-xs-6 widget">
					<div class="widget-body">
						<p class="simplenav">
							<a href="#">Acceuil</a> | 
							<b><a href="/Contact">Contact</a></b> | 
							<b><a href="/Recherche">Recherche de vacances</a></b>

						</p>
					</div>
				</div>

				<div class="col-xs-6 widget">
					<div class="widget-body">
						<p class="text-right">
							<p><?php echo Config::$footer_text." - ".date('Y'); ?> Tous les prix sont TVAC.</p>
							 <a href="/Condition">Condition générale d'utilisation</a>
						</p>
					</div>
				</div><?
				if(isset($_app->user->level_admin) && Config::$is_connect && $_app->user->level_admin >= 3)
                {?>
					<div class="col-xs-12 widget">
						<div class="widget-body" style="text-align:center; margin-top:15px; font-size:15px;"><?
	                        $active = "";
	                        if($_GET['page'] == 'admin')
	                            $active = "active";
	                        echo '<a href="/admin">Administration</a>';?>
		                </div>
		            </div><?
		        }?>
			</div>
		</div>
	</div>
</footer>	

<script>

$(document).ready(function()
{ 
    
  $(".zone_message").animate({ scrollTop: $(".zone_message").height() }, 1000);
});
</script>