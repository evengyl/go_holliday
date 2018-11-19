<?
Class home extends base_module
{
	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);

		$_app->navigation->set_breadcrumb(array("fr" => "Bienvenue sur l'accueil", "en" => "Bienvenue sur l'accueil", "nl" => "Bienvenue sur l'accueil"));

		$slides = $this->get_slide_home();
		
		$this->get_html_tpl =  $this->assign_var("slides", $slides[array_rand($slides)])->assign_var("_app", $this->_app)->use_template("home")->render_tpl();
	}


	public function get_slide_home()
	{
		$array_slide = array();

		if($dossier = opendir($this->_app->base_dir.'/public/images/slides_home'))
		{
			while(false !== ($fichier = readdir($dossier)))
			{
				if($fichier != '.' && $fichier != '..')
				{
					$array_slide[] = "/images/slides_home/".$fichier;
				}
			}
		}

		return $array_slide;
	}
}