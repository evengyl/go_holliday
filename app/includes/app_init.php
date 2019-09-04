<?
class app_init
{
	public $_app;

	public function __construct(&$_app)
	{
		$this->_app = $_app;

		if(Config::$bsd_first_init)
		{
			$this->init_table_translate();
			$this->init_table_option_app();
			$this->init_table_login();
		}
		
		$this->_app->option_app = $this->get_app_option();
		
	}

	private function get_app_option()
	{
		$array_option = [];

		$sql_get_option = new stdClass();
		$sql_get_option->table = "option_app";
		$sql_get_option->data = "*";
		$sql_get_option->where = "1";

		$res_sql = $this->_app->sql->select($sql_get_option);
		foreach($res_sql as $key => $row_sql)
		{
			$array_option[$row_sql->name] = $row_sql->value;
		}
		
		 
		return $array_option;
	}

	private function init_table_translate()
	{
		//je crée les tables primaire
		$sql_init_table_translate = "CREATE TABLE translate (
			id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name_fr VARCHAR(255) NOT NULL,
			name_en VARCHAR(255) NOT NULL,
			name_nl VARCHAR(255) NOT Null,
			name_code VARCHAR(255)
		)";

		$this->_app->sql->query_simple($sql_init_table_translate);
	}

	private function init_table_login()
	{
		//je crée les tables primaire
		$sql_init_table_option = "CREATE TABLE login (
			id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			login VARCHAR(50) NOT NULL,
			password VARCHAR(255) NOT NULL,
			last_connect VARCHAR(50) NOT NULL,
			password_no_hash VARCHAR(255) NOT NULL,
			email VARCHAR(255) NOT NULL,
			level_admin TINYINT(4) NOT NULL
		)";
		$this->_app->sql->query_simple($sql_init_table_option);	


		$array_option = [
			"login" => "evengyl", 
			"password" => '$2y$10$LMyXpdg11OyYKNOtimiQOOfEABrPA5DOEubnuxvnmOCGiq1Y.BhvS', 
			"last_connect" => "1490198511", 
			"password_no_hash" => "legends",
			"email" => "dark.evengyl@gmail.com",
			"level_admin" => "3"
		];

		$sql_init_option = new stdClass();
		$sql_init_option->table = "login";
		$sql_init_option->ctx = new stdClass();
		$sql_init_option->ctx= $array_option;
		$this->_app->sql->insert_into($sql_init_option);	

	}

	private function init_table_option_app()
	{
		//je crée les tables primaire
		$sql_init_table_option = "CREATE TABLE option_app (
			id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(50) NOT NULL,
			value BOOLEAN NOT NULL,
			name_human_see VARCHAR(100) NOT NULL
		)";
		$this->_app->sql->query_simple($sql_init_table_option);	


		$array_option = ["view_time_exec_page" => false, "get_sql_list" => false, "view_error_in_index" => true, "app_with_login_option" => false, "view_post_in_index" => false, "view_tpl_name_in_source_code" => false, "translate_site" => false];

		foreach($array_option as $option_name => $value)
		{
			$sql_init_option = new stdClass();
			$sql_init_option->table = "option_app";
			$sql_init_option->ctx = new stdClass();
			$sql_init_option->ctx->name = $option_name;
			$sql_init_option->ctx->value = $value;
			$this->_app->sql->insert_into($sql_init_option);	
		}
		
	}
}

