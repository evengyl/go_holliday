<?php 
Class login extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{
		$this->_app = $_app;

		//on met le nom du module dans le app pour l'envoyer a base module
		$this->_app->module_name = __CLASS__;
		parent::__construct($this->_app);


		if(!$this->_app->option_app['app_with_login_option'])
			$this->get_html_tpl = $this->use_template('home')->render_tpl();


		//va checker a chaque page si on est bien logger
		if(isset($_POST['connect_form']) || isset($_POST['lost_login_form'])) 
			Config::$is_connect = $this->check_session($_POST);

		else if(isset($_SESSION['pseudo']))
            Config::$is_connect =  1;

		else
            Config::$is_connect =  0;

		//on check si connecter, si oui on set les infos user dans le app
		if(Config::$is_connect)
			$this->_app->user = $this->set_user_infos($this->_app);
		else
			$this->_app->user = [];


        
        // on set le bread
		if(isset($_GET['page']) && $_GET['page'] == "login")
			$this->_app->navigation->set_breadcrumb('__TRANS_login__'); 

		
		$this->get_html_tpl = $this->use_template('login')->render_tpl();

	}

	private function set_user_infos()
	{
		if(empty($this->_app->user))
		{
			$req_sql = new stdClass;
			$req_sql->table = "login";
			$req_sql->var = "*";
			$req_sql->where = "login ='".$_SESSION['pseudo']."'";
			$res_fx = $this->_app->sql->select($req_sql);	
			return $res_fx[0];
		}
	}

	public function check_session($post)
	{
		if(isset($post['connect_form']))
		{
		    if(isset($post["pseudo"]) && isset($post["password"]))
		    {
		    	$pseudo = $this->check_post_login($post['pseudo'], $is_pseudo = 1);
		    	$password = $this->check_post_login($post['password']);

		    	if(!$pseudo || !$password)
		    	{
		    		$_SESSION['error_login'] = "!! Attention votre login ou votre mot de passe est trop court !!";
		    		return 0;
		    	}
		    	else
		    	{	
		           	$req_sql = new StdClass();
		           	$req_sql->table = "login";
		           	$req_sql->var = "login, password, level, last_connect";
		           	$req_sql->where = ["login" => $pseudo];
					$res_fx = $this->_app->sql->select($req_sql);

		            if(empty($res_fx))
		            {
		            	$_SESSION['tmp_pseudo'] = "";
		                $_SESSION['error_login'] = 'Login incorrect ou inexistant';
		                return 0;
		            }
		            else if(isset($res_fx[0]->login))
		            {
		            	$res_fx = $res_fx[0];

		            	if(password_verify($password, $res_fx->password))
		            	{
			            	unset($_SESSION['error_login']);
			            	unset($_SESSION['tmp_pseudo']);
			            	unset($post);
			                $_SESSION['pseudo'] = $res_fx->login;
			                $_SESSION['level'] = $res_fx->level;
			                $_SESSION['last_connect'] = $res_fx->last_connect;
			                return 1;
		            	}
		            	else
		            	{
		            		$_SESSION['tmp_pseudo'] = $pseudo;
		            		$_SESSION['error_login'] = 'Mot de passe incorrect';
		            		return 0;
		            	}
		            }
		            else
		            {
		            	$_SESSION['tmp_pseudo'] = $pseudo;
		            	$_SESSION['error_login'] = 'Mot de passe incorrect';
		            	return 0;
		            }
		    	}
		    }
		    else
		    {
		        $_SESSION['error_login'] = 'Formulaire mal rempli';
		        return 0;
		    }
		}
		else if(isset($post['lost_login_form']))
		{
		    if(isset($post["pseudo_mail"]))
		    {
		    	$pseudo = $this->check_post_login($post['pseudo_mail'], $is_pseudo = 1);

		    	if(!$pseudo)
		    	{
		    		$_SESSION['error_login'] = "!! Attention votre login est trop court !!";
		    		return 0;
		    	}
		    	else
		    	{	
		           	$req_sql = new StdClass();
		           	$req_sql->table = "login";
		           	$req_sql->var = "login, password, password_no_hash, email";
		           	$req_sql->where = [["login" => $pseudo, "email" => $pseudo], "OR"];
					$res_fx = $this->_app->sql->select($req_sql, 1);

					affiche_pre($res_fx);
/*
		            if(empty($res_fx))
		            {
		                $_SESSION['error_login'] = 'Login incorrect pour la récupération de mot de passe.';
		            }
		            else
		            {
		            	$res_fx = $res_fx[0];
		            	unset($_SESSION['error_login']);
		            	unset($post);
		            	$subject = "Voici votre mot de passe : ".$res_fx->password_no_hash;
						mail($res_fx->email, "Recupération de mot de passe.", $subject);
		            }*/
		    	}
		    }
		    else
		    {
		        $_SESSION['error_login'] = 'Formulaire mal rempli';
		    }
		    return 0;
		}
		else
		{
			$_SESSION['error_login'] = "Attention, Le clients à tenter quelque chose avec le formulaire";
			return 0;
		}
	}
}


/* en terme de niveau de login
3 = superadmin
2 = employer
1 = client
0 = pas de login
*/