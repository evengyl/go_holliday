<?
Class account_client extends base_module
{
	public function __construct(&$_app)
	{		
		parent::__construct($_app);

		$this->use_template('my_account_account_client');
	}


}
