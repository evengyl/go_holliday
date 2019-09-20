<?
Class search_result extends base_module
{
	public $_app;
	public $annonces;

	public function __construct(&$_app)
	{	
		parent::__construct($_app);

		$pays = array();
		$habitat = array();
		$array_type = array();
		$type_id = "";
		$str_pays = "Aucun sélectionné(s)";
		$str_habitat = "Aucun sélectionné(s)";
		$str_type = "Aucun type sélectioné";
		$all = false;
		

		if(isset($_POST['pays_id']) && isset($_POST['pays_name']))
		{
			$pays = $_POST['pays_id'];

			foreach($_POST['pays_name'] as $pays_str)
				$str_pays .= $pays_str.', ';
			$str_pays = substr($str_pays, 0, -2);
		}


		if(isset($_POST['habitat_id']) && isset($_POST['habitat_name']))
		{
			$habitat = $_POST['habitat_id'];

			foreach($_POST['habitat_name'] as $habitat_str)
				$str_habitat .= $habitat_str.', ';
			$str_habitat = substr($str_habitat, 0, -2);
		}


		if(isset($this->_app->route['all_select'])) //on est face a un click de toute les annonces dispo attention
			$all = true;
		else
		{
			$array_type = $this->get_infos_type($this->_app->route['type']);
			$type_id = $array_type[0]->id;
			$str_type = $array_type[0]->type_vacances_name_human;
		}


		$this->annonces = $this->get_annonces($type_id, $str_type, $pays, $habitat, $all);

		$this->get_first_image();

		$this->assign_var("type_selected", $str_type)
			->assign_var("pays_selected", $str_pays)
			->assign_var("habitat_selected", $str_habitat)
			->assign_var("annonces", $this->annonces)
			->render_tpl();
	}

	private function get_infos_type($type)
	{
		$sql_type = new stdClass();
		$sql_type->table = "type_vacances";
		$sql_type->data = "id, type_vacances_name_human";
		$sql_type->where = ["name_sql = $1", [$type]];
		return $this->_app->sql->select($sql_type);
	}

	private function get_first_image()
	{
		foreach($this->annonces as $key => $row_annonce)
		{
			if(file_exists($this->_app->base_dir."/public/images/annonces/".$row_annonce->id."/"))
			{
				if($dossier = opendir($this->_app->base_dir."/public/images/annonces/".$row_annonce->id."/"))
				{
					while(false !== ($fichier = readdir($dossier)))
					{
						if($fichier != '.' && $fichier != '..'){
							$this->annonces[$key]->img_principale = $fichier;
							break;
						}
					}
				}
			}
		}

	}

	private function get_annonces($type_id, $str_type, $pays = array(), $habitat = array(), $all)
	{
		$str_pays_id = "";
		$str_habitat_id = "";

		if(isset($pays[0]))
			$str_pays_id = " AND id_pays IN $3";

		if(isset($habitat[0]))
		{
			$str_habitat_id = " AND id_habitat IN $4";
		}


		$sql_annonce = new stdClass();
		$sql_annonce->table = "annonces";
		$sql_annonce->data = "id, title, sub_title, vues, address, pays_name_human, price, habitat_name_human, date_start_saison, date_end_saison";

		if(!$all)
			$sql_annonce->where = [
						"id_type_vacances LIKE($1) AND active = $2".$str_pays_id.$str_habitat_id." AND admin_validate = $5", 
							[$type_id, "1", (isset($pays[0])?$pays:""), (isset($habitat[0])?$habitat:""), "1"]];
		else
			$sql_annonce->where = ["1"];


		$res_sql_annonces = $this->_app->sql->select($sql_annonce);

		return $res_sql_annonces;
	}
}