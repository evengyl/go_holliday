<?
Class search_form extends base_module
{
	public $_app;
	public $annonces;


	public function __construct(&$_app)
	{	
		parent::__construct($_app);
		$this->_app->title_page = "Résultat de la recherche";

		$pays = array();
		$habitat = array();
		$type_id = "";
		$str_pays = "Aucun sélectionné(s)";
		$str_habitat = "Aucun sélectionné(s)";
		$str_type = "Aucun sélectionné(s)";
		$all = false;
		$error = false;
		
		if(isset($_GET['search']))
			$str_pays = implode(", ", $_POST['pays_id']);


		if(empty($array_type))
		{
			$error = true;
			$str_type = "Aucun sélectionné(s)";
		}
		else
		{
			$type_id = $array_type[0]->id;
			$str_type = $array_type[0]->type_vacances_name_human;
		}


		$this->annonces = $this->get_list_annonces_search($type_id, $pays, $habitat, $all);

		$this->annonces = $this->_app->get_first_image($this->annonces);

		$this->assign_var("type_selected", $str_type)
			->assign_var("pays_selected", $str_pays)
			->assign_var("habitat_selected", $str_habitat)
			->assign_var("annonces", $this->annonces)
			->use_template("search_result");
	}

	private function get_infos_type($type)
	{
		$sql_type = new stdClass();
		$sql_type->table = "annonce_type_vacances";
		$sql_type->data = "id, type_vacances_name_human";
		$sql_type->where = ["name_sql = $1", [strtolower($type)]];
		$res_sql = $this->_app->sql->select($sql_type);

		if(!empty($res_sql))
		{
			if(in_array($type, (array)$res_sql[0]))
				return $res_sql;
			else
				return false;
		}
		else
			return false;
		
	}



	private function get_list_annonces_search($type_id, $pays = array(), $habitat = array(), $all)
	{
		$str_pays_id = "";
		$str_habitat_id = "";

		if(isset($pays[0]))
			$str_pays_id = " AND id_pays IN $5";

		if(isset($habitat[0]))
			$str_habitat_id = " AND id_habitat IN $6";



		$where = "admin_validate = $1 AND active = $2 AND on_off = $3 AND id_type_vacances LIKE $4".$str_pays_id.$str_habitat_id;


		$sql_annonce = new stdClass();
		$sql_annonce->table = "annonces";
		$sql_annonce->data = "id, title, sub_title, vues, address, pays_name_human, price, habitat_name_human, date_start_saison, date_end_saison,admin_validate, active, on_off";

		if(!$all)
			$sql_annonce->where = [$where, ["1", "1", "1", $type_id, $pays, $habitat]];
		else
			$sql_annonce->where = ["admin_validate = $1 AND active = $2 AND on_off = $3", ['1','1','1']];

		$res_sql_annonces = $this->_app->sql->select($sql_annonce);

		return $res_sql_annonces;
	}
}