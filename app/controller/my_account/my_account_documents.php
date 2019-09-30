<?
Class my_account_documents extends base_module
{
	public function __construct(&$_app)
	{		
		parent::__construct($_app);
		$this->_app->title_page .= " - Mes Documents";

		$this->verify_if_file_exists();
		$array_list_files = $this->get_list_file();


		$this->assign_var("documents", $array_list_files)
		->use_template('my_account_documents');
	}


	public function verify_if_file_exists()
	{
		if(!file_exists("datas/annonceurs_documents/".$this->_app->user->id_utilisateurs))
			mkdir("datas/annonceurs_documents/".$this->_app->user->id_utilisateurs);
	}


	public function get_list_file()
	{
		$array_list_files = array();

		if($dossier = opendir('datas/annonceurs_documents/'.$this->_app->user->id_utilisateurs))
		{
			$i = 0;
			while(false !== ($fichier = readdir($dossier)))
			{
				if($fichier != '.' && $fichier != '..'){

					$array_list_files[$i]["link"] = "/datas/annonceurs_documents/".$this->_app->user->id_utilisateurs."/".$fichier;
					$array_list_files[$i]["time"] = date('d/m/Y', fileatime("datas/annonceurs_documents/".$this->_app->user->id_utilisateurs."/".$fichier));
					$array_list_files[$i]["size"] = (filesize("datas/annonceurs_documents/".$this->_app->user->id_utilisateurs."/".$fichier))/1024/1024;
					$array_list_files[$i]["name"] = $fichier;
					$i++;
				}

			}
		}

		return $array_list_files;
	}
}
