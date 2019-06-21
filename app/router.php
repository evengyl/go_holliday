<?
Class router
{
	public $_app;
	private $is_connect = Null;

	public function __construct($route = "", &$_app, &$security)
	{
		$this->_app = $_app;

		if($security->checkIfModuleToDoConnect($route['page']))
		{
			if($route != "")
			{
				$this->_app->route = $route;

				switch($route['page'])
				{
					case 'home':
						$this->assign_mod('home', '', '', '');
						break;

					case 'sign_up_global':	
						$this->assign_mod('sign_up', '', '', '');
						break;

					case 'admin':
							$this->assign_mod('admin', '', '', '');
						break;
				
					case 'login':
							$this->assign_mod('login', '', '', '');
			 			break;

					case 'logout':
		 					$security->logout($_app->base_dir);
			 			break;

					case 'contact':
						$this->assign_mod('contact', '', '', '');
						break;

					case 'my_account':
							$this->assign_mod('my_account', '', '', '');
						break;


					case 'find_us':
						$this->assign_mod('find_us', '', '', '');
						break;
					
					case 'Recherche':
							if(!isset($route['type']) && !isset($route['all_select']))
								$this->assign_mod('search_type', '', '', '');

							else if(isset($route['all_select']))
								$this->assign_mod('search_result', '', 'all', '');

							else if(isset($route['type']) && !isset($route['selection_ok']))
								$this->assign_mod('search_pays_habitat', '', '', '');

							else if(isset($route['selection_ok']) && !isset($route['id_annonce']))
								$this->assign_mod('search_result', '', '', '');

							else if(isset($route['selection_ok']) && isset($route['id_annonce']) && !isset($route['all_select']))
								$this->assign_mod('annonce', '', '', '');
						break;

					default:
						$this->assign_mod('module_404', '', '', '');
						unset($route);
				}	
			}
		}
		else
		{
			$this->assign_mod('module_404', '', '', '');
		}
	}

	
	protected function assign_mod($module = false, $module_secondaire = false, $var_module = false, $tpl = false)
	{
		$pre_echo_mod = "";
		
		//si is connect nous retourne false c'est qu'il n'est pas loggé et donc come on a appeler is_connect c'est pour qu'il soit logger, donc on renvoi vers login.php
		if($this->is_connect === false)
			$module = "login";


		$module = $this->testDisableModuleWithOptionApp($module);


		if($module)
			$pre_echo_mod = "__MOD";


		if($module_secondaire)
			$pre_echo_mod .= "2_";
		else
			$pre_echo_mod .= "_";


		if($tpl)
			$pre_echo_mod = "__TPL_".$tpl;

		if($module)
			$pre_echo_mod .= $module;
			

		if($var_module)
			$pre_echo_mod .= "(".$var_module.")";


		$pre_echo_mod .= "__";

		echo $pre_echo_mod;
	}

	private function testDisableModuleWithOptionApp($module)
	{
		$array_module_to_diable = ["my_account", "sign_up"];

		if(in_array($module, $array_module_to_diable))
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
