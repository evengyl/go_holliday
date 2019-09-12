<?

Class my_account extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{		
		parent::__construct($_app);

		$this->render_tpl();
	}


	
}