<?
require("ajax_min_load.php");

if(isset($_POST['action']))
{
	if($_POST["action"] == "delete_group")
	{
		$table = "private_message";
		$where = "id_group = ".(int)$_POST["id_group"];


		$_app->sql->delete_row($table, $where);
	}
}
