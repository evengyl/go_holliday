<?
Class search_result extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{	
		$this->_app = $_app;	
		$this->_app->module_name = __CLASS__;

		parent::__construct($this->_app);


		$pays = $_POST['pays'];
		$habitat = $_POST['habitat'];

		$type = $this->_app->route['type'];
		$array_type = $this->get_list_type($type);
		$type_id = $array_type[0]->id;

		$annonces = $this->get_annonces($type_id, $pays, $habitat);

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

	private function get_annonces($type_id, $pays = array(), $habitat = array())
	{
		affiche_pre($type_id);
		affiche_pre($pays);
		affiche_pre($habitat);

		$str_pays_id = "";
		$str_habitat_id = "";

		foreach($pays as $row_pays)
			$str_pays_id .= $row_pays.", ";

		foreach($habitat as $row_habitat)
			$str_habitat_id .= $row_habitat.", ";



		$str_pays_id = "(".substr($str_pays_id, 0, -2).")";
		$str_habitat_id = "(".substr($str_habitat_id, 0, -2).")";


		$sql_annonce = new stdClass();
		$sql_annonce->table = ["annonces", "pays", "habitat", "proprio", "type_vacances"];
		$sql_annonce->var = [
				"annonces" => ["id", "id_pays", "id_habitat", "id_type_vacances", "id_proprio"],
				"pays" => ["id", "name AS name_pays", "actif"],
				"habitat" => ["id", "name AS name_habitat"],
				"proprio" => ["id", "name AS name_proprio"],
				"type_vacances" => ["id", "name AS name_type_vacances"]
			];
		$sql_annonce->where = "id_pays IN " . $str_pays_id . " AND id_habitat IN " . $str_habitat_id . " AND id_type_vacances = '".$type_id."'";

		affiche_pre($sql_annonce);
		$res_sql = $this->_app->sql->select($sql_annonce,1);
		affiche_pre($res_sql);
	}
}