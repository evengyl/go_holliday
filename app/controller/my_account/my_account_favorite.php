<?
Class my_account_favorite extends base_module
{
	public function __construct(&$_app)
	{		
		parent::__construct($_app);
		$this->_app->title_page .= " - Mes annonces favorites";

		$array_annonce_fav = $this->get_annonce_fav();

		$this->assign_var('array_annonce_fav', $array_annonce_fav)
		->use_template('my_account_favorite');
	}

	function get_annonce_fav()
	{
		$array_id_fav = $this->_app->user->id_favorite;

		$req_sql = new stdClass();
		$req_sql->table = "annonces";
		$req_sql->data = "id, title, sub_title, id_utilisateurs, id_type_vacances, active, vues, create_date, address, avis";
		$req_sql->where = ["id IN $1",[$array_id_fav]];
		$array_annonce_fav = $this->_app->sql->select($req_sql);

		$array_annonce_fav = $this->_app->get_first_image($array_annonce_fav);

		

		if(!empty($array_annonce_fav))
		{
			foreach($array_annonce_fav as $row_annonce)
			{
				$row_annonce->total_avis = 0;

			
				if(isset($row_annonce->avis))
				{
					foreach($row_annonce->avis as $row)
					{
						if($row->active == 1)
							$row_annonce->total_avis++;
					}
				}

			}					
		}

		return $array_annonce_fav;
	}




}
