<?
require("ajax_min_load.php");


$date = Date("Y");
$array_used_month = [];
$array_views = [];
$array_color = [];

$req_sql = new stdClass();
$req_sql->table = ['vues'];
$req_sql->var = ["id", "sign_up", "login", "login_success", "accueil", "contact_us", "periode"];
$req_sql->where = ["periode LIKE $1", [$date]];
$res_sql = $_app->sql->select($req_sql);



foreach($res_sql as $key_view => $row_view)
{
	$res_sql[$key_view]->periode = substr($row_view->periode, 0, 2);
	$res_sql[$key_view]->periode_txt = $_app->month[$res_sql[$key_view]->periode];

	$array_used_month[$res_sql[$key_view]->periode] = $res_sql[$key_view]->periode_txt;

	$array_views['Connexion'][] = $res_sql[$key_view]->login;

	$array_views['Connexion-réussie'][] = $res_sql[$key_view]->login_success;

	$array_views['Inscription'][] = $res_sql[$key_view]->sign_up;

	$array_views['Accueil'][] = $res_sql[$key_view]->accueil;

	$array_views['Contacter-nous'][] = $res_sql[$key_view]->contact_us;

	$array_color[0] = '#C71585';
	$array_color[1] = '#FF0000';
	$array_color[2] = '#FFA500';
	$array_color[3] = '#7B68EE';
	$array_color[4] = '#3CB371';


}
echo json_encode([$array_used_month, $array_views, $array_color]);
?>