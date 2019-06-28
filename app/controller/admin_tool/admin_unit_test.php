<?php 

Class admin_unit_test extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{		
		parent::__construct($_app);

		$_app->navigation->set_breadcrumb('Test unitaire');


		// OK fonctionne niquel
		$sql = new stdClass();
		$sql->table = ["test_pays", "test_famille", "test_enfant"]; 
		$sql->var = [
						"test_pays" => ["id", "pays"], 
						"test_famille" => ["id_pays", "id", "name", "coord", "mail"], 
						"test_enfant" => ["id_famille", "id", "enfant_name_1", "enfant_name_2", "enfant_name_3"]
					];
		$sql->var_translate = ["test_pays" => ['name']];
		$sql->where = ["pays LIKE $1", ["belgique"]];
		$sql->order = ["id" => "DESC"];
		$sql->limit = "1";

		$res_sql = $this->_app->sql->select($sql, $return_sql_prepare = 1);
		affiche_pre($res_sql);
		//Fin




		$this->render_tpl();
	}
}
