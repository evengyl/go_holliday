<?php 

Class admin_unit_test extends base_module
{

	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);
		$_app->navigation->set_breadcrumb('Test unitaire');

	
	$ok1_or_not = $ok2_or_not = $ok3_or_not = $ok4_or_not = array();

		

	$ok1_or_not = $this->test_unit_where("id = 1", $id_retour = 1);
	$ok2_or_not = $this->test_unit_where(["id" => "2"], $id_retour = 2);
	$ok3_or_not = $this->test_unit_where(["id" => "3", "!="], $id_retour = 1); //ici comme on demande un different de, je prends le premier des id, plus simple pour les test
	$ok4_or_not = $this->test_unit_where(["id" => array(1,2,3,4,5)], $id_retour = 1);
	$ok5_or_not = $this->test_unit_where(["id" => array(1,2,3), "NOT IN"], $id_retour = 4);

		$this->get_html_tpl =  $this
			->assign_var("ok1_or_not", $ok1_or_not)
			->assign_var("ok2_or_not", $ok2_or_not)
			->assign_var("ok3_or_not", $ok3_or_not)
			->assign_var("ok4_or_not", $ok4_or_not)
			->assign_var("ok5_or_not", $ok5_or_not)
			->use_template()->render_tpl();
	}


	private function test_unit_where($where, $id_retour)
	{
		//test du select where 1
		$req_test_1 = new stdClass();
		$req_test_1->table = "unit_test";
		$req_test_1->var = "*";
		$req_test_1->where = $where;
		$res_sql = $this->sql->select($req_test_1, $return_sql_prepare = 1);
		
		if(!empty($res_sql))
		{
			if(isset($res_sql[0]->id) && $res_sql[0]->id == $id_retour)
				return ["success", $res_sql[count($res_sql)-1]];
			else
				return ["danger", $res_sql[count($res_sql)-1]];
				
		}
	}
}
