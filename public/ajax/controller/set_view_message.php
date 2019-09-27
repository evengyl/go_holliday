<?
require("ajax_min_load.php");

if(isset($_POST['action']))
{
	if($_POST["action"] == "set_view_message")
	{
		affiche("(");
		$req_sql = new stdClass;
		$req_sql->table = "private_message";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->vu = 1;
		$req_sql->where = "id = '".(int)$_POST["id_message"]."'";
		$_app->sql->update($req_sql);

	}
}
