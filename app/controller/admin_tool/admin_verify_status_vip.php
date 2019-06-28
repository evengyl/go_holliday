<?
Class admin_verify_status_vip extends base_module
{
	private $list_user_vip = [];

	public function __construct(&$_app)
	{		
		parent::__construct($_app);

		$this->get_list_users_vip();
		$this->check_status_vip();

		$this->assign_var("list_user_vip", $this->list_user_vip)->render_tpl();
	}

	public function check_status_vip()
	{
		if(empty($this->list_user_vip)) return;
		
		foreach($this->list_user_vip as $key_user => $row_user)
		{

			$current_timestamp = date('U');

			$timestamp_date_abo = new DateTime($row_user->date_fin_abonement);
			$timestamp_date_abo = (int)$timestamp_date_abo->format("U");
			$timestamp_date_end_abo = $timestamp_date_abo + 93601;
			

			if($timestamp_date_end_abo < $current_timestamp)
				$this->list_user_vip[$key_user]->time_to_rest_abo = "/";
			else
			{
				$time_to_rest_abo = $timestamp_date_end_abo - $current_timestamp;
				$time_to_rest_abo = $this->transforme_seconds_to_human_see($time_to_rest_abo);
				$this->list_user_vip[$key_user]->time_to_rest_abo = $time_to_rest_abo;
			}
		}
	}

	public function get_list_users_vip()
	{
		$req_sql_get_all_user = new stdClass();
		$req_sql_get_all_user->table = ["login", "utilisateurs"];
		$req_sql_get_all_user->var = [
				"login" => ["id", "email"],
				"utilisateurs" => ["id", "user_type", "name", "last_name", "tel", "date_fin_abonement"]
			];//je vais indiquer utilisateurs?user_type car cette fois ci on ne cherche pas a avoir login.user_type mais bien le utilisateurs.user_type
		$req_sql_get_all_user->where = ["utilisateurs.user_type != $1", ["0"]]; //0 = client sans être annonceurs
		$res_sql = $this->_app->sql->select($req_sql_get_all_user);
		
		$this->list_user_vip = $res_sql;
	}


	private function transforme_seconds_to_human_see($time)
    {
	    if ($time>=86400)
	    /* 86400 = 3600*24 c'est à dire le nombre de secondes dans un seul jour ! donc là on vérifie si le nombre de secondes donné contient des jours ou pas */
	    {
		    // Si c'est le cas on commence nos calculs en incluant les jours

		    // on divise le nombre de seconde par 86400 (=3600*24)
		    // puis on utilise la fonction floor() pour arrondir au plus petit
	    	$jour = floor($time/86400);
	    	// On extrait le nombre de jours
	    	$reste = $time%86400;

	    	$heure = floor($reste/3600);
	    	// puis le nombre d'heures
	    	$reste = $reste%3600;

	    	$minute = floor($reste/60);
	    	// puis les minutes

	    	$seconde = $reste%60;
	    	// et le reste en secondes

	    	// on rassemble les résultats en forme de date
	    	$result = $jour.'j '.$heure.'h '.$minute.'min '.$seconde.'s';
	    }

	    elseif ($time < 86400 AND $time>=3600)
	    // si le nombre de secondes ne contient pas de jours mais contient des heures
	    {
	    	// on refait la même opération sans calculer les jours
	    	$heure = floor($time/3600);
	    	$reste = $time%3600;

	    	$minute = floor($reste/60);

	    	$seconde = $reste%60;

	    	$result = $heure.'h '.$minute.'min '.$seconde.' s';
	    }
	    elseif ($time<3600 AND $time>=60)
	    {
	    	// si le nombre de secondes ne contient pas d'heures mais contient des minutes
	    	$minute = floor($time/60);
	    	$seconde = $time%60;
	    	$result = $minute.'min '.$seconde.'s';
	    }
	    elseif ($time < 60)
	    // si le nombre de secondes ne contient aucune minutes
	    {
	    	$result = $time.'s';
    	}
	    
	    return $result;
    }
}
