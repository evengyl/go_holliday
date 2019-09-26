<?

Class my_account extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{		
		parent::__construct($_app);
		$this->_app->title_page = "Mon compte";

		if(Config::$is_connect)
		{
			$this->render_tpl();
		}
		else
		{
			$_SESSION["error_admin"] = "Vous n'avez pas accès à cette page.</br>Vous devez d'abord vous connecter";
			$this->use_module("p_404");
		}
		
		
	}


	
}