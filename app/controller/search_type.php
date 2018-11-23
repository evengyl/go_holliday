<?
Class search_type extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{	
		$this->_app = $_app;	
		$this->_app->module_name = __CLASS__;
		
		parent::__construct($this->_app);


		$array_type = $this->get_list_type();

		$this->get_html_tpl =  $this->assign_var("_app", $this->_app)->assign_var("array_type", $array_type)->render_tpl();
	}

	private function get_list_type()
	{
		$sql_type = new stdClass();
		$sql_type->table = ["type_vacances"];
		$sql_type->var = ["*"];
		return $this->_app->sql->select($sql_type);
	}
}