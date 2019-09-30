<?
require("ajax_min_load.php");

if(isset($_POST['action']))
{
	if($_POST["action"] == "delete_file")
	{
		unlink("../../".$_POST["link"]);
	}
}
