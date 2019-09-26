<?
require("ajax_min_load.php");

	if(isset($_POST['action']))
	{
		if($_POST["action"] == "validate_annonce")
		{
			if(!empty($_POST['id_annonce']) && !empty($_POST['id_user']))
			{

				$req_sql_verify = new stdClass();
				$req_sql_verify->table = 'annonces';
				$req_sql_verify->data = "id";
				$req_sql_verify->where = ["id = $1 AND id_utilisateurs = $2", [$_POST['id_annonce'], $_POST['id_user']]];
				$tmp = $_app->sql->select($req_sql_verify);

				if($tmp)
				{
					$req_sql = new stdClass;
					$req_sql->table = "annonces";
					$req_sql->ctx = new stdClass;
					$req_sql->ctx->user_validate = "1";
					$req_sql->where = "id = '".$_POST['id_annonce']."' AND id_utilisateurs = '".$_POST['id_user']."'";
					$status = $res_sql = $_app->sql->update($req_sql);	

					if($status){
						$_app->send_new_request_admin("Une annonce à été crée, avec l'ID : ".$_POST['id_annonce']."<br>"."veuillez aller la vérifier sur l'administration http://goholiday.be/admin");
						
						return 1;
					}
					else
						return 0;
				}
			}
		}
	}
?>