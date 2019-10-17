<?

Class fct_global_website
{
	public $_app;

	public function __construct(&$_app)
	{
		$this->_app = $_app;
	}

	public function send_confirm_create_account_by_mail($mail_user)
	{
		$req_sql = new StdClass();
       	$req_sql->table = "utilisateurs";
       	$req_sql->data = "id, mail, name, last_name, user_type, id_create_account";
       	$req_sql->where = ["mail = $1 AND account_verify = $2", [$mail_user, "0"]];
		$res_fx_id_user = $this->_app->sql->select($req_sql);

		if(isset($res_fx_id_user[0]))
		{
			//donnée personnel du nouvel utilisateur à envoyer par mail
			$user = $res_fx_id_user[0];

			if($content_html = file_get_contents($this->_app->base_dir."/vues/mail_tpl/confirm_sign_up.html"))
			{
				//on set sont type de sign_up
				if($user->user_type == "0")
					$user->user_type = "Client";

				else if($user->user_type == "1")
					$user->user_type = "Annonceur";

				else
					$user->user_type = "Client";


				$id = $user->id_create_account;
				$name = $user->name;
				$last_name = $user->last_name;
				$domain = Config::$base_url;
				$type = $user->user_type;
				$mail = $user->mail;
				$site_name = $this->_app->site_name." - ".date("Y");

				$subject = "Confirmation d'inscription sur le site ".$this->_app->site_name;
				$headers = "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

				$content_html = str_replace(["##TYPE##", "##NAME##", "##LASTNAME##", "##DOMAIN##", "##ID##", "##SITENAME##"], [$type, $name, $last_name, $domain, $id, $site_name], $content_html);

				if(!mail($mail, $subject, $content_html, $headers))
				{
					$headers = 'From:"'.$this->_app->site_name.'" <'.Config::$mail.'>';

					mail(Config::$mail, "Erreur de MAIL", "Une erreur est survenue avec l'envoi du mail de confirmation avec les données suivantes\r\n
						Nom : ". $name ."\r\n
						Prénom : ". $last_name ."\r\n
						ID unique d'enregistrement : ". $id .""
						, $headers);
				}
			}
			else
			{
				// en cas d'erreur de tpl
				$headers = 'From:"'.$this->_app->site_name.'" <'.Config::$mail.'>';
				mail(Config::$mail, "Erreur de TPL", "Une erreur est survenue avec la lecture du template de mail Confirm_sign_up", $headers);
			}
		}
	}

	protected function set_user_infos_on_app()
	{

		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->data = "id, login, password, email, level_admin, id_utilisateurs, name, last_name, user_type, tel, address_numero, address_rue, zip_code, address_localite, age, pays, id_background_profil, account_verify, id_create_account, newsletter, id_favorite, genre, id_preference";
		$req_sql->where = ["login = $1", [$_SESSION['pseudo']]];
		$res_fx = $this->_app->sql->select($req_sql);


		$res_fx[0]->id_preference = explode(",", $res_fx[0]->id_preference);
		if(!empty($res_fx[0]->id_preference))
		{
			$res_fx[0]->list_preference = array();
			foreach($res_fx[0]->id_preference as $row_preference)
			{
				$req_sql = new stdClass;
				$req_sql->table = "utilisateur_preference";
				$req_sql->data = "*";
				$req_sql->where = ["id = $1", [$row_preference]];
				$res_sql = $this->_app->sql->select($req_sql);
				if(isset($res_sql[0]))
					$res_fx[0]->list_preference[] = $res_sql[0];
			}
		}

		//la liste des annonces favorite est en chaine de caractere on la remet en array
		$res_fx[0]->id_favorite = explode(",", $res_fx[0]->id_favorite);
		
	
		//on ressemble les deux array pour mettre a jour l'_app->user
		$merge_array_user = (object) array_merge((array) $this->_app->user, (array)$res_fx[0]);
		return $merge_array_user;
	}

	public function simulate_profil_user()
	{
		//redirige l'admin sur le compte client en simulant sont profil complet
		if(isset($_GET['login_simulate']) && !empty($_GET['login_simulate']))
		{
			$_SESSION["pseudo"] = $_GET['login_simulate'];
			$_SESSION["return_ad"] = 1;
			header('Location: /Mon_compte');
		}
		else
			return false;
	}

	public function check_level_user($login)
	{
		if($login)
		{
			$req_sql = new stdClass();
			$req_sql->table = 'login';
			$req_sql->data = "level_admin";
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
					$array_slide[] = "/images/slides_home/".$fichier;
			}
		}

		if($opacity)
			return $array_slide_opacity;
		else
			return $array_slide;
	}

	public function send_new_request_admin($object = "", $sujet="")
	{
		$content_html = file_get_contents($this->_app->base_dir."/vues/mail_tpl/request_admin.html");
		$content_html = str_replace(
								["##NAME##", "##ID##", "##SITENAME##", "##OBJECT##"], 
								[$this->_app->user->name, $this->_app->user->id_utilisateurs, $this->_app->site_name, $object],
							$content_html);

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		if(!empty($sujet))
				$subject = $sujet;
			else
				$subject = "Demande administrative";

		mail(Config::$mail, $subject, $content_html, $headers);
	}

	public function send_new_mail_client($object = "", $mail = "", $reason_why = "", $sujet= "")
	{
		if($reason_why == "new_message" || $reason_why == "new_demand" || $reason_why == "admin_say")
		{
			$content_html = file_get_contents($this->_app->base_dir."/vues/mail_tpl/mail_client.html");
			$content_html = str_replace(
									["##SITENAME##", "##OBJECT##"], 
									[$this->_app->site_name, $object],
								$content_html);

			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			if(!empty($sujet))
				$subject = $sujet;
			else
				$subject = "Demande administrative";

			mail($mail, $subject, $content_html, $headers);
		}
		else{
			return false;
		}
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