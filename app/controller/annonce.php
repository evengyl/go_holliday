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


		if($this->id_annonce = $this->_app->verif_if_announce_exist($_GET['id_annonce']))
		{

			$array_img_annonce = $this->get_img_files();
			$this->annonce = $this->_app->get_announce_user($this->id_annonce);
			$this->_app->title_page = $this->annonce->title.", ".$this->annonce->sub_title;

			$this->date_work();
			$this->get_list_date();
			$this->add_vues();

			$this->assign_var("slide_img", $array_img_annonce)
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

	private function date_work()
	{
		$this->annonce->date_start_saison_uk_format = $this->_app->convert_date_to_uk($this->annonce->date_start_saison);
		$this->annonce->date_end_saison_uk_format = $this->_app->convert_date_to_uk($this->annonce->date_end_saison);

		$this->annonce->text_date_saison = "Le début de la saison de location commence le ".$this->annonce->date_start_saison." et se termine le ".$this->annonce->date_end_saison;
	}

	private function get_list_date()
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

		if($dossier = opendir($this->_app->base_dir.'/public/images/annonces/'.$this->id_annonce))
		{
			while(false !== ($fichier = readdir($dossier)))
			{
				if($fichier != '.' && $fichier != '..')
					$array_slide[] = "/images/annonces/".$this->id_annonce."/".$fichier;
			}
		}
		return $array_slide;
	}

}