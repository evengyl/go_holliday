<?php 

Class nav_top extends base_module
{

	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);

		$this->get_html_tpl =  $this->assign_var("_app", $_app)->use_template('nav_top')->render_tpl();
	}
}
