<?

require("ajax_min_load.php");

if($_app->can_do_user->create_annonce)
{
	$array_return = [];
	$id_utilisateurs = $_GET["id_utilisateurs"];
	$path_to_upload = $_app->base_dir."/public/datas/clients_documents/".$id_utilisateurs."/";

	if(get_nb_files_uploaded($path_to_upload) < 10)
	{
		$fileError = $_FILES['file']['error'];
		if($fileError == 0)
		{
			$sourcePath = $_FILES['file']['tmp_name'];
			move_uploaded_file($sourcePath, $path_to_upload.$_FILES['file']['name']);

			$array_return["success"] = $_FILES['file']['name'];
		}
		else
		{

			$phpFileUploadErrors = array(
			    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
			    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
			    3 => 'The uploaded file was only partially uploaded',
			    4 => 'No file was uploaded',
			    6 => 'Missing a temporary folder',
			    7 => 'Failed to write file to disk.',
			    8 => 'A PHP extension stopped the file upload.',
			);

			$array_return = ["error_upload" => $phpFileUploadErrors[$fileError]];
		}

		
	}
}



function get_nb_files_uploaded($path_to_upload)
{
	$i = 0;
	if(!file_exists($path_to_upload)){
		mkdir($path_to_upload);
	}

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


