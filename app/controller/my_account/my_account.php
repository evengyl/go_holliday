<?

Class my_account extends base_module
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
		$sql_annonce->table = ['annonces', "type_vacances"];
		$sql_annonce->var = [
			"annonces" => ['id', "id_pays", "id_habitat", "id_type_vacances", "id_utilisateurs", "title", "sub_title", "active", "user_validate", "admin_validate", "create_date", "vues"],
			"type_vacances" => ["name_human AS name_type_vacances"],
		];
		$sql_annonce->order = ["id DESC"];

		$sql_annonce->where = ["id_utilisateurs = $1", [$this->_app->user->id_utilisateurs] ];
		$res_sql_annonces = $this->_app->sql->select($sql_annonce);

		$this->_app->user->nb_annonces_active = 0;
		$this->_app->user->nb_annonces = 0;

		foreach($res_sql_annonces as $key_annonce => $row_annonce)
		{
			$this->_app->user->nb_annonces ++;

			if($row_annonce->active)
				$this->_app->user->nb_annonces_active ++;

			$sql_date_announce = new stdClass();
			$sql_date_announce->table = ['private_message'];
			$sql_date_announce->var = ["*"];
			$sql_date_announce->order = ["id"];
			$sql_date_announce->where = ["id_annonce = $1", [$row_annonce->id]];
			$private_message_annonce = $this->_app->sql->select($sql_date_announce);
			$res_sql_annonces[$key_annonce]->private_message = $private_message_annonce;



			$sql_date_announce = new stdClass();
			$sql_date_announce->table = ['date_annonces'];
			$sql_date_announce->var = ["*"];
			$sql_date_announce->order = ["id"];
			$sql_date_announce->where = ["id_annonces = $1 AND state IN $2", [$row_annonce->id, ["waiting", "reserved"] ] ];
			$res_date_announce = $this->_app->sql->select($sql_date_announce);
			if(isset($res_date_announce[0]))
			{
				foreach($res_date_announce as $key => $row_date)
				{
					if($row_date->state == "waiting")
						$res_sql_annonces[$key_annonce]->date_waiting[$key] = $row_date;

					else if($row_date->state == "reserved")
						$res_sql_annonces[$key_annonce]->date_reserved[$key] = $row_date;
				}	
			}
			


			if($dossier = opendir($this->_app->base_dir."/public/images/annonces/".$row_annonce->id."/"))
			{
				while(false !== ($fichier = readdir($dossier)))
				{
					if($fichier != '.' && $fichier != '..'){
						$res_sql_annonces[$key_annonce]->img_principale = $fichier;
						break;
					}
				}
			}
		}
		return $res_sql_annonces;
	}
}