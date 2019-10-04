<?

Class my_account_list_demand_success extends base_module
{
	public $_app;
	public $demands_success;

	public function __construct(&$_app)
	{		
		parent::__construct($_app);
		$this->_app->title_page = "Mon compte - Mes demandes acceptées";

		$this->get_list_demand();

			$this
			->assign_var("demands_success", $this->demands_success)
			->render_tpl();
	}


	private function get_list_demand()
	{
		$sql_type = new stdClass();
		$sql_type->table = "annonce_dates";
		$sql_type->data = "*";
		$sql_type->where = ["state = $1", ["reserved"]];

		$demands_success = $this->_app->sql->select($sql_type);

		if(!empty($demands_success))
		{
			foreach($demands_success as $row_success)
			{
				$sql_type = new stdClass();
				$sql_type->table = "utilisateurs";
				$sql_type->data = "name, last_name";
				$sql_type->where = ["id = $1", [$row_success->id_proprio]];

				$tmp = $this->_app->sql->select($sql_type);

				$row_success->name_proprio = $tmp[0]->name." ".$tmp[0]->last_name;

			}
		}

		$this->demands_success = $demands_success;
		
	}
}