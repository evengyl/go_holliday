<?
Class admin extends base_module
{

	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);

		$this->_app->navigation->set_breadcrumb("Option d'administration");

		if(!isset($_SESSION['pseudo']))
			$this->get_html_tpl = $this->use_template('login')->render_tpl();

		else if(isset($_SESSION['level']) && $_SESSION['level'] == "3")
			$this->get_html_tpl =  $this->render_tpl();

		if(isset($_GET['action']))
		{
			$action = $_GET['action'];

			if($action == "edit_config_app")
				$this->get_html_tpl = $this->use_module('admin_edit_config_app')->render_tpl();
			
			else if($action == "eval")
				$this->get_html_tpl = $this->use_module('admin_eval')->render_tpl();

			else if($action == "list_user")
				$this->get_html_tpl = $this->use_module('admin_edit_user')->render_tpl();

			else if($action == "pull_bsd")
				$this->get_html_tpl = $this->use_module('admin_pull_bsd')->render_tpl();
		}
	}
}
