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
			"habitat" => ["id AS type_habitat_id", "name_human AS name_habitat_human", "name_sql AS name_habitat_sql", "text AS text_habitat", "img AS img_habitat"],
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
			$this->announce = $announce[0];


				$this->announce = $this->announce;
				$this->render_human_price_range();
				$this->render_type_vacances();

				

				$req_sql_sport = new stdClass();
				$req_sql_sport->table = ["sport"];
				$req_sql_sport->var = ["*"];
				$req_sql_sport->where = ["id = $1", [$this->announce->id_sport]];
				$announce_sport = $this->_app->sql->select($req_sql_sport);

				foreach($announce_sport as $keys => $row_sports)
				{
					unset($announce_sport[$keys]->id);
					
					$tmp_array = (array)$row_sports;
					

					foreach($tmp_array as $key => $row_sport)
					{
						if($row_sport == 1)
						{
							$this->announce->list_sport[] = $key;

							$req_sql_sport = new stdClass();
							$req_sql_sport->table = ["text_sql_to_human"];
							$req_sql_sport->var = ["name_human"];
							$req_sql_sport->where = ["name_sql = $1", [$key]];
							$announce_sport = $this->_app->sql->select($req_sql_sport);
							$this->announce->list_sport_human[] = $announce_sport[0]->name_human;
						
						}
					}
					
				}


				$req_sql_activity = new stdClass();
				$req_sql_activity->table = ["activity"];
				$req_sql_activity->var = ["*"];
				$req_sql_activity->where = ["id = $1", [$this->announce->id_activity]];
				$announce_activity = $this->_app->sql->select($req_sql_activity);


				foreach($announce_activity as $keys => $row_activities)
				{
					unset($announce_sport[$keys]->id);
					
					$tmp_array = (array)$row_activities;
					

					foreach($tmp_array as $key => $row_activity)
					{

						if($row_activity == 1)
						{
							$this->announce->list_activity[] = $key;

							$req_sql_sport = new stdClass();
							$req_sql_sport->table = ["text_sql_to_human"];
							$req_sql_sport->var = ["name_human"];
							$req_sql_sport->where = ["name_sql = $1", [$key]];
							$announce_sport = $this->_app->sql->select($req_sql_sport);
							$this->announce->list_activity_human[] = $announce_sport[0]->name_human;
						}
					}
					
				}
		}

		$this->announce = (object) array_merge( (array)$this->announce_format, (array)$this->announce);

		return $this->announce;
	}


	public function convert_range_price($price)
	{	
		return $price = "Entre ".str_replace("-",  " et ", $price);
	}


	private function render_human_price_range()
	{
		$this->announce->price_one_night_human = "<b class='text-muted'>Prix moyen pour une nuit : </b><br><i style='color:#008000;'>".$this->convert_range_price($this->announce->price_one_night."&nbsp;€</i>");

		$this->announce->price_week_end_human = "<b class='text-muted'>Prix moyen pour un week-end : </b><br><i style='color:#008000;'>".$this->convert_range_price($this->announce->price_week_end."&nbsp;€</i>");

		$this->announce->price_one_week_human = "<b class='text-muted'>Prix moyen pour une semaine : </b><br><i style='color:#008000;'>".$this->convert_range_price($this->announce->price_one_week."&nbsp;€</i>");

		$this->announce->caution_human = "Une caution de <b>".$this->announce->caution."&nbsp;€</b> est demandée pour garantir le bien.";
	}

	private function render_type_vacances()
	{
		if(!empty($this->announce->id_type_vacances))
		{
			$array_type_vacances_id = explode(",", $this->announce->id_type_vacances);

			$this->announce->array_type_vacances = new stdClass();

			foreach($array_type_vacances_id as $row_type_vacances)
			{						
				$req_sql_type_vacance = new stdClass();
				$req_sql_type_vacance->table = ["type_vacances"];
				$req_sql_type_vacance->var = ["name_sql", "icon", "title"];
				$req_sql_type_vacance->where = ["id = $1", [$row_type_vacances]];
				$announce_type_vacances = $this->_app->sql->select($req_sql_type_vacance);

				$this->announce->array_type_vacances->id = $array_type_vacances_id;
				$this->announce->array_type_vacances->text[] = $announce_type_vacances[0]->title;
				$this->announce->array_type_vacances->icon[] = $announce_type_vacances[0]->icon;

			}
		}
	}



}