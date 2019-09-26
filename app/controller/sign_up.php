<?php 

Class sign_up extends base_module
{
	public $_app;
	public $validate = false;
	public $id_utilisateurs_last_insert;

	public function __construct(&$_app)
	{		
		parent::__construct($_app);
		$this->_app->add_view("sign_up");
		$this->_app->title_page = "Page d'inscription";


		//on check le form avec la session du random id form pour creation de compte Client
		if(isset($_SESSION['rand_id_form_sign_up']) && isset($_POST['rand_id_form_sign_up']))
		{
			if($_SESSION['rand_id_form_sign_up'] == $_POST['rand_id_form_sign_up'])
				$this->validate = $this->treatment_sign_up($_POST);
		}


		//on génère un nombre aléatoire pour valider un form unique pour creation de compte Client
		$_SESSION['rand_id_form_sign_up'] = str_replace(".", "", uniqid("CreateAccount", true));
		

		if(isset($_GET['option_sign_up']))
		{
			if(in_array($_GET['option_sign_up'], ["Client", "VIP"]))
				$this->assign_var('validate', $this->validate)
					->assign_var('rand_id_form_sign_up',$_SESSION['rand_id_form_sign_up'])
					->use_template('sign_up_'.strtolower($_GET['option_sign_up']));
			
			else
				$this->use_template('404');

		}
		else if(isset($_GET['id_sign_up_confirm']))
		{
			if($_GET['id_sign_up_confirm'] !== '')
			{
				if($this->update_confirm_account($_GET['id_sign_up_confirm']))
				{

					//ok le compte à été activé
					$this->use_template('sign_up_validate_confirm');
				}
				else{
					//renvoier la 404
					$this->use_template('404');
				}
			}
		}
		else
			$this->render_tpl();
		
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
			if($_GET["option_sign_up"] == "Client")
				$user_type = 0;
			else if($_GET["option_sign_up"] == "VIP")
				$user_type = 1;
			else
				$user_type = 0;


			//check si le login existe déjà dans la bsd
    		$req_sql = new stdClass;
			$req_sql->table = "login";
			$req_sql->data = "login";
			$req_sql->where = ["login = $1", [$post['login']]];
			$res_sql = $this->_app->sql->select($req_sql);

			//si le pseudo n'est pas existant on peux créer le login
        	if(empty($res_sql))
            {

                $password_hash = password_hash($post["password"], PASSWORD_DEFAULT);

	    		$req_sql_login = new stdClass;
	    		$req_sql_login->table = "login";
				$req_sql_login->ctx = new stdClass;
				$req_sql_login->ctx->login = $post["login"];
				$req_sql_login->ctx->password_no_hash = $post["password"];
				$req_sql_login->ctx->password = $password_hash;
				$req_sql_login->ctx->email = $post["mail"];
				$req_sql_login->ctx->last_connect = date("U");
				
				$id_login = $this->_app->sql->insert_into($req_sql_login, $view_sql_prepare = 0, $return_insert_id = 1);

				//Enregistrement des infos utilisateurs
	    		$req_sql_utilisateurs = new stdClass;
	    		$req_sql_utilisateurs->table = "utilisateurs";
				$req_sql_utilisateurs->ctx = new stdClass;
				$req_sql_utilisateurs->ctx->name = $post["name"];
				$req_sql_utilisateurs->ctx->last_name = $post["last_name"];
				$req_sql_utilisateurs->ctx->mail = $post["mail"];
				$req_sql_utilisateurs->ctx->age = $post["age"];
				$req_sql_utilisateurs->ctx->tel = $post["tel"];
				$req_sql_utilisateurs->ctx->address_rue = $post["address_rue"];
				$req_sql_utilisateurs->ctx->address_numero = $post["address_numero"];
				$req_sql_utilisateurs->ctx->address_localite = $post["address_localite"];
				$req_sql_utilisateurs->ctx->zip_code = $post["zip_code"];
				$req_sql_utilisateurs->ctx->pays = $post["pays"];
				$req_sql_utilisateurs->ctx->genre = $post["genre"];
				$req_sql_utilisateurs->ctx->account_verify = 0;
				$req_sql_utilisateurs->ctx->user_type = $user_type;
				$req_sql_utilisateurs->ctx->id_create_account = $post['rand_id_form_sign_up'];
				
				$this->id_utilisateurs_last_insert = $this->_app->sql->insert_into($req_sql_utilisateurs, $view_sql_prepare = 0, $return_insert_id = 1);


				//mise à jour de l'id user dans la table login pour lié le compte login a l'utilisateur
				$req_sql_utilisateurs = new stdClass;
				$req_sql_utilisateurs->ctx = new stdClass;
				$req_sql_utilisateurs->ctx->id_utilisateurs = $this->id_utilisateurs_last_insert;
				$req_sql_utilisateurs->table = "login";
				$req_sql_utilisateurs->where = "id = ".$id_login;
				$this->_app->sql->update($req_sql_utilisateurs);

				$this->_app->send_confirm_create_account_by_mail($post["mail"]);

	            unset($_POST); //on vide le post
	            return true;
            }
            else
            	$_SESSION['error_sign_up'] = 'Ce pseudo est déjà utilisé, veuillez en choisir un autre, Merci.';
		}
		else
			$_SESSION['error_sign_up'] = "Le formulaire n'a pas été rempli correctement.";
	}


	

	private function update_confirm_account($id_private)
	{
		//check si le login existe déjà dans la bsd
		$req_sql = new stdClass;
		$req_sql->table = "utilisateurs";
		$req_sql->data = "account_verify";
		$req_sql->where = ["id_create_account = $1", [$id_private]];
		$res_sql = $this->_app->sql->select($req_sql);

		if(isset($res_sql[0]->account_verify))
		{
			if($res_sql[0]->account_verify == 0)
			{
				//on update son statut a 1 et on renvoi true sur la fct et renvoi le tempalte qui dis que c'est activé et ok et qu'il peux se co
				$req_update_verify_account = new stdClass;
				$req_update_verify_account->ctx = new stdClass;
				$req_update_verify_account->ctx->account_verify = 1;
				$req_update_verify_account->table = "utilisateurs";
				$req_update_verify_account->where = "id_create_account = '".$id_private."'";
				$this->_app->sql->update($req_update_verify_account);
				return true;
			}
			else
			{
				// ce compte n'existe pas , on renvoi une 404
				$_SESSION['error_admin'] = "Ce compte à déjà été activé.";
				return false;
			}
		}
		else
		{
			// ce compte est déjà activé renvoyer sur la page 404
			$_SESSION['error_admin'] = "Ce compte n'existe pas, si un problème survient veuillez prendre contact avec l'administration par la page contact. Merci d'avance.";
			return false;
		}
	}
}
