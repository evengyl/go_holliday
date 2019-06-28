<?
Class search_type extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{	
		parent::__construct($_app);


		$array_type = $this->get_list_type();
		$array_type = $this->get_count_annonces_by_type($array_type);

		$this->assign_var("array_type", $array_type)->render_tpl();
	}

	private function get_list_type()
	{
		$sql_type = new stdClass();
		$sql_type->table = ["type_vacances"];
		$sql_type->var = ["*"];
		$sql_type->where = ["1"];
		return $this->_app->sql->select($sql_type);
	}

	private function get_count_annonces_by_type($array_type)
	{
		foreach($array_type as $key => $type)
		{
			$sql_count_annonce_by_type = new stdClass();
			$sql_count_annonce_by_type->table = ["annonces"];
			$sql_count_annonce_by_type->var = 'COUNT(id) as nb';
			$sql_count_annonce_by_type->where = ["id_type_vacances = $1", [$type->id]];
			$res_sql =  $this->_app->sql->select($sql_count_annonce_by_type);
			$array_type[$key]->nb_annonces = $res_sql[0]->nb;
		}
		return $array_type;
	}
}