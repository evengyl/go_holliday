<?

Class my_account extends base_module
{
	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);

		$_app->navigation->_stack_nav[] = 'Mon Compte';

		if($_GET['page'] == 'password_change')
			$_app->navigation->_stack_nav[] = "Changement de mot de passe";


		if(isset($_POST['return_post_account_pass_change']))
			$this->change_infos($_POST);

		$this->get_html_tpl =  $this->assign_var("user", $this->user)->render_tpl();
	}


	public function change_infos($post)
	{

		if($post['return_post_account_pass_change'] == 18041997)
		{
		    if(isset($post["password-new_1"]) && isset($post["password-new_2"]))
		    {
		    	if($post['password-new_1'] != "" && $post['password-new_2'] != "")
		    	{
			    	$password = $this->check_post_login($post['password-new_1']);
			    	$password_verification = $this->check_post_login($post['password-new_2']);

			    	if($password == '0' || $password_verification == '0')
			    	{
			    		$_SESSION['error'] = "!! Attention votre mot de passe est trop court !!";
			    		return 0;
			    	}
			    	else if($password != $password_verification)
			    	{
			    		$_SESSION['error'] = "Les mots de passe ne correspondent pas.";
			    		return 0;
			    	}
			    	else
			    	{
			    		$req_sql = new stdClass;
						$req_sql->table = "login";
						$req_sql->ctx = new stdClass;
						$req_sql->ctx->password_no_hash = $password;
						$req_sql->ctx->password = $password = password_hash($password, PASSWORD_DEFAULT);
						$req_sql->where = "login = '".$this->user->user_infos->login."'";
						$res_sql = $this->user->update($req_sql);

						if(!$res_sql)
						{
							$subject = "Attention le joueur : ".$this->user->user_infos->login." a voulu changer son mot de passe mais il y a eu un probleme dans la requete.";
							mail(Config::$mail, "Message d'erreur du site Diy N Game.", $subject);
							$_SESSION['error'] = 'Une erreur est survenue, l\'administration en est directement informée merci de patienter vous serez contacté.';
						}
						else
						{
							$_SESSION['error'] = 'Votre mot de passe à bien été changé.';	
						}
			    	}	
		    	}
		    	else
		    	{
		    		$_SESSION['error'] = 'Formulaire mal rempli';
		        	return 0;
		    	}
		    }
		    else
		    {
		        $_SESSION['error'] = 'Formulaire mal rempli';
		        return 0;
		    }
		}
		else
		{
			$_SESSION['error'] = "Attention, Le clients à tenter un priratage";
			return 0;
		}
	}
}