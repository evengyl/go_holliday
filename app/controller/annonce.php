<?
Class annonce extends base_module
{
	public $_app;
	public $error = false;
	public $name_annonce;

	private $id_annonce;

	public $value_announce = [
		"type_vacances" => "",

		"title" => "",
		"sub_title" => "",

		"address_lieux_dit" => "",
		"address_rue" => "",
		"address_numero" => "",
		"address_localite" => "",
		"address_zip_code" => "",
		"address_pays" => "",

		"start_saison" => "",
		"end_saison" => "",

		"max_personn" => "",

		"sport" => "",
		"activity" =>  "",
		"other_activity" => "",

		"price_one_night" => "",
		"price_week_end" => "",
		"price_one_week" => ""
	];

	public function __construct(&$_app)
	{	
		parent::__construct($_app);

		if($this->id_annonce = $this->verif_if_announce_exist($_GET['id_annonce']))
		{
			$array_img_annonce = $this->get_img_files_by_id();
			$this->get_infos_announce();

			$this->assign_var("slide_img", $array_img_annonce)
			->assign_var("value_announce", $this->value_announce)
			->render_tpl();
			
		}
		else{
			$_SESSION["error_admin"] = "Attention l'annonce que vous souhaitez voir n'existe pas.";
			$this->use_module("p_404");
		}

		
	}


	private function verif_if_announce_exist($id)
	{
		//anti piratage et plantage vérifier que l'id est bon
		$sql_verif = new stdClass();
		$sql_verif->table = ["annonces"];
		$sql_verif->var = ["*"];
		$sql_verif->where = ["id = $1", [(int) $id]];
		$res_sql_verif = $this->_app->sql->select($sql_verif);

		if(!empty($res_sql_verif))
			return $res_sql_verif[0]->id;
		else
			return false;
	}

	public function get_img_files_by_id()
	{
		$array_slide = array();

		if($dossier = opendir($this->_app->base_dir.'/public/images/annonces/'.$this->id_annonce))
		{
			while(false !== ($fichier = readdir($dossier)))
			{
				if($fichier != '.' && $fichier != '..')
					$array_slide[] = "/images/annonces/".$this->id_annonce."/".$fichier;
			}
		}
		return $array_slide;
	}

	private function get_infos_announce()
	{
		$sql_annonce = new stdClass();
		$sql_annonce->table = ['annonces', "type_vacances"];
		$sql_annonce->var = [
			"annonces" => ['id', "id_pays", "id_habitat", "id_type_vacances", "id_utilisateurs", "title", "sub_title", "lieu AS lieu_annonce", "active", "admin_validate", "create_date", "vues"],
			"type_vacances" => ["name AS name_type_vacances"]
		];
		$sql_annonce->where = ["id_utilisateurs = $1 AND id = $2", [$this->_app->user->id_utilisateurs, $this->id_annonce]];
		$res_sql_annonces = $this->_app->sql->select($sql_annonce);

		$tmp_array = (array) $res_sql_annonces[0];

		$tmp_1 = array_merge($tmp_array, $this->value_announce);
		$tmp_2 = array_merge($this->value_announce, $tmp_array);

		$this->value_announce = (object) array_merge($tmp_1, $tmp_2);
	}
}