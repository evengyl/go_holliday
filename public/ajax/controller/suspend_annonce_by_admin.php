<?
require("ajax_min_load.php");

	if(isset($_POST['action']))
	{
		if($_POST["action"] == "suspend_annonce")
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
					$req_sql->ctx->user_validate = "0";
					$req_sql->ctx->admin_validate = "0";
					$req_sql->ctx->active = "0";

					$req_sql->where = "id = '".$tmp->id."' AND id_utilisateurs = '".$tmp->id_utilisateurs."'";
					$status = $res_sql = $_app->sql->update($req_sql);	

					if($status){
						$_app->send_new_mail_client("Erreur sur votre annonce : ".$tmp->title."<br>"."
							Nous avons détecté une possible erreur avec votre annonce, qui pourrais ne pas respecter nos règles,
							si votre annonce était active au moment de ce message, votre temps d'abonement sera gelé mais ne vous sera pas décompté.
							<br>Merci d'aller voir votre annonce et de l'éditer dans les bonnes mesures.
							<br>L'administration.", $tmp->user_mail, "admin_say", "Votre annonce à été suspendue");
						
						return 1;
					}
					else
						return 0;
				}
			}
		}
	}
?>