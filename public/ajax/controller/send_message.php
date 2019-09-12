<?
require("ajax_min_load.php");

if(isset($_POST['action']))
{
	if($_POST["action"] == "send_message")
	{
		affiche($_POST);

		$message = trim($_POST['message']);
		$message = htmlspecialchars(htmlentities($message));

		$object_to_sql = new stdClass();
		$object_to_sql->table = "private_message";
		$object_to_sql->ctx = new stdClass();
		$object_to_sql->ctx->message = $message;
		$object_to_sql->ctx->id_annonce = $_POST['id_annonce'];
		$object_to_sql->ctx->vu = '1';
		$object_to_sql->ctx->answer = '0';
		$object_to_sql->ctx->id_utilisateurs = $_app->user->id;
		$object_to_sql->ctx->id_user_sender = $_POST['id_user_sender'];
		$object_to_sql->ctx->send_date = date("d/m/Y");
		$object_to_sql->ctx->time = date("G\hi");
		$object_to_sql->ctx->id_group = $_POST['id_group'];


		$_app->sql->insert_into($object_to_sql);
	}
}
