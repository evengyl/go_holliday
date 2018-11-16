<?php 

Class sign_up extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{		
		$this->_app = $_app;
		$this->_app->module_name = __CLASS__;

		parent::__construct($_app);

		if(isset($_POST['sign_up']))
			$this->treatment_sign_up($_POST);
		
		$this->get_html_tpl =  $this->render_tpl();
	}


	public function treatment_sign_up($post)
	{
	    if(isset($post["pseudo"]) && isset($post["password-1"]) && isset($post["password-2"]) && isset($post["email"]))
	    {
	    	$pseudo = $this->check_post_login($post['pseudo'], $is_pseudo = 1);
	    	$password = $this->check_post_login($post['password-1']);
	    	$password_verification = $this->check_post_login($post['password-2']);
	    	$email = $this->check_post_login($post['email']);

	    	if(!$pseudo || !$password || !$password_verification || !$email)
	    		$_SESSION['error_sign_up'] = "!! Attention votre login ou votre mot de passe est trop court !!";

	    	else if($password != $password_verification)
	    		$_SESSION['error_sign_up'] = "Les deux mots de passe ne correspondent pas.";

	    	else
	    	{

	    		//check si le login existe déjà dans la bsd
	    		$req_sql = new stdClass;
				$req_sql->table = ["login"];
				$req_sql->var = ["login"];
				$req_sql->where = ["login = '".$pseudo."'"];
				$res_sql = $this->_app->sql->select($req_sql);

				//si le pseudo n'est pas existant on peux créer le login
            	if(empty($res_sql))
	            {
	                $password_hash = password_hash($password, PASSWORD_DEFAULT);

		    		$req_sql = new stdClass;
					$req_sql->ctx = new stdClass;
					$req_sql->ctx->login = $pseudo;
					$req_sql->ctx->password_no_hash = $password;
					$req_sql->ctx->password = $password_hash;
					$req_sql->ctx->email = $email;
					$req_sql->ctx->last_connect = date("U");
					$req_sql->ctx->level = 0;
					$req_sql->table = "login";
					$this->_app->sql->insert_into($req_sql);

					//va insrer les données de bases pour le commencent du jeu
					
					unset($_SESSION['error_sign_up']);
					$_SESSION['error_sign_up'] = true;
		            unset($_POST); //on vide le post
		            return 1; //on
		            
	            }
	            else
	            	$_SESSION['error_sign_up'] = 'Ce pseudo est déjà utilisé, veuillez en choisir un autre, Merci.';
	    	}	        
	    }
	    else
	        $_SESSION['error_sign_up'] = 'Formulaire mal rempli';
	}
}