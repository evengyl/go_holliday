<?
require("ajax_min_load.php");

	if(isset($_POST['action']))
	{
		if($_POST["action"] == "activate")
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
					$req_sql->ctx->active = "1";

					$req_sql->where = "id = '".$tmp->id."' AND id_utilisateurs = '".$tmp->id_utilisateurs."'";
					$status = $res_sql = $_app->sql->update($req_sql);	

					if($status){
						$_app->send_new_mail_client("Mise en ligne de votre annonce : ".$tmp->title."<br>"."
							Nous avons le plaisir de vous annoncer que votre annonce vient d'être activée en ligne,<br>
							merci pour la confiance que vous accordez à nos services,<br>
							nous espérons que votre annonce portera ses fruits.<br>
							<br>L'administration.", $tmp->user_mail, "admin_say", "Votre annonce à mise en ligne");
						
						return 1;
					}
					else
						return 0;
				}
			}
		}

		if($_POST["action"] == "desactivate")
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
					$req_sql->ctx->active = "0";

					$req_sql->where = "id = '".$tmp->id."' AND id_utilisateurs = '".$tmp->id_utilisateurs."'";
					$status = $res_sql = $_app->sql->update($req_sql);	

					if($status){
						$_app->send_new_mail_client("Retrait de votre annonce : ".$tmp->title."<br>"."
							Nous vous annoncons que votre annonce vient d'être retirée de la base de recherche<br>
							merci pour la confiance que vous avez accordé à nos services,<br>
							nous espérons vous revoir au plus vite.<br>
							<br>L'administration.", $tmp->user_mail, "admin_say", "Votre annonce retirée");
						
						return 1;
					}
					else
						return 0;
				}
			}
		}
	}
?>