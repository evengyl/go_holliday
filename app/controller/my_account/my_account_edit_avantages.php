<?
Class my_account_edit_avantages extends base_module
{
	public $_app;
	public $list_preference;

	public function __construct(&$_app)
	{		
		parent::__construct($_app);

		if(isset($_POST["list_preference"])){
			$this->get_list_preference();
			$this->set_preference($_POST["list_preference"]);
			affiche($this->list_preference);
		}

		$this->render_tpl();
	}


	private function set_preference()
	{/*
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
		$this->_app->sql->update($req_sql_update_annonce);*/
	}



	public function get_list_preference()
	{
		$tmp_list = [];

		$req_sql_verify = new stdClass();
		$req_sql_verify->table = 'utilisateur_preference';
		$req_sql_verify->data = "*";
		$req_sql_verify->where = ["1"];
		$req_sql_verify->limit = "1";

		$this->list_preference = $this->_app->sql->select($req_sql_verify);
		unset($this->list_preference[0]->id);

		foreach($this->list_preference[0] as $key_list_preference => $row_list_preference)
		{
			$req_sql_verify_second = new stdClass();
			$req_sql_verify_second->table = 'text_sql_to_human';
			$req_sql_verify_second->data = "name_sql, name_human";
			$req_sql_verify_second->where = ["name_sql = $1", [$key_list_preference]];
			$tmp_list[$key_list_preference] = $this->_app->sql->select($req_sql_verify_second)[0];
		}

		$this->list_preference = $tmp_list;
	}
}