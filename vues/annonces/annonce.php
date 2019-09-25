<div class="secondary" id="head"></div>
<div class="container-fluid text-center page_annonce"><?

	if($_app->user->level_admin == 3)
		?><a class="btn btn-danger" href="/Mon_compte/Edition-Annonce/<?= $annonce->id; ?>">Editer</a><hr><?

	require($_app->base_dir."/vues/annonces/title_top.php");
	
	$height = "500px";
	$width = "";
	require($_app->base_dir."/vues/annonces/slide_images.php");

	require($_app->base_dir."/vues/annonces/option_annonce.php");

	require($_app->base_dir."/vues/annonces/modal_date.php");
	
	
	require($_app->base_dir."/vues/annonces/type_vacances.php");
    
	require($_app->base_dir."/vues/annonces/details_and_price.php");

	if($annonce->pays_name_human = "Belgique")
		require($_app->base_dir."/vues/annonces/meteo.php"); 
    
	require($_app->base_dir."/vues/annonces/maps.php");

	?>
</div><?


