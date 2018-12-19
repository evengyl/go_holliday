<?

Class can_do_user
{
	public $create_annonce;
	public $view_infos_annonce;
	public $edit_annonce;
	public $view_nb_annonce;
	public $view_nb_vues_total;
	public $view_annonce_list;
	public $view_nb_private_message;

	public $_app;

	public function __construct(&$_app)
	{		
		$this->_app = $_app;
		//liste des droit user par rapport a leur status
		if(isset($this->_app->user->user_type))
		{
			if($this->_app->user->user_type == 0) //utilisateur standart sans compte annonceurs
			{
				$this->create_annonce = false;
				$this->view_infos_annonce = false;
				$this->edit_annonce = false;
				$this->view_nb_annonce = false;
				$this->view_nb_vues_total = false;
				$this->view_annonce_list = false;
				$this->view_nb_private_message = false;


				$this->_app->user->txt_user_type = "Client à la recherche de vacances";
			}

			else if($this->_app->user->user_type == 1) //utilisateur annonceurs mais n'ayant plus ou pas d'abonnement
			{
				$this->create_annonce = false;
				$this->view_infos_annonce = true;
				$this->edit_annonce = false;
				$this->view_nb_annonce = true;
				$this->view_nb_vues_total = false;
				$this->view_annonce_list = true;
				$this->view_nb_private_message = false;


				$this->_app->user->txt_user_type = "Vous n'êtes pas annonceurs VIP";
			}

			else if($this->_app->user->user_type == 2) //utilisateur annonceurs ayant un abonnement
			{
				$this->create_annonce = true;
				$this->view_infos_annonce = true;
				$this->edit_annonce = true;
				$this->view_nb_annonce = true;
				$this->view_nb_vues_total = true;
				$this->view_annonce_list = true;
				$this->view_nb_private_message = true;


				$this->_app->user->txt_user_type = "Annonceur VIP";
			}
		}
	}
}