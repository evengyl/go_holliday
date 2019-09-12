<?
Class my_account_messagery extends base_module
{
	public $_app;
	public $all_message;

	public function __construct(&$_app)
	{
		parent::__construct($_app);

		$this->get_list_message();

		$this->assign_var("messages", $this->messages)
			->render_tpl();
	}		


	private function get_list_message()
	{
		$sql_private_message = new stdClass();
		$sql_private_message->table = 'private_message';
		$sql_private_message->data = "*";
		$sql_private_message->where = ["id_utilisateurs = $1", [$this->_app->user->id_utilisateurs]];
		$sql_private_message->order = ["id DESC"];
		$res_sql_private_message = $this->_app->sql->select($sql_private_message);

		$tmp = [];
		if(!empty($res_sql_private_message))
		{
			foreach($res_sql_private_message as $row_message)
			{
				$row_message->name_sender = $row_message->name_sender." ".$row_message->last_name_sender;
				$row_message->url_annonce = "/Recherche/Vues/Annonces/".$row_message->id_annonce;
				$tmp[$row_message->id_group][] = $row_message;
			}
			
		}
		$this->messages = $tmp;
	}
}
