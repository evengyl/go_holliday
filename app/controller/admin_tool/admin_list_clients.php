<?
Class admin_list_clients extends base_module
{

	public function __construct(&$_app)
	{		
		parent::__construct($_app);

		$res_sql_list_clients = $this->get_list_clients();


		if(isset($_POST["send_message_client"]))
			$this->_app->send_new_mail_client("Bonjour chère client ".$_POST["name_client"]." : <br>".$_POST["message"], $_POST["email_client"], "admin_say");


		$this->assign_var("list_clients", $res_sql_list_clients)->render_tpl();
	}


	private function get_list_clients()
	{
		$sql_get_list_clients = new stdClass();
		$sql_get_list_clients->table = 'utilisateurs';
		$sql_get_list_clients->data = "id, name, last_name, mail, tel, user_last_name, date_create";
		$sql_get_list_clients->order = ["id"];
		$sql_get_list_clients->where = ["user_type = $1", [0]];
		$res_sql_list_clients = $this->_app->sql->select($sql_get_list_clients);

		if(!empty($res_sql_list_clients))
			return $res_sql_list_clients;

		else
			return false;
	}

}
