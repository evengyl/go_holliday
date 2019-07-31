<?
Class create_announce extends base_module
{
	public $value_form;
	public $id_announce;
	private $array_list_pays_for_tpl = [];
	private $list_pays_for_compar = [];


	public function __construct(&$_app)
	{		
		parent::__construct($_app);

		//pour faciliter la manipulation des valeurs on transforme direct en oject pour travailler avec
		$this->value_form = (object) render_annonce_prop();


		$slides = $this->_app->get_slide_home($opacity = true);
		$array_type_vacances = $this->get_list_type(); //ok
		$array_type_activity = $this->get_list_activity(); //ok
		$array_type_sport = $this->get_list_sport(); //ok
		$array_type_vacances = $this->get_list_type(); //ok
		$this->list_pays_for_compar = $this->get_list_pays(); // OK

		$this->create_temp_id_bsd(); //ok

		//on check le form avec la session du random id form
		if(isset($_SESSION['rand_id_form_create_annonce']) && isset($_POST['rand_id_create_annonce']))
		{
			if($_SESSION['rand_id_form_create_annonce'] == $_POST['rand_id_create_annonce'])
				$this->treatment_create_annonce($_POST);
		}


		//on génère un nombre aléatoire pour valider un form unique
		$_SESSION['rand_id_form_create_annonce'] = $rand_id_create_annonce = rand();


		$this->assign_var("rand_id_create_annonce", $rand_id_create_annonce)
			->assign_var("slides", $slides[array_rand($slides)])
			->assign_var("array_type_vacances", $array_type_vacances)
			->assign_var("array_list_pays_for_tpl", $this->array_list_pays_for_tpl)
			->assign_var("array_type_activity", $array_type_activity)
			->assign_var("array_type_sport", $array_type_sport)
			->assign_var("value_form", $this->value_form)
			->assign_var('id_announce', $this->id_announce)
			->use_template("my_account_create_announce");
	}



	public function treatment_create_annonce($post)
	{
		$this->value_form->type_vacances = $this->get_id_type_vacances($post);

		$this->value_form->title = $this->render_text($post['title']);
		$this->value_form->sub_title = $this->render_text($post['sub_title']);

		$this->value_form->address_lieux_dit = $this->render_text($post['address_lieux_dit']);
		$this->value_form->address_rue = $this->render_text($post['address_rue']);
		$this->value_form->address_numero = $this->render_text($post['address_numero']);
		$this->value_form->address_localite = $this->render_text($post['address_localite']);
		$this->value_form->address_zip_code = $this->render_text($post['address_zip_code']);
		$this->value_form->address_pays = $this->render_pays_text($post); 
		

		$current_date = date("Y-m-d");
		$current_date_plus_1 = (date('d/m/Y', strtotime($current_date. ' + 1 days'))); // On ajoute 1 jour
		$current_date_plus_10 = (date('d/m/Y', strtotime($current_date. ' + 31 days'))); // On ajoute 31 jour
		$this->value_form->start_saison = (isset($post['start_saison']) && !empty($post['start_saison']))?$post['start_saison']:$current_date_plus_1;
		$this->value_form->end_saison = (isset($post['end_saison']) && !empty($post['end_saison']))?$post['end_saison']:$current_date_plus_10;

		

		$this->value_form->max_personn = $this->render_text($post['max_personn']);
		$this->value_form->activity = $post['activity'];
		$this->value_form->sport = $post['sport'];
		$this->value_form->pet = (isset($post["pet"])?"1":"0");
		$this->value_form->handicap = (isset($post["handicap"])?"1":"0");
		$this->value_form->parking = (isset($post["parking"])?"1":"0");
		if(!empty($post['other_activity']))
			$this->_app->send_new_request_admin("Demande d'activité non renseignée : ".$post['other_activity']);


		$this->value_form->price_one_night = (isset($_POST['price_one_night'])?$_POST['price_one_night']:0);
		$this->value_form->price_week_end = (isset($_POST['price_week_end'])?$_POST['price_week_end']:0);
		$this->value_form->price_one_week = (isset($_POST['price_one_week'])?$_POST['price_one_week']:0);
		$this->value_form->caution = (int)(isset($_POST['caution'])?$_POST['caution']:0);

		affiche($_POST);
	}

	private function render_pays_text($post)
	{
		if(!empty($post['address_pays']))
		{
			if(in_array($post['address_pays'], $this->list_pays_for_compar))
				return $post['address_pays'];
		}
	}	


	private function render_text($text)
	{
		if(!empty($text))
		{
			$tmp_text = trim($text);
			$tmp_text = htmlentities(htmlspecialchars($tmp_text));
			return $tmp_text;
		}
		else
			return "";
	}


	private function get_list_pays()
	{
		$tmp_list = [];

		$req_sql_verify = new stdClass();
		$req_sql_verify->table = ['pays'];
		$req_sql_verify->var = ["id", "name", "human_name"];
		$req_sql_verify->where = ["1"];
		$this->array_list_pays_for_tpl = $this->_app->sql->select($req_sql_verify);

		foreach($this->array_list_pays_for_tpl as $row_list_pays)
			$tmp_list[$row_list_pays->id] = $row_list_pays->name;

		return $tmp_list;
	}


	public function get_list_activity()
	{
		$tmp_list = [];

		$req_sql_verify = new stdClass();
		$req_sql_verify->table = ['activity'];
		$req_sql_verify->var = [
			"activity" => ["hiking", "dancing", "disco", "restaurant", "plage", "bar", "spa"]
		];
		$req_sql_verify->where = ["1"];
		$req_sql_verify->limit = "1";
		$this->array_list_activity_for_tpl = $this->_app->sql->select($req_sql_verify);

		foreach($this->array_list_activity_for_tpl[0] as $key_list_activity => $row_list_activity)
		{
			$req_sql_verify_second = new stdClass();
			$req_sql_verify_second->table = ['text_sql_to_human'];
			$req_sql_verify_second->var = [
				"text_sql_to_human" => ["name_sql", "name_human"]
			];
			$req_sql_verify_second->where = ["name_sql = $1", [$key_list_activity]];
			$tmp_list[$key_list_activity] = $this->_app->sql->select($req_sql_verify_second)[0];
		}

		return $tmp_list;
	}




	public function get_list_sport()
	{
		$tmp_list = [];

		$req_sql_verify = new stdClass();
		$req_sql_verify->table = ['sport'];
		$req_sql_verify->var = [
			"sport" => ["foot", "basket", "tennis", "petanque", "piscine", "aqua_center", "sport", "velos", "skate", "arc"]
		];
		$req_sql_verify->where = ["1"];
		$req_sql_verify->limit = "1";
		$this->array_list_sport_for_tpl = $this->_app->sql->select($req_sql_verify);

		foreach($this->array_list_sport_for_tpl[0] as $key_list_sport => $row_list_sport)
		{
			$req_sql_verify_second = new stdClass();
			$req_sql_verify_second->table = ['text_sql_to_human'];
			$req_sql_verify_second->var = [
				"text_sql_to_human" => ["name_sql", "name_human"]
			];
			$req_sql_verify_second->where = ["name_sql = $1", [$key_list_sport]];
			$tmp_list[$key_list_sport] = $this->_app->sql->select($req_sql_verify_second)[0];
		}

		return $tmp_list;
	}


	private function get_id_type_vacances($post){
		if(!empty($post['type_vacances']))
		{
			$id = [];
			$id_txt = "";

			foreach($post['type_vacances'] as $row_type_vacance)
			{
				$req_sql_verify = new stdClass();
				$req_sql_verify->table = ['type_vacances'];
				$req_sql_verify->var = ["id"];
				$req_sql_verify->where = ["name = $1", [$row_type_vacance]];
				$req_sql_verify->limit = "1";
				$id[] = $this->_app->sql->select($req_sql_verify)[0]->id;

			}
			$id_txt = implode(",", $id);
			return $id_txt;
		}
		else
			return "0";
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
		$req_sql_verify->where = ["title = $1 AND id_utilisateurs = $2 AND user_validate = $3", ["", $this->_app->user->id_utilisateurs, '0']];
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

			$req_sql_verify = new stdClass();
			$req_sql_verify->table = ['annonces'];
			$req_sql_verify->var = ["id"];
			$req_sql_verify->where = ["title = $1 AND id_utilisateurs = $2", ["", $this->_app->user->id_utilisateurs]];
			$req_sql_verify->order = ["id DESC"];
			$req_sql_verify->limit = "1";
			$id = $this->_app->sql->select($req_sql_verify);

		}

		$this->id_announce = $id[0]->id;
	}
}
