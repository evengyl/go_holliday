<?

Class _app extends fct_global_website
{

	public $array_sql_ = [];
	public $sql;
	public $option_app = [];
	public $base_dir;
	public $base_path;
	public $navigation;
	public $translate = [];
	public $route = [];
	public $stack_module = [];
	public $var_module;
	public $module_name;
	public $user;
	public $lang;
	public $site_name = "Go Holidays";
	public $month = ['01' => "Janvier", '02' => "Février", '03' => "Mars",
					 '04' => "Avril", '05' => "Mai", '06' => "Juin",
					 '07' => "Juillet", '08' => "Aout", '09' => "Septembre", 
					 '10' =>"Octobre", '11' => "Novembre", '12' => "Décembre"];

	public $time_start = 0;
	public $time_stop = 0;
	public $module_for_exec = [];



	public function __construct()
	{
		parent::__construct($this);


		$this->base_dir = basename($_SESSION['base_dir']);
		$this->base_path = $_SESSION['base_dir'];
		$this->path_to_upload_img_annonce = $_SESSION['base_dir']."/public/images/annonces/";
		$this->option_app["view_time_exec_all_sql"] = false;

	}


	public function view_time_exec_page()
	{
		if($this->option_app['view_time_exec_page'])
		{
			$this->time_stop = $this->microtime_float();

	    	paragraphe_style("Execution de la page en : ".round(($this->time_stop - $this->time_start),3)." Seconde(s)"); 	
		}
	}

	public function microtime_float()
	{
	    list($msec, $sec) = explode(" ", microtime());
	    return ((float)$msec + (float)$sec);
	}

	public function admin_tools()
	{
		$this->view_list_sql();
		$this->view_time_exec_page();
		$this->view_error();
		$this->view_post();	

	}

	private function view_post()
	{
		if($this->option_app['view_post_in_index'])
		{
			if(!empty($_POST))
				affiche($_POST);
		}
	}

	private function view_list_sql()
	{
		if($this->option_app['get_sql_list'])
		{
			$i = 1;
		    foreach($this->array_sql_ as $row_sql)
		    {
		    	$time_resquest = round($row_sql["stop"] - $row_sql["start"],3);

		        paragraphe_style("Requête SQL n°".$i." : ".$row_sql["sql"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Réussie en : ".$time_resquest." Seconde(s)");
		        $i++;
		    }
		}
	}

	private function view_error()
	{
		if($this->option_app['view_error_in_index'])
		{
			if(!empty($_SESSION['error']))
			{
				paragraphe_style($_SESSION['error']);
				unset($_SESSION['error']);
			}	
		}
	}

	public function add_view($page)
	{
		$date = Date("m-Y");

		$req_sql = new stdClass();
		$req_sql->table = ['vues'];
		$req_sql->var = ["id", $page, "periode"];
		$req_sql->where = ["periode LIKE $1", [$date]];
		$res_sql = $this->sql->select($req_sql);
		

		if(empty($res_sql)){
			//vide il faut créer le nouveau mois de la vues
			$req_sql = new stdClass;
			$req_sql->table = "vues";
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->periode = $date;
			$res_sql = $this->sql->insert_into($req_sql);

			$req_sql = new stdClass();
			$req_sql->table = ['vues'];
			$req_sql->var = ["id", $page, "periode"];
			$req_sql->where = ["periode LIKE $1", [$date]];
			$res_sql = $this->sql->select($req_sql);
		}
		

		$res_sql = $res_sql[0];
		$res_sql->$page = (int)$res_sql->$page +1;

		$req_sql = new stdClass;
		$req_sql->table = "vues";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx = $res_sql;
		$req_sql->where = "id = ".$res_sql->id;
		$res_sql = $this->sql->update($req_sql);
	}
}