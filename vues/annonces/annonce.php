<div class="secondary" id="head"></div>
<div class="container-fluid text-center page_annonce"><?

	if($_app->user->level_admin == 3)
	{?>
		<a class="btn btn-warning" href="/Mon_compte/Edition-Annonce/<?= $annonce->id; ?>">Editer</a>&nbsp;<?
		
		if($annonce->admin_validate == 1)
			echo '<button id="suspendre_'.$annonce->id.'" class="btn btn-danger">Mettre en suspend</button>&nbsp;';
		else
			echo '<button id="admin_validate_'.$annonce->id.'" class="btn btn-success">Valider l\'annonce</button>&nbsp;';

		?>
		<hr>
		<script>
			$("button#suspendre_<?= $annonce->id; ?>").click(function(){
				$.ajax({
				    type : 'POST',
				    url  : '/ajax/controller/suspend_annonce_by_admin.php',
				    dataType : "HTML",
				    data : {"action" : "suspend_annonce", "id_annonce": <?= $annonce->id; ?>},
				    success : function(){
				    	document.location.reload(true);
				    },
				});
			});

			$("button#admin_validate_<?= $annonce->id; ?>").click(function(){
				$.ajax({
				    type : 'POST',
				    url  : '/ajax/controller/validate_annonce_by_admin.php',
				    dataType : "HTML",
				    data : {"action" : "admin_validate", "id_annonce": <?= $annonce->id; ?>},
				    success : function(){
				    	document.location.reload(true);
				    },
				});
			});
		</script>

<?
	}

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
</div>


