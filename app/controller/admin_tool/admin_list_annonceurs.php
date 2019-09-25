<?
Class admin_list_annonceurs extends base_module
{

	public function __construct(&$_app)
	{		
		parent::__construct($_app);

		$res_sql_list_annonceurs = $this->get_list_annonceurs();


		$this->assign_var("list_annonceurs", $res_sql_list_annonceurs)->render_tpl();
	}


	private function get_list_annonceurs()
	{
		$sql_get_list_annonceurs = new stdClass();
		$sql_get_list_annonceurs->table = 'utilisateurs';
		$sql_get_list_annonceurs->data = "id, name, last_name, mail, tel, user_last_name, date_create";
		$sql_get_list_annonceurs->order = ["id"];
		$sql_get_list_annonceurs->where = ["user_type = $1", [1]];
		$res_sql_list_annonceurs = $this->_app->sql->select($sql_get_list_annonceurs);

		if(!empty($res_sql_list_annonceurs))
		{

			foreach($res_sql_list_annonceurs as $key => $row_clients)
			{
				$sql_get_infos_annonceurs = new stdClass();
				$sql_get_infos_annonceurs->table = 'annonces';
				$sql_get_infos_annonceurs->data = "id, vues";
				$sql_get_infos_annonceurs->where = ["id_utilisateurs = $1", [$row_clients->id]];
				$tmp_infos = $this->_app->sql->select($sql_get_infos_annonceurs);

				$res_sql_list_annonceurs[$key]->nb_annonces = count($tmp_infos);

				$res_sql_list_annonceurs[$key]->vues = 0;
				foreach($tmp_infos as $row)
				{
					$res_sql_list_annonceurs[$key]->vues += $row->vues;
				}
			}
			return $res_sql_list_annonceurs;
		}

		else
			return false;
	}

}
