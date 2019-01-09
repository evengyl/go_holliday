<?
Class view_lateral_profil extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{
		$this->_app = $_app;
		$this->_app->module_name = __CLASS__;

		parent::__construct($this->_app);

		$this->get_html_tpl =  $this->assign_var('_app', $this->_app)
									->assign_var("infos_user", $this->_app->user)
								->render_tpl();
	}
}
