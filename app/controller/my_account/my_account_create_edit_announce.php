<?
Class my_account_create_edit_announce extends base_module
{
	public $annonce;
	private $array_list_pays_for_tpl = [];
	private $list_pays_for_compar = [];
	public $value_form_completed;
	public $create_announce;
	public $array_list_sport;
	public $array_list_activity;
	public $id_annonce = false;


	public function __construct(&$_app)
	{		
		parent::__construct($_app);

		if(isset($_GET['id_annonce']) && !empty($_GET['id_annonce']))
		{
			if($this->verify_if_id_exist($_GET['id_annonce']))
				$this->id_annonce = $_GET['id_annonce'];
		}
		else
		{
			$this->id_annonce = $this->create_id_bsd(); //ok
		}

		

		// on va récupérer la derniere annonce crée pour l'éditée ou la remplir
		$this->annonce = $this->_app->get_announce_user($this->id_annonce);	

		//for form tpl
		$array_type_vacances = $this->get_list_type(); //ok
		$array_type_habitat = $this->get_list_habitat(); //ok

		$this->array_list_activity = $this->get_list_activity(); //ok
		$this->array_list_sport = $this->get_list_sport(); //ok
		$array_type_vacances = $this->get_list_type(); //ok
		$this->list_pays_for_compar = $this->get_list_pays(); // OK

		
		if(!empty($_POST))
			$this->treatment_create_annonce($_POST);

		//on génère un nombre aléatoire pour valider un form unique
		$_SESSION['rand_id_form_create_annonce'] = $rand_id_create_annonce = rand();

		$this->assign_var("rand_id_create_annonce", $rand_id_create_annonce)
			->assign_var("array_type_vacances", $array_type_vacances)
			->assign_var("array_type_habitat", $array_type_habitat)
			->assign_var("array_list_pays_for_tpl", $this->array_list_pays_for_tpl)
			->assign_var("array_list_activity", $this->array_list_activity)
			->assign_var("array_list_sport", $this->array_list_sport)
			->assign_var("annonce", $this->annonce)
			->use_template("my_account_create_announce");
	}


	private function verify_if_id_exist($id)
	{
		$req_sql_verify = new stdClass();
		$req_sql_verify->table = 'annonces';
		$req_sql_verify->data = "id";
		$req_sql_verify->where = ["id = $1 AND id_utilisateurs = $2", [(int)$id, $this->_app->user->id_utilisateurs]];
		$tmp =$this->_app->sql->select($req_sql_verify);

		if($tmp)
			return true;
		else 
			return false;
	}



	public function treatment_create_annonce($post)
	{
		
		$this->annonce->type_vacances = $this->get_id_type_vacances($post);
		$this->annonce->array_type_vacances = (isset($post['type_vacances'])?$post["type_vacances"]:Null);

		$this->annonce->type_habitat = (isset($post['type_habitat'])?$post["type_habitat"]:0);

		$this->annonce->title = $this->render_text((isset($post['title']))?$post['title']:'');
		$this->annonce->sub_title = $this->render_text((isset($post['sub_title']))?$post['sub_title']:'');

		$this->annonce->address_lieux_dit = $this->render_text((isset($post['address_lieux_dit']))?$post['address_lieux_dit']:'');
		$this->annonce->address_rue = $this->render_text((isset($post['address_rue']))?$post['address_rue']:'');
		$this->annonce->address_numero = $this->render_text((isset($post['address_numero']))?$post['address_numero']:'');
		$this->annonce->address_localite = $this->render_text((isset($post['address_localite']))?$post['address_localite']:'');
		$this->annonce->address_zip_code = $this->render_text((isset($post['address_zip_code']))?$post['address_zip_code']:'');
		$this->annonce->id_address_pays = $this->render_pays_id((isset($post['address_pays']))?$post['address_pays']:'');
	

		$current_date = date("Y-m-d");
		$current_date_plus_1 = (date('d/m/Y', strtotime($current_date. ' + 1 days'))); // On ajoute 1 jour
		$current_date_plus_10 = (date('d/m/Y', strtotime($current_date. ' + 31 days'))); // On ajoute 31 jour
		$this->annonce->start_saison = (isset($post['start_saison']) && !empty($post['start_saison']))?$post['start_saison']:$current_date_plus_1;
		$this->annonce->end_saison = (isset($post['end_saison']) && !empty($post['end_saison']))?$post['end_saison']:$current_date_plus_10;



		$this->annonce->max_personn = $this->render_text((isset($post['max_personn']))?$post['max_personn']:'0');
		$this->annonce->pet = (isset($post["pet"])?"1":"0");
		$this->annonce->handicap = (isset($post["handicap"])?"1":"0");
		$this->annonce->parking = (isset($post["parking"])?"1":"0");

		$this->annonce->list_activity = (isset($post['list_activity'])?$post['list_activity']:'0');
		$this->annonce->list_sport = (isset($post['list_sport'])?$post['list_sport']:'0');
		
		
		if(!empty($post['other_activity']))
			$this->_app->send_new_request_admin("Demande d'activité non renseignée : ".$post['other_activity']);

		if(!empty($post['other_sport']))
			$this->_app->send_new_request_admin("Demande de sport non renseigné : ".$post['other_sport']);

		$this->annonce->price_one_night = (isset($_POST['price_one_night'])?$_POST['price_one_night']:0);
		$this->annonce->price_week_end = (isset($_POST['price_week_end'])?$_POST['price_week_end']:0);
		$this->annonce->price_one_week = (isset($_POST['price_one_week'])?$_POST['price_one_week']:0);
		$this->annonce->caution = (int)(isset($_POST['caution'])?$_POST['caution']:0);

		$this->insert_value_form_annonce();
		$this->annonce = $this->_app->get_announce_user($this->id_annonce);

		header('Location: /Mon_compte'); 
		
	}

	private function render_pays_id($pays_id)
	{
		if(!empty($pays_id))
		{
			if(isset($this->list_pays_for_compar[$pays_id]))
				return $pays_id;
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
		$req_sql_verify->table = 'annonce_pays';
		$req_sql_verify->data = "id, name_sql, name_human";
		$req_sql_verify->where = ["1"];
		$this->array_list_pays_for_tpl = $this->_app->sql->select($req_sql_verify);

		foreach($this->array_list_pays_for_tpl as $row_list_pays)
			$tmp_list[$row_list_pays->id] = $row_list_pays->name_sql;

		return $tmp_list;
	}


	public function get_list_activity()
	{
		$tmp_list = [];

		$req_sql_verify = new stdClass();
		$req_sql_verify->table = 'annonce_activity';
		$req_sql_verify->data = "*";
		$req_sql_verify->where = ["1"];
		$req_sql_verify->limit = "1";
		$this->array_list_activity_for_tpl = $this->_app->sql->select($req_sql_verify);
		unset($this->array_list_activity_for_tpl[0]->id);

		foreach($this->array_list_activity_for_tpl[0] as $key_list_activity => $row_list_activity)
		{
			$req_sql_verify_second = new stdClass();
			$req_sql_verify_second->table = 'text_sql_to_human';
			$req_sql_verify_second->data = "name_sql, name_human";
			$req_sql_verify_second->where = ["name_sql = $1", [$key_list_activity]];
			$tmp_list[$key_list_activity] = $this->_app->sql->select($req_sql_verify_second)[0];
		}

		return $tmp_list;
	}




	public function get_list_sport()
	{
		$tmp_list = [];

		$req_sql_verify = new stdClass();
		$req_sql_verify->table = 'annonce_sport';
		$req_sql_verify->data = "*";
		$req_sql_verify->where = ["1"];
		$req_sql_verify->limit = "1";
		$this->array_list_sport_for_tpl = $this->_app->sql->select($req_sql_verify);
		unset($this->array_list_sport_for_tpl[0]->id);

		foreach($this->array_list_sport_for_tpl[0] as $key_list_sport => $row_list_sport)
		{
			$req_sql_verify_second = new stdClass();
			$req_sql_verify_second->table = 'text_sql_to_human';
			$req_sql_verify_second->data = "name_sql, name_human";
			$req_sql_verify_second->where = ["name_sql = $1", [$key_list_sport]];
			$tmp_list[$key_list_sport] = $this->_app->sql->select($req_sql_verify_second)[0];
		}

		return $tmp_list;
	}


	private function get_id_type_vacances($post)
	{
		if(!empty($post['type_vacances']))
		{
			$id = [];
			$id_txt = "";

			foreach($post['type_vacances'] as $row_type_vacance)
			{
				$req_sql_verify = new stdClass();
				$req_sql_verify->table = 'type_vacances';
				$req_sql_verify->data = "id";
				$req_sql_verify->where = ["name_sql = $1", [$row_type_vacance]];
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
		$sql_type->table = "type_vacances";
		$sql_type->data = "*";
		$sql_type->where = ["1"];
		return $this->_app->sql->select($sql_type);
	}

	private function get_list_habitat()
	{
		$sql_type = new stdClass();
		$sql_type->table = "annonce_habitat";
		$sql_type->data = "*";
		$sql_type->where = ["1"];
		$sql_type->order = ["id DESC"];

		return $this->_app->sql->select($sql_type);
	}


	public function insert_value_form_annonce()
	{

		$req_sql_update_annonce = new stdClass();
		$req_sql_update_annonce->ctx = new stdClass();
		$req_sql_update_annonce->ctx->id_pays = $this->annonce->id_address_pays;
		$req_sql_update_annonce->ctx->id_habitat = $this->annonce->type_habitat;
		$req_sql_update_annonce->ctx->id_type_vacances = $this->annonce->type_vacances;
		$req_sql_update_annonce->ctx->title = $this->annonce->title;
		$req_sql_update_annonce->ctx->sub_title = $this->annonce->sub_title;
		$req_sql_update_annonce->ctx->start_saison = $this->annonce->start_saison;
		$req_sql_update_annonce->ctx->end_saison = $this->annonce->end_saison;
		$req_sql_update_annonce->ctx->user_validate = "0";
		$req_sql_update_annonce->table = "annonces";
		$req_sql_update_annonce->where = "id = '".$this->annonce->id."'";

		$this->_app->sql->update($req_sql_update_annonce);

		
		$req_sql_update_annonce = new stdClass();
		$req_sql_update_annonce->ctx = new stdClass();
		$req_sql_update_annonce->ctx->address_lieux_dit = $this->annonce->address_lieux_dit;
		$req_sql_update_annonce->ctx->address_rue = $this->annonce->address_rue;
		$req_sql_update_annonce->ctx->address_numero = $this->annonce->address_numero;
		$req_sql_update_annonce->ctx->address_localite = $this->annonce->address_localite;
		$req_sql_update_annonce->ctx->address_zip_code = $this->annonce->address_zip_code;
		$req_sql_update_annonce->table = "annonce_address";
		$req_sql_update_annonce->where = "id = '".$this->annonce->id."'";

		$this->_app->sql->update($req_sql_update_annonce);


		$req_sql_update_annonce = new stdClass();
		$req_sql_update_annonce->ctx = new stdClass();
		$req_sql_update_annonce->ctx->price_one_night = $this->annonce->price_one_night;
		$req_sql_update_annonce->ctx->price_week_end = $this->annonce->price_week_end;
		$req_sql_update_annonce->ctx->price_one_week = $this->annonce->price_one_week;
		$req_sql_update_annonce->table = "range_price_announce";
		$req_sql_update_annonce->where = "id = '".$this->annonce->id."'";

		$this->_app->sql->update($req_sql_update_annonce);


		$req_sql_update_annonce = new stdClass();
		$req_sql_update_annonce->ctx = new stdClass();
		$req_sql_update_annonce->ctx->max_personn = $this->annonce->max_personn;
		$req_sql_update_annonce->ctx->pet = $this->annonce->pet;
		$req_sql_update_annonce->ctx->handicap = $this->annonce->handicap;
		$req_sql_update_annonce->ctx->parking = $this->annonce->parking;
		$req_sql_update_annonce->ctx->caution = $this->annonce->caution;
		$req_sql_update_annonce->table = "annonce_commoditer";
		$req_sql_update_annonce->where = "id = '".$this->annonce->id."'";

		$this->_app->sql->update($req_sql_update_annonce);



		foreach($this->array_list_sport as $row_sport)
		{
			if(in_array($row_sport->name_sql, (array)$this->annonce->list_sport))
				$ctx_sport[$row_sport->name_sql] = 1;
			else
				$ctx_sport[$row_sport->name_sql] = 0;
		}
		$req_sql_update_annonce = new stdClass();
		$req_sql_update_annonce->ctx = new stdClass();
		$req_sql_update_annonce->ctx = $ctx_sport;
		$req_sql_update_annonce->table = "annonce_sport";
		$req_sql_update_annonce->where = "id = '".$this->annonce->id."'";
		$this->_app->sql->update($req_sql_update_annonce);



		foreach($this->array_list_activity as $row_activity)
		{
			if(in_array($row_activity->name_sql, (array)$this->annonce->list_activity))
				$ctx_activity[$row_activity->name_sql] = 1;
			else
				$ctx_activity[$row_activity->name_sql] = 0;
		}
		$req_sql_update_annonce = new stdClass();
		$req_sql_update_annonce->ctx = new stdClass();
		$req_sql_update_annonce->ctx = $ctx_activity;
		$req_sql_update_annonce->table = "annonce_activity";
		$req_sql_update_annonce->where = "id = '".$this->annonce->id."'";
		$this->_app->sql->update($req_sql_update_annonce);



	}


	public function create_id_bsd()
	{
		$req_sql_verify = new stdClass();
		$req_sql_verify->table = 'annonces';
		$req_sql_verify->data = "id";
		$req_sql_verify->where = ["id_utilisateurs = $1 AND user_validate = $2", [$this->_app->user->id_utilisateurs, '0']];
		$req_sql_verify->order = ["id DESC"];
		$req_sql_verify->limit = "1";
		$id_annonce = $this->_app->sql->select($req_sql_verify);

		if(empty($id_annonce))
		{

			$req_sql_insert_annonce = new stdClass();
			$req_sql_insert_annonce->ctx = new stdClass();
			$req_sql_insert_annonce->ctx->id_utilisateurs = $this->_app->user->id_utilisateurs;
			$req_sql_insert_annonce->ctx->create_date = date("d/m/Y");
			$req_sql_insert_annonce->table = "annonces";
			$id_annonce = $this->_app->sql->insert_into($req_sql_insert_annonce,0 ,1);



			$req_sql_insert_sport = new stdClass();
			$req_sql_insert_sport->ctx = new stdClass();
			$req_sql_insert_sport->ctx->id = $id_annonce;
			$req_sql_insert_sport->table = "annonce_activity";
			$this->_app->sql->insert_into($req_sql_insert_sport);

			
			$req_sql_insert_activity = new stdClass();
			$req_sql_insert_activity->ctx = new stdClass();
			$req_sql_insert_activity->ctx->id = $id_annonce;
			$req_sql_insert_activity->table = "annonce_sport";
			$this->_app->sql->insert_into($req_sql_insert_activity);


			$req_sql_insert_address = new stdClass();
			$req_sql_insert_address->ctx = new stdClass();
			$req_sql_insert_address->ctx->id = $id_annonce;
			$req_sql_insert_address->table = "annonce_address";
			$this->_app->sql->insert_into($req_sql_insert_address);


			$req_sql_insert_commoditer = new stdClass();
			$req_sql_insert_commoditer->ctx = new stdClass();
			$req_sql_insert_commoditer->ctx->id = $id_annonce;
			$req_sql_insert_commoditer->table = "annonce_commoditer";
			$this->_app->sql->insert_into($req_sql_insert_commoditer);


			$req_sql_insert_range_price = new stdClass();
			$req_sql_insert_range_price->ctx = new stdClass();
			$req_sql_insert_range_price->ctx->id = $id_annonce;
			$req_sql_insert_range_price->table = "range_price_announce";
			$this->_app->sql->insert_into($req_sql_insert_range_price);

			return $id_annonce;
		}
		else
		{
			return $id_annonce[0]->id;
		}
	}
}
