<?

Class my_account_list_annonces_annonceur extends base_module
{
	public $_app;
	public $annonces;

	public function __construct(&$_app)
	{		
		parent::__construct($_app);

		///////////////////////////////
		//spécifique pour annonceurs //
		///////////////////////////////

		if($this->_app->can_do_user->view_infos_annonce)
			$this->annonces = $this->get_list_annonce_user();

		else
			$this->_app->user->nb_vues_total = "Vous n'êtes pas annonceurs";

		$this->assign_var("annonces", $this->annonces)->render_tpl();
	}


	public function get_list_annonce_user()
	{
		$sql_annonce = new stdClass();
		$sql_annonce->table = 'annonces';
		$sql_annonce->data = "id, id_utilisateurs, title, sub_title, active, user_validate, admin_validate, create_date, vues, private_message, date_annonces, habitat_name_sql";
		$sql_annonce->order = ["id DESC"];
		$sql_annonce->where = ["id_utilisateurs = $1", [$this->_app->user->id_utilisateurs] ];
		$res_sql_annonces = $this->_app->sql->select($sql_annonce);

		foreach($res_sql_annonces as $key_annonce => $row_annonce)
		{
			if($dossier = opendir($this->_app->base_dir."/public/images/annonces/".$row_annonce->id."/"))
			{
				while(false !== ($fichier = readdir($dossier)))
				{
					if($fichier != '.' && $fichier != '..'){
						$res_sql_annonces[$key_annonce]->img_principale = $fichier;
						break;
					}
				}
			}
		}
		return $res_sql_annonces;
	}
}