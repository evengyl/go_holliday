<?

Class fct_global_website extends announce_format
{
	public $_app;

	public function __construct(&$_app)
	{
		$this->_app = $_app;

	}

	protected function set_user_infos_on_app()
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
		return $merge_array_user;
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


	public function send_new_request_admin($object = "")
	{
		$content_html = file_get_contents($this->_app->base_dir."/vues/mail_tpl/request_admin.html");
		$content_html = str_replace(
								["##NAME##", "##ID##", "##SITENAME##", "##OBJECT##"], 
								[$this->_app->user->name, $this->_app->user->id, $this->_app->site_name, $object],
							$content_html);

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$subject = "Demande administrative";

		mail(Config::$mail, $subject, $content_html, $headers);
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