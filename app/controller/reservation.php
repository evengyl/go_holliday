<?php 

Class reservation extends base_module
{

	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);

		$_app->navigation->set_breadcrumb("__TRANS_reservation__");
		

		$req_sql = new stdClass();
		$req_sql->table = ["todo"];
		$req_sql->var = ["id", "todo_title", "todo_content", "date", "visible"];
		$req_sql->order = ["visible" => "DESC"];
		$list_todo = $this->_app->sql->select($req_sql);




		$todo_for_this_date = $this->get_list_todo_for_this_date($list_todo);

		$date_list = $this->get_list_date_todo($list_todo);

		$this->get_html_tpl =  $this->assign_var("list_date",$date_list)->assign_var('list_todo', $todo_for_this_date)->render_tpl();
	}


	public function get_list_todo_for_this_date($req_sql)
	{
		$current_date = date('d-m-Y');

		$todo_for_this_date = array();
		foreach($req_sql as $key_todo => $row_todo)
		{
			if($row_todo->date == $current_date)
				$todo_for_this_date[] = $req_sql[$key_todo];
		}
		return $todo_for_this_date;
	}


	public function get_list_date_todo($req_sql)
	{
		$date_list = array();
		foreach($req_sql as $row_todo)
		{
			$date_list[] = $row_todo->date;
		}
		$date_list = array_unique($date_list);
		return $date_list;

	}
}
