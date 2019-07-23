<?

Class fct_global_website
{
	public $_app;

	public function __construct(&$_app)
	{
		$this->_app = $_app;
	}


	public function set_user_infos_on_app()
	{
		$req_sql = new stdClass;
		$req_sql->table = ["login", "utilisateurs"];
		$req_sql->var = [
			"login" => ["id", "login", "password", "email", "level_admin", "id_utilisateurs"],
			"utilisateurs" => [
				"name", 
				"last_name", 
				"genre", 
				"user_type", 
				"tel", 
				"address_numero", 
				"address_rue", 
				"zip_code", 
				"address_localite", 
				"age", 
				"pays", 
				"id_background_profil",
				"account_verify",
				"id_create_account",
				"newsletter"]
		];
		$req_sql->where = ["login = $1", [$_SESSION['pseudo']]];
		$res_fx = $this->_app->sql->select($req_sql);
		
		$merge_array_user = (object) array_merge((array) $this->_app->user, (array)$res_fx[0]);
		$this->_app->user = $merge_array_user;
	}

	public function check_level_user($login)
	{
		if($login)
		{
			$req_sql = new stdClass();
			$req_sql->table = ['login'];
			$req_sql->var = ["level_admin"];
			$req_sql->where = ["login = $1", [$login]];
			$res_sql = $this->_app->sql->select($req_sql);
			return $res_sql[0]->level_admin;
		}
		else
			return 0;
		
	}

	public function get_slide_home($opacity = false)
	{
		$array_slide = array();

		if($dossier = opendir($this->_app->base_dir.'/public/images/slides_home'))
		{
			while(false !== ($fichier = readdir($dossier)))
			{
				if($fichier != '.' && $fichier != '..')
					if(strpos($fichier, "_opa") === false)
						$array_slide[] = "/images/slides_home/".$fichier;
					else
						$array_slide_opacity[] = "/images/slides_home/".$fichier;
			}
		}

		if($opacity)
			return $array_slide_opacity;
		else
			return $array_slide;

		
	}
	
}


function affiche($var_a_print)
{
    ?><pre><?
        htmlentities(print_r($var_a_print));
    ?></pre><?
}

function paragraphe_style($text)
{
	?><p><?= $text; ?></p><?
}