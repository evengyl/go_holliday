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
	public $edit_active;
	public $view_private_message;
	public $text_user_type;
	public $edit_preference;


	public function __construct(&$_app)
	{		
		//liste des droit user par rapport a leur status
		if(isset($_app->user->user_type))
		{
			if($_app->user->user_type == 1) //utilisateur annonceurs mais n'ayant plus ou pas d'abonnement
			{
				$this->create_annonce = false;
				$this->view_infos_annonce = true;
				$this->edit_annonce = false;
				$this->view_nb_annonce = true;
				$this->view_nb_vues_total = false;
				$this->view_annonce_list = true;
				$this->view_nb_private_message = true;
				$this->edit_active = false;
				$this->view_private_message = true;
				$this->edit_preference = false;


				$this->text_user_type = "Vous n'êtes pas annonceurs VIP";
			}

			else if($_app->user->user_type == 2) //utilisateur annonceurs ayant un abonnement
			{
				$this->create_annonce = true;
				$this->view_infos_annonce = true;
				$this->edit_annonce = true;
				$this->view_nb_annonce = true;
				$this->view_nb_vues_total = true;
				$this->view_annonce_list = true;
				$this->view_nb_private_message = true;
				$this->edit_active = true;
				$this->view_private_message = true;
				$this->edit_preference = true;


				$this->text_user_type = "Annonceur VIP";
			}
		}
		return $this;
	}
}