<?
Class search_pays_habitat extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{	
		$this->_app = $_app;	
		$this->_app->module_name = __CLASS__;
		
		parent::__construct($this->_app);

		$array_pays = $this->get_list_pays();
		$array_habitat = $this->get_list_habitat();
		
		$type = $this->_app->route['type'];
		$array_type = $this->get_list_type($type);
		
		$this->get_html_tpl =  $this
			->assign_var("_app", $this->_app)
			->assign_var("array_type", $array_type)
			->assign_var('array_pays', $array_pays)
			->assign_var('array_habitat', $array_habitat)
			->assign_var('selected_type', $type)
			->render_tpl();	
	}

	private function get_list_pays()
	{
		$sql_pays = new stdClass();
		$sql_pays->table = ["pays"];
		$sql_pays->var = ["*"];
		return $this->_app->sql->select($sql_pays);
	}

	private function get_list_habitat()
	{
		$sql_habitat = new stdClass();
		$sql_habitat->table = ["habitat"];
		$sql_habitat->var = ["*"];
		return $this->_app->sql->select($sql_habitat);	
	}

	private function get_list_type($type)
	{
		$sql_type = new stdClass();
		$sql_type->table = ["type_vacances"];
		$sql_type->var = ["*"];
		$sql_type->where = ["url = '".$type."'"];
		return $this->_app->sql->select($sql_type);
	}
}