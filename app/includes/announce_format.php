<?

Class announce_format{
	
	public $_app;

	public $announce_format = [
		"id_annonce" => "",

		"type_vacances" => "",
		"array_type_vacances" => [],
		"name_type_vacances_sql" => "",
		"name_type_vacances_human" => "",

		"type_habitat" => "",
		"name_habitat_sql" => "",
		"name_habitat_human" => "",

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

	public function get_last_announce_user()
	{
		$req_sql_announce = new stdClass();
		$req_sql_announce->table = ['annonces', 'pays', 'range_price_announce', "habitat", "sport", "activity", "type_vacances", "announces_address", "commoditer_announces"];
		$req_sql_announce->var = [
			"annonces" => ["id as id_annonce", "title", "sub_title", "start_saison", "end_saison"],
			"pays" => ["name_sql AS name_address_pays_sql", "name_human AS name_address_pays_human"],
			"range_price_announce" => ["price_one_night", "price_week_end", "price_one_week"],
			"habitat" => ["name_human AS name_habitat_human", "name_sql AS name_habitat_sql"],
			"sport" => ["id AS id_sport", "*"],
			"activity" => ["id AS id_activity", "*"],
			"type_vacances" => ["id AS type_vacances", "name_sql AS name_type_vacances_sql", "name_human AS name_type_vacances_human"],
			"announces_address" => ["id AS id_announces_address", "*"],
			"commoditer_announces" => ["id AS id_commoditer_announces", "*"],
		];
		$req_sql_announce->where = ["id_utilisateurs = $1 AND user_validate = $2", [$this->_app->user->id_utilisateurs,0,0]];
		$req_sql_announce->order = ["id DESC"];
		$req_sql_announce->limit = "1";
		$announce = $this->_app->sql->select($req_sql_announce);

		if(!empty($announce[0]))
		{
			foreach($announce as $row_announce)
			{
				if(empty($this->array_type_vacances)){
					$announce[0]->array_type_vacances = explode(",", $row_announce->type_vacances);
				}


				$req_sql_sport = new stdClass();
				$req_sql_sport->table = ["sport"];
				$req_sql_sport->var = ["*"];
				$req_sql_sport->where = ["id = $1", [$row_announce->id_sport]];
				$announce_sport = $this->_app->sql->select($req_sql_sport);

				$announce[0]->list_sport = $announce_sport[0];


				$req_sql_activity = new stdClass();
				$req_sql_activity->table = ["activity"];
				$req_sql_activity->var = ["*"];
				$req_sql_activity->where = ["id = $1", [$row_announce->id_activity]];
				$announce_sport = $this->_app->sql->select($req_sql_activity);

				$announce[0]->list_activity = $announce_sport[0];
			}
		}

		$announce = (object) array_merge( (array)$this->announce_format, (array)$announce[0]);
		return $announce;
	}

}