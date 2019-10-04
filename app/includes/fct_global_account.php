<?
Class fct_global_account extends fct_global_annonce
{
	public $_app;

	public function __construct(&$_app)
	{
		parent::__construct($this);
		$this->_app = $_app;
	}

	public function get_list_file()
	{
		if(!file_exists($this->_app->base_dir."/public/datas/clients_documents/".$this->_app->user->id_utilisateurs))
			mkdir($this->_app->base_dir."/public/datas/clients_documents/".$this->_app->user->id_utilisateurs);

		$array_list_files = array();

		if($dossier = opendir($this->_app->base_dir."/public/datas/clients_documents/".$this->_app->user->id_utilisateurs))
		{
			$i = 0;
			while(false !== ($fichier = readdir($dossier)))
			{
				if($fichier != '.' && $fichier != '..')
				{
					$array_list_files[$i]["link"] = "/datas/clients_documents/".$this->_app->user->id_utilisateurs."/".$fichier;
					$array_list_files[$i]["time"] = date('d/m/Y', fileatime($this->_app->base_dir."/public/datas/clients_documents/".$this->_app->user->id_utilisateurs."/".$fichier));
					$array_list_files[$i]["size"] = (filesize($this->_app->base_dir."/public/datas/clients_documents/".$this->_app->user->id_utilisateurs."/".$fichier))/1024/1024;
					$array_list_files[$i]["name"] = $fichier;
					$array_list_files[$i]["extension"] = pathinfo($fichier, PATHINFO_EXTENSION);
					$array_list_files[$i]["extension_icon"] = "/images/file_extension/".pathinfo($fichier, PATHINFO_EXTENSION).".png";
					$i++;
				}

			}
		}
		return $array_list_files;
	}


	public function get_list_message($id_group = '')
	{
		$sql_private_message = new stdClass();
		$sql_private_message->table = 'private_message';
		$sql_private_message->data = "*";
		$sql_private_message->order = ["id ASC"];

		if(!empty($id_group))
			$sql_private_message->where = ["id_user_sender LIKE $1 AND id_group = $2", [$this->_app->user->id_utilisateurs, $id_group]];	
		else
			$sql_private_message->where = ["id_user_sender LIKE $1", [$this->_app->user->id_utilisateurs]];		
		
		$res_sql_private_message = $this->_app->sql->select($sql_private_message);


		$tmp = [];
		if(!empty($res_sql_private_message))
		{
			foreach($res_sql_private_message as $row_message)
			{
				$row_message->name_sender = $row_message->name_sender." ".$row_message->last_name_sender;
				$row_message->url_annonce = "/Annonces/".$row_message->id_annonce;


                $list_user = explode(",", $row_message->id_user_sender);

                $list_user = array_flip($list_user);
                unset($list_user[$this->_app->user->id_utilisateurs]);
                $list_user = array_flip($list_user);
                $list_user = array_values($list_user);
                $id_user_receiver = $list_user[0];
                $row_message->id_user_receiver = $id_user_receiver;


				$tmp[$row_message->id_group][] = $row_message;

			}

			

		}
		return $tmp;
	}
}
