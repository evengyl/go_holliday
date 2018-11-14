<?php 

Class sign_up extends base_module
{
	public $time_now;
	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);

		if(isset($_POST['return_form_complet']))
			$this->traitement_post_inscription($_POST);
		
		$this->get_html_tpl =  $this->render_tpl();
	}


	public function traitement_post_inscription($post)
	{

		if(isset($post['return_form_complet'])) //on s'assure qu'aucun erreur est générée si pas logged
		{

			if($post['return_form_complet'] == 14175155)
			{
			    if(isset($post["pseudo"]) && isset($post["password-1"]) && isset($post["password-2"]) && isset($post["email"]))
			    {
			    	$pseudo = $this->check_post_login($post['pseudo'], $is_pseudo = 1);
			    	$password = $this->check_post_login($post['password-1']);
			    	$password_verification = $this->check_post_login($post['password-2']);
			    	$email = $this->check_post_login($post['email']);

			    	if($pseudo == '0'|| $password == '0' || $password_verification == '0' || $email == '0')
			    	{
			    		$_SESSION['error'] = "!! Attention votre login ou votre mot de passe est trop court !!";
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
						$req_sql->var = "login";
						$req_sql->where = "login = '".$pseudo."'";

						$res_sql = $this->sql->select($req_sql);


		            	if(empty($res_sql))
			            {
			                $password_hash = password_hash($password, PASSWORD_DEFAULT);

				    		$req_sql = new stdClass;
							$req_sql->ctx = new stdClass;
							$req_sql->ctx->login = $pseudo;
							$req_sql->ctx->password_no_hash = $password;
							$req_sql->ctx->password = $password_hash;
							$req_sql->ctx->email = $email;
							$req_sql->ctx->last_connect = $this->set_time_now();
							$req_sql->ctx->avertissement = 0;
							$req_sql->ctx->level = 0;
							$req_sql->table = "login";
							$this->sql->insert_into($req_sql);

							//va insrer les données de bases pour le commencent du jeu
							
							$_SESSION['last_added_subscribe'] = 1;
			                $_SESSION['success'] = "Vous êtes désormais inscrit ! Merci !";
				    		unset($_SESSION['error']);
				            unset($post);
				            $this->set_all_component_basic($pseudo);
				            return 1;
				            
			            }
			            else
			            {
			            	$_SESSION['error'] = 'Ce pseudo est déjà utilisé.';
			        		return 0;
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
				$_SESSION['error'] = "Attention, Le clients à tenter un priratage";
				return 0;
			}

			
		}
		else if(isset($_SESSION['pseudo']))
			return 1;
		else
		{
			unset($_SESSION["error"]);
			return 0;
		}
	}



	public function set_time_now()
	{
		return date("U");
	}

	public function set_all_component_basic($pseudo)
	{
		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->var = "id";
		$req_sql->where = "login = '".$pseudo."'";

		$res_sql = $this->sql->select($req_sql);

		if(!empty($res_sql))
		{
			$id_user = $res_sql[0]->id;
			unset($res_sql);
		}

	}

}

