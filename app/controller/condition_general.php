<?php 

Class condition_general extends base_module
{

	public function __construct(&$_app)
	{		
		parent::__construct($_app);
		$this->_app->title_page = "Condition général d'utilisation du site";

		$this->render_tpl();
	}

}


