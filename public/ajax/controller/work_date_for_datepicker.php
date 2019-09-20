<?
require("ajax_min_load.php");

if(isset($_POST['action']))
{
	if($_POST["action"] == "calcul_nb_date_between")
		echo (count($_app->getDatesBetween($_POST["date_start"], $_POST["date_end"])))-1;

	else if($_POST["action"] == "calcul_moy_price")
	{
		$date_ = [];
		$date_[0] = $_POST["date_start"];
		$date_[1] = $_POST["date_end"];

		echo $_app->calcule_moy_price_annocne($date_, (int)$_POST['id_annonce']);
	}
}
