<?
Class my_account_edit_preference extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{		
		parent::__construct($_app);

		//ne pas oublier de verifier encore les droit d'edition des preference au cas ou...

		$this->render_tpl();
	}
}