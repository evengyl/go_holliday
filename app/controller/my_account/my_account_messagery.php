<?
Class my_account_messagery extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{
		parent::__construct($_app);
		$this->_app->title_page .= " - Ma messagerie";

		
		$messages = $this->_app->get_list_message();

		$this->assign_var("messages", $messages)->render_tpl();
	}		


	
}
