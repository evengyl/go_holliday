<?
Class security extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{
		$this->_app = $_app;
		$this->_app->module_name = __CLASS__;
		parent::__construct($this->_app);
	}

	public function check_session()
	{
		//on vérifie juste la connexion pour le mettre en mode conneceté la session est déjà remplie
		if(isset($_SESSION['pseudo']))
		{
			$req_sql = new StdClass();
           	$req_sql->table = ["login"];
           	$req_sql->var = ["login"];
           	$req_sql->where = ["login = $1", [$_SESSION['pseudo']]];
			$res_fx = $this->_app->sql->select($req_sql);

			if(isset($res_fx[0]->login))
			{
				//Is_connect permet de voir si on est connecté tout au long des module et des tpl
				Config::$is_connect = 1;
				//si connecter, si oui on set les infos user dans le app
				$this->set_user_infos_on_app();
			}
			else
				Config::$is_connect = 0;
		}
	}

	public function set_user_infos_on_app($forced_query = 0)
	{
		$exec = false;


		if($forced_query)
			$exec = true;

		if(empty($this->_app->user))
			$exec = true;


		if($exec)
		{
			$req_sql = new stdClass;
			$req_sql->table = ["login", "utilisateurs"];
			$req_sql->var = [
				"login" => ["id", "login", "password", "email", "level", "id_utilisateurs"],
				"utilisateurs" => ["name", "last_name", "genre", "user_type", "tel", "address_numero", "address_rue", "zip_code", "address_localite", "age", "pays"],
			];
			$req_sql->where = ["login = $1", [$_SESSION['pseudo']]];
			$res_fx = $this->_app->sql->select($req_sql);	
			$this->_app->user = $res_fx[0];
		}

	}
}
