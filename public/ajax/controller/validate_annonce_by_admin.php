<?
require("ajax_min_load.php");

	if(isset($_POST['action']))
	{
		if($_POST["action"] == "admin_validate")
		{
			if(!empty($_POST['id_annonce']))
			{

				$req_sql_verify = new stdClass();
				$req_sql_verify->table = 'annonces';
				$req_sql_verify->data = "id, id_utilisateurs, title, user_mail";
				$req_sql_verify->where = ["id = $1", [$_POST['id_annonce']]];
				$tmp = $_app->sql->select($req_sql_verify);
				$tmp = $tmp[0];

				if($tmp)
				{
					$req_sql = new stdClass;
					$req_sql->table = "annonces";
					$req_sql->ctx = new stdClass;
					$req_sql->ctx->admin_validate = "1";
					$req_sql->where = "id = '".$tmp->id."' AND id_utilisateurs = '".$tmp->id_utilisateurs."'";
					$status = $res_sql = $_app->sql->update($req_sql);	

					if($status){
						$_app->send_new_mail_client("Validation de votre annonce : ".$tmp->title."<br>"."
							Nous avons le plaisir de vous avertir que votre annonce à bien été valdiée par l'administration.<br>
							Vous pouvez dès à présent vous connecter suivre la procédure pour la mise en ligne de votre annonce.<br>
							L'administration.", $tmp->user_mail, "admin_say", "Votre annonce à été approuvée");
						
						return 1;
					}
					else
						return 0;
				}
			}
		}
	}
?>