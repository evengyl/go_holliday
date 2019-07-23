<?
Class create_announce extends base_module
{
	public $value_form = [
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


		$slides = $this->_app->get_slide_home($opacity = true);
		$array_type = $this->get_list_type();

		$this->create_temp_id_bsd();

		//on check le form avec la session du random id form
		if(isset($_SESSION['rand_id_form_create_annonce']) && isset($_POST['rand_id_create_annonce']))
		{
			if($_SESSION['rand_id_form_create_annonce'] == $_POST['rand_id_create_annonce'])
				$this->treatment_create_annonce($_POST);
		}


		//on génère un nombre aléatoire pour valider un form unique
		$rand_id_create_annonce = rand();
		$_SESSION['rand_id_form_create_annonce'] = $rand_id_create_annonce;
		
		$this->assign_var("rand_id_create_annonce", $rand_id_create_annonce)
			->assign_var("slides", $slides[array_rand($slides)])
			->assign_var("array_type", $array_type)
			->assign_var("value_form", $this->value_form)
			->use_template("my_account_create_announce");
	}

	public function treatment_create_annonce($post)
	{
		affiche_pre($post);
	}


	private function get_list_type()
	{
		$sql_type = new stdClass();
		$sql_type->table = ["type_vacances"];
		$sql_type->var = ["*"];
		$sql_type->where = ["1"];
		return $this->_app->sql->select($sql_type);
	}


	public function create_temp_id_bsd()
	{
		$req_sql_verify = new stdClass();
		$req_sql_verify->table = ['annonces'];
		$req_sql_verify->var = ["id"];
		$req_sql_verify->where = ["name = $1 AND id_utilisateurs = $2", ["", $this->_app->user->id_utilisateurs]];
		$req_sql_verify->order = ["id DESC"];
		$req_sql_verify->limit = "1";
		$id = $this->_app->sql->select($req_sql_verify);

		if(!$id)
		{
			$req_sql = new stdClass();
			$req_sql->ctx = new stdClass();
			$req_sql->ctx->id_utilisateurs = $this->_app->user->id_utilisateurs;
			$req_sql->ctx->create_date = date("d/m/Y");
			$req_sql->table = "annonces";
			$this->_app->sql->insert_into($req_sql);
		}
	}
}
