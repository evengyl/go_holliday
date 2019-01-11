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

		//on check le form avec la session du random id form
		if(isset($_SESSION['rand_id_form_sign_up']) && isset($_POST['rand_id_sign_up']))
		{
			if($_SESSION['rand_id_form_sign_up'] == $_POST['rand_id_sign_up'])
				$this->treatment_sign_up($_POST);
		}


		//on génère un nombre aléatoire pour valider un form unique
		$rand_id_form = rand();
		$_SESSION['rand_id_form_sign_up'] = $rand_id_form;
		
		$this->get_html_tpl =  $this
								->assign_var('_app', $this->_app)
								->assign_var('rand_id_sign_up',$rand_id_form)
							->render_tpl();
	}

	private function verif_all_post($post)
	{
		foreach($post as $row_form_post)
		{
			if(empty($row_form_post))
				return 0;
		}
		return 1;
	}


	public function treatment_sign_up($post)
	{
		$post = [
			"login" => "legends",
	    "mail" => "dark.evengyl@gmail.com",
	    "last_name" => "baudoux",
	    "name" => "loic",
	    "age" => "27",
	    "tel" => "0497312523",
	    "genre" => "Monsieur",
	    "address_rue" => "sous ghoys",
	    "address_localite" => "labuissiere",
	    "zip_code" => "6567",
	    "pays" => "belgique",
	    "rand_id_sign_up" => "1270243225"];

		affiche_pre($post);

		$post_verif = $this->verif_all_post($post);
		if(!$post_verif)
			$_SESSION['error_sign_up'] = "Le formulaire n'a bizarement pas été rempli correctement.";

		else{

			//check si le login existe déjà dans la bsd
    		$req_sql = new stdClass;
			$req_sql->table = ["login"];
			$req_sql->var = ["login"];
			$req_sql->where = ["login = $1", [$post['login']]];
			$res_sql = $this->_app->sql->select($req_sql);
/*
			//si le pseudo n'est pas existant on peux créer le login
        	if(empty($res_sql))
            {
                $password_hash = password_hash($post["password"], PASSWORD_DEFAULT);

	    		$req_sql = new stdClass;
				$req_sql->ctx = new stdClass;
				$req_sql->ctx->login = $post["login"];
				$req_sql->ctx->password_no_hash = $password;
				$req_sql->ctx->password = $password_hash;
				$req_sql->ctx->email = $email;
				$req_sql->ctx->last_connect = date("U");
				$req_sql->ctx->level = 0;
				$req_sql->table = "login";
				//$this->_app->sql->insert_into($req_sql);

				//va insrer les données de bases pour le commencent du jeu
				
				unset($_SESSION['error_sign_up']);
				$_SESSION['error_sign_up'] = true;
	            unset($_POST); //on vide le post
	            return 1; //on
	            
            }
            else
            	$_SESSION['error_sign_up'] = 'Ce pseudo est déjà utilisé, veuillez en choisir un autre, Merci.';
*/
		}
	}
}