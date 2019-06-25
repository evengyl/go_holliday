<?
Class view_lateral_profil extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{
		$_app->module_name = __CLASS__;
		parent::__construct($_app);

		$this->assign_var("infos_user", $this->_app->user)
			->render_tpl();
	}		
}
