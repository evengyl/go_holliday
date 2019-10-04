<?
require("ajax_min_load.php");

	if(isset($_POST['action']))
	{
		if($_POST["action"] == "accept")
		{
			if(!empty($_POST['id_demand']))
			{

				$req_sql_verify = new stdClass();
				$req_sql_verify->table = 'annonce_dates';
				$req_sql_verify->data = "id, id_utilisateurs, name_user, last_name_user, user_mail, start_date, end_date";
				$req_sql_verify->where = ["id = $1", [$_POST['id_demand']]];
				$tmp = $_app->sql->select($req_sql_verify);
				$tmp = $tmp[0];

				if($tmp)
				{
					$req_sql = new stdClass;
					$req_sql->table = "annonce_dates";
					$req_sql->ctx = new stdClass;
					$req_sql->ctx->state = "reserved";

					$req_sql->where = "id = '".$tmp->id."' AND id_utilisateurs = '".$tmp->id_utilisateurs."'";
					$status = $res_sql = $_app->sql->update($req_sql);	

					if($status){
						$_app->send_new_mail_client("Votre demande de vacances à été acceptée<br>"."
							Nous avons le plaisir de vous avertir que votre demande à bien été valdiée par l'annonceur.<br><br>
							Les dates retenues et convenues sont : <br>Départ le <b>".$tmp->start_date."</b> et fin de séjour le <b>".$tmp->end_date."</b>.<br><br>
							Vous pouvez dès à présent vous connecter et aller directement sur votre page de compte
							de la vous aurez dans votre onglet 'Mes demandes' votre demande apparaitra en vert à partir de la vous pourrez prendre contact avec votre futur proriétaire de vacances.<br><br>
							L'administration.", $tmp->user_mail, "admin_say", "Votre demande de vacances à été acceptée");
						return 1;
					}
					else
						return 0;
				}
			}
		}

		if($_POST["action"] == "refuse")
		{
			if(!empty($_POST['id_demand']))
			{

				$req_sql_verify = new stdClass();
				$req_sql_verify->table = 'annonce_dates';
				$req_sql_verify->data = "id, id_utilisateurs, name_user, last_name_user, start_date, end_date, user_mail";
				$req_sql_verify->where = ["id = $1", [$_POST['id_demand']]];
				$tmp = $_app->sql->select($req_sql_verify);
				$tmp = $tmp[0];
				
				if($tmp)
				{
					$req_sql = new stdClass;
					$req_sql->table = "annonce_dates";
					$req_sql->ctx = new stdClass;
					$req_sql->ctx->state = "deleted";

					$req_sql->where = "id = '".$tmp->id."' AND id_utilisateurs = '".$tmp->id_utilisateurs."'";
					$status = $res_sql = $_app->sql->update($req_sql);	


					if($status){
						$_app->send_new_mail_client("Votre demande de vacances à été refusée<br>"."
							Nous avons le regret de vous avertir que votre demande à été refusée par l'annonceur.<br><br>
							Les dates annulées sont : <br>Départ le <b>".$tmp->start_date."</b> et fin de séjour le <b>".$tmp->end_date."</b>.<br><br>
							Nous ne connaissons pas les raisons de ce refut mais nous espérons que aucun incident n'est à déplorer.
							Si vous rencontrez le moindre problème, veuillez nous contacter par le biai du site, onglet 'Contacter nous'<br><br>
							L'administration.", $tmp->user_mail, "admin_say", "Votre demande de vacances à été refusée.. :(");
					}
					else
						return 0;
				}
			}
		}
	}
?>