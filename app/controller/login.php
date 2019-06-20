<?

Class login extends base_module
{
	public $_app;
	public $error;

	public function __construct(&$_app)
	{
		$this->_app = $_app;
		$this->_app->module_name = __CLASS__;
		parent::__construct($this->_app);

		$post = $_POST;


		if($_GET['page'] = 'admin')
			$this->test_connect_form($post);


		if($this->_app->option_app['app_with_login_option'] == 0)
		{
			if(isset($this->_app->var_module['AuthAdmin']))
				$this->get_html_tpl = $this->use_template("login")->render_tpl();
			else
				$this->get_html_tpl = $this->use_module("home")->render_tpl();
		}
		else
		{
			//si login perdu on restaure ici 
			if(isset($post['lost_login_form']))
				$this->restore_password($post);

			//page de connexion formulaire
			$this->test_connect_form($post);
			


	        // on set le bread
			if(isset($_GET['page']) && $_GET['page'] == "login")
				$this->_app->navigation->set_breadcrumb('__TRANS_login__'); 

			$this->get_html_tpl = $this->assign_var("error", $this->error)->use_template('login')->render_tpl();

		}

	}

	private function test_connect_form($post)
	{
		if(isset($post['connect_form'])) {
			if($res_check_session = $this->check_connect_form($post))
			{
				if($res_check_session === true)
					Config::$is_connect = 1;

				else if(is_array($res_check_session))
				{
					//message perso
					$this->error = $res_check_session["error"];
					Config::$is_connect = 0;
				}
				else if($res_check_session === false)
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
		    	$InputPseudo = $this->check_post_login($post['pseudo']);
		    	$InputPassword = $this->check_post_password($post['password']);

		    	if(!$InputPseudo || !$InputPassword)
		    	{
		    		$this->error = "!! Attention votre login ou votre mot de passe est trop court !!";
		    		return 0;
		    	}
		    	else
		    	{	
		           	$req_sql = new StdClass();
		           	$req_sql->table = ["login"];
		           	$req_sql->var = ["id", "login", "password", "level", "last_connect", "id_utilisateurs"];
		           	$req_sql->where = ["login = $1", [$InputPseudo]];
					$res_sql_login = $this->_app->sql->select($req_sql);

		            if(!empty($res_sql_login))
		            {
		            	$res_sql_login = $res_sql_login[0];

		            	if(password_verify($InputPassword, $res_sql_login->password))
		            	{
		            		$req_sql = new StdClass();
				           	$req_sql->table = ["utilisateurs"];
				           	$req_sql->var = ["id","user_type", "account_verify"];
				           	$req_sql->where = ["id = $1", [$res_sql_login->id_utilisateurs]];
							$res_fx_id_user = $this->_app->sql->select($req_sql);

							if($res_fx_id_user[0]->account_verify == 1)
							{
								$this->set_session_login($res_sql_login, $res_fx_id_user);
			                	return 1;
							}
							else
	            				return ["error" => "Ce compte n'a pas encore été activé, veuillez vérifier vos Email"];
							
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
        $_SESSION['level'] = $res_sql_login->level;
        $_SESSION['last_connect'] = $res_sql_login->last_connect;
        $_SESSION['user_type'] = $res_fx_id_user[0]->user_type;
	}


	private function restore_password($post)
	{
	    if(isset($post["pseudo_mail"]))
	    {
	    	$pseudo = $this->check_post_login_login($post['pseudo_mail']);

	    	if(!$pseudo)
	    	{
	    		$_SESSION['first_try_pseudo'] = "";
	    		$this->error = "!! Attention votre login est trop court !!";
	    	}
	    	else
	    	{	
	           	$req_sql = new StdClass();
	           	$req_sql->table = ["login"];
	           	$req_sql->var = ["login", "password_no_hash", "email"];
	           	$req_sql->where = ["login = $1 OR email = $2", [$pseudo, $pseudo]];
				$res_fx = $this->_app->sql->select($req_sql);

	            if(empty($res_fx))
	            {
	                $this->error = 'Login incorrect pour la récupération de mot de passe.';
	            }
	            else
	            {
	            	require($this->_app->base_path."/vues/tpl_mail.php");

		            $title_mail = "test";
		            $password_mail = $res_fx[0]->password_no_hash;
		            $email_to_send = $res_fx[0]->email;
		            $headers[] = "MIME-Version: 1.0";
		            $headers[] = "Content-type: text/html; charset=iso-8859-1";

		            ob_start();
		            	get_tpl_mail_password_recover($title_mail, $password_mail);
		            $tpl = ob_get_clean();

	            	unset($this->error);
	            	unset($post);
	            	
					mail($email_to_send, "Recupération de mot de passe.", $tpl, implode("\r\n", $headers));
	            }
	    	}
	    }
	}

	private function check_post_login($text)
	{
		$text = trim($text);
		$text = htmlentities($text);
		$nb_char = strlen($text);

		$caractere_min = 4;
		if($nb_char < $caractere_min)
			return 0;	
		else
			return $text;
	}

	private function check_post_password($text)
	{
		$text = trim($text);
		$text = htmlentities($text);
		$nb_char = strlen($text);

		$caractere_min = 6;
		if($nb_char < $caractere_min)
			return 0;		
		else
			return $text;
	}
}
