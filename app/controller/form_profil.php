<?

Class form_profil extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{		
		parent::__construct($_app);

				
		//on check le form avec la session du random id form
		if(isset($_SESSION['rand_id_form_profil']) && isset($_POST['rand_id_update_profil']))
		{
			if($_SESSION['rand_id_form_profil'] == $_POST['rand_id_update_profil'])
				$this->set_new_infos_profil($_POST);
		}


		//on génère un nombre aléatoire pour valider un form unique
		$rand_id_form = rand();
		$_SESSION['rand_id_form_profil'] = $rand_id_form;

		$this->assign_var('infos_user', $this->_app->user)
			->assign_var('rand_id_update_profil',$rand_id_form)
			->use_template('my_account_form_profil');
			
	}

	public function set_new_infos_profil($post)
	{
		$var = [];

		if($post['login'] != $this->_app->user->login)
			$var["login"] = $post['login'];


		if($post['mail'] != $this->_app->user->email)
			$var["email"] = $post['mail'];

		

		//pas la meme table d'update
		if(count($var))
		{
			$req_sql = new stdClass;
			$req_sql->table = "login";
			$req_sql->ctx = array();
			$req_sql->ctx = $var;
			$req_sql->where = "id = '".$this->_app->user->id."'";
			$res_sql = $this->_app->sql->update($req_sql);
			$_SESSION["pseudo"] = $var["login"];
		}

		unset($post['login']);
		unset($post['mail']);
		unset($post['rand_id_update_profil']);

		$req_sql = new stdClass;
		$req_sql->table = "utilisateurs";
		$req_sql->ctx = array();
		$req_sql->ctx = $post;
		$req_sql->where = "id = '".$this->_app->user->id_utilisateurs."'";
		$res_sql = $this->_app->sql->update($req_sql);

		//on reset le user _app pour avoir les bonne infos mise à jour pour le tpl
		$this->_app->set_user_infos_on_app();
	}
}