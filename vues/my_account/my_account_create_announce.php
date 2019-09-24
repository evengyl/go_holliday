<div class="secondary" id="head"></div>
<div class="container-fluid text-center" style="background-color: white;">

	<div class="row">
		<h3 class="thin">Création / Modification d'une annonce de Locations <small class='thuin text-muted'>( Numéro : <?= $annonce->id; ?> )</small></h3><hr>
		<h4 class="text-muted thin">Prenez le temps d'être le plus précis possible dans se formulaire, car celui ci vous servira pour générer un maximum de vues et de demandes.<br>
		ne vous en faites pas il n'est à faire que une fois par bien et par an</h4><hr>

	</div>

	<div class="row page_create_annonce">
		<div class="col-xs-8 col-xs-offset-2">
			<form method="post" action="" data-toggle="validator" role="form" ><?

				require($_app->base_dir.'/vues/create_announce/type_part.php');

				require($_app->base_dir.'/vues/create_announce/habitats_part.php'); 

				require($_app->base_dir.'/vues/create_announce/title_part.php');
				
				require($_app->base_dir.'/vues/create_announce/image_part.php');

				require($_app->base_dir.'/vues/create_announce/address_part.php');

				require($_app->base_dir.'/vues/create_announce/date_part.php');
				
				require($_app->base_dir.'/vues/create_announce/complementary_part.php');
				
				require($_app->base_dir.'/vues/create_announce/price_part.php');

				?>

			    <div class="text-center col-xs-12"><hr>
			    	<input type="hidden" name="rand_id_create_annonce" value="<?= $rand_id_create_annonce ?>">
			        <button type="submit" class="btn btn-success btn-fill btn-wd">Valider la création de l'annonce</button>
			    </div>
			    <div class="clearfix"></div>
				<p class="text-muted thin" style="margin-top:15px;">Attention, tant qu'une annonce n'a pas été validée par vos soins, vous ne pourrez pas en créer une nouvelle</p>
			</form>
		</div>

		<div class="col-xs-2">
        	__MOD2_my_account_lateral_right_account__
    	</div>
	</div>
</div>
