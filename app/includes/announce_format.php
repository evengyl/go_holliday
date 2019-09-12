<?

Class announce_format{
	
	public $_app;



	public function __construct(&$_app)
	{
		$this->_app = $_app;
	}

	public function get_announce_user($or_id_announce = false)
	{
		$req_sql_announce = new stdClass();
		$req_sql_announce->table = 'annonces';
		$req_sql_announce->data = "*";
		$req_sql_announce->where = [($or_id_announce)?"id = $1":""."id_utilisateurs = $2 AND user_validate = $3", 
										[
											($or_id_announce)?$or_id_announce:0,
											$this->_app->user->id_utilisateurs, 
											($or_id_announce)?1:0
											
										]
								    ];

		$req_sql_announce->order = ["id DESC"];
		$req_sql_announce->limit = "1";
		$annonce = $this->_app->sql->select($req_sql_announce);

		if(!empty($annonce[0]))
		{
			$this->annonce = $annonce[0];

			$this->render_human_price_range();
			$this->render_type_vacances();

				
			$tmp = [];
			foreach($this->annonce->text_sql_to_human as $row_text)
				$tmp[$row_text->name_sql] = $row_text->name_human;
			$this->annonce->text_sql_to_human = $tmp;


			$tmp = [];
			foreach($this->annonce->sport[0] as $key => $row_sport)
				$tmp[] = (object)["value" => $row_sport, "name_human" => $this->annonce->text_sql_to_human[$key], "name_sql" => $key];
			$this->annonce->sport[0] = $tmp;


			$tmp = [];
			foreach($this->annonce->activity[0] as $key => $row_activity)
				$tmp[] = (object)["value" => $row_activity, "name_human" => $this->annonce->text_sql_to_human[$key], "name_sql" => $key];
			$this->annonce->activity[0] = $tmp;

			$this->annonce->url_annonce = "/Recherche/Vues/Annonces/".$this->annonce->id;
		}

		$this->annonce = (object)$this->annonce;
		return $this->annonce;
	}


	public function convert_range_price($price)
	{	
		return $price = "Entre ".str_replace("-",  " et ", $price);
	}


	private function render_human_price_range()
	{
		$this->annonce->price_one_night_human = "<b class='text-muted'>Prix moyen pour une nuit : </b><br><i style='color:#008000;'>".$this->convert_range_price($this->annonce->price_one_night."&nbsp;€</i>");

		$this->annonce->price_week_end_human = "<b class='text-muted'>Prix moyen pour un week-end : </b><br><i style='color:#008000;'>".$this->convert_range_price($this->annonce->price_week_end."&nbsp;€</i>");

		$this->annonce->price_one_week_human = "<b class='text-muted'>Prix moyen pour une semaine : </b><br><i style='color:#008000;'>".$this->convert_range_price($this->annonce->price_one_week."&nbsp;€</i>");

		$this->annonce->caution_human = "Une caution de <b>".$this->annonce->caution."&nbsp;€</b> est demandée pour garantir le bien.";
	}

	private function render_type_vacances()
	{
		if(!empty($this->annonce->id_type_vacances))
		{
			$array_type_vacances_id = explode(",", $this->annonce->id_type_vacances);

			$this->annonce->array_type_vacances = new stdClass();

			foreach($array_type_vacances_id as $row_type_vacances)
			{
				$req_sql_type_vacance = new stdClass();
				$req_sql_type_vacance->table = "type_vacances";
				$req_sql_type_vacance->data = "name_sql, icon, title";
				$req_sql_type_vacance->where = ["id = $1", [$row_type_vacances]];
				$annonce_type_vacances = $this->_app->sql->select($req_sql_type_vacance);

				$this->annonce->array_type_vacances->id = $array_type_vacances_id;
				$this->annonce->array_type_vacances->text[] = $annonce_type_vacances[0]->title;
				$this->annonce->array_type_vacances->icon[] = $annonce_type_vacances[0]->icon;

			}
		}
	}



}