<?
Class search_result extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{	
		$this->_app = $_app;	
		$this->_app->module_name = __CLASS__;

		parent::__construct($this->_app);

		$pays = array();
		$habitat = array();
		$str_pays = "";
		$str_habitat = "";
		

		if(isset($_POST['pays_id']) && isset($_POST['pays_name']))
		{
			$pays = $_POST['pays_id'];

			foreach($_POST['pays_name'] as $pays_str)
				$str_pays .= $pays_str.', ';
			$str_pays = substr($str_pays, 0, -2);
		}
		else
			$str_pays = "Aucun pays sélectionné(s)";


		if(isset($_POST['habitat_id']) && isset($_POST['habitat_name']))
		{
			$habitat = $_POST['habitat_id'];

			foreach($_POST['habitat_name'] as $habitat_str)
				$str_habitat .= $habitat_str.', ';
			$str_habitat = substr($str_habitat, 0, -2);
		}
		else
			$str_habitat = "Aucun habitat spécifique sélectionné(s)";


		$type = $this->_app->route['type'];
		$array_type = $this->get_list_type($type);
		$type_id = $array_type[0]->id;

		$annonces = $this->get_annonces($type_id, $pays, $habitat);

		$this->get_html_tpl = $this
								->assign_var("type_selected", $array_type[0])
								->assign_var("pays_selected", $str_pays)
								->assign_var("habitat_selected", $str_habitat)
								->assign_var("annonces", $annonces)
								->render_tpl();
	}

	private function get_list_type($type)
	{
		$sql_type = new stdClass();
		$sql_type->table = ["type_vacances"];
		$sql_type->where = ["url = '".$type."'"];
		return $this->_app->sql->select($sql_type);
	}

	private function get_annonces($type_id, $pays = array(), $habitat = array())
	{
		$str_pays_id = "";
		$str_habitat_id = "";

		if(isset($pays[0]))
		{
			foreach($pays as $row_pays)
				$str_pays_id .= $row_pays.", ";
			$str_pays_id = "id_pays IN (".substr($str_pays_id, 0, -2).") AND";
		}

		if(isset($habitat[0]))
		{
			foreach($habitat as $row_habitat)
				$str_habitat_id .= $row_habitat.", ";
			$str_habitat_id = "id_habitat IN (".substr($str_habitat_id, 0, -2).") AND";
		}


		$sql_annonce = new stdClass();
		$sql_annonce->table = ["annonces", "pays", "habitat", "proprio", "type_vacances"];
		$sql_annonce->var = [
				"annonces" => ["id", "id_pays", "id_habitat", "id_type_vacances", "id_proprio", "name AS name_annonce", "lieu AS lieu_annonce", "active"],
				"pays" => ["name AS name_pays"],
				"habitat" => ["name AS name_habitat"],
				"proprio" => ["name AS name_proprio", "last_name AS lastname_proprio", "genre"],
				"type_vacances" => ["name AS name_type_vacances"]
			];
		$sql_annonce->where = [$str_pays_id, $str_habitat_id, "", "id_type_vacances = '".$type_id."'", "AND", "active = '1'"];
		$res_sql_annonces = $this->_app->sql->select($sql_annonce);

		foreach($res_sql_annonces as $key => $row_annonces)
		{
			$sql_date = new stdClass();
			$sql_date->table = ["date_annonces"];
			$sql_date->var = ["start_date", "end_date", "prix"];
			$sql_date->where = ["id_annonces = '".$row_annonces->id."'"];
			$res_sql_date = $this->_app->sql->select($sql_date);
			$res_sql_annonces[$key]->dates = $res_sql_date;
		}

		return $res_sql_annonces;
	}
}