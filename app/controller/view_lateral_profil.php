<?
Class view_lateral_profil extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{
		parent::__construct($_app);

		$this->assign_var("infos_user", $this->_app->user)
			->use_template('my_account_view_lateral_profil');
	}		
}
