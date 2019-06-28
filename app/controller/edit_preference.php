<?
Class edit_preference extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{		
		parent::__construct($_app);

		//ne pas oublier de verifier encore les droit d'edition des preference au cas ou...

		$this->assign_var('infos_user', $this->_app->user)
			->render_tpl();
	}
}