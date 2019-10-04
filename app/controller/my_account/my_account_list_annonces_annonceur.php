<?

Class my_account_list_annonces_annonceur extends base_module
{
	public $_app;
	public $annonces;

	public function __construct(&$_app)
	{		
		parent::__construct($_app);

		///////////////////////////////
		//spécifique pour annonceurs //
		///////////////////////////////

		if($this->_app->can_do_user->view_infos_annonce)
			$this->annonces = $this->get_list_annonce_user();

		else
			$this->_app->user->nb_vues_total = "Vous n'êtes pas annonceurs";

		$this->assign_var("annonces", $this->annonces)->render_tpl();
	}


	public function get_list_annonce_user()
	{
		$sql_annonce = new stdClass();
		$sql_annonce->table = 'annonces';
		$sql_annonce->data = "id, user_name, user_last_name, id_utilisateurs, title, sub_title, active, user_validate, admin_validate, create_date, vues, private_message, date_annonces, habitat_name_sql";
		$sql_annonce->order = ["id DESC"];
		$sql_annonce->where = ["id_utilisateurs = $1 AND on_off = $2", [$this->_app->user->id_utilisateurs, 1] ];
		$res_sql_annonces = $this->_app->sql->select($sql_annonce);

		if(!empty($res_sql_annonces))
		{
			$res_sql_annonces = $this->_app->get_first_image($res_sql_annonces);

			foreach($res_sql_annonces as $row_annonce)
			{
				$row_annonce->nb_waiting = 0;
				$row_annonce->nb_reserved = 0;
				$row_annonce->total_price_win = 0;
				$row_annonce->total_price_afk = 0;

				if(!isset($row_annonce->date_annonces)) continue;
				foreach($row_annonce->date_annonces as $key => $row_date)
				{
					
					if($row_date->state == "waiting")
					{
						$row_annonce->total_price_afk = $row_annonce->total_price_afk + $row_date->prix;
						$row_annonce->nb_waiting++;
					}

					if($row_date->state == "reserved"){
						$row_annonce->total_price_win = $row_annonce->total_price_win + $row_date->prix;
						$row_annonce->nb_reserved++;
						unset($row_annonce->date_annonces[$key]);
					}

					if($row_date->state == "deleted"){
						unset($row_annonce->date_annonces[$key]);
					}
				}
			}
			return $res_sql_annonces;
		}
		else
			return false;

		
	}
}