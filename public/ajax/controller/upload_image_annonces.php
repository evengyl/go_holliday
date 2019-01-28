<?
require("ajax_min_load.php");

affiche_pre($_app);

if($_app->can_do_user->create_annonce)
{
	$req_last_id = new stdClass();
	$req_last_id->table = ["annonces"];
	$req_last_id->var = ["id"];
	$req_last_id->where = ["id_utilisateurs = $1 AND name = $2", [$_SESSION['id_utilisateurs'], ""]];
	$req_last_id->limit = '1';

	affiche_pre($_app->sql->select($req_last_id));
}




