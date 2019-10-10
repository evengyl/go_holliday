<?
Class annonce extends base_module
{
	private $id_annonce;
	public $annonce;
	
	public $list_start_date = [];
	public $list_end_date = [];
	public $list_start_date_waiting = [];
	public $list_end_date_waiting = [];

	public function __construct(&$_app)
	{	
		parent::__construct($_app);

		

		//partie gestion des demande client
			//on check le form avec la session du random id form pour la demande de date
			if(isset($_SESSION['rand_id_for_demand']) && isset($_POST['rand_id_for_demand']))
			{
				if($_SESSION['rand_id_for_demand'] == $_POST['rand_id_for_demand'])
					$this->push_new_demand($_POST);
			}

			//on génère un nombre aléatoire pour valider un form unique pour la demande de date
			$_SESSION['rand_id_for_demand'] = str_replace(".", "", uniqid("DemandDate", true));
		// Fin


		if($this->id_annonce = $this->_app->verif_if_announce_exist($_GET['id_annonce']))
		{
			$array_img_annonce = $this->get_img_files();
			$this->annonce = $this->_app->get_announce_user($this->id_annonce);
			$this->_app->title_page = $this->annonce->title.", ".$this->annonce->sub_title;

			$this->render_date_text();
			$this->get_list_date_demand();
			$this->add_vues();
			$this->check_if_let_avis();


			//partie gestion des avis client
				//on check le form avec la session du random id form pour l'avis
				if(isset($_SESSION['rand_id_for_avis']) && isset($_POST['rand_id_for_avis']))
				{
					if($_SESSION['rand_id_for_avis'] == $_POST['rand_id_for_avis'])
						$this->set_new_avis();
				}

				//on génère un nombre aléatoire pour valider un form unique pour la demande de date
				$_SESSION['rand_id_for_avis'] = str_replace(".", "", uniqid("Avis", true));
			// Fin

			$this->assign_var("slide_img", $array_img_annonce)
			->assign_var('rand_id_for_demand',$_SESSION['rand_id_for_demand'])
			->assign_var('rand_id_for_avis',$_SESSION['rand_id_for_avis'])
			->assign_var("annonce", $this->annonce)
			->assign_var("list_start_date", $this->list_start_date)
			->assign_var("list_end_date", $this->list_end_date)
			->assign_var("list_start_date_waiting", $this->list_start_date_waiting)
			->assign_var("list_end_date_waiting", $this->list_end_date_waiting)
			->render_tpl();
			
		}
		else{
			$_SESSION["error_admin"] = "Attention l'annonce que vous souhaitez voir n'existe pas / plus.";
			$this->use_module("p_404");
		}

		
	}


	private function set_new_avis()
	{
		$object_to_sql = new stdClass();
		$object_to_sql->table = "annonce_avis";
		$object_to_sql->ctx = new stdClass();
		$object_to_sql->ctx->id_annonce = $this->annonce->id;
		$object_to_sql->ctx->create_date = date("d/m/Y");
		$object_to_sql->ctx->id_utilisateurs = $this->_app->user->id_utilisateurs;
		$object_to_sql->ctx->message = $_POST['message'];
		$object_to_sql->ctx->active = 1;
		$object_to_sql->ctx->star = (int)$_POST["note"];
		
		$this->_app->sql->insert_into($object_to_sql);
	}



	private function check_if_let_avis()
	{
		//d'abbord on vois si il y a déjà un avis sur cette annocne apr cette persoone
		$req_sql_get_avis = new stdClass();
		$req_sql_get_avis->table = 'annonce_avis';
		$req_sql_get_avis->data = "id";
		$req_sql_get_avis->where = ["id_annonce = $1 AND id_utilisateurs = $2 AND active = $3", [$this->annonce->id, $this->_app->user->id_utilisateurs, "1"]];
		$res_sql_get_avis = $this->_app->sql->select($req_sql_get_avis);

		$this->_app->user->can_let_avis = 0;
		$this->_app->user->as_reserved = 0;

		if(empty($res_sql_get_avis))
		{
			$date_today = mktime();

			//on va chercher si un date correspond dnas la bsd
			$req_sql_get_date = new stdClass();
			$req_sql_get_date->table = 'annonce_dates';
			$req_sql_get_date->data = "*";
			$req_sql_get_date->where = ["state = $1 AND id_utilisateurs = $2", ["reserved", $this->_app->user->id_utilisateurs]];
			$res_sql_get_date = $this->_app->sql->select($req_sql_get_date);

			

			if(!empty($res_sql_get_date))
			{
				$this->_app->user->as_reserved = 1;
				foreach($res_sql_get_date as $row_date)
				{
					$date = DateTime::createFromFormat('d/m/Y', $row_date->end_date);
					if(mktime() > $date->format('U'))
						$this->_app->user->can_let_avis = 1;
				}
			}
		}
		else 
			$this->_app->user->can_let_avis = 0;

	}

	private function push_new_demand($post)
	{
		if(empty($post["demand_start_date"]) || empty($post["demand_end_date"]) || empty($post['id_annonce'])) return 0;

		if(Config::$is_connect)
		{
			$date_ = [];

			$tmp_demand_start_date = str_replace('/', '-', $post["demand_start_date"]);
			$tmp_demand_end_date = str_replace('/', '-', $post["demand_end_date"]);

			$date_[0] = date("Y-m-d", strtotime(trim($tmp_demand_start_date)));
			$date_[1] = date("Y-m-d", strtotime(trim($tmp_demand_end_date)));
			
			$price_moyen = $this->_app->calcule_moy_price_annocne($date_, (int)$post['id_annonce']);

			$object_to_sql = new stdClass();
			$object_to_sql->table = "annonce_dates";
			$object_to_sql->ctx = new stdClass();
			$object_to_sql->ctx->start_date = $post["demand_start_date"];
			$object_to_sql->ctx->end_date = $post["demand_end_date"];
			$object_to_sql->ctx->prix = $price_moyen;
			$object_to_sql->ctx->id_annonce = $post['id_annonce'];
			$object_to_sql->ctx->id_utilisateurs = $this->_app->user->id_utilisateurs;
			$object_to_sql->ctx->state = "waiting";
			

			$this->_app->sql->insert_into($object_to_sql);
		}
		else
			return 0;
	}

	private function render_date_text()
	{
		$this->annonce->date_start_saison_uk_format = $this->_app->convert_date_to_uk($this->annonce->date_start_saison);
		$this->annonce->date_end_saison_uk_format = $this->_app->convert_date_to_uk($this->annonce->date_end_saison);

		$this->annonce->text_date_saison = "Le début de la saison de location commence le ".$this->annonce->date_start_saison." et se termine le ".$this->annonce->date_end_saison;
	}

	private function get_list_date_demand()
	{
		if(!empty($this->annonce->date_annonces))
		{
			foreach($this->annonce->date_annonces as $row_date)
			{
				if($row_date->state == "reserved")
				{
					$this->list_start_date[] = $this->_app->convert_date_to_uk($row_date->start_date);
					$this->list_end_date[] = $this->_app->convert_date_to_uk($row_date->end_date);
				}
				else if($row_date->state == "waiting")
				{
					$this->list_start_date_waiting[] = $this->_app->convert_date_to_uk($row_date->start_date);
					$this->list_end_date_waiting[] = $this->_app->convert_date_to_uk($row_date->end_date);
				}
			}
		}
	}

	private function add_vues()
	{
		if($this->annonce->id_utilisateurs != $this->_app->user->id_utilisateurs)
		{
			$current_vues = (int)$this->annonce->vues;
			$next_vues = $current_vues+1;

			$req_sql = new stdClass;
			$req_sql->table = "annonces";
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->vues = $next_vues;
			$req_sql->where = "id = '".$this->annonce->id."'";
			$this->_app->sql->update($req_sql);	
		}
	}


	public function get_img_files()
	{
		$array_slide = array();

		if($dossier = opendir($this->_app->base_dir.'/public/datas/annonces_images/'.$this->id_annonce))
		{
			while(false !== ($fichier = readdir($dossier)))
			{
				if($fichier != '.' && $fichier != '..')
					$array_slide[] = "/datas/annonces_images/".$this->id_annonce."/".$fichier;
			}
		}
		return $array_slide;
	}

}