<?

Class _app
{

	public $array_sql_ = [];
	public $sql;
	public $option_app = [];
	public $base_dir;
	public $base_path;
	public $navigation;
	public $translate = [];
	public $route = [];
	public $template = [];
	public $stack_module = [];
	public $var_module;
	public $module_name;
	public $user;
	public $lang;
	public $site_name = "Go Hollidays";

	public $time_start = 0;
	public $time_stop = 0;


	public function __construct()
	{
		$this->base_dir = basename($_SESSION['base_dir']);
		$this->base_path = $_SESSION['base_dir'];
		$this->path_to_upload_img_annonce = $_SESSION['base_dir']."/public/images/annonces/";
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
		$req_sql = new stdClass();
		$req_sql->table = ['vues'];
		$req_sql->var = ["vue"];
		$req_sql->where = ["page = $1", [$page]];
		$res_sql = $this->sql->select($req_sql);
		$nb_vue = $res_sql[0]->vue;

		$new_nb = (int)$nb_vue +1;


		$req_sql = new stdClass;
		$req_sql->table = "vues";
		$req_sql->ctx = new stdClass;
		$req_sql->ctx->vue = $new_nb;
		$req_sql->where = "page = '".$page."'";
		$res_sql = $this->sql->update($req_sql);
	}
}