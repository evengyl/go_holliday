<?
Class search_result extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{	
		$this->_app = $_app;	
		$this->_app->module_name = __CLASS__;

		$type = "";
		$pays = "";
		$habitat = "";
		
		parent::__construct($this->_app);


		if(isset($this->_app->route['type']))
			$type = $this->_app->route['type'];

		if(isset($this->_app->route['pays']))
			$pays = $this->_app->route['pays'];

		if(isset($this->_app->route['habitat']))
			$habitat = $this->_app->route['habitat'];



		$this->get_html_tpl =  $this
				->assign_var("_app", $this->_app)
				->assign_var("type", $type)
				->assign_var("pays", $pays)
				->assign_var("habitat", $habitat)
				->render_tpl();
	}
}