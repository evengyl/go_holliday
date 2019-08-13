<?
Class home extends base_module
{
	public function __construct(&$_app)
	{		

		parent::__construct($_app);
		$this->_app->add_view("accueil");

		$slides = $this->_app->get_slide_home();
		
		$this->assign_var("slides", $slides[array_rand($slides)])
			->render_tpl();
	}


	
}