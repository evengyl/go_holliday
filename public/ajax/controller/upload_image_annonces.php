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

	$extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

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

	if($i <= 10)
	{

		$target_file = $path_to_upload.$i.".".$extension;
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
}
