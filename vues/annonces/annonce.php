<div class="secondary" id="head"></div>
<div class="container-fluid text-center page_annonce"><?

	require($_app->base_dir."/vues/annonces/title_top.php");
	
	require($_app->base_dir."/vues/annonces/slide_images.php");

	require($_app->base_dir."/vues/annonces/option_annonce.php");
	
	require($_app->base_dir."/vues/annonces/type_vacances.php");
    
	require($_app->base_dir."/vues/annonces/details_and_price.php");
    
    require($_app->base_dir."/vues/annonces/maps.php"); ?>
	
</div><?


$add_sql = new stdClass();
$add_sql->rue = $last_announce->address_numero." ".$last_announce->address_rue;
$add_sql->ville = $last_announce->address_localite;
$add_sql->code_postal = $last_announce->address_zip_code;
$add_sql->pays = $last_announce->name_address_pays_sql;?>
