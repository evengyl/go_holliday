<?
Class security extends base_module
{
	public $_app;

	public $module_need_to_do_connect_list = ["my_account"];

	public function __construct(&$_app)
	{
		parent::__construct($_app);
	}

	public function check_session()
	{
		//on vérifie juste la connexion pour le mettre en mode conneceté la session est déjà remplie
		if(isset($_SESSION['pseudo']))
		{
			$req_sql = new StdClass();
           	$req_sql->table = "login";
           	$req_sql->data = "login";
           	$req_sql->where = ["login = $1", [$_SESSION['pseudo']]];
			$res_fx = $this->_app->sql->select($req_sql);

			if(isset($res_fx[0]->login))
			{
				//Is_connect permet de voir si on est connecté tout au long des module et des tpl
				Config::$is_connect = 1;
				//si connecter, si oui on set les infos user dans le app
				$this->_app->set_user_infos_on_app();
			}
			else
				Config::$is_connect = 0;
		}
		else
				Config::$is_connect = 0;
	}

	public function check_if_module_need_to_do_connect()
	{
		if(!Config::$is_connect && in_array($this->_app->route, $this->module_need_to_do_connect_list))
			return false;

		else
			return true;
	}

	

	public function logout($base_dir)
	{
	    require($base_dir.'/public/logout.php');
	}
}
