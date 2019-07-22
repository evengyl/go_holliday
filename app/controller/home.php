<?
Class home extends base_module
{
	public function __construct(&$_app)
	{		

		parent::__construct($_app);
		$this->_app->add_view("accueil");

		$_app->navigation->set_breadcrumb(array("fr" => "Bienvenue sur l'accueil", "en" => "Bienvenue sur l'accueil", "nl" => "Bienvenue sur l'accueil"));

		$slides = $this->_app->get_slide_home();
		
		$this->assign_var("slides", $slides[array_rand($slides)])
			->render_tpl();
	}


	
}