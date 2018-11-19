<?
Class search_pays extends base_module
{
	public $_app;

	public function __construct(&$_app)
	{	
		$this->_app = $_app;	
		$this->_app->module_name = __CLASS__;
		
		parent::__construct($this->_app);

		//sql pour aller checher tout les pays dispo dans les annonces
		//il vaux mieux faire une table avec les pays id_pays et tout pour éviter les trop grosse requete

		//type de vacances déjà choisie 
		

		$array_type = [
						"couples" => ['name' => 'Couples', 'icone' => 
													'<i style="font-size:40px; color:#ef6b6b;" class="fas fa-heart"></i>
                								  	<i style="font-size:40px; color:#ef6b6b;" class="fas fa-heart"></i>
                								 	<i style="font-size:40px; color:#ef6b6b;" class="fas fa-heart"></i>'
									],

						"familles" => ['name' => 'Familles', 'icone' => 
													'<i style="font-size:40px; color:#ffaeae;" class="fas fa-female"></i>
									                <i style="font-size:30px; color:#00800080;" class="fas fa-child"></i>
									                <i style="font-size:30px; color:#00800080;" class="fas fa-child"></i>
									                <i style="font-size:30px; color:#00800080;" class="fas fa-child"></i>
									                <i style="font-size:40px; color:#9393fb;" class="fas fa-male"></i>'
									],

						"aventures" => ['name' => 'Aventures', 'icone' => 	
													'<i style="font-size:40px; color:#773838b3;" class="fas fa-hiking"></i>
									                <i style="font-size:40px; color:#773838b3;" class="fas fa-mountain"></i>
									                <i style="font-size:40px; color:#773838b3;" class="fas fa-campground"></i>'
									]
					];


		//en attendant
		$array_pays_disponible = ['Belgique' => ['img' => 'drapeau_belgique.jpg', 'text' => 'texte explicatif du pays', 'nb_annonce' => '123456', 'url' => 'belgique'],
								 'France' => ['img' => 'drapeau_france.jpg', 'text' => 'texte explicatif du pays', 'nb_annonce' => '123456', 'url' => 'france'],
								 'Espagne' => ['img' => 'drapeau_espagne.jpg', 'text' => 'texte explicatif du pays', 'nb_annonce' => '123456', 'url' => 'espagne'],
								 'Italie' => ['img' => 'drapeau_italie.jpg', 'text' => 'texte explicatif du pays', 'nb_annonce' => '123456', 'url' => 'italie'],
								 'Pays-Bas' => ['img' => 'drapeau_pays_bas.jpg', 'text' => 'texte explicatif du pays', 'nb_annonce' => '123456', 'url' => 'pays_bas']
								];

		if(isset($this->_app->route['type']))
		{
			$type = $this->_app->route['type'];
			
			if(isset($this->_app->route['pays']))
				$this->get_html_tpl =  $this->assign_var("_app", $this->_app)->use_module("search_habitat")->render_tpl();

			else
				$this->get_html_tpl =  $this->assign_var("_app", $this->_app)->assign_var("type_selected", $array_type[$type])->assign_var('array_pays_disponible', $array_pays_disponible)->render_tpl();
		}
		else
		{
			$this->get_html_tpl =  $this->assign_var("_app", $this->_app)->use_module("home")->render_tpl();
		}
	}
}