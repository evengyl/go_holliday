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

						case "eval":
							$this->other_mod_to_exec[] = 'admin_eval';
						break;

						case "pull_bsd":
							$this->other_mod_to_exec[] = 'admin_pull_bsd';
						break;

						case "go_to_vip_view":
							$this->set_status(2);
						break;

						case "go_to_no_vip_view":
							$this->set_status(1);
						break;

						case "go_to_client_view":
							$this->set_status(0);
						break;
					}
				}

				$this->other_mod_to_exec[] = 'admin_stats_site';
				$this->other_mod_to_exec[] = 'admin_verify_status_vip';

				$this->render_tpl(); //on affiche l'administration

			}
			else{
				//go page de connexion
				$this->error = "Vous n'avez pas accès à cette page.</br>Seul l'administration peux y accéder";
				$this->assign_var("error", $this->error)
					->use_module('login', 'login');
			}
		}
		else 
		{
			$_SESSION["error_admin"] = "Vous n'avez pas accès à cette page.</br>Seul l'administration peux y accéder";
			$this->use_module("p_404");
				
		}	
	}

	

	public function set_status($user_type)
	{
		$sql = new stdClass();
		$sql->table = "utilisateurs";
		$sql->ctx = new stdClass();
		$sql->ctx->user_type = $user_type;
		$sql->where = "id = ".$this->_app->user->id_utilisateurs;

		$this->_app->sql->update($sql);
		$this->_app->set_user_infos_on_app();
	}
	
}