<?
Class my_account_create_edit_announce extends base_module
{
	public $last_announce;
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

		$this->create_id_bsd(); //ok
		// on va récupérer la derniere annonce crée pour l'éditée ou la remplir
		$this->last_announce = $this->_app->get_last_announce_user($this->id_annonce);	

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
			->assign_var("last_announce", $this->last_announce)
			->use_template("my_account_create_announce");
	}


	private function verify_if_id_exist($id)
	{
		$req_sql_verify = new stdClass();
		$req_sql_verify->table = ['annonces'];
		$req_sql_verify->var = ["id"];
		$req_sql_verify->where = ["id = $1 AND id_utilisateurs = $2", [(int)$id, $this->_app->user->id_utilisateurs]];
		$tmp =$this->_app->sql->select($req_sql_verify);

		if($tmp)
			return true;
		else 
			return false;
	}



	public function treatment_create_annonce($post)
	{
		
		$this->last_announce->type_vacances = $this->get_id_type_vacances($post);
		$this->last_announce->array_type_vacances = (isset($post['type_vacances'])?$post["type_vacances"]:Null);

		$this->last_announce->type_habitat = (isset($post['type_habitat'])?$post["type_habitat"]:0);

		$this->last_announce->title = $this->render_text((isset($post['title']))?$post['title']:'');
		$this->last_announce->sub_title = $this->render_text((isset($post['sub_title']))?$post['sub_title']:'');

		$this->last_announce->address_lieux_dit = $this->render_text((isset($post['address_lieux_dit']))?$post['address_lieux_dit']:'');
		$this->last_announce->address_rue = $this->render_text((isset($post['address_rue']))?$post['address_rue']:'');
		$this->last_announce->address_numero = $this->render_text((isset($post['address_numero']))?$post['address_numero']:'');
		$this->last_announce->address_localite = $this->render_text((isset($post['address_localite']))?$post['address_localite']:'');
		$this->last_announce->address_zip_code = $this->render_text((isset($post['address_zip_code']))?$post['address_zip_code']:'');
		$this->last_announce->id_address_pays = $this->render_pays_id((isset($post['address_pays']))?$post['address_pays']:'');
	

		$current_date = date("Y-m-d");
		$current_date_plus_1 = (date('d/m/Y', strtotime($current_date. ' + 1 days'))); // On ajoute 1 jour
		$current_date_plus_10 = (date('d/m/Y', strtotime($current_date. ' + 31 days'))); // On ajoute 31 jour
		$this->last_announce->start_saison = (isset($post['start_saison']) && !empty($post['start_saison']))?$post['start_saison']:$current_date_plus_1;
		$this->last_announce->end_saison = (isset($post['end_saison']) && !empty($post['end_saison']))?$post['end_saison']:$current_date_plus_10;



		$this->last_announce->max_personn = $this->render_text((isset($post['max_personn']))?$post['max_personn']:'0');
		$this->last_announce->pet = (isset($post["pet"])?"1":"0");
		$this->last_announce->handicap = (isset($post["handicap"])?"1":"0");
		$this->last_announce->parking = (isset($post["parking"])?"1":"0");

		$this->last_announce->list_activity = (isset($post['list_activity'])?$post['list_activity']:'0');
		$this->last_announce->list_sport = (isset($post['list_sport'])?$post['list_sport']:'0');
		
		
		if(!empty($post['other_activity']))
			$this->_app->send_new_request_admin("Demande d'activité non renseignée : ".$post['other_activity']);

		if(!empty($post['other_sport']))
			$this->_app->send_new_request_admin("Demande de sport non renseigné : ".$post['other_sport']);

		$this->last_announce->price_one_night = (isset($_POST['price_one_night'])?$_POST['price_one_night']:0);
		$this->last_announce->price_week_end = (isset($_POST['price_week_end'])?$_POST['price_week_end']:0);
		$this->last_announce->price_one_week = (isset($_POST['price_one_week'])?$_POST['price_one_week']:0);
		$this->last_announce->caution = (int)(isset($_POST['caution'])?$_POST['caution']:0);

		$this->insert_value_form_annonce();
		$this->last_announce = $this->_app->get_last_announce_user($this->id_annonce);

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
		$req_sql_verify->table = ['pays'];
		$req_sql_verify->var = ["id", "name_sql", "name_human"];
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
		$req_sql_verify->table = ['activity'];
		$req_sql_verify->var = ["*"];
		$req_sql_verify->where = ["1"];
		$req_sql_verify->limit = "1";
		$this->array_list_activity_for_tpl = $this->_app->sql->select($req_sql_verify);
		unset($this->array_list_activity_for_tpl[0]->id);

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
		$req_sql_verify->var = ["*"];
		$req_sql_verify->where = ["1"];
		$req_sql_verify->limit = "1";
		$this->array_list_sport_for_tpl = $this->_app->sql->select($req_sql_verify);
		unset($this->array_list_sport_for_tpl[0]->id);

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
		$sql_type->table = ["type_vacances"];
		$sql_type->var = ["*"];
		$sql_type->where = ["1"];
		return $this->_app->sql->select($sql_type);
	}

	private function get_list_habitat()
	{
		$sql_type = new stdClass();
		$sql_type->table = ["habitat"];
		$sql_type->var = ["*"];
		$sql_type->where = ["1"];
		$sql_type->order = ["id DESC"];
		return $this->_app->sql->select($sql_type);
	}


	public function insert_value_form_annonce()
	{

		$req_sql_update_annonce = new stdClass();
		$req_sql_update_annonce->ctx = new stdClass();
		$req_sql_update_annonce->ctx->id_pays = $this->last_announce->id_address_pays;
		$req_sql_update_annonce->ctx->id_habitat = $this->last_announce->type_habitat;
		$req_sql_update_annonce->ctx->id_type_vacances = $this->last_announce->type_vacances;
		$req_sql_update_annonce->ctx->title = $this->last_announce->title;
		$req_sql_update_annonce->ctx->sub_title = $this->last_announce->sub_title;
		$req_sql_update_annonce->ctx->start_saison = $this->last_announce->start_saison;
		$req_sql_update_annonce->ctx->end_saison = $this->last_announce->end_saison;
		$req_sql_update_annonce->ctx->user_validate = "0";
		$req_sql_update_annonce->table = "annonces";
		$req_sql_update_annonce->where = "id = '".$this->last_announce->id_annonce."'";

		$this->_app->sql->update($req_sql_update_annonce);

		
		$req_sql_update_annonce = new stdClass();
		$req_sql_update_annonce->ctx = new stdClass();
		$req_sql_update_annonce->ctx->address_lieux_dit = $this->last_announce->address_lieux_dit;
		$req_sql_update_annonce->ctx->address_rue = $this->last_announce->address_rue;
		$req_sql_update_annonce->ctx->address_numero = $this->last_announce->address_numero;
		$req_sql_update_annonce->ctx->address_localite = $this->last_announce->address_localite;
		$req_sql_update_annonce->ctx->address_zip_code = $this->last_announce->address_zip_code;
		$req_sql_update_annonce->table = "announces_address";
		$req_sql_update_annonce->where = "id = '".$this->last_announce->id_annonce."'";

		$this->_app->sql->update($req_sql_update_annonce);


		$req_sql_update_annonce = new stdClass();
		$req_sql_update_annonce->ctx = new stdClass();
		$req_sql_update_annonce->ctx->price_one_night = $this->last_announce->price_one_night;
		$req_sql_update_annonce->ctx->price_week_end = $this->last_announce->price_week_end;
		$req_sql_update_annonce->ctx->price_one_week = $this->last_announce->price_one_week;
		$req_sql_update_annonce->table = "range_price_announce";
		$req_sql_update_annonce->where = "id = '".$this->last_announce->id_annonce."'";

		$this->_app->sql->update($req_sql_update_annonce);


		$req_sql_update_annonce = new stdClass();
		$req_sql_update_annonce->ctx = new stdClass();
		$req_sql_update_annonce->ctx->max_personn = $this->last_announce->max_personn;
		$req_sql_update_annonce->ctx->pet = $this->last_announce->pet;
		$req_sql_update_annonce->ctx->handicap = $this->last_announce->handicap;
		$req_sql_update_annonce->ctx->parking = $this->last_announce->parking;
		$req_sql_update_annonce->ctx->caution = $this->last_announce->caution;
		$req_sql_update_annonce->table = "commoditer_announces";
		$req_sql_update_annonce->where = "id = '".$this->last_announce->id_annonce."'";

		$this->_app->sql->update($req_sql_update_annonce);



		foreach($this->array_list_sport as $row_sport)
		{
			if(in_array($row_sport->name_sql, (array)$this->last_announce->list_sport))
				$ctx_sport[$row_sport->name_sql] = 1;
			else
				$ctx_sport[$row_sport->name_sql] = 0;
		}
		$req_sql_update_annonce = new stdClass();
		$req_sql_update_annonce->ctx = new stdClass();
		$req_sql_update_annonce->ctx = $ctx_sport;
		$req_sql_update_annonce->table = "sport";
		$req_sql_update_annonce->where = "id = '".$this->last_announce->id_annonce."'";
		$this->_app->sql->update($req_sql_update_annonce);



		foreach($this->array_list_activity as $row_activity)
		{
			if(in_array($row_activity->name_sql, (array)$this->last_announce->list_activity))
				$ctx_activity[$row_activity->name_sql] = 1;
			else
				$ctx_activity[$row_activity->name_sql] = 0;
		}
		$req_sql_update_annonce = new stdClass();
		$req_sql_update_annonce->ctx = new stdClass();
		$req_sql_update_annonce->ctx = $ctx_activity;
		$req_sql_update_annonce->table = "activity";
		$req_sql_update_annonce->where = "id = '".$this->last_announce->id_annonce."'";
		$this->_app->sql->update($req_sql_update_annonce);



	}


	public function create_id_bsd()
	{
		$req_sql_verify = new stdClass();
		$req_sql_verify->table = ['annonces'];
		$req_sql_verify->var = ["id"];
		$req_sql_verify->where = ["id_utilisateurs = $1 AND user_validate = $2", [$this->_app->user->id_utilisateurs, '0']];
		$req_sql_verify->order = ["id DESC"];
		$req_sql_verify->limit = "1";
		$id = $this->_app->sql->select($req_sql_verify);

		if(empty($id))
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
			$req_sql_insert_sport->table = "activity";
			$id_activity = $this->_app->sql->insert_into($req_sql_insert_sport, 0 ,1);

			
			$req_sql_insert_activity = new stdClass();
			$req_sql_insert_activity->ctx = new stdClass();
			$req_sql_insert_activity->ctx->id = $id_annonce;
			$req_sql_insert_activity->table = "sport";
			$id_sport = $this->_app->sql->insert_into($req_sql_insert_activity, 0 ,1);


			$req_sql_insert_address = new stdClass();
			$req_sql_insert_address->ctx = new stdClass();
			$req_sql_insert_address->ctx->id = $id_annonce;
			$req_sql_insert_address->table = "announces_address";
			$id_address = $this->_app->sql->insert_into($req_sql_insert_address, 0 ,1);


			$req_sql_insert_commoditer = new stdClass();
			$req_sql_insert_commoditer->ctx = new stdClass();
			$req_sql_insert_commoditer->ctx->id = $id_annonce;
			$req_sql_insert_commoditer->table = "commoditer_announces";
			$id_commoditer = $this->_app->sql->insert_into($req_sql_insert_commoditer, 0 ,1);


			$req_sql_insert_range_price = new stdClass();
			$req_sql_insert_range_price->ctx = new stdClass();
			$req_sql_insert_range_price->ctx->id = $id_annonce;
			$req_sql_insert_range_price->table = "range_price_announce";
			$id_range_price = $this->_app->sql->insert_into($req_sql_insert_range_price, 0 ,1);



			
			$req_sql_update_annonce = new stdClass();
			$req_sql_update_annonce->ctx = new stdClass();
			$req_sql_update_annonce->ctx->id_sport = $id_sport;
			$req_sql_update_annonce->ctx->id_activity = $id_activity;
			$req_sql_update_annonce->ctx->id_announces_address = $id_address;
			$req_sql_update_annonce->ctx->id_commoditer_announces = $id_commoditer;
			$req_sql_update_annonce->ctx->id_range_price_announce = $id_range_price;

			$req_sql_update_annonce->table = "annonces";
			$req_sql_update_annonce->where = "id = '".$id_annonce."'";
			$this->_app->sql->update($req_sql_update_annonce);
		}
	}
}
