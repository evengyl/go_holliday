<?
Class search_pays_habitat extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{	
		parent::__construct($_app);


		$array_type = $this->get_list_type($this->_app->route['type']);
		$array_pays = $this->get_list_pays();
		$array_habitat = $this->get_list_habitat();

		list($array_habitat, $array_pays) = $this->get_nb_annonce($array_habitat, $array_pays, $array_type[0]->id);
		
		
		
		$this->assign_var("array_type", $array_type)
			->assign_var('array_pays', $array_pays)
			->assign_var('array_habitat', $array_habitat)
			->render_tpl();	
	}

	private function get_list_pays()
	{
		$sql_pays = new stdClass();
		$sql_pays->table = "annonce_pays";
		$sql_pays->data = "*";
		$sql_pays->where = ["1"];
		return $this->_app->sql->select($sql_pays);
	}

	private function get_list_habitat()
	{
		$sql_habitat = new stdClass();
		$sql_habitat->table = "habitat";
		$sql_habitat->data = "*";
		$sql_habitat->where = ["1"];
		$sql_habitat->order = ["id DESC"];
		return $this->_app->sql->select($sql_habitat);

	}

	private function get_list_type($type)
	{
		$sql_type = new stdClass();
		$sql_type->table = "type_vacances";
		$sql_type->data = "*";
		$sql_type->where = ["url = $1", [$type]];
		return $this->_app->sql->select($sql_type);
	}

	private function get_nb_annonce($array_habitat, $array_pays, $id_type)
	{
		$var = 'COUNT(id) as nb';

		foreach($array_habitat as $row_habitat)
		{
			$sql_number_annonces_habitat = new stdClass();
			$sql_number_annonces_habitat->table = "annonces";
			$sql_number_annonces_habitat->data = $var;
			$sql_number_annonces_habitat->where = ["id_habitat = $1 AND id_type_vacances LIKE($2) AND admin_validate = $3", [(int)$row_habitat->id, (int)$id_type, "1"]];
			$res_sql = $this->_app->sql->select($sql_number_annonces_habitat);
			$row_habitat->nb_annonces = $res_sql[0]->nb;
		}

		foreach($array_pays as $row_pays)
		{
			$sql_number_annonces_pays = new stdClass();
			$sql_number_annonces_pays->table = "annonces";
			$sql_number_annonces_pays->data = $var;
			$sql_number_annonces_pays->where = ["id_pays = $1 AND id_type_vacances LIKE($2) AND admin_validate = $3", [(int)$row_pays->id, (int)$id_type, "1"]];
			$res_sql = $this->_app->sql->select($sql_number_annonces_pays);
			$row_pays->nb_annonces = $res_sql[0]->nb;
		}

		return array($array_habitat, $array_pays);
	}
}