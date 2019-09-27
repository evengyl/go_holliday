<?
require("ajax_min_load.php");

if(isset($_POST['action']))
{
	if($_POST["action"] == "send_message")
	{
		//il me faut l id du createur
		$req_sql_get_user_id = new stdClass();
		$req_sql_get_user_id->table = "annonces";
		$req_sql_get_user_id->data = "id_utilisateurs";
		$req_sql_get_user_id->where = ["id = $1", [$_POST['id_annonce']]];
		$res_sql_get_user_id = $_app->sql->select($req_sql_get_user_id);

		if(!empty($res_sql_get_user_id))
		{

			affiche($_POST);
			$message = trim($_POST['message']);
			$message = htmlspecialchars($message);

			$id_annonceur = $res_sql_get_user_id[0]->id_utilisateurs;
			// id de la personne possédant l'annonce

			$id_sender = $_POST["id_user_sender"];
			$id_receiver = $_POST["id_user_receiver"];
			$id_group = $_POST["id_group"];

			// il y a déjà une conversation en cours

			$object_to_sql = new stdClass();
			$object_to_sql->table = "private_message";
			$object_to_sql->ctx = new stdClass();
			$object_to_sql->ctx->message = $message;
			$object_to_sql->ctx->id_annonce = $_POST['id_annonce'];
			$object_to_sql->ctx->vu = '0';
			$object_to_sql->ctx->answer = '0';
			$object_to_sql->ctx->id_utilisateurs = $id_annonceur;
			$object_to_sql->ctx->id_user_sender = $id_sender.",".$id_receiver;
			$object_to_sql->ctx->id_group = $id_group;
			$object_to_sql->ctx->send_date = date("d/m/Y");
			$object_to_sql->ctx->time = date("G\hi");
		

			$_app->sql->insert_into($object_to_sql);
		}

		
	}
}
