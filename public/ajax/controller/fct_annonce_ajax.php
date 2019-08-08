<?
require("ajax_min_load.php");


if(isset($_POST))
{
	switch($_POST["app_fct"])
	{
        case 'add_to_favorite':
	        add_to_favorite($_app);
	        break;
	}
}




function add_to_favorite($_app)
{
	$req_sql_verify = new stdClass();
	$req_sql_verify->table = ['annonces'];
	$req_sql_verify->var = ["id"];
	$req_sql_verify->where = ["id = $1", [(int)$_POST['id_annonce']]];
	$tmp = $_app->sql->select($req_sql_verify);

	if(!empty($tmp[0]->id))
	{
		//ok l'annonce existe bien
		$req_sql_verify = new stdClass();
		$req_sql_verify->table = ['utilisateurs'];
		$req_sql_verify->var = ["id_favorite"];
		$req_sql_verify->where = ["id = $1", [$_app->user->id_utilisateurs]];
		$tmp = $_app->sql->select($req_sql_verify);

		$ctx_id_favorite = "";
		if(!empty($tmp[0]->id_favorite))
		{
			$ctx_id_favorite = explode(",",$tmp[0]->id_favorite);
			if(!array_search($_POST['id_annonce'], $ctx_id_favorite))
			{
				$ctx_id_favorite = $tmp[0]->id_favorite.",".$_POST['id_annonce'];
			}
		}
		else
			$ctx_id_favorite = $_POST['id_annonce'];
		
		$req_sql_update_favorite = new stdClass();
		$req_sql_update_favorite->ctx = new stdClass();
		$req_sql_update_favorite->ctx->id_favorite = $ctx_id_favorite;
		$req_sql_update_favorite->table = "utilisateurs";
		$req_sql_update_favorite->where = "id = '".$_app->user->id_utilisateurs."'";
		$_app->sql->update($req_sql_update_favorite);
	}

	
}


function del_to_favorite($_app)
{
	$req_sql_verify = new stdClass();
	$req_sql_verify->table = ['annonces'];
	$req_sql_verify->var = ["id"];
	$req_sql_verify->where = ["id = $1", [(int)$_POST['id_annonce']]];
	$tmp = $_app->sql->select($req_sql_verify);

	if(!empty($tmp[0]->id))
	{
		//ok l'annonce existe bien
		$req_sql_verify = new stdClass();
		$req_sql_verify->table = ['utilisateurs'];
		$req_sql_verify->var = ["id_favorite"];
		$req_sql_verify->where = ["id = $1", [$_app->user->id_utilisateurs]];
		$tmp = $_app->sql->select($req_sql_verify);

		$ctx_id_favorite = "";
		if(!empty($tmp[0]->id_favorite))
		{
			$ctx_id_favorite = explode(",",$tmp[0]->id_favorite);
			unset($ctx_id_favorite[array_search($_POST['id_annonce'], $ctx_id_favorite)]);
			$ctx_id_favorite = implode(",", $ctx_id_favorite);
		}
		else
			$ctx_id_favorite = $_POST['id_annonce'];

		$req_sql_update_favorite = new stdClass();
		$req_sql_update_favorite->ctx = new stdClass();
		$req_sql_update_favorite->ctx->id_favorite = $ctx_id_favorite;
		$req_sql_update_favorite->table = "utilisateurs";
		$req_sql_update_favorite->where = "id = '".$_app->user->id_utilisateurs."'";
		$_app->sql->update($req_sql_update_favorite);
	}
}
