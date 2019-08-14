<?
Class my_account_lateral_right_account extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{
		parent::__construct($_app);


		//part change password
		//on check le form avec la session du random id form
		if(isset($_SESSION['rand_id_form_change_password']) && isset($_POST['return_post_account_pass_change']))
		{
			if($_SESSION['rand_id_form_change_password'] == $_POST['return_post_account_pass_change'])
				$this->change_password($_POST);
		}
		$rand_id_form = rand();
		$_SESSION['rand_id_form_change_password'] = $rand_id_form;


		$this->assign_var("rand_id_change_password", $_SESSION['rand_id_form_change_password'])->render_tpl();
	}	




	public function change_password($post)
	{
    	$password = $this->check_post_login_password($post['password-new']);

    	if($password == '0')
    	{
    		$_SESSION['error_change_password'] = "!! Attention votre mot de passe est trop court !!";
    		return 0;
    	}
    	else
    	{
    		$req_sql = new stdClass;
			$req_sql->table = "login";
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->password_no_hash = $password;
			$req_sql->ctx->password = $password = password_hash($password, PASSWORD_DEFAULT);
			$req_sql->where = "id = '".$this->_app->user->id."'";
			$res_sql = $this->_app->sql->update($req_sql);

			if(!$res_sql)
				$_SESSION['error_change_password'] = 'Votre mot de passe n\'à pas été changé, veuiller en informer l\'administrateur par la page de contact.';	

			else
				$_SESSION['error_change_password'] = 'Votre mot de passe à bien été changé.';	
    	}	
	}	
}
