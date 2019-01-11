<?
require("ajax_min_load.php");


if(isset($_POST))
{
	switch($_POST["app_fct"])
	{
	    case 'desactivate_annonce':
    		desactivate_annonce($_app);
	        break;

	    case 'activate_annonce':
	    	activate_annonce($_app);
	        break;
	}
}


function desactivate_annonce($_app)
{
	if(!$_app->can_do_user->edit_active) echo "Sérieusement c'est pas très beau de tricher...";

	if(isset($_POST['id_annonce']))
	{
		$req_sql = new stdClass;
		$req_sql->table = "annonces";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->active = "0";
		$req_sql->where = "id = '".$_POST['id_annonce']."'";
		$res_sql = $_app->sql->update($req_sql);

		if(!$res_sql)
			echo 'Bizarre votre annonce était déjà inactive !';	

		else
			echo 'Votre annonce à bien été désactivée.';	
	}
}

function activate_annonce($_app)
{
	if(!$_app->can_do_user->edit_active) echo "Sérieusement c'est pas très beau de tricher...";

	if(isset($_POST['id_annonce']))
	{
		$req_sql = new stdClass;
		$req_sql->table = "annonces";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->active = "1";
		$req_sql->where = "id = '".$_POST['id_annonce']."'";
		$res_sql = $_app->sql->update($req_sql);

		if(!$res_sql)
			echo 'Bizarre votre annonce était déjà active !';	

		else
			echo 'Votre annonce à bien été activée.';	
	}
}


?>