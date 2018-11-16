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


		// OK fonctionne niquel
	$sql = new stdClass();
	$sql->table = ["test_pays", "test_famille", "test_enfant"]; 
	$sql->var = [
					"test_pays" => ["id", "pays"], 
					"test_famille" => ["id_pays", "id", "name", "coord", "mail"], 
					"test_enfant" => ["id_famille", "id", "enfant_name_1", "enfant_name_2", "enfant_name_3"]
				];
	$sql->var_translate = ["test_pays" => ['name']];
	$sql->where = ["pays", "NOT LIKE", "belgique"];
	$sql->order = ["id" => "DESC"];
	$sql->limit = "1";

	$res_sql = $this->_app->sql->select($sql, $return_sql_prepare = 1);
	affiche_pre($res_sql);
	//Fin
/* DOCUMENTATION DU SELECT

TABLE
		1	$sql->table = ["table_1"]
	OR
		2	$sql->table = ["table_1", "table_2", "table_3"]

VAR 
		1	$sql->var = ["id", "var_1", "var_2"]
	OR
		2	$sql->var = [
							"table_1" => ["id", "var_1", "var_2"]
							"table_2" => ["id_table_1_join", "id", "var_1", "var_2"]
							"table_3" => ["id_table_2_join", "id", "var_1", "var_2"]
						]
	OR 
		3 	$sql->var = ['*']

VAR_TRANSLATE
		1	$sql->var_translate = ["table" => ["var_translate_without_fr_rn_nl"]];

WHERE
		1	$sql->where = "var = 'tata'"
	OR
		2	$sql->where = "var_table_1 = 'tata'"
	OR
		3   $sql->where = ["var_table_1 = 'tata'", "OR/AND", "var2_table_1 = 'tata'"] //attention que le symbole OR ou AND doit toujours être placé en position pair
	OR
		4 	$sql->where = ["var_table_1", "LIKE NOT LIKE", "tata"] //attention que le symbole LIKE/NOT LIKE doit toujours être placé en position pair

ORDER
		1	$sql->order = ["var" => "DESC/ASC"]

LIMIT
		1   $sql->limit = "number_limit"

*/



	$this->get_html_tpl =  $this->use_template()->render_tpl();
	}
}
