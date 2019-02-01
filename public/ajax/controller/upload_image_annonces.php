<?
require("ajax_min_load.php");


if($_app->can_do_user->create_annonce)
{

	$req_last_id = new stdClass();
	$req_last_id->table = ["annonces"];
	$req_last_id->var = ["id"];
	$req_last_id->where = ["id_utilisateurs = $1 AND name = $2", [$_SESSION['id_utilisateurs'], ""]];
	$req_last_id->limit = '1';

	$id_annonce = $_app->sql->select($req_last_id)[0]->id;

	$path_to_upload = $_app->path_to_upload_img_annonce.$id_annonce."/";
	$path_to_preview = "/images/annonces/".$id_annonce."/";

	$nb_files_uploaded = get_nb_files_uploaded($path_to_upload);
	



	//si il y a un id_annonce c'est que l'annonce est en train d'être crée ou qu"il y a une annonce pré encodée.
	// et donc on pêux aller voir dans le dossier si il ya  dejé des image ou pas , si oui, count number et return TPL de la list 
	if(isset($_GET['option']))
	{	
		if($_GET["option"] == "preview")
		{
			if($dossier = opendir($path_to_upload))
			{
				while(false !== ($fichier = readdir($dossier)))
				{
					if($fichier != '.' && $fichier != '..')
					{ 
						echo '<div class="col-xs-6 col-md-3">
								<a href="#" class="thumbnail deleted_img">
									<img src="'. $path_to_preview.$fichier .'" alt="...">
									<div class="delete_img col-xs-12"><button data-toggle="modal" data-target="#" class="btn col-xs-12" style=""><i class="far fa-trash-alt"></i></button></div>
								</a>

							</div>';

					}
				}
			}
		}
	}
	else
	{
		if($nb_files_uploaded <= 10)
		{
			$extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
			$target_file = $path_to_upload.$nb_files_uploaded.".".$extension;
			$uploadOk = 1;

		    $check = getimagesize($_FILES["file"]["tmp_name"]);
		    
		    if($check !== false)
		    {
		        $uploadOk = 1;

		        if(!file_exists($path_to_upload))
		        	mkdir($path_to_upload);

		    	if (file_exists($target_file))
		        {
				    $uploadOk = 0;

				    if ($_FILES["file"]["size"] > 5000000)
		    			$uploadOk = 0;
				} 
		    }
		    else
		        $uploadOk = 0;


		    if (!$uploadOk == 0)
			{
			    if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file))
			    	echo "ok";
			    else
			        echo "not ok";
			}
		
		}
		else{
			echo "Vous avez déjà envoyé 10 images. Veuillez en supprimer pour ajouter de nouvelles";
		}
	}
}



function get_nb_files_uploaded($path_to_upload)
{
	$i = 0;
	if($dossier = opendir($path_to_upload))
	{
		while(false !== ($fichier = readdir($dossier)))
		{
			if($fichier != '.' && $fichier != '..')
				$i++;
		}
	}
	$i++;
	return $i;
}