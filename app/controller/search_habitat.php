<?
Class search_habitat extends base_module
{
	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);


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
		$array_pays_disponible = ['Belgique' => ['name' => 'Belgique', 'img' => 'drapeau_belgique.jpg', 'text' => 'texte explicatif du pays', 'nb_annonce' => '123456', 'url' => 'belgique'],
								 'France' => ['name' => 'France', 'img' => 'drapeau_france.jpg', 'text' => 'texte explicatif du pays', 'nb_annonce' => '123456', 'url' => 'france'],
								 'Espagne' => ['name' => 'Espagne', 'img' => 'drapeau_espagne.jpg', 'text' => 'texte explicatif du pays', 'nb_annonce' => '123456', 'url' => 'espagne'],
								 'Italie' => ['name' => 'Italie', 'img' => 'drapeau_italie.jpg', 'text' => 'texte explicatif du pays', 'nb_annonce' => '123456', 'url' => 'italie'],
								 'Pays-Bas' => ['name' => 'Pays-bas', 'img' => 'drapeau_pays_bas.jpg', 'text' => 'texte explicatif du pays', 'nb_annonce' => '123456', 'url' => 'pays_bas']
								];

		$array_habitat_disponible = [
									"Caravanes" => ['name' => 'Caravanes', 'img' => 'caravane.jpg', 'text' => 'atatt', 'nb_annonce' => "1321", 'url' => 'caravanes'],
									"Bungalows" => ['name' => 'Bungalows', 'img' => 'bungalow.jpg', 'text' => 'atatat', 'nb_annonce' => "1321", 'url' => 'bungalows'],
									"Appartements" => ['name' => 'Appartements', 'img' => 'appartement.jpg', 'text' => 'atatat', 'nb_annonce' => "1321", 'url' => 'appartements'],
									"Maisons d\'hôtes" => ['name' => 'Maisons d\'hôtes', 'img' => 'maison_hote.jpg', 'text' => 'atatat', 'nb_annonce' => "1321", 'url' => 'maisons_d_hotes'],
									"Gites" => ['name' => 'Gites', 'img' => 'gite.jpg', 'text' => 'tatat', 'nb_annonce' => "1321", 'url' => 'gites']
								];


		if(isset($this->_app->route['type']))
		{
			$type = $this->_app->route['type'];

			if(isset($this->_app->route['pays']))
			{
				$pays = $this->_app->route['pays'];

				if(isset($this->_app->route['habitat']))
					$this->get_html_tpl =  $this->assign_var("_app", $this->_app)->use_module("search_result")->render_tpl();

				else
					$this->get_html_tpl =  $this->assign_var("_app", $this->_app)
											->assign_var("type_selected", $array_type[$type])
											->assign_var('pays_selected', $array_pays_disponible[ucfirst($pays)])
											->assign_var('array_habitat_disponible', $array_habitat_disponible)
											->render_tpl();
			}
			
		}
		else
		{
			$this->get_html_tpl =  $this->assign_var("_app", $this->_app)->use_module("home")->render_tpl();
		}
	}
}