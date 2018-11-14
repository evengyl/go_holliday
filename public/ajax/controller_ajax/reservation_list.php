<?php
session_start();

require($_SESSION['base_dir'].'/public/ajax/controller_ajax/min_require_for_ajax.php');


if($_POST['reservation_list'])
{
	echo "tatat";
}
/*

if($_POST['action'] == "delete")
{
	affiche_pre($_POST);
	$req_sql = new stdClass();
	$req_sql->table = 'todo';
	$req_sql->ctx = new stdClass();
	$req_sql->ctx->visible = 0;
	$req_sql->where = "id = ".$_POST['id'];
	$sql->update($req_sql);	
}
else if($_POST['action'] == 'edit')
{
	//pour ajouter une ligne on va viérfier pour le reste qu'elle n'existe pas
	//donc comme ça on appel que edit même pour ajouter une ligne dans la base
	$req_sql = new stdClass();
	$req_sql->table = "todo";
	$req_sql->var = "id";
	$req_sql->where = "id = ".$_POST['id'];
	$last_todo = $sql->select($req_sql);

	if(empty($last_todo))
	{

		$req_sql = new stdClass();
		$req_sql->table = 'todo';
		$req_sql->ctx = new stdClass();
		$req_sql->ctx->{$_POST["column"]} = $_POST['editval'];
		$req_sql->ctx->visible = 1;
		$req_sql->ctx->date = $_POST['current_date'];
		$req_sql->where = "id = ".$_POST['id'];

		$sql->insert_into($req_sql);
	}

	$req_sql = new stdClass();
	$req_sql->table = 'todo';
	$req_sql->ctx = new stdClass();
	$req_sql->ctx->{$_POST["column"]} = $_POST['editval'];
	$req_sql->where = "id = ".$_POST['id'];

	$sql->update($req_sql);
}

else if($_POST['action'] == 'list_with_date')
{
	$req_sql = new stdClass();
	$req_sql->table = "todo";
	$req_sql->var = "id, todo_title, todo_content, date, visible";

	if(isset($_SESSION['active_all_todo']) && $_SESSION['active_all_todo'])
		$req_sql->where = "visible = 1";
	else
		$req_sql->where = "date = '".$_POST['current_select_date']."'";
	$req_sql->order = "visible DESC, date DESC";

	$list_todo = $sql->select($req_sql);

	ob_start();
		include dirname(dirname(__FILE__)).'/vues_ajax/todo_list.php';
	$return = ob_get_clean();
	echo ($return);
}
else if($_POST['action'] == "get_last_id")
{
	$req_sql = new stdClass();
	$req_sql->table = "todo";
	$req_sql->var = "id";
	$req_sql->order = "id DESC";
	$id = $sql->select($req_sql);
	echo $id[0]->id+1;
}
else if($_POST['action'] == "view_all_todo_list")
{
	$req_sql = new stdClass();
	$req_sql->table = "todo";
	$req_sql->var = "id, todo_title, todo_content, date, visible";
	$req_sql->where = "visible = 1";
	$req_sql->order = "visible DESC, date DESC";
	$list_todo = $sql->select($req_sql);

	ob_start();
		include dirname(dirname(__FILE__)).'/vues_ajax/todo_list.php';
	$return = ob_get_clean();
	echo ($return);
}
else if($_POST['action'] == "active_all_todo")
{
	if(isset($_SESSION['active_all_todo']) && $_SESSION['active_all_todo'])
	{
		$_SESSION['active_all_todo'] = 0;
		ob_start();
			include dirname(dirname(__FILE__)).'/vues_ajax/todo_list.php';
		$return = ob_get_clean();
		echo ($return);
	}
		
	else
	{
		$_SESSION['active_all_todo'] = 1;

		$req_sql = new stdClass();
		$req_sql->table = "todo";
		$req_sql->var = "id, todo_title, todo_content, date, visible";
		$req_sql->where = "visible = 1";
		$req_sql->order = "visible DESC, date DESC";
		$list_todo = $sql->select($req_sql);

		ob_start();
			include dirname(dirname(__FILE__)).'/vues_ajax/todo_list.php';
		$return = ob_get_clean();
		echo ($return);
	}
		
}
*/
?>