<?php 

Class admin_edit_config_app extends base_module
{
	public $list_option;

	public function __construct(&$_app)
	{		
		parent::__construct($_app);
		
		$this->_app->navigation->set_breadcrumb("Modification des option de base de l'application", "edit_config_app");

		$sql = new stdClass();
		$sql->table = "option_app";
		$sql->data = "*";
		$sql->where = ["1"];
		$this->list_option = $_app->sql->select($sql);


		if(isset($_POST["form__config"]))
			$this->set_config_app($_POST);

		$this->assign_var("list_option", $this->list_option)->render_tpl();
	}

	private function set_config_app($post)
	{
		unset($post['form__config']);

		foreach($this->list_option as $key => $row_option)
		{
			if(!isset($post[$row_option->id]))
			{
				$post[$row_option->id] = 0;
				$this->list_option[$key]->value = 0;
			}
			else
				$this->list_option[$key]->value = 1;	
		}


		foreach($post as $key => $value)
		{
			$sql = new stdClass();
			$sql->table = "option_app";
			$sql->ctx = new stdClass();
			$sql->ctx->value = $value;
			$sql->where = "id = ".$key;

			$this->_app->sql->update($sql);
		}

	}

    
}
