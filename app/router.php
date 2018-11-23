<?
Class router
{
	public $_app;

	public function __construct($route, &$_app)
	{
		$this->_app = $_app;
		$this->_app->route = $route;

		

		if(isset($this->_app->route['page']))
		{
			$page = $this->_app->route['page'];

			if(isset($this->_app->route['type']))
				$type = $this->_app->route['type'];

			if(isset($this->_app->route['value']))
				$value = $this->_app->route['value'];

			switch($page)
			{
				case 'home':
					$this->assign_mod('home');
					break;

				case 'sign_up':	
					$this->assign_mod('sign_up');
					break;

				case 'admin':
						$this->assign_mod('admin');
					break;
			
				case 'login':
						$this->assign_mod('login');
		 			break;

				case 'logout':
	 					logout($_app->base_dir);
		 			break;

				case 'contact':
					$this->assign_mod('contact');
					break;

				case 'my_account':
						$this->assign_mod('my_account');
					break;


				case 'find_us':
					$this->assign_mod('find_us');
					break;
				
				case 'Recherche':
						if(!isset($this->_app->route['type']))
							$this->assign_mod('search_type');

						else if(isset($this->_app->route['type']) && !isset($this->_app->route['selection_ok']))
							$this->assign_mod('search_pays_habitat');

						else if(isset($this->_app->route['selection_ok']) && !isset($this->_app->route['id_annonce']))
							$this->assign_mod('search_result');

						else if(isset($this->_app->route['selection_ok']) && isset($this->_app->route['id_annonce']))
							$this->assign_mod('home');
					break;

				default:
					$this->assign_mod('404');
					unset($page);
			}	
		}
	}

	
	protected function assign_mod($specific_module = false, $module_secondaire = false, $var_module = false, $tpl = false)
	{
		if($tpl)
			$pre_echo_mod = "__TPL";
		else if($specific_module)
			$pre_echo_mod = "__MOD";

		if($module_secondaire)
			$pre_echo_mod .= "2_";
		else
			$pre_echo_mod .= "_";

		if($specific_module)
			$pre_echo_mod .= $specific_module;
		else if($tpl)
			$pre_echo_mod .= $tpl;	


			

		if($var_module)
			$pre_echo_mod .= "(".$var_module.")";


		$pre_echo_mod .= "__";
		echo $pre_echo_mod;
	}
}
