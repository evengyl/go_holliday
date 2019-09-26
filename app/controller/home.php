<?
Class home extends base_module
{
	public function __construct(&$_app)
	{		

		parent::__construct($_app);
		$this->_app->add_view("accueil");

		$this->_app->title_page = "Nous réalisons vos envies de vacances simple et directement en ligne";

		$slides = $this->_app->get_slide_home();
		
		$this->assign_var("slides", $slides[array_rand($slides)])
			->render_tpl();
	}


	
}