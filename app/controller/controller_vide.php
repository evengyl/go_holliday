<?php 

Class name extends base_module
{

	public function __construct(&$_app)
	{		
		parent::__construct($_app);

		//pour set le breadcrumb
		$_app->navigation->set_breadcrumb(array("fr" => "texte fr", "en" => "texte en", "nl" => "texte nl"));

		//use pour acceder a tout les query
			$this->sql;

		//pour assigner des var c'est ->assign_var('nameDansTpl', $var)
		//pour assigner un tpl spécifique c'est ->use_template('TplName')
		$this->render_tpl();
	}
}
