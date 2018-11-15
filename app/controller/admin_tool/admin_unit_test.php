<?php 

Class admin_unit_test extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{		
		$this->_app = $_app;
		$this->_app->module_name = __CLASS__;

		parent::__construct($_app);

		$_app->navigation->set_breadcrumb('Test unitaire');

	
	$ok1_or_not = $ok2_or_not = $ok3_or_not = $ok4_or_not = $ok5_or_not = $ok6_or_not = array();

		

	$ok1_or_not = $this->test_unit_where("id = 1"); //simply better
	$ok2_or_not = $this->test_unit_where(["id" => "2", '=']); // = <= >= !=
    $ok4_or_not = $this->test_unit_where(["id" => [1,2,3,4,5], "IN"]);
	$ok5_or_not = $this->test_unit_where(["id" => [1,2,3], "NOT IN"]);
	$ok6_or_not = $this->test_unit_where([["id" => "1", "id" => "2"],"OR"]);
	$ok6_or_not = $this->test_unit_where([[["id" => [1,2,3], "id" => [1,2,3]], "IN"],"OR"]);


	$test_1 = array("id = 1");
	$test_2 = array("id IN" => array(1,2,3,4));
	$test_3 = array("id = 1", "id = 2", "id = 3", "OR");
	$test_4 = array(array("id = 1", "id = 2", "OR"), array("id != 3", "id >= 4", "AND"));
		/* '6'
		[
			[
				[
					"id" => [1,2,3]
					"id" => [1,2,3]
				]
				"IN"
			]
			"OR"
		]



		*/

		$this->get_html_tpl =  $this
			->assign_var("ok1_or_not", $ok1_or_not)
			->assign_var("ok2_or_not", $ok2_or_not)
			->assign_var("ok4_or_not", $ok4_or_not)
			->assign_var("ok5_or_not", $ok5_or_not)
			->use_template()->render_tpl();
	}


	private function test_unit_where($where)
	{
		//test du select where 1
		$req_test_1 = new stdClass();
		$req_test_1->table = "unit_test";
		$req_test_1->var = "*";
		$req_test_1->where = $where;
		$res_sql = $this->_app->sql->select($req_test_1, $return_sql_prepare = 1);
		
		if(!empty($res_sql))
		{
			if(isset($res_sql[0]->id))
				return ["success", $res_sql[count($res_sql)-1]];
			else
				return ["danger", $res_sql[count($res_sql)-1]];
				
		}
	}
}
