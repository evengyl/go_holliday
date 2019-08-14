<?
Class my_account_messagery extends base_module
{
	public $_app;
	public $all_message;

	public function __construct(&$_app)
	{
		parent::__construct($_app);

		$this->get_list_message();

		$this->assign_var("message_read", $this->message_read)
			->assign_var("message_unread", $this->message_unread)
			->render_tpl();
	}		


	private function get_list_message()
	{
		$sql_private_message = new stdClass();
		$sql_private_message->table = ['private_message'];
		$sql_private_message->var = ["*"];
		$sql_private_message->where = ["id_user_receiver = $1", [$this->_app->user->id_utilisateurs]];
		$res_sql_private_message = $this->_app->sql->select($sql_private_message);

		if(!empty($res_sql_private_message))
		{
			foreach($res_sql_private_message as $row_message)
			{
				$sql_user_sender = new stdClass();
				$sql_user_sender->table = ['utilisateurs'];
				$sql_user_sender->var = ["name", "last_name"];
				$sql_user_sender->where = ["id = $1", [$row_message->id_utilisateurs]];
				$res_sql_user_sender = $this->_app->sql->select($sql_user_sender);
				$row_message->name_sender = $res_sql_user_sender[0]->name." ".$res_sql_user_sender[0]->last_name;



				$sql_title_annonce = new stdClass();
				$sql_title_annonce->table = ['annonces'];
				$sql_title_annonce->var = ["title"];
				$sql_title_annonce->where = ["id = $1", [$row_message->id_annonce]];
				$res_sql_title_annonce = $this->_app->sql->select($sql_title_annonce);
				$row_message->name_announce = $res_sql_title_annonce[0]->title;


				if($row_message->vu == 1)
					$this->message_read[] = $row_message;

				else
					$this->message_unread[] = $row_message;
			}
		}
		


	}
}
