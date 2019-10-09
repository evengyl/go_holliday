<?
class _db_connect extends Config
{
	private $db_link;	
	private $is_connected = false;
	private $last_res_sql = null;
	private $last_req_sql = null;
	private $dir_app = "";
	public function __construct()
	{
		$this->connect();
	}
    public function get_connect_data()
    {
        return array(parent::$hote, parent::$user, parent::$Mpass, parent::$base);
    }
	
	public function connect()
	{
		$timestamp_debut = microtime(true);
		if($this->db_link  = mysqli_connect(parent::$hote, parent::$user, parent::$Mpass))
		{
			if(!mysqli_select_db($this->db_link, parent::$base))
			{
				$_SESSION['error'] = "La base de données n'a pas été trouvée, la base ". parent::$base ." à été crée";
				$req_sql = "CREATE DATABASE ".parent::$base;
				$res_sql = mysqli_query($this->db_link, $req_sql);
				mysqli_select_db($this->db_link, parent::$base);
				parent::$bsd_first_init = 1;
			}
		}
		$this->is_connected = true;
		mysqli_set_charset($this->db_link, 'utf8');
	}
	//cette fonction va permettre de remplacer dans toute les boucle de fetch, par mysqli_fetch_object
	//elle recois la requete envoyer par l'appelant  
	public function fetch_object($req_sql, &$_app)  // elle recois la requ�te sql sous forme de string
	{	
		if($this->is_connected == false) // v�rifie si la connection � la DB est �tablie si pas , elle le fait
			$this->connect(); //appel la fonction
		if(is_null($this->last_req_sql) || is_null($this->last_res_sql) || $req_sql != $this->last_req_sql)
		{
			if(isset($this->_app->option_app['view_time_exec_page']) && $this->_app->option_app['view_time_exec_page'] == 1)
			{
				$i = count($this->_app->array_sql_);
				$this->_app->array_sql_[$i]['start'] = $_app->microtime_float();
				$this->_app->array_sql_[$i]['sql'] = $req_sql;
			}
			
			$this->last_req_sql = $req_sql; // enregistre une copie temporaire de la requete
			$this->last_res_sql = mysqli_query($this->db_link, $req_sql)or die('Probleme de requete = '. $req_sql);// enregistre une copie temporaire de la reponse requete
			if(!$this->last_res_sql && $_SERVER['HTTP_HOST'] == "localhost")
			{
            	affiche_pre(mysqli_error($this->db_link));
        	}

        	if(isset($this->_app->option_app['view_time_exec_page']) && $this->_app->option_app['view_time_exec_page'] == 1)
			{
        		$this->_app->array_sql_[$i]['stop'] = $_app->microtime_float();
        	}
		}// si les valeurs sont null ou diff�rente , enregistre les variable correctement
		$res = mysqli_fetch_object($this->last_res_sql);  //enregistre les lignes de la requ�te sur un object
		if (is_null($res))
		 // fetch va vider l'objet envoyer donc on v�rifie si le resultat est null , 
		//si c'est le cas on vide le buffer et remet la variable a null pour une prochaine requ�te
		{
			mysqli_free_result($this->last_res_sql);
			$this->last_res_sql = null;
		}
		
		return $res; // renvoi un tableau d'objet
	}
	public function query($req_sql, &$_app) //not for return somethings
	{
		$i = count($this->_app->array_sql_);
		$this->_app->array_sql_[$i]['start'] = $_app->microtime_float();
		$this->_app->array_sql_[$i]['sql'] = $req_sql;
		if($this->is_connected == false)
			$this->connect();
		$res_sql = mysqli_query($this->db_link, $req_sql)or die(mysqli_error($this->db_link));
		$nb_link_affected = $this->db_link->affected_rows;
		$this->_app->array_sql_[$i]['stop'] = $_app->microtime_float();
		return $res_sql;
	}
	public function query_update($req_sql, &$_app) //not for return somethings
	{
		$i = count($this->_app->array_sql_);
		$this->_app->array_sql_[$i]['start'] = $_app->microtime_float();
		$this->_app->array_sql_[$i]['sql'] = $req_sql;
		if($this->is_connected == false)
			$this->connect();
		$res_sql = mysqli_query($this->db_link, $req_sql)or die(mysqli_error($this->db_link));
		$nb_link_affected = $this->db_link->affected_rows;
		$this->_app->array_sql_[$i]['stop'] = $_app->microtime_float();
		return $res_sql;
	}
    public function escape_sql($var)
    {
    	if($this->is_connected == false)
        	$this->connect();
        return mysqli_real_escape_string($this->db_link, $var);
    }
	public function get_last_insert_id()
	{
		return mysqli_insert_id($this->db_link);
	}
	public function get_db_link()
	{
		if($this->is_connected == false) // v�rifie si la connection � la DB est �tablie si pas , elle le fait
			$this->connect(); //appel la fonction
		return $this->db_link;
	}
	public function escape_string($txt)
	{
		if($this->is_connected == false)
			$this->connect();
		return mysqli_real_escape_string($this->db_link, $txt);
	}
    public function get_db_name()
    {
        return $this->base;
    }
}
