<?

Class my_account extends base_module
{
	public $_app;
	public $annonces;

	public function __construct(&$_app)
	{		
		$this->_app = $_app;	
		$this->_app->module_name = __CLASS__;
		
		parent::__construct($this->_app);


		
		//récupérations des annonces de l'utilisateur
		
			
			$this->get_list_annonce_user();

		//je récupère les infos de l'user en cours
		$this->get_infos_user();
		
		//affiche_pre($_app->user);

		if(isset($_POST['return_post_account_pass_change']))
			$this->change_infos($_POST);


		$this->get_html_tpl =  $this->assign_var('_app', $this->_app)->assign_var('infos_user', $this->_app->user)->assign_var("annonces", $this->annonces)->render_tpl();
	}

	public function get_infos_user()
	{

		if($this->_app->can_do_user->view_nb_annonce)
		{
			$sql_nb_annonce = new stdClass();
			$sql_nb_annonce->table = ['annonces'];
			$sql_nb_annonce->var = "COUNT(id) as nb";
			$sql_nb_annonce->where = ["id_utilisateurs = $1", [$this->_app->user->id_utilisateurs]];
			$res_sql_nb = $this->_app->sql->select($sql_nb_annonce);
			$this->_app->user->nb_annonces = $res_sql_nb[0]->nb;

			$this->_app->user->txt['infos_annonces_active'] = "Annonces actives";
		}
		else
			$this->_app->user->nb_annonces = "Vous ne pouvez pas créer d'annonce";


		if($this->_app->can_do_user->view_nb_vues_total)
		{
			$sql_vues = new stdClass();
			$sql_vues->table = ['annonces'];
			$sql_vues->var = ["vues"];
			$sql_vues->where = ["id_utilisateurs = $1 AND vues > $2", [$this->_app->user->id_utilisateurs, '0']];
			$res_sql_nb_vues = $this->_app->sql->select($sql_vues);

			$count = 0;
			foreach($res_sql_nb_vues as $row)
				$count += (int)$row->vues;

			$this->_app->user->nb_vues_total = $count;
		}
		else
			$this->_app->user->nb_vues_total = "Vous n'êtes pas annonceurs VIP";

	}

	public function get_list_annonce_user()
	{
		$this->_app->user->total_private_message = 0;

		if($this->_app->can_do_user->view_annonce_list)
		{
			$sql_annonce = new stdClass();
			$sql_annonce->table = ['annonces', "date_annonces"];
			$sql_annonce->var = [
				"annonces" => ['id', "id_pays", "id_habitat", "id_type_vacances", "id_utilisateurs", "name AS name_annonce", "lieu AS lieu_annonce", "active", "create_date", "vues"],
				"date_annonces" => ["start_date", "end_date", "prix"]
			];

			$sql_annonce->where = ["id_utilisateurs = $1", [$this->_app->user->id_utilisateurs]];
			$res_sql_annonces = $this->_app->sql->select($sql_annonce);
			$this->annonces = $res_sql_annonces;
			
			if($this->_app->can_do_user->view_nb_private_message)
			{
				if(!empty($this->annonces))
				{
					foreach($this->annonces as $key => $row_annonce)
					{
						$sql_message = new stdClass();
						$sql_message->table = ['private_message'];
						$sql_message->var = "COUNT(id) as nb";
						$sql_message->where = ["id_annonces_link = $1", [$row_annonce->id]];
						$res_sql_message = $this->_app->sql->select($sql_message);
						$this->_app->user->total_private_message += $res_sql_message[0]->nb;
						$this->annonces[$key]->message = $res_sql_message[0]->nb;
					}
				}
			}
			else
				$this->_app->user->total_private_message = "Vous n'êtes pas annonceurs";
		}
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