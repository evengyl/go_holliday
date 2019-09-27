<?
require("ajax_min_load.php");

if(isset($_POST['action']))
{
	if($_POST["action"] == "delete_announce")
	{
		$req_sql = new stdClass;
		$req_sql->table = "annonces";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->on_off = 0;
		$req_sql->where = "id = '".(int)$_POST["id"]."'";
		$_app->sql->update($req_sql);

	}
}
