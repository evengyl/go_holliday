<?
Class reason_why extends base_module
{
	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);
		
		$this->get_html_tpl =  $this->assign_var("_app", $_app)->render_tpl();
	}
}