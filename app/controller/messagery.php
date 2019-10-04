<?
Class messagery extends base_module
{
	public $id_sender;
	public $id_utilisateurs;
	public $id_annonce;
	public $id_group;
	public $name_receiver;

	public function __construct(&$_app)
	{		
		parent::__construct($_app);



		//ça veux dire qu'on est sur la page annonce
		//donc le login de le id_utilisateurs est set des deux coté
		if(isset($this->_app->annonce->id_utilisateurs)){

			$this->id_sender = $this->_app->user->id_utilisateurs;
			$this->id_receiver = $this->_app->annonce->id_utilisateurs;
		}
		else{

			$this->id_sender = $this->_app->user->id_utilisateurs;
			$this->id_receiver = isset($this->_app->var_module["id_receiver"])?$this->_app->var_module["id_receiver"]:"";
			$this->get_infos_receiver();
		}


		
		$this->id_annonce = isset($this->_app->annonce->id)?$this->_app->annonce->id:$this->_app->var_module["id_annonce"];
		$this->verif_if_grp_message();

		$messages = $this->_app->get_list_message($this->id_group);


		
		$this
		->assign_var("name_receiver", $this->name_receiver)
		->assign_var("messages", $messages)
		->assign_var("id_sender", $this->id_sender)
		->assign_var("id_receiver", $this->id_receiver)
		->assign_var("id_group", $this->id_group)
		->assign_var("id_annonce", $this->id_annonce)
		->assign_var("id_specific_modal", $this->_app->var_module["specific_id_modal"])
		->use_template('block_messagery_universal');
	}

	public function get_infos_receiver()
	{
		$req_infos_user = new stdClass();
		$req_infos_user->table = "utilisateurs";
		$req_infos_user->data = "name, last_name";
		$req_infos_user->where = ["id = $1", [$this->id_receiver]];
		$res_infos_user = $this->_app->sql->select($req_infos_user);
		$this->name_receiver = $res_infos_user[0]->name." ".$res_infos_user[0]->last_name;
	}


	public function verif_if_grp_message()
	{
		$req_sql_message = new stdClass();
		$req_sql_message->table = "private_message";
		$req_sql_message->data = "id, id_user_sender, id_group";
		$req_sql_message->where = ["id_annonce = $1 AND id_user_sender LIKE $2", [$this->id_annonce, $this->id_sender]];
		$res_sql_message = $this->_app->sql->select($req_sql_message);


		if(!empty($res_sql_message))
		{
			foreach($res_sql_message as $row_message)
			{
				$tmp_id_user_sender = explode(",", $row_message->id_user_sender);
				if(in_array($this->id_receiver, $tmp_id_user_sender))
				{
					$this->id_group = $row_message->id_group;
					break;
				}
				else
					$this->create_group_message();
			}
		}
		else
			$this->create_group_message();
	}


	public function create_group_message()
	{
		$this->id_group = str_replace('.', '', uniqid("GroupMessagery", true));
	}


	
}