<?
Class router
{
	public $_app;


	public function __construct($route = [], &$_app, &$security)
	{

		$this->_app = $_app;
		$this->_app->route = $route;



		if($security->check_if_module_need_to_do_connect())
		{
			if(!empty($this->_app->route))
			{
				switch($this->_app->route['page'])
				{
					case 'home':
						$this->assign_mod();
						break;

					case 'sign_up_global':	
						$this->assign_mod('sign_up');
						break;

					case 'condition':	
						$this->assign_mod('condition_general');
						break;

					case 'admin':
						$this->assign_mod("admin");
						break;
				
					case 'login':
							$this->assign_mod();
			 			break;

					case 'contact':
						$this->assign_mod();
						break;

					case 'my_account':
						if(!isset($route['action']))
							$this->assign_mod('my_account');

						else if(isset($route['action']) && $route['action'] == 'create_announce')
							$this->assign_mod('my_account_create_edit_announce');

						break;

					case 'find_us':
						$this->assign_mod();
						break;

					case 'logout':
		 					$security->logout($_app->base_dir);
			 			break;
					
					case 'Recherche':
							

							if(isset($route['all_select']))
								$this->assign_mod('search_result', 'all');

							else if(!isset($route['type']))
								$this->assign_mod('search_type');

							else if(isset($route['type']) && !isset($route['selection_ok']))
								$this->assign_mod('search_pays_habitat');

							else if(isset($route['selection_ok']) && !isset($route['id_annonce']))
								$this->assign_mod('search_result');
						break;

					case 'Annonces':
							$this->assign_mod('annonce');
							break;

					default:
						$this->assign_mod('p_404');
						unset($route);
				}	
			}
		}
		else
		{
			$this->assign_mod('p_404');
		}
	}

	
	protected function assign_mod($module = Null, $var_module = Null)
	{
		if($module === Null){
			$module = $this->_app->route["page"];
		}


		$module = "__MOD_". $module;

		if($var_module)
			$module .= "(".$var_module.")";

		$module .= "__";

		echo $module;
	}

}
