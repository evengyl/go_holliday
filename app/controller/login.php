<?

Class login extends base_module
{
	public $_app;
	public $error = "";

	public function __construct(&$_app)
	{
		parent::__construct($_app);
		$this->_app->add_view("login");



		//si le client clique sur le lien pour renvoyer l'email de confirmation
		if(isset($_GET['resend']) && $_GET['resend'] == '1')
			$this->resend_mail_confirm();


		if($_GET['page'] == 'admin')
			$this->test_connect_form($_POST);


		if(isset($_POST['lost_login_form']))
		{
			//si login perdu on restaure ici 
			$this->restore_password($_POST);
			$this->assign_var("error", $this->error)->render_tpl();
		}
		else
		{
			//page de connexion formulaire
			$this->test_connect_form($_POST);
			$this->assign_var("error", $this->error)->render_tpl();

		}

		

	}

	private function resend_mail_confirm()
	{
		$req_sql = new StdClass();
       	$req_sql->table = "login";
       	$req_sql->data = "email";
       	$req_sql->where = ["login = $1", [$_SESSION['tmp_pseudo']]];
		$res_sql_login = $this->_app->sql->select($req_sql);

		if(isset($res_sql_login[0]->email))
			$mail = $res_sql_login[0]->email;
		else
			$mail = Config::$mail_spam;

		$this->_app->send_confirm_create_account_by_mail($mail);
		$this->error = "Un Email vous à été renvoyer, veuillez vérifier votre boite Mail";
	}


	private function test_connect_form($post)
	{

		if(isset($post['connect_form'])) {
			if($res_check_session = $this->check_connect_form($post))
			{

				if($res_check_session == true)
					Config::$is_connect = 1;

				else if(is_array($res_check_session))
				{
					//message perso
					$this->error = $res_check_session["error"];
					Config::$is_connect = 0;
				}
				else
					Config::$is_connect = 0;
			}
		}
	}



	public function check_connect_form($post = array())
	{
		$_SESSION['first_try_pseudo'] = "";
		$InputPseudo = "";
		$InputPassword = "";


		if(isset($post['connect_form']))
		{
		    if(isset($post["pseudo"]) && isset($post["password"]))
		    {
		    	$_SESSION['tmp_pseudo'] = $post["pseudo"];

		    	$InputPseudo = $this->check_post_length($post['pseudo'], Config::$length_pseudo_min);
		    	$InputPassword = $this->check_post_length($post['password'], Config::$length_password_min);

		    	if(!$InputPseudo || !$InputPassword)
		    	{
		    		$this->error = "!! Attention votre login ou votre mot de passe est trop court !!";
		    		return 0;
		    	}
		    	else
		    	{	
		           	$req_sql = new StdClass();
		           	$req_sql->table = "login";
		           	$req_sql->data = "id, login, password, level_admin, last_connect, id_utilisateurs";
		           	$req_sql->where = ["login = $1", [$InputPseudo]];
					$res_sql_login = $this->_app->sql->select($req_sql);


		            if(!empty($res_sql_login))
		            {
		            	$res_sql_login = $res_sql_login[0];

		            	if(password_verify($InputPassword, $res_sql_login->password))
		            	{
		            		$req_sql = new StdClass();
				           	$req_sql->table = "utilisateurs";
				           	$req_sql->data = "id, user_type, account_verify";
				           	$req_sql->where = ["id = $1", [$res_sql_login->id_utilisateurs]];
							$res_fx_id_user = $this->_app->sql->select($req_sql);

							if($res_fx_id_user[0]->account_verify == 1)
							{
								$this->set_session_login($res_sql_login, $res_fx_id_user);
								$this->_app->add_view("login_success");
			                	return 1;
							}
							else{

	            				$this->error = "Ce compte n'a pas encore été activé, veuillez vérifier vos Email ";
	            				$this->error .= "<a href='Connexion/Resend' >Renvoyer l'email de confirmation</a>";
							}
							
		            	}
		            	else
		            	{
		            		//Il a déjà essayer de mettre son pseudo mais le mdp est incorect donc on on le remet dans le input
		            		$_SESSION['first_try_pseudo'] = $InputPseudo;
		            		$this->error = 'Mot de passe incorrect';
		            		return 0;
		            	}
		                
		            }
		            else
		            {
		            	$this->error = 'Login incorrect ou inexistant';
		                return 0;
		            }
		    	}
		    }
		    else
		    {
		        $this->error = 'Formulaire mal rempli';
		        return 0;
		    }
		}
		else
			return 0;
	}


	private function set_session_login($res_sql_login, $res_fx_id_user)
	{
    	unset($_SESSION['first_try_pseudo']);
    	unset($post);
        $_SESSION['pseudo'] = $res_sql_login->login;
        $_SESSION['level_admin'] = $res_sql_login->level_admin;
        $_SESSION['last_connect'] = $res_sql_login->last_connect;
        $_SESSION['user_type'] = $res_fx_id_user[0]->user_type;
	}


	private function restore_password($post)
	{
	    if(isset($post["pseudo_mail"]))
	    {
	    	if(!$pseudo = $this->check_post_length($post['pseudo_mail'], 4))
	    	{
	    		$_SESSION['first_try_pseudo'] = "";
	    		$this->error = "!! Attention votre login est trop court !!";
	    	}
	    	else
	    	{	
	           	$req_sql = new StdClass();
	           	$req_sql->table = "login";
	           	$req_sql->data = "login, password_no_hash, email, name, last_name, id_create_account";
	           	$req_sql->where = ["login = $1 OR email = $2", [$pseudo, $pseudo]];
				$res_fx = $this->_app->sql->select($req_sql, 1);

	            if(empty($res_fx))
	                $this->error = 'Login incorrect pour la récupération de mot de passe.';
	            else
	            {
		            $password = $res_fx[0]->password_no_hash;
		            $email_to_send = $res_fx[0]->email;
		            $headers[] = "MIME-Version: 1.0";
		            $headers[] = "Content-type: text/html; charset=iso-8859-1";

					if(!$content_html = file_get_contents($this->_app->base_dir."/vues/mail_tpl/lost_password.html"))
					{
						// en cas d'erreur de tpl
						$headers = 'From:"Go Holliday" <info.go.holliday@gmail.com>';

						mail("info.go.holliday@gmail.com", "Erreur de TPL", "Une erreur est survenue avec la lecture du template de mail Lost_password", $headers);
					}
					else
					{
						//donnée personnel du nouvel utilisateur à envoyer par mail
						$id = $res_fx[0]->id_create_account;
						$name = $res_fx[0]->name;
						$last_name = $res_fx[0]->last_name;
						$domain = $this->_app->base_dir;
						$mail = $res_fx[0]->email;
						$site_name = $this->_app->site_name." - ".date("Y");

						$subject = "Récupération du Mot de passe sur ".$this->_app->site_name;
						$headers = "MIME-Version: 1.0\r\n";
						$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

						$content_html = str_replace(
								["##NAME##", "##LASTNAME##", "##DOMAIN##", "##ID##", "##SITENAME##", "##PASSWORD##"], 
								[$name, $last_name, $domain, $id, $site_name, $password],
							$content_html);

						if(mail($mail, $subject, $content_html, $headers))
						{
							$headers = 'From:"Go Holliday" <info.go.holliday@gmail.com>';

							mail("info.go.holliday@gmail.com", "Erreur de MAIL", "Une erreur est survenue avec l'envoi du mail de recupération de mot de passe avec les données suivantes\r\n
								Nom : ". $name ."\r\n
								Prénom : ". $last_name ."\r\n
								ID unique d'enregistrement : ". $id .""
								, $headers);
						}
					}




		            $this->error = 'Un Email vient de vous être envoyé avec votre mot de passe, n\'hésitez pas à le changer dans votre compte au besoin.';

	            	unset($post);
	            }
	    	}
	    }
	}

	private function check_post_length($text, $minChar = 0)
	{
		$text = trim($text);
		$text = htmlentities($text);
		$nb_char = strlen($text);

		if($nb_char < $minChar)
			return 0;	
		else
			return $text;
	}
}
