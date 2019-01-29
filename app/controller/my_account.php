<?

Class my_account extends base_module
{
	public $_app;
	public $annonces;
	public $num_page = array();
	public $nb_page = 0;

	public function __construct(&$_app)
	{		
		$this->_app = $_app;	
		$this->_app->module_name = __CLASS__;
		
		parent::__construct($this->_app);

		//je récupère les infos de l'user en cours
		$this->get_nb_annonces();
		$this->get_nb_vues_total();

		//va chercher la liste des images dispo pour le changement d'image de back profil
		$array_back_profil_img = $this->get_list_lateral_back_profil_img();
		//va permettre de set dans la db le nouvel id de l'img de background
		if(isset($_POST['id_img_selected']))
			$this->set_new_img_back_profil($_POST['id_img_selected'], $array_back_profil_img);


		//récupérations des annonces de l'utilisateur
		if($this->_app->can_do_user->view_annonce_list)
		{
			$limit_pagination = $this->set_limit_pagination((isset($_GET['num_page'])?(int)$_GET['num_page']:1));
			$this->get_list_annonce_user($limit_pagination);	
		}

		

		$this->get_nb_private_message();

		//part change password
		//on check le form avec la session du random id form
		if(isset($_SESSION['rand_id_form_change_password']) && isset($_POST['return_post_account_pass_change']))
		{
			if($_SESSION['rand_id_form_change_password'] == $_POST['return_post_account_pass_change'])
				$this->change_password($_POST);
		}
		$rand_id_form = rand();
		$_SESSION['rand_id_form_change_password'] = $rand_id_form;
			

		$this->get_html_tpl =  $this->assign_var("nb_page", $this->nb_page)
									->assign_var("num_page", $this->num_page)
									->assign_var('_app', $this->_app)
									->assign_var("annonces", $this->annonces)
									->assign_var("rand_id_change_password", $_SESSION['rand_id_form_change_password'])
									->assign_var("img_back_profil", $array_back_profil_img)
									
								->render_tpl();
	}

	
	public function get_list_lateral_back_profil_img()
	{
		$array_back_profil_img = array();

		if($dossier = opendir($this->_app->base_dir.'/public/images/background_profil/'))
		{
			while(false !== ($fichier = readdir($dossier)))
			{
				if($fichier != '.' && $fichier != '..')
				{
					$array_back_profil_img[] = substr($fichier, 0, -4);
				}
			}
		}
		return $array_back_profil_img;
	}


	public function set_new_img_back_profil($id_img, $array_back_profil_img)
	{
		if(in_array($id_img, $array_back_profil_img))
		{
			$req_sql = new stdClass;
			$req_sql->table = "utilisateurs";
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->id_background_profil = $id_img;
			$req_sql->where = "id = '".$this->_app->user->id."'";
			$res_sql = $this->_app->sql->update($req_sql);
		}

		//on reset le user _app pour avoir les bonne infos mise à jour pour le tpl
		$security = new security($this->_app);
		$security->set_user_infos_on_app($forced_query = 1);
	}

	public function get_nb_annonces()
	{
		if($this->_app->can_do_user->view_nb_annonce)
		{
			$sql_nb_annonce = new stdClass();
			$sql_nb_annonce->table = ['annonces'];
			$sql_nb_annonce->var = "COUNT(id) as nb";
			$sql_nb_annonce->where = ["id_utilisateurs = $1", [$this->_app->user->id_utilisateurs]];
			$res_sql_nb = $this->_app->sql->select($sql_nb_annonce);
			$this->_app->user->nb_annonces = $res_sql_nb[0]->nb;

			$sql_nb_annonce = new stdClass();
			$sql_nb_annonce->table = ['annonces'];
			$sql_nb_annonce->var = "COUNT(id) as nb";
			$sql_nb_annonce->where = ["id_utilisateurs = $1 AND active = $2", [$this->_app->user->id_utilisateurs, '1']];
			$res_sql_nb = $this->_app->sql->select($sql_nb_annonce);
			$this->_app->user->nb_annonces_active = $res_sql_nb[0]->nb;

			$this->_app->user->nb_annonces_inactive = (int)$this->_app->user->nb_annonces - (int)$this->_app->user->nb_annonces_active;
		}
		else{
			$this->_app->user->nb_annonces_active = "0";
			$this->_app->user->nb_annonces_inactive = "0";
			$this->_app->user->nb_annonces = "N/A";
		}
	}

	public function get_nb_vues_total()
	{

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

	public function set_limit_pagination($num_page = 1)
	{
		$annonces_per_page = 10;

		// vas set le nombre de page total que l'on peux avoir
		$nb_page = $this->_app->user->nb_annonces;
		$nb_page = ceil($nb_page / $annonces_per_page);
		$this->nb_page = $nb_page;

		//part pagination LIMIT
		$limit_get = (int)$num_page;
		$max_limit = (($limit_get*10)-$annonces_per_page);
		$limit = $annonces_per_page ." OFFSET ". $max_limit;

		$this->num_page["active"] = $limit_get;

		if($limit_get-1 == 0)
			$this->num_page["prev"] = 1;
		else
			$this->num_page["prev"] = $limit_get-1;

		if($num_page == $this->nb_page)
			$this->num_page["next"] = $num_page;
		else
			$this->num_page["next"] = $limit_get+1;

		return $limit;
	}

	public function get_list_annonce_user($pagination_limit)
	{
		$sql_annonce = new stdClass();
		$sql_annonce->table = ['annonces', "date_annonces", "type_vacances"];
		$sql_annonce->var = [
			"annonces" => ['id', "id_pays", "id_habitat", "id_type_vacances", "id_utilisateurs", "name AS name_annonce", "lieu AS lieu_annonce", "active", "create_date", "vues"],
			"date_annonces" => ["start_date", "end_date", "prix"],
			"type_vacances" => ["name AS name_type_vacances"]
		];
		$sql_annonce->limit = $pagination_limit;
		$sql_annonce->order = ["id"];

		$sql_annonce->where = ["id_utilisateurs = $1", [$this->_app->user->id_utilisateurs]];
		$res_sql_annonces = $this->_app->sql->select($sql_annonce);
		$this->annonces = $res_sql_annonces;
		
	}

	public function get_nb_private_message()
	{
		if($this->_app->can_do_user->view_nb_private_message)
		{
			$this->_app->user->total_private_message = 0;
			$this->_app->user->private_message_not_view = 0;

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


					$sql_message = new stdClass();
					$sql_message->table = ['private_message'];
					$sql_message->var = "COUNT(id) as nb";
					$sql_message->where = ["id_annonces_link = $1 AND vu = $2", [$row_annonce->id, '0']];
					$res_sql_message = $this->_app->sql->select($sql_message);
					$this->_app->user->private_message_not_view += $res_sql_message[0]->nb;
				}
			}
		}
		else
			$this->_app->user->total_private_message = "Vous n'êtes pas annonceurs";
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