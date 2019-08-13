<?
Class my_account_messagery extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{
		parent::__construct($_app);

		if(isset($_GET['second_page']) && $_GET['second_page'] == "Messages")
			$this->get_list_message();


		$this->render_tpl();
	}		


	private function get_list_message()
	{
		affiche("tatat");
	}
}
