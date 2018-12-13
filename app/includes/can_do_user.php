<?

Class can_do_user
{
	public $create_annonce = false;

	public function __construct(&$_app)
	{		
		//liste des droit user par rapport a leur status
		if($_app->user->user_type == 0) //utilisateur standart sans compte annonceurs
		{

		}

		else if($_app->user->user_type == 1) //utilisateur annonceurs mais n'ayant plus ou pas d'abonnement
		{

		}

		else if($_app->user->user_type == 2) //utilisateur annonceurs ayant un abonnement
		{
			$this->create_annonce = true;
		}
		
	}



}