<?
require("ajax_min_load.php");

if(isset($_POST['action']))
{
	if($_POST["action"] == "send_message")
	{
		//il me faut l id du createur
		$req_sql_get_user_id = new stdClass();
		$req_sql_get_user_id->table = "annonces";
		$req_sql_get_user_id->data = "id_utilisateurs, title";
		$req_sql_get_user_id->where = ["id = $1", [$_POST['id_annonce']]];
		$res_sql_get_user_id = $_app->sql->select($req_sql_get_user_id);

		if(!empty($res_sql_get_user_id))
		{

			$id_sender = $_POST["id_user_sender"];
			$id_receiver = $_POST["id_user_receiver"];
			$id_group = $_POST["id_group"];

			//il faut set le dernier message du grp a 1 pour reponse
			$req_sql_set_answer = new stdClass();
			$req_sql_set_answer->table = "private_message";
			$req_sql_set_answer->data = "id";
			$req_sql_set_answer->where = ["id_group = $1", [$id_group]];
			$req_sql_set_answer->order = ["id DESC"];
			$req_sql_set_answer->limit = "1";
			$res_sql_set_answer = $_app->sql->select($req_sql_set_answer);

			if(!empty($res_sql_set_answer[0]->id))
			{
				$req_sql = new stdClass;
				$req_sql->table = "private_message";
				$req_sql->ctx = new stdClass;
				$req_sql->ctx->answer = 1;
				$req_sql->where = "id = '".$res_sql_set_answer[0]->id."'";
				$_app->sql->update($req_sql);
			}
			


			$message = trim($_POST['message']);
			$message = $message;

			$id_annonceur = $res_sql_get_user_id[0]->id_utilisateurs;
			// id de la personne possédant l'annonce

			


			$object_to_sql = new stdClass();
			$object_to_sql->table = "private_message";
			$object_to_sql->ctx = new stdClass();
			$object_to_sql->ctx->message = $message;
			$object_to_sql->ctx->id_annonce = $_POST['id_annonce'];
			$object_to_sql->ctx->vu = '1';
			$object_to_sql->ctx->vu_receiver = '0';
			$object_to_sql->ctx->answer = '0';
			$object_to_sql->ctx->id_utilisateurs = $id_annonceur;
			$object_to_sql->ctx->id_user_sender = $id_sender.",".$id_receiver;
			$object_to_sql->ctx->id_group = $id_group;
			$object_to_sql->ctx->send_date = date("d/m/Y");
			$object_to_sql->ctx->time = date("G\hi");
		

			$responce = $_app->sql->insert_into($object_to_sql,0,1);

			if($responce)
			{
				$req_infos_mail = new stdClass();
				$req_infos_mail->table = "utilisateurs";
				$req_infos_mail->data = "mail, name, last_name";
				$req_infos_mail->where = ["id = $1", [$id_sender]];
				$res_infos_mail = $_app->sql->select($req_infos_mail);
				$res_infos_mail = $res_infos_mail[0];


				$_app->send_new_mail_client("Vous avez reçu un nouveau message de : ".$res_infos_mail->name." ".$res_infos_mail->last_name."<br>"."
							Pour l'annonce : ".$res_sql_get_user_id[0]->title."<br>
							Message : ".$message."<br>
							L'administration.", $res_infos_mail->mail, "admin_say", "Vous avez reçu un nouveau message de ".$res_infos_mail->name." ".$res_infos_mail->last_name);
			}



		}

		
	}
}
