<?
require("ajax_min_load.php");

if(isset($_POST['action']))
{
	if($_POST["action"] == "get_list")
	{
		echo json_encode($_app->get_list_file());
	}
}
