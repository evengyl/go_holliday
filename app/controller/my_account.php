<?

Class my_account extends base_module
{
	public $_app;
	public $annonces;
	public $num_page = array();

	public function __construct(&$_app)
	{		
		$this->_app = $_app;	
		$this->_app->module_name = __CLASS__;
		
		parent::__construct($this->_app);

		
		
		//récupérations des annonces de l'utilisateur
		$this->get_list_annonce_user();

		//je récupère les infos de l'user en cours
		$this->get_infos_user();
		
		//part change password

		//on check le form avec la session du random id form
		if(isset($_SESSION['rand_id_form_change_password']) && isset($_POST['return_post_account_pass_change']))
		{
			if($_SESSION['rand_id_form_change_password'] == $_POST['return_post_account_pass_change'])
				$this->change_infos($_POST);
		}
		$rand_id_form = rand();
		$_SESSION['rand_id_form_change_password'] = $rand_id_form;
			


		$this->get_html_tpl =  $this->assign_var("nb_page", $this->nb_page)
									->assign_var("num_page", $this->num_page)
									->assign_var('_app', $this->_app)
									->assign_var('infos_user', $this->_app->user)
									->assign_var("annonces", $this->annonces)
									->assign_var("rand_id_change_password", $_SESSION['rand_id_form_change_password'])
								->render_tpl();
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

			// part pagination
			$nb_page = $this->_app->user->nb_annonces;
			$nb_page = ceil($nb_page / 10);
			$this->nb_page = $nb_page;

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

		//part pagination LIMIT
		if(isset($_GET['num_page']) && $_GET['num_page'] != 1)
		{
			$limit_get = (int)$_GET['num_page'];
			$max_limit = $limit_get*10;
			$min_limit = $max_limit-10;
			$limit_current = $min_limit .", ". $max_limit;
			$this->num_page["active"] = $limit_get;
			$this->num_page["prev"] = $limit_get-1;
			$this->num_page["next"] = $limit_get+1;
		}
		else
		{
			$limit_current = "0, 10";
			$this->num_page["active"] = 1;
			$this->num_page["prev"] = 1;
			$this->num_page["next"] = 2;
		}


		//part sql annonces list
		if($this->_app->can_do_user->view_annonce_list)
		{
			$sql_annonce = new stdClass();
			$sql_annonce->table = ['annonces', "date_annonces"];
			$sql_annonce->var = [
				"annonces" => ['id', "id_pays", "id_habitat", "id_type_vacances", "id_utilisateurs", "name AS name_annonce", "lieu AS lieu_annonce", "active", "create_date", "vues"],
				"date_annonces" => ["start_date", "end_date", "prix"]
			];
			$sql_annonce->limit = $limit_current;
			$sql_annonce->order = "id";

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