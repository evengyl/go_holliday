<?
Class admin extends base_module
{
	public $level = 0;
	public $error;

	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);

		$this->_app->navigation->set_breadcrumb("Option d'administration");

		
		if($this->level = $this->check_level_user(isset($_SESSION['pseudo'])?$_SESSION['pseudo']:0))
		{
			//ok connecter
			//verif si on est admin
			if($this->level >= 3)
			{
				
				if(isset($_GET['action']))
				{
					$action = $_GET['action'];

					if($action == "edit_config_app")
						$this->get_html_tpl = $this->use_module('admin_edit_config_app')->render_tpl();
					
					else if($action == "eval")
						$this->get_html_tpl = $this->use_module('admin_eval')->render_tpl();

					else if($action == "pull_bsd")
						$this->get_html_tpl = $this->use_module('admin_pull_bsd')->render_tpl();

					else if($action == "go_to_vip_view"){
						$this->set_status_vip();
						$this->get_html_tpl = $this->assign_var("_app",$_app)->render_tpl(); //on affiche l'administration
					}
					else if($action == "go_to_no_vip_view"){
						$this->set_status_no_vip();
						$this->get_html_tpl = $this->assign_var("_app",$_app)->render_tpl(); //on affiche l'administration
					}
					else if($action == "go_to_client_view"){
						$this->set_status_client();
						$this->get_html_tpl = $this->assign_var("_app",$_app)->render_tpl(); //on affiche l'administration
					}
					else if($action == "verify_status_vip")//si le user n'est plus VIP ont désactive toutes les annonces
					{
						$this->get_html_tpl = $this->use_module('admin_verify_status_vip')->render_tpl();
					}
						
				}
				else{
					$this->get_html_tpl = $this->assign_var("_app",$_app)->render_tpl(); //on affiche l'administration
				}
			}
			else // il 'agit d'office d'un essaie de piratage car la page admin n'est pas trouvable donc 404
			{
				$_SESSION['error_admin'] = "Vous avez tenter de vous connecter à une page non autorisée.";
				$this->get_html_tpl = $this->use_template('404')->render_tpl();
			}
		}
		else{
			//go page de connexion
			$this->error = "Vous n'avez pas accès à cette page.</br>Seul l'administration peux y accéder";
			$this->get_html_tpl = $this->assign_var("error", $this->error)->use_module('login', $var_to_module = 'AuthAdmin')->render_tpl();
		}


		
	}

	

	public function set_status_client()
	{
		$sql = new stdClass();
		$sql->table = "utilisateurs";
		$sql->ctx = new stdClass();
		$sql->ctx->user_type = "0";
		$sql->where = "id = ".$this->_app->user->id_utilisateurs;

		$this->_app->sql->update($sql);

	}

	public function set_status_vip()
	{
		$sql = new stdClass();
		$sql->table = "utilisateurs";
		$sql->ctx = new stdClass();
		$sql->ctx->user_type = "2";
		$sql->where = "id = ".$this->_app->user->id_utilisateurs;

		$this->_app->sql->update($sql);

		//on reset le user _app pour avoir les bonne infos mise à jour pour le tpl
		$security = new security($this->_app);
		$security->set_user_infos_on_app();
	}

	public function set_status_no_vip()
	{
		$sql = new stdClass();
		$sql->table = "utilisateurs";
		$sql->ctx = new stdClass();
		$sql->ctx->user_type = "1";
		$sql->where = "id = ".$this->_app->user->id_utilisateurs;

		$this->_app->sql->update($sql);

		//on reset le user _app pour avoir les bonne infos mise à jour pour le tpl
		$security = new security($this->_app);
		$security->set_user_infos_on_app();
	}

	public function check_level_user($login)
	{
		if($login)
		{
			$req_sql = new stdClass();
			$req_sql->table = ['login'];
			$req_sql->var = ["level"];
			$req_sql->where = ["login = $1", [$login]];
			$res_sql = $this->_app->sql->select($req_sql);
			return $res_sql[0]->level;
		}
		else
			return 0;
		
	}
}
