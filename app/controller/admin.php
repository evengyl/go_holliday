<?
Class admin extends base_module
{
	public $level_admin;
	public $error;
	public $other_mod_to_exec;

	public function __construct(&$_app)
	{		
		parent::__construct($_app);

		$this->_app->navigation->set_breadcrumb("Option d'administration");


		//quand on a été simuler un profil pour le voir, si on retourne sur l'admin on dois remettre le compte en ordre
		 if(isset($_SESSION["return_ad"]) && $_SESSION["return_ad"] == 1)
		 {
		 	$_SESSION["pseudo"] = "evengyl";
			$_SESSION["return_ad"] = 0;
			header('Location: /admin');
		 }


		if(isset($_SESSION['pseudo']))
		{
			$level_current_user = $this->_app->check_level_user($_SESSION['pseudo']);

			if($level_current_user == 3)
			{
				

				if(isset($_GET['action']))
				{
					switch ($_GET['action'])
					{
						case "edit_config_app":
							$this->other_mod_to_exec[] = 'admin_edit_config_app';
						break;

						case "pull_bsd":
							$this->other_mod_to_exec[] = 'admin_pull_bsd';
						break;

						case "stat_view":
							$this->other_mod_to_exec[] = 'admin_stats_site';
						break;

						case "annonce_wait_validate_admin":
							$this->other_mod_to_exec[] = 'admin_verify_new_announce';
						break;		

						case "client_list":
							$this->other_mod_to_exec[] = 'admin_list_clients';
						break;	

						case "annonceur_list":
							$this->other_mod_to_exec[] = 'admin_list_annonceurs';
						break;	

						default:
							$this->other_mod_to_exec[] = 'admin_default_intro';

					}

				}
				else
						$this->other_mod_to_exec[] = 'admin_default_intro';

				
				$this->render_tpl(); //on affiche l'administration

			}
			else{
				//go page de connexion
				$_SESSION["error_admin"] = "Vous n'avez pas accès à cette page.</br>Seul l'administration peux y accéder";
				$this->use_module('login');
			}
		}
		else 
		{
			$_SESSION["error_admin"] = "Vous n'avez pas accès à cette page.</br>Seul l'administration peux y accéder";
			$this->use_module("p_404");
				
		}	
	}
}