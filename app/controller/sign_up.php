<?php 

Class sign_up extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{		
		$this->_app = $_app;
		$this->_app->module_name = __CLASS__;

		parent::__construct($_app);

		//on check le form avec la session du random id form pour creation de compte Client
		if(isset($_SESSION['rand_id_form_sign_up']) && isset($_POST['rand_id_form_sign_up']))
		{
			if($_SESSION['rand_id_form_sign_up'] == $_POST['rand_id_form_sign_up'])
				$this->treatment_sign_up($_POST);
		}


		//on génère un nombre aléatoire pour valider un form unique pour creation de compte Client
		$rand_id_form_sign_up = rand();
		$_SESSION['rand_id_form_sign_up'] = $rand_id_form_sign_up;

		

		if(isset($_GET['option_sign_up']))
		{
			if($_GET['option_sign_up'] !== '')
				$this->get_html_tpl =  $this->assign_var('_app', $this->_app)->assign_var('rand_id_form_sign_up',$rand_id_form_sign_up)->use_template('sign_up_'.strtolower($_GET['option_sign_up']))->render_tpl();
		}
		else
			$this->get_html_tpl =  $this->use_template('sign_up_global')->render_tpl();
		
	}

	private function treatment_sign_up($post)
	{
		$level_client = 0;

		foreach($post as $row_form_post)
		{
			if(empty($row_form_post))
				$post_verif = 0;
			else
				$post_verif = 1;
		}


		if($post_verif)
		{

			//on set sont type de sign_up
			if($this->_app->route["option_sign_up"] == "Client")
				$level_client = 0;
			else if($this->_app->route["option_sign_up"] == "VIP")
				$level_client = 1;

			//check si le login existe déjà dans la bsd
    		$req_sql = new stdClass;
			$req_sql->table = ["login"];
			$req_sql->var = ["login"];
			$req_sql->where = ["login = $1", [$post['login']]];
			$res_sql = $this->_app->sql->select($req_sql);

			//si le pseudo n'est pas existant on peux créer le login
        	if(empty($res_sql))
            {

                $password_hash = password_hash($post["password"], PASSWORD_DEFAULT);

	    		$req_sql_login = new stdClass;
				$req_sql_login->ctx = new stdClass;
				$req_sql_login->ctx->login = $post["login"];
				$req_sql_login->ctx->password_no_hash = $post["password"];
				$req_sql_login->ctx->password = $password_hash;
				$req_sql_login->ctx->email = $post["mail"];
				$req_sql_login->ctx->last_connect = date("U");
				$req_sql_login->ctx->level = $level_client;
				$req_sql_login->table = "login";
				$id_login = $this->_app->sql->insert_into($req_sql_login, $view_sql_prepare = 0, $return_insert_id = 1);

				//Enregistrement des infos utilisateurs
	    		$req_sql_utilisateurs = new stdClass;
				$req_sql_utilisateurs->ctx = new stdClass;
				$req_sql_utilisateurs->ctx->name = $post["name"];
				$req_sql_utilisateurs->ctx->last_name = $post["last_name"];
				$req_sql_utilisateurs->ctx->age = $post["age"];
				$req_sql_utilisateurs->ctx->tel = $post["tel"];
				$req_sql_utilisateurs->ctx->address_rue = $post["address_rue"];
				$req_sql_utilisateurs->ctx->address_numero = $post["address_numero"];
				$req_sql_utilisateurs->ctx->address_localite = $post["address_localite"];
				$req_sql_utilisateurs->ctx->zip_code = $post["zip_code"];
				$req_sql_utilisateurs->ctx->pays = $post["pays"];
				$req_sql_utilisateurs->ctx->genre = $post["genre"];
				$req_sql_utilisateurs->ctx->account_verify = 0;
				$req_sql_utilisateurs->table = "utilisateurs";
				$id_utilisateurs = $this->_app->sql->insert_into($req_sql_utilisateurs, $view_sql_prepare = 0, $return_insert_id = 1);


				//mise à jour de l'id user dans la table login pour lié le compte login a l'utilisateur
				$req_sql_utilisateurs = new stdClass;
				$req_sql_utilisateurs->ctx = new stdClass;
				$req_sql_utilisateurs->ctx->id_utilisateurs = $id_utilisateurs;
				$req_sql_utilisateurs->table = "login";
				$req_sql_utilisateurs->where = "id = ".$id_login;
				$this->_app->sql->update($req_sql_utilisateurs);


				
				$_SESSION['error_sign_up'] = true;
	            unset($_POST); //on vide le post
	            
            }
            else
            	$_SESSION['error_sign_up'] = 'Ce pseudo est déjà utilisé, veuillez en choisir un autre, Merci.';
		}
		else
			$_SESSION['error_sign_up'] = "Le formulaire n'a pas été rempli correctement.";
	}
}