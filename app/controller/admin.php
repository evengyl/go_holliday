<?
Class admin extends base_module
{

	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);

		$this->_app->navigation->set_breadcrumb("Option d'administration");

		$level = 0;
		
		$level = $this->check_level_user($_SESSION['pseudo']);

		//on est admin
		if($level >= 3)
		{
			$this->get_html_tpl = $this->render_tpl(); //on affiche l'administration
			if(isset($_GET['action']))
			{
				$action = $_GET['action'];

				if($action == "edit_config_app")
					$this->get_html_tpl = $this->use_module('admin_edit_config_app')->render_tpl();
				
				else if($action == "eval")
					$this->get_html_tpl = $this->use_module('admin_eval')->render_tpl();

				else if($action == "pull_bsd")
					$this->get_html_tpl = $this->use_module('admin_pull_bsd')->render_tpl();

			}
		}
		else // il 'agit d'office d'un essaie de piratage car la page admin n'est pas trouvable donc 404
		{
			$_SESSION['error_admin'] = "Vous avez tenter de vous connecter à une page non autorisée.";
			$this->get_html_tpl = $this->use_template('404')->render_tpl();
		}


		
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
