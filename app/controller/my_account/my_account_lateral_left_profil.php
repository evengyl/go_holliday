<?
Class my_account_lateral_left_profil extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{
		parent::__construct($_app);


		////////////////////////////////
		// infos pour tout les compte //
		////////////////////////////////

		//va chercher la liste des images dispo pour le changement d'image de back profil
		$array_img_back_profil = $this->get_list_lateral_back_profil_img();
		//va permettre de set dans la db le nouvel id de l'img de background
		if(isset($_POST['id_img_background_selected']))
			$this->set_new_img_back_profil($_POST['id_img_background_selected'], $array_img_back_profil);


		// va récuper les stat des message priver
		$this->get_infos_nb();
		$this->get_nb_private_message();



		$this->assign_var("array_img_back_profil", $array_img_back_profil)
				->render_tpl();
	}		


	public function get_infos_nb()
	{
		$sql_vues = new stdClass();
		$sql_vues->table = 'annonces';
		$sql_vues->data = "vues, id, active";
		$sql_vues->where = ["id_utilisateurs = $1", [$this->_app->user->id_utilisateurs]];
		$res_sql = $this->_app->sql->select($sql_vues);

		$this->_app->user->nb_vues_total = 0;
		$this->_app->user->nb_annonces_active = 0;
		$this->_app->user->nb_annonces = 0;

		if(!empty($res_sql))
		{
			foreach($res_sql as $key_annonce => $row_annonce)
			{
				$this->_app->user->nb_vues_total += (int)$row_annonce->vues;
				$this->_app->user->nb_annonces ++;

				if($row_annonce->active)
					$this->_app->user->nb_annonces_active ++;
			}
		}
	}


	public function get_list_lateral_back_profil_img()
	{
		$array_img_back_profil = array();

		if($dossier = opendir($this->_app->base_dir.'/public/images/background_profil/'))
		{
			while(false !== ($fichier = readdir($dossier)))
			{
				if($fichier != '.' && $fichier != '..')
					$array_img_back_profil[] = substr($fichier, 0, -4);
			}
		}
		return $array_img_back_profil;
	}


	public function set_new_img_back_profil($id_img, $array_img_back_profil)
	{
		if(in_array($id_img, $array_img_back_profil))
		{
			$req_sql = new stdClass;
			$req_sql->table = "utilisateurs";
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->id_background_profil = $id_img;
			$req_sql->where = "id = '".$this->_app->user->id_utilisateurs."'";
			$res_sql = $this->_app->sql->update($req_sql);
		}

		//on reset le user _app pour avoir les bonne infos mise à jour pour le tpl
		$this->_app->set_user_infos_on_app();
	}


	public function get_nb_private_message()
	{
		$this->_app->user->total_private_message = 0;
		$this->_app->user->private_message_not_view = 0;

		$sql_message = new stdClass();
		$sql_message->table = 'private_message';
		$sql_message->data = "vu";
		$sql_message->where = ["id_utilisateurs = $1", [$this->_app->user->id_utilisateurs]];
		$res_sql_message = $this->_app->sql->select($sql_message);

		if(!empty($res_sql_message))
		{
			foreach($res_sql_message as $row_message)
			{
				$this->_app->user->total_private_message++;

				if($row_message->vu)
					$this->_app->user->private_message_not_view++;
			}
		}
	}

	

}
