<?
Class admin_list_annonceurs extends base_module
{
	public $total_annonce = 0;
	public $total_annonce_active = 0;
	public $total_annonce_inactive = 0;

	public function __construct(&$_app)
	{		
		parent::__construct($_app);


		if(isset($_POST["send_message_annonceur"]))
			$this->_app->send_new_mail_client("Bonjour chère Annonceur ".$_POST["name_annonceur"]." : <br>".$_POST["message"], $_POST["email_annonceur"], "admin_say");




		$res_sql_list_annonceurs = $this->get_list_annonceurs();


		$this->assign_var("list_annonceurs", $res_sql_list_annonceurs)
		->assign_var("total_annonce", $this->total_annonce)
		->assign_var("total_annonce_active", $this->total_annonce_active)
		->assign_var("total_annonce_inactive", $this->total_annonce_inactive)
		->render_tpl();
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
				$sql_get_infos_annonceurs->data = "id, vues, active";
				$sql_get_infos_annonceurs->where = ["id_utilisateurs = $1 AND on_off = $2", [$row_clients->id, 1]];
				$tmp_infos = $this->_app->sql->select($sql_get_infos_annonceurs);


				$res_sql_list_annonceurs[$key]->nb_annonces = count($tmp_infos);
				$res_sql_list_annonceurs[$key]->annonces = $tmp_infos;

				$res_sql_list_annonceurs[$key]->vues = 0;
				foreach($tmp_infos as $row)
				{
					$res_sql_list_annonceurs[$key]->vues += $row->vues;


					$this->total_annonce = $this->total_annonce+1;
					if($row->active == 0)
						$this->total_annonce_inactive = $this->total_annonce_inactive+1;
					else
						$this->total_annonce_active = $this->total_annonce_active+1;

				}
			}
			return $res_sql_list_annonceurs;
		}

		else
			return false;
	}

}
