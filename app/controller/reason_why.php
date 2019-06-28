<?
Class reason_why extends base_module
{
	public function __construct(&$_app)
	{		
		parent::__construct($_app);
		
		$this->render_tpl();
	}
}