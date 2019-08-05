<?
Class annonce extends base_module
{
	private $id_annonce;
	public $last_announce;
	

	public function __construct(&$_app)
	{	
		parent::__construct($_app);

		if($this->id_annonce = $this->verif_if_announce_exist($_GET['id_annonce']))
		{

			$array_img_annonce = $this->get_img_files_by_id();
			$this->last_announce = $this->_app->get_last_announce_user($this->id_annonce);	

			$this->assign_var("slide_img", $array_img_annonce)
			->assign_var("last_announce", $this->last_announce)
			->render_tpl();
			
		}
		else{
			$_SESSION["error_admin"] = "Attention l'annonce que vous souhaitez voir n'existe pas.";
			$this->use_module("p_404");
		}

		
	}


	private function verif_if_announce_exist($id)
	{
		//anti piratage et plantage vérifier que l'id est bon
		$sql_verif = new stdClass();
		$sql_verif->table = ["annonces"];
		$sql_verif->var = ["*"];
		$sql_verif->where = ["id = $1", [(int) $id]];
		$res_sql_verif = $this->_app->sql->select($sql_verif);

		if(!empty($res_sql_verif))
			return $res_sql_verif[0]->id;
		else
			return false;
	}

	public function get_img_files_by_id()
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