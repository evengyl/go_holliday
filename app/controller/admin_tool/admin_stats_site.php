<?php 

Class admin_stats_site extends base_module
{
	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);

		$this->render_tpl();
	}
}
