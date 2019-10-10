<?
require("ajax_min_load.php");

if(isset($_POST['action']))
{
	if($_POST["action"] == "del_avis")
	{
		$req_sql = new stdClass;
		$req_sql->table = "annonce_avis";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->active = '0';
		$req_sql->where = "id = '".(int)$_POST["id_avis"]."'";
		$_app->sql->update($req_sql);

	}
}
