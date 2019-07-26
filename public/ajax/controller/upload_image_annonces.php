<?
require("ajax_min_load.php");


$nb_img_per_announce_max = 10;
$path_to_upload_img_annonce = $_app->base_dir."/public/images/annonces/";
$name_for_thumb = "_thumb.jpg";
$name_image_rand = str_replace(".", "", uniqid("Image", true));

if($_app->can_do_user->create_annonce)
{

	$id_annonce = get_last_id_announce($_app->sql, $_app->user->id_utilisateurs);
	

	$path_to_upload = $path_to_upload_img_annonce.$id_annonce."/";
	$path_to_preview = "/images/annonces/".$id_annonce."/";

	$nb_files_uploaded = get_nb_files_uploaded($path_to_upload, $name_for_thumb);
	

	//si il y a un id_annonce c'est que l'annonce est en train d'être crée ou qu"il y a une annonce pré encodée.
	// et donc on pêux aller voir dans le dossier si il ya  dejé des image ou pas , si oui, count number et return TPL de la list 
	
	if(!isset($_GET['option']))
	{
		if($nb_files_uploaded <= $nb_img_per_announce_max)
		{
			$img_upload_tmp = $_FILES['file']['tmp_name'];

			if (($img_info = getimagesize($img_upload_tmp)) !== FALSE)
			{

				$origin_width = $img_info[0];
				$origin_height = $img_info[1];
				$type = $img_info[2];


				if($type == IMAGETYPE_GIF)
					$new_img = imagecreatefromgif($img_upload_tmp);  

				else if($type == IMAGETYPE_JPEG)
					$new_img = imagecreatefromjpeg($img_upload_tmp);

				else if($type == IMAGETYPE_PNG)
					$new_img = imagecreatefrompng($img_upload_tmp);

				else 
					die("Error On IMG format");



				//creation de la big
				$img_empty_tmp_big = imagecreatetruecolor($origin_width, $origin_height);
				imagecopyresampled($img_empty_tmp_big, $new_img, 0, 0, 0, 0, $origin_width, $origin_height, $origin_width, $origin_height);
				imagejpeg($img_empty_tmp_big, $path_to_upload . $name_image_rand . ".jpg", 100);
				imagedestroy($img_empty_tmp_big);


				require($_app->base_dir."/app/includes/redim_img.php");
				fct_redim_image(150, 150, $path_to_upload, $name_image_rand . $name_for_thumb, $path_to_upload, $name_image_rand.".jpg");

			}
		
		}
	}
	else if(isset($_GET['option']))
	{	
		if($_GET["option"] == "preview_img")
		{
			if($dossier = opendir($path_to_upload))
			{
				while(false !== ($fichier = readdir($dossier)))
				{
					if($fichier != '.' && $fichier != '..' && !strpos($fichier, $name_for_thumb))
					{ 
						$fichier_name = str_replace(".jpg", "", $fichier);

						echo '<div class="col-xs-4 col-md-3 col-lg-2" style="margin-top:10px;">
								<a href="'. $path_to_preview.$fichier .'" data-lightbox="image-1" data-title="">
									<img src="'. $path_to_preview.$fichier .'">
								</a>
								<button type="button" data-id-img="'.$fichier_name.'" data-option="delete_img" class="btn btn-warning col-xs-12" style="padding: 5px 20px;">
									<i class="far fa-trash-alt"></i>
								</button>
							</div>';
					}
				}
			}
		}

		else if($_GET["option"] == "delete_img")
		{
			affiche($_GET);
			if(file_exists($path_to_upload . "/" . $_GET['id_img'] . ".jpg")){
				unlink($path_to_upload . "/" . $_GET['id_img'] .".jpg");
				unlink($path_to_upload . "/" . $_GET['id_img'] .$name_for_thumb);

			}
		}
	}
}



function get_nb_files_uploaded($path_to_upload, $name_for_thumb)
{
	$i = 0;
	if($dossier = opendir($path_to_upload))
	{
		while(false !== ($fichier = readdir($dossier)))
		{
			if($fichier != '.' && $fichier != '..' && !strpos($fichier, $name_for_thumb))
				$i++;
		}
	}
	$i++;
	return $i;
}


function get_last_id_announce($sql, $id_utilisateurs)
{
	$req_last_id = new stdClass();
	$req_last_id->table = ["annonces"];
	$req_last_id->var = ["id"];
	$req_last_id->where = ["id_utilisateurs = $1 AND active = $2", [$id_utilisateurs, "0"]];
	$req_last_id->limit = '1';

	return $sql->select($req_last_id)[0]->id;
}