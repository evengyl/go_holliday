<?
Class my_account_lateral_right_account extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{
		parent::__construct($_app);

		$this->assign_var("infos_user", $this->_app->user)
			->use_template('my_account_lateral_right_account');
	}		
}
