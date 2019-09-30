<?
Class my_account_documents extends base_module
{
	public function __construct(&$_app)
	{		
		parent::__construct($_app);
		$this->_app->title_page .= " - Mes Documents";

		$array_list_files = $this->_app->get_list_file();


		$this->assign_var("documents", $array_list_files)
		->use_template('my_account_documents');
	}
}
