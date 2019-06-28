<?
Class router
{
	public $_app;

	public $module_to_disable_without_connect_option = ["my_account", "sign_up"];

	public function __construct($route = "", &$_app, &$security)
	{
		$this->_app = $_app;
		$this->_app->route = htmlentities($route['page']);


		if($security->check_if_module_need_to_do_connect())
		{
			if($this->_app->route)
			{
				switch($this->_app->route)
				{
					case 'home':
						$this->assign_mod();
						break;

					case 'sign_up_global':	
						$this->assign_mod('sign_up');
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
							$this->assign_mod();
						break;

					case 'find_us':
						$this->assign_mod();
						break;

					case 'logout':
		 					$security->logout($_app->base_dir);
			 			break;
					
					case 'Recherche':
							if(!isset($route['type']) && !isset($route['all_select']))
								$this->assign_mod('search_type');

							else if(isset($route['all_select']))
								$this->assign_mod('search_result', 'all');

							else if(isset($route['type']) && !isset($route['selection_ok']))
								$this->assign_mod('search_pays_habitat');

							else if(isset($route['selection_ok']) && !isset($route['id_annonce']))
								$this->assign_mod('search_result');

							else if(isset($route['selection_ok']) && isset($route['id_annonce']) && !isset($route['all_select']))
								$this->assign_mod('annonce');
						break;

					default:
						$this->assign_mod('module_404');
						unset($route);
				}	
			}
		}
		else
		{
			$this->assign_mod('module_404');
		}
	}

	
	protected function assign_mod($module = Null, $var_module = Null)
	{
		if($module === Null){
			$module = $this->_app->route;
		}

		$module = $this->test_disable_module_with_option_app($module);

		$module = "__MOD_". $module;

		if($var_module)
			$module .= "(".$var_module.")";

		$module .= "__";

		echo $module;
	}

	private function test_disable_module_with_option_app($module)
	{
		if(in_array($module, $this->module_to_disable_without_connect_option))
		{
			if($this->_app->option_app['app_with_login_option'] == 0){
				return "home";
			}
			else 
				return $module;
		}
		else
			return $module;
	}
}
