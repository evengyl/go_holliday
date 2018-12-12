<?

Class form_profil extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{		
		$this->_app = $_app;	
		$this->_app->module_name = __CLASS__;
		
		parent::__construct($this->_app);


		//on check le form avec la session du random id form
		if(isset($_SESSION['rand_id_form_profil']) && isset($_POST['rand_id']))
		{
			if($_SESSION['rand_id_form_profil'] == $_POST['rand_id'])
			{
				// on peux travailler sur le formulaire renvoyer
				affiche_pre("Ok form id");		
			}
		}

		//on génère un nombre aléatoire pour valider un form unique
		$rand_id_form = rand();
		$_SESSION['rand_id_form_profil'] = $rand_id_form;

																				// _app->user à été set dans le module primaire de la page voir , my_account
		$this->get_html_tpl =  $this->assign_var('_app', $this->_app)->assign_var('infos_user', $this->_app->user)->assign_var('rand_id',$rand_id_form)->render_tpl();
	}

	

}