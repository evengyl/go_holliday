<?php 

Class footer extends base_module
{

	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);

		$this->get_html_tpl =  $this->use_template('footer')->render_tpl();
	}
}
