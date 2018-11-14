<?php 

Class error extends base_module
{

	public function __construct(&$_app, $exeption = "", $error_code = "")
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);

		if($_app->var_module)
		{
			if(is_int($_app->var_module[0]))
				$error_code = $_app->var_module[0];		
		}


		$this->get_html_tpl =  $this->assign_var("error_message", $exeption)->assign_var('error_code', $error_code)->use_template("error")->render_tpl();
	}
}
