<?

Class can_do_user
{
	public $create_annonce = false;
	public $view_infos_annonce = false;
	public $edit_annonce = false;

	public function __construct(&$_app)
	{		
		//liste des droit user par rapport a leur status
		if(isset($_app->user->user_type))
		{
			if($_app->user->user_type == 0) //utilisateur standart sans compte annonceurs
			{

			}

			else if($_app->user->user_type == 1) //utilisateur annonceurs mais n'ayant plus ou pas d'abonnement
			{
				$this->view_infos_annonce = true;
			}

			else if($_app->user->user_type == 2) //utilisateur annonceurs ayant un abonnement
			{
				$this->create_annonce = true;
				$this->view_infos_annonce = true;
				$this->edit_annonce = true;
			}
		}
		
		
	}



}