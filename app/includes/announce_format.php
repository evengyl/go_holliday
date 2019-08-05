<?

Class announce_format{
	
	public $_app;

	public $announce_format = [
		"id_annonce" => "",

		"type_vacances" => "",
		"array_type_vacances" => [],

		"type_habitat_id" => "",
		"name_habitat_sql" => "",
		"name_habitat_human" => "",
		"text_habitat" => "",

		"title" => "",
		"sub_title" => "",

		"address_lieux_dit" => "",
		"address_rue" => "",
		"address_numero" => "",
		"address_localite" => "",
		"address_zip_code" => "",
		"id_address_pays" => "",
		"name_address_pays_sql" => "",
		"name_address_pays_human" => "",

		"start_saison" => "",
		"end_saison" => "",

		"max_personn" => "",

		"id_sport" => "",
		"list_sport" => [],

		"id_activity" =>  "",
		"list_activity" => [],


		"pet" => "",
		"handicap" => "",
		"parking" => "",
		"caution" => "",

		"price_one_night" => "",
		"price_week_end" => "",
		"price_one_week" => "",
		
	];

	public function __construct(&$_app)
	{
		$this->_app = $_app;
	}

	public function get_last_announce_user($or_id_announce = false)
	{
		$req_sql_announce = new stdClass();
		$req_sql_announce->table = ['annonces', 'pays', 'range_price_announce', "habitat", "sport", "activity", "announces_address", "commoditer_announces"];
		$req_sql_announce->var = [
			"annonces" => ["id as id_annonce", "id_type_vacances", "title", "sub_title", "start_saison", "end_saison"],
			"pays" => ["name_sql AS name_address_pays_sql", "name_human AS name_address_pays_human"],
			"range_price_announce" => ["price_one_night", "price_week_end", "price_one_week"],
			"habitat" => ["id AS type_habitat_id", "name_human AS name_habitat_human", "name_sql AS name_habitat_sql", "text AS text_habitat"],
			"sport" => ["id AS id_sport"],
			"activity" => ["id AS id_activity"],
			"announces_address" => ["id AS id_announces_address", "*"],
			"commoditer_announces" => ["id AS id_commoditer_announces", "*"],
		];
		$req_sql_announce->where = 
			[($or_id_announce)?"id = $3":""."id_utilisateurs = $1 AND user_validate = $2", 
			[$this->_app->user->id_utilisateurs, ($or_id_announce)?1:0, ($or_id_announce)?$or_id_announce:0]];
		$req_sql_announce->order = ["id DESC"];
		$req_sql_announce->limit = "1";
		$announce = $this->_app->sql->select($req_sql_announce);

		if(!empty($announce[0]))
		{
			foreach($announce as $row_announce)
			{
				if(empty($this->id_type_vacances))
				{
					$array_type_vacances_id = explode(",", $row_announce->id_type_vacances);

					if(!empty($array_type_vacances_id[0]))
					{
						foreach($array_type_vacances_id as $row_type_vacances)
						{						
							$req_sql_type_vacance = new stdClass();
							$req_sql_type_vacance->table = ["type_vacances"];
							$req_sql_type_vacance->var = ["name_sql"];
							$req_sql_type_vacance->where = ["id = $1", [$row_type_vacances]];
							$announce_type_vacances = $this->_app->sql->select($req_sql_type_vacance);

							$announce[0]->array_type_vacances[] = $announce_type_vacances[0]->name_sql;

						}
					}
				}

				$req_sql_sport = new stdClass();
				$req_sql_sport->table = ["sport"];
				$req_sql_sport->var = ["*"];
				$req_sql_sport->where = ["id = $1", [$row_announce->id_sport]];
				$announce_sport = $this->_app->sql->select($req_sql_sport);

				foreach($announce_sport as $keys => $row_sports)
				{
					unset($announce_sport[$keys]->id);
					
					$tmp_array = (array)$row_sports;
					

					foreach($tmp_array as $key => $row_sport)
					{
						if($row_sport == 1)
						$announce[0]->list_sport[] = $key;
					}
					
				}


				$req_sql_activity = new stdClass();
				$req_sql_activity->table = ["activity"];
				$req_sql_activity->var = ["*"];
				$req_sql_activity->where = ["id = $1", [$row_announce->id_activity]];
				$announce_activity = $this->_app->sql->select($req_sql_activity);

				foreach($announce_activity as $keys => $row_activities)
				{
					unset($announce_sport[$keys]->id);
					
					$tmp_array = (array)$row_activities;
					

					foreach($tmp_array as $key => $row_activity)
					{
						if($row_activity == 1)
						$announce[0]->list_activity[] = $key;
					}
					
				}
			}
		}

		$announce = (object) array_merge( (array)$this->announce_format, (array)$announce[0]);
		return $announce;
	}

}