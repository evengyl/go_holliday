<?
class modele_unit_test extends modele_sql
{
	public $id = ["int", "primary", "", ""];
	public $id_prod = ["int", "", "", ""];
	public $text = ["varchar", "255", "translatable", ""];
	public $name = ["varchar", "255", "", ""];
	public $fonction = ["varchar", "255", "translatable", "unit_test_name_join.id_prod"];

	public function __construct()
	{
		parent::__construct(__CLASS__);
	}
}


// une requete avec des left join donnerais ceci (marche)
/*
SELECT 
	unit_test.id, 
	unit_test.id_prod, 
	unit_test.text_fr, 
	unit_test_name_join.fonction 
FROM 
	`unit_test`
LEFT JOIN
	`unit_test_name_join` 
ON 
	unit_test_name_join.id_prod = unit_test.id 
WHERE 
	unit_test.id = 1
*/