<?
Class search_result extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{	
		$this->_app = $_app;	
		$this->_app->module_name = __CLASS__;

		parent::__construct($this->_app);


affiche_pre($_POST);

		$type = $this->_app->route['type'];
		$array_type = $this->get_list_type($type);

		$this->get_html_tpl = $this
								->assign_var("array_type", $array_type)
								->render_tpl();
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