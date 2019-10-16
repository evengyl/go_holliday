<?
Class search_result extends base_module
{
	public $_app;
	public $annonces;

	public function __construct(&$_app)
	{	
		parent::__construct($_app);
		$this->_app->title_page = "Résultat de la recherche";

		$pays = array();
		$habitat = array();
		$type = "";
		$str_pays = "";
		$str_habitat = "";
		$str_type = "";
		$all = false;
		$error = false;
		$where_clicked = null;
		
		if(isset($_POST['pays_id']) && isset($_POST['pays_name']))
			$str_pays = implode(", ", $_POST['pays_id']);

		if(isset($_POST['habitat_id']) && isset($_POST['habitat_name']))
			$str_abitat = implode(', ', $_POST['habitat_id']);


		if(isset($this->_app->route['type']))
			$array_type = $this->get_id_type($this->_app->route['type']);




		if(empty($array_type))
			$error = true;
		else
		{
			$type = $array_type[0]->id;
			$str_type = $array_type[0]->type_vacances_name_human;
		}


		//si recherche depuis le module form de recheche
		if(isset($_GET['table']) && isset($_GET['value']))
		{
			$error = false;

			if($_GET['table'] == "Pays"){
				$pays[] = $this->get_id_pays($_GET['value']);
				$str_pays = $_GET['value'];
			}
			else if($_GET['table'] == "Habitat"){
				$habitat[] = $this->get_id_habitat($_GET['value']);
				$str_habitat = $_GET['value'];
			}
			else if($_GET['table'] == "Type"){
				$type = $this->get_id_type($_GET['value']);
				$str_type = $_GET['value'];
			}
		}



		if(isset($this->_app->route['all_select'])) //on est face a un click de toute les annonces dispo attention
			$all = true;


		$this->annonces = $this->get_list_annonces_search($type, $pays, $habitat, $all);


		if($error && !$all)
			$this->use_module("p_404");

		else
		{
			$this->assign_var("type_selected", $str_type)
				->assign_var("pays_selected", $str_pays)
				->assign_var("habitat_selected", $str_habitat)
				->assign_var("annonces", $this->annonces)
				->render_tpl();
		}
	}


	private function get_id_pays($value)
	{
		$sql_type = new stdClass();
		$sql_type->table = "annonce_pays";
		$sql_type->data = "id";
		$sql_type->where = ["name_human = $1", [$value]];
		$res_sql = $this->_app->sql->select($sql_type);
		return $res_sql[0]->id;
	}

	private function get_id_type($value)
	{
		$sql_type = new stdClass();
		$sql_type->table = "annonce_type_vacances";
		$sql_type->data = "id";
		$sql_type->where = ["name_human = $1", [$value]];
		$res_sql = $this->_app->sql->select($sql_type);
		return $res_sql[0]->id;
	}

	private function get_id_habitat($value)
	{
		$sql_type = new stdClass();
		$sql_type->table = "annonce_habitat";
		$sql_type->data = "id";
		$sql_type->where = ["name_human = $1", [$value]];
		$res_sql = $this->_app->sql->select($sql_type);
		return $res_sql[0]->id;
	}



	private function get_list_annonces_search($type, $pays = array(), $habitat = array(), $all)
	{
		$str_pays_id = "";
		$str_habitat_id = "";
		$str_type_id = "";

		if(!empty($type))
			$str_type_id = " AND id_type_vacances LIKE $4";

		if(isset($pays[0]))
			$str_pays_id = " AND id_pays IN $5";

		if(isset($habitat[0]))
			$str_habitat_id = " AND id_habitat IN $6";


		$where = "admin_validate = $1 AND active = $2 AND on_off = $3".$str_type_id.$str_pays_id.$str_habitat_id;


		$sql_annonce = new stdClass();
		$sql_annonce->table = "annonces";
		$sql_annonce->data = "id";

		if(!$all)
			$sql_annonce->where = [$where, ["1", "1", "1", $type, $pays, $habitat]];
		else
			$sql_annonce->where = ["admin_validate = $1 AND active = $2 AND on_off = $3", ['1','1','1']];

		$res_sql_annonces = $this->_app->sql->select($sql_annonce);


		if(!empty($res_sql_annonces))
		{
			foreach($res_sql_annonces as $key => $row_search)
			{
				$tmp = $this->_app->get_announce_user($row_search->id);
				$tmp = $this->_app->get_first_image($tmp);
				$res_sql_annonces[$key] = $tmp;
			}
		}

		return $res_sql_annonces;
	}
}