<?
Class annonce extends base_module
{
	public $_app;
	public $error = false;
	public $name_annonce;

	public function __construct(&$_app)
	{	
		$_app->module_name = __CLASS__;
		parent::__construct($_app);


		$array_img_annonce = $this->get_img_files_by_id();

		if(!$this->error)
		{
			$this->assign_var("slide_img", $array_img_annonce)
				->assign_var("name_annonce", $this->name_annonce)
				->render_tpl();
		}
		else
			$this->use_module('module_404')->render_tpl();
	}

	public function get_img_files_by_id()
	{
		//anti piratage et plantage vérifier que l'id est bon
		$sql_verif = new stdClass();
		$sql_verif->table = ["annonces"];
		$sql_verif->var = ["*"];
		$sql_verif->where = ["id = $1", [(int)$_GET['id_annonce']]];
		$res_sql_verif = $this->_app->sql->select($sql_verif);
		$res_sql_verif = $res_sql_verif[0];

		//pour l'affichage facile
		$this->name_annonce = $res_sql_verif->name.", ".$res_sql_verif->lieu;

		if(!empty($res_sql_verif)) //alors ok on continue, sinon renvoyer une 404
		{
			$array_slide = array();

			if($dossier = opendir($this->_app->base_dir.'/public/images/annonces/'.$res_sql_verif->id))
			{
				while(false !== ($fichier = readdir($dossier)))
				{
					if($fichier != '.' && $fichier != '..')
					{
						$array_slide[] = "/images/annonces/".$res_sql_verif->id."/".$fichier;
					}
				}
			}

			return $array_slide;
		}
		else{
			$this->error = true;
		}
	}

}