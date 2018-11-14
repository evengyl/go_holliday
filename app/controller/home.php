<?
Class home extends base_module
{
	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);

		$_app->navigation->set_breadcrumb(array("fr" => "Bienvenue au bord de mer", "en" => "Welcome to the seaside", "nl" => "Welkom bij de kust"));
		
		$this->get_html_tpl =  $this->use_template("home")->render_tpl();
	}
}