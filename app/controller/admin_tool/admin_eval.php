<?php 

Class admin_eval extends base_module
{
	public function __construct(&$_app)
	{
		parent::__construct($_app);

		$this->_app->navigation->set_breadcrumb("Zone de test EVAL attention", "eval");

		$this->render_tpl();
	}
}
