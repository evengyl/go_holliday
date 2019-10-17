<?
Class my_account_edit_avantages extends base_module
{
	public $_app;
	public $list_preference;

	public function __construct(&$_app)
	{		
		parent::__construct($_app);

		
		$this->get_list_preference();

		$this->set_preference($_POST);

		$this
		->assign_var("list_preference", $this->list_preference)
		->render_tpl();
	}


	private function set_preference($post)
	{
		$ctx_preference = array();
		if(isset($post["list_preference"]))
		{
			foreach($this->list_preference as $row_preference)
			{
				if(in_array($row_preference->name_sql, (array)$post["list_preference"]))
					$ctx_preference[] = $row_preference->id;
			}
			$ctx_str_preference = implode($ctx_preference, ",");
		}
		else
			$ctx_str_preference = "";


		$req_sql_update_preference = new stdClass();
		$req_sql_update_preference->ctx = new stdClass();
		$req_sql_update_preference->ctx->id_preference = $ctx_str_preference;
		$req_sql_update_preference->table = "utilisateurs";
		$req_sql_update_preference->where = "id = '".$this->_app->user->id_utilisateurs."'";
		$this->_app->sql->update($req_sql_update_preference);
		$this->_app->set_user_infos_on_app();
	}



	public function get_list_preference()
	{
		$tmp_list = [];

		$req_sql_verify = new stdClass();
		$req_sql_verify->table = 'utilisateur_preference';
		$req_sql_verify->data = "*";
		$req_sql_verify->where = ["1"];

		$this->list_preference = $this->_app->sql->select($req_sql_verify);
	}
}