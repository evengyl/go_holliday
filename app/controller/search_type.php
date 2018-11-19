<?
Class search_type extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{	
		$this->_app = $_app;	
		$this->_app->module_name = __CLASS__;
		
		parent::__construct($this->_app);



		if(isset($this->_app->route['type']))
			$this->get_html_tpl =  $this->assign_var("_app", $this->_app)->use_module("search_pays_habitat")->render_tpl();
		
		else
			$this->get_html_tpl =  $this->assign_var("_app", $this->_app)->render_tpl();
	}
}