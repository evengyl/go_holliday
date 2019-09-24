<?
Class search_pays_habitat extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{	
		parent::__construct($_app);


		$type_vacances_selected = $this->get_type_vacances($this->_app->route['type']);
		$list_pays = $this->get_list_pays();
		$list_habitat = $this->get_list_habitat();

		if($type_vacances_selected)
		{
			list($list_habitat, $list_pays) = $this->get_nb_annonce($list_habitat, $list_pays, $type_vacances_selected->id);

			$this->assign_var("type_vacances_selected", $type_vacances_selected)
				->assign_var('list_pays', $list_pays)
				->assign_var('list_habitat', $list_habitat)
				->render_tpl();	
		}	
		else
		{
			$this->use_module("p_404");
		}
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
		$sql_habitat->table = "annonce_habitat";
		$sql_habitat->data = "*";
		$sql_habitat->where = ["1"];
		$sql_habitat->order = ["id DESC"];
		return $this->_app->sql->select($sql_habitat);

	}

	private function get_type_vacances($type)
	{
		$sql_type = new stdClass();
		$sql_type->table = "type_vacances";
		$sql_type->data = "*";
		$sql_type->where = ["1"];
		$res_sql = $this->_app->sql->select($sql_type);

		$tmp = false;
		foreach($res_sql as $row_sql)
		{
			if(in_array($type, (array)$row_sql->type_vacances_name_human))
				$tmp = $row_sql;
		}
		
		return $tmp;
	}

	private function get_nb_annonce($list_habitat, $list_pays, $id_type)
	{
		$var = 'COUNT(id) as nb';

		foreach($list_habitat as $row_habitat)
		{
			$sql_number_annonces_habitat = new stdClass();
			$sql_number_annonces_habitat->table = "annonces";
			$sql_number_annonces_habitat->data = $var;
			$sql_number_annonces_habitat->where = ["id_habitat = $1 AND id_type_vacances LIKE $2 AND admin_validate = $3", [(int)$row_habitat->id, $id_type, "1"]];
			$res_sql = $this->_app->sql->select($sql_number_annonces_habitat, 1);
			$row_habitat->nb_annonces = $res_sql[0]->nb;
		}

		foreach($list_pays as $row_pays)
		{
			$sql_number_annonces_pays = new stdClass();
			$sql_number_annonces_pays->table = "annonces";
			$sql_number_annonces_pays->data = $var;
			$sql_number_annonces_pays->where = ["id_pays = $1 AND id_type_vacances LIKE $2 AND admin_validate = $3", [(int)$row_pays->id, $id_type, "1"]];
			$res_sql = $this->_app->sql->select($sql_number_annonces_pays);
			$row_pays->nb_annonces = $res_sql[0]->nb;
		}

		return array($list_habitat, $list_pays);
	}
}