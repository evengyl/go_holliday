<?php 

Class p_404 extends base_module
{
	public function __construct(&$_app, $exeption = "", $error_code = "")
	{		
		parent::__construct($_app);

		if($_app->var_module)
		{
			if(is_int($_app->var_module[0]))
				$error_code = $_app->var_module[0];		
		}

		$this->assign_var("error_message", $exeption)
			->assign_var('error_code', $error_code)
			->assign_var('_app', $this->_app)
			->use_template("p_404");
	}
}
