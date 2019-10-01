<?

Class fct_global_website
{
	public $_app;

	public function __construct(&$_app)
	{
		$this->_app = $_app;

	}


	public function get_first_image($annonces)
	{
		if(empty($annonces)) return false;
		foreach($annonces as $key => $row_annonce)
		{
			if(file_exists($this->_app->base_dir."/public/datas/annonces_images/".$row_annonce->id."/"))
			{
				if($dossier = opendir($this->_app->base_dir."/public/datas/annonces_images/".$row_annonce->id."/"))
				{
					while(false !== ($fichier = readdir($dossier)))
					{
						if($fichier != '.' && $fichier != '..')
						{
							$annonces[$key]->img_principale = "/datas/annonces_images/".$row_annonce->id."/".$fichier;
							break;
						}
					}
				}
			}
			if(!isset($row_annonce->img_principale))
				$annonces[$key]->img_principale = "images/No_Image.jpg";
		}
		return $annonces;
	}


	public function get_list_file()
	{

		if(!file_exists($this->_app->base_dir."/public/datas/annonceurs_documents/".$this->_app->user->id_utilisateurs))
			mkdir($this->_app->base_dir."/public/datas/annonceurs_documents/".$this->_app->user->id_utilisateurs);


		$array_list_files = array();

		if($dossier = opendir($this->_app->base_dir."/public/datas/annonceurs_documents/".$this->_app->user->id_utilisateurs))
		{
			$i = 0;
			while(false !== ($fichier = readdir($dossier)))
			{
				if($fichier != '.' && $fichier != '..')
				{
					$array_list_files[$i]["link"] = "/datas/annonceurs_documents/".$this->_app->user->id_utilisateurs."/".$fichier;
					$array_list_files[$i]["time"] = date('d/m/Y', fileatime($this->_app->base_dir."/public/datas/annonceurs_documents/".$this->_app->user->id_utilisateurs."/".$fichier));
					$array_list_files[$i]["size"] = (filesize($this->_app->base_dir."/public/datas/annonceurs_documents/".$this->_app->user->id_utilisateurs."/".$fichier))/1024/1024;
					$array_list_files[$i]["name"] = $fichier;
					$array_list_files[$i]["extension"] = pathinfo($fichier, PATHINFO_EXTENSION);
					$array_list_files[$i]["extension_icon"] = "/images/file_extension/".pathinfo($fichier, PATHINFO_EXTENSION).".png";
					$i++;
				}

			}
		}

		return $array_list_files;
	}


	public function send_confirm_create_account_by_mail($mail_user)
	{
		$req_sql = new StdClass();
       	$req_sql->table = "utilisateurs";
       	$req_sql->data = "id, mail, name, last_name, user_type, id_create_account";
       	$req_sql->where = ["mail = $1 AND account_verify = $2", [$mail_user, "0"]];
		$res_fx_id_user = $this->_app->sql->select($req_sql);

		if(isset($res_fx_id_user[0]))
		{
			//donnée personnel du nouvel utilisateur à envoyer par mail
			$user = $res_fx_id_user[0];

			if($content_html = file_get_contents($this->_app->base_dir."/vues/mail_tpl/confirm_sign_up.html"))
			{
				//on set sont type de sign_up
				if($user->user_type == "0")
					$user->user_type = "Client";

				else if($user->user_type == "1")
					$user->user_type = "Annonceur";

				else
					$user->user_type = "Client";


				$id = $user->id_create_account;
				$name = $user->name;
				$last_name = $user->last_name;
				$domain = Config::$base_url;
				$type = $user->user_type;
				$mail = $user->mail;
				$site_name = $this->_app->site_name." - ".date("Y");

				$subject = "Confirmation d'inscription sur le site ".$this->_app->site_name;
				$headers = "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

				$content_html = str_replace(["##TYPE##", "##NAME##", "##LASTNAME##", "##DOMAIN##", "##ID##", "##SITENAME##"], [$type, $name, $last_name, $domain, $id, $site_name], $content_html);

				if(!mail($mail, $subject, $content_html, $headers))
				{
					$headers = 'From:"'.$this->_app->site_name.'" <'.Config::$mail.'>';

					mail(Config::$mail, "Erreur de MAIL", "Une erreur est survenue avec l'envoi du mail de confirmation avec les données suivantes\r\n
						Nom : ". $name ."\r\n
						Prénom : ". $last_name ."\r\n
						ID unique d'enregistrement : ". $id .""
						, $headers);
				}
			}
			else
			{
				// en cas d'erreur de tpl
				$headers = 'From:"'.$this->_app->site_name.'" <'.Config::$mail.'>';
				mail(Config::$mail, "Erreur de TPL", "Une erreur est survenue avec la lecture du template de mail Confirm_sign_up", $headers);
			}

			
		}
	}


	public function getDatesBetween($start, $end)
	{
	    if($start > $end)
	    {
	        return false;
	    }    
	    
	    $sdate    = strtotime("$start +1 day");
	    $edate    = strtotime($end);
	    
	    $dates = array();
	    $dates[] = $start;
	    for($i = $sdate; $i < $edate; $i += strtotime('+1 day', 0))
	    {
	        $dates[] = date('Y-m-d', $i);
	    }
	    $dates[] = $end;
	    return $dates;
	}


	public function calcule_moy_price_annocne($array_date, $id_annonce)
	{
		//va me rendre un array avec toute les date que le client a selectionnée
		$array_date = $this->getDatesBetween($array_date[0], $array_date[1]);

		//me rend un array avec le jour en anglais en 3 lettre
		$array_str_date = [];
		foreach($array_date as $row_date)
		{
			$tmp = strtotime($row_date);
			$array_str_date[] = date('D', $tmp);
		}
		/*
		Fri (vendredi)
		Sat (samedi)
		Sun (dimanche)
		Mon (Lundi)
		*/
		//il va falloir vérifier que si les jours select sont , vendredi samedi dimanche / samedi dimanche lundi c'est le prix d'un week
		// si c'est 6 nuit il s'agit d'un priw à la semaine
		// si pas un prix à la nuitée.

		$its_weekend = false;
		$its_week = false;
		$its_day_normal = false;


		if(count($array_str_date) == 3)
		{
			if(in_array("Fri", $array_str_date) && in_array("Sat", $array_str_date) && in_array("Sun", $array_str_date))
				$its_weekend = true;

			else if(in_array("Sat", $array_str_date) && in_array("Sun", $array_str_date) && in_array("Mon", $array_str_date))
				$its_weekend = true;
			else
				$its_day_normal = true;
		}
		else if(count($array_str_date) >= 7)
			$its_week = true;

		else
			$its_day_normal = true;
		//mtn on a déterminer quel type de date de vacances c'étais

	/*
		si le clients demande une réservation de 11 nuits :<br>
		Le prix par 7 nuits est de, imaginons entre 401 et 500€ et le prix par nuit est de imaginons, entre 41 et 70€<br>
		Le calcul ce fait ainsi : 11 nuits<br>
		7 nuits avec une moyenne de 500€ - 401€ = (99€ / 3)*2 = 66€ <br>
		Donc 500€ - 50€ = 450€ de moyenne pour une semaine.<br>
		450€ + (Tarif d'une nuit 70€ - 41€ = (29€ /2) = 15€)<br>
		Donc 70€ - 15€ = 55€ de moyenne par nuit<br><br>
		Pour un total de 450 + 55 + 55 + 55 + 55 = 670€ pour 12 jours et 11 nuits chez vous.<br>
	*/


		

		//on fait le sorting pour savoir exactement qu'elle genre de calcule faire
		$moy_price_one_night = $this->render_moy_price($id_annonce, "price_one_night");
		$moy_price_one_week = $this->render_moy_price($id_annonce, "price_one_week");
		$moy_price_week_end = $this->render_moy_price($id_annonce, "price_week_end");

		if($its_weekend)
		{
			//WEEK END);
			$price_moyen = $moy_price_week_end;
		}

		else if($its_week)
		{
			$total_night = count($array_str_date);
			if($total_night > 7)
			{
				if($total_night > 14)
				{
					if($total_night > 21)
					{
						if($total_night > 28)
						{
							$price_moyen = 0;	
						}
						else if($total_night == 28)
						{
							//Quatres semaines
							$price_moyen = $moy_price_one_week*4;
						}
						else
						{
							//Trois grosses semaines
							$tmp = $total_night - 21;
							$price_moyen = ceil(($moy_price_one_week * 3) + ($moy_price_one_night * $tmp));
						}
					}
					else if($total_night == 21)
					{
						//Trois semaines
						$price_moyen = $moy_price_one_week * 3;
					}
					else
					{
						//Deux grosses semaines
						$tmp = $total_night - 14;
						$price_moyen = ceil(($moy_price_one_week * 2) + ($moy_price_one_night * $tmp));
					}

				}
				else if($total_night == 14)
				{
					//Deux semaine
					$price_moyen = $moy_price_one_week * 2;
				}
				else
				{
					//Grosse semaine
					$tmp = $total_night - 7;
					$price_moyen = ceil($moy_price_one_week + ($moy_price_one_night * $tmp));
					
				}
			}
			else
			{
				//SEMAINE
				$price_moyen = $moy_price_one_week;
			}
			
		}

		else if($its_day_normal)
		{
			//Jours au details
			$price_moyen = $moy_price_one_night * $total_night;
		}

		return $price_moyen;

	}


	public function render_moy_price($id_annonce, $needed)
	{
		//avant toute chose il nous faut les prix de l'annonce
		if($this->verif_if_announce_exist($id_annonce))
		{
			$moy_price_ = 0;

			//ok l'annone exite je vais chrcher les infos prix
			$req_sql_price = new stdClass();
			$req_sql_price->table = "range_price_announce";
			$req_sql_price->data = $needed;
			$req_sql_price->where = ["id = $1", [$id_annonce]];
			$res_sql_price = $this->_app->sql->select($req_sql_price)[0];

			if(!empty($res_sql_price->$needed))
			{
				$price_ = $res_sql_price->$needed;
				$price_ = explode("-", $price_);
				$moy_price_ = $price_[1] - ((($price_[1] - $price_[0]) / 3 ) * 2);
			}

			return $moy_price_;
		}
	}

	protected function set_user_infos_on_app()
	{
		$req_sql = new stdClass;
		$req_sql->table = "login";
		$req_sql->data = "id, login, password, email, level_admin, id_utilisateurs, name, last_name, user_type, tel, address_numero, address_rue, zip_code, address_localite, age, pays, id_background_profil, account_verify, id_create_account, newsletter, id_favorite, genre";
		$req_sql->where = ["login = $1", [$_SESSION['pseudo']]];
		$res_fx = $this->_app->sql->select($req_sql);


		//la liste des annonces favorite est en chaine de caractere on la remet en array
		$res_fx[0]->id_favorite = explode(",", $res_fx[0]->id_favorite);
		

		//on ressemble les deux array pour mettre a jour l'_app->user
		$merge_array_user = (object) array_merge((array) $this->_app->user, (array)$res_fx[0]);
		return $merge_array_user;
	}

	public function check_level_user($login)
	{
		if($login)
		{
			$req_sql = new stdClass();
			$req_sql->table = 'login';
			$req_sql->data = "level_admin";
			$req_sql->where = ["login = $1", [$login]];
			$res_sql = $this->_app->sql->select($req_sql);
			return $res_sql[0]->level_admin;
		}
		else
			return 0;
		
	}

	public function get_slide_home($opacity = false)
	{
		$array_slide = array();

		if($dossier = opendir($this->_app->base_dir.'/public/images/slides_home'))
		{
			while(false !== ($fichier = readdir($dossier)))
			{
				if($fichier != '.' && $fichier != '..')
					$array_slide[] = "/images/slides_home/".$fichier;
			}
		}

		if($opacity)
			return $array_slide_opacity;
		else
			return $array_slide;

		
	}


	public function verif_if_announce_exist($id)
	{
		//anti piratage et plantage vérifier que l'id est bon
		$sql_verif = new stdClass();
		$sql_verif->table = "annonces";
		$sql_verif->data = "*";
		$sql_verif->where = ["id = $1 AND on_off = $2", [(int) $id, "1"]];
		$res_sql_verif = $this->_app->sql->select($sql_verif);

		if(!empty($res_sql_verif))
			return $res_sql_verif[0]->id;
		else
			return false;
	}


	public function send_new_request_admin($object = "", $sujet="")
	{
		$content_html = file_get_contents($this->_app->base_dir."/vues/mail_tpl/request_admin.html");
		$content_html = str_replace(
								["##NAME##", "##ID##", "##SITENAME##", "##OBJECT##"], 
								[$this->_app->user->name, $this->_app->user->id_utilisateurs, $this->_app->site_name, $object],
							$content_html);

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		if(!empty($sujet))
				$subject = $sujet;
			else
				$subject = "Demande administrative";

		mail(Config::$mail, $subject, $content_html, $headers);
	}


	public function send_new_mail_client($object = "", $mail = "", $reason_why = "", $sujet= "")
	{
		if($reason_why == "new_message" || $reason_why == "new_demand" || $reason_why == "admin_say")
		{
			$content_html = file_get_contents($this->_app->base_dir."/vues/mail_tpl/mail_client.html");
			$content_html = str_replace(
									["##SITENAME##", "##OBJECT##"], 
									[$this->_app->site_name, $object],
								$content_html);

			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			if(!empty($sujet))
				$subject = $sujet;
			else
				$subject = "Demande administrative";

			mail($mail, $subject, $content_html, $headers);
		}
		else{
			return false;
		}
		
	}


	public function convert_date_to_uk($date)
	{
		$bits = explode('/',$date);
		$date = $bits[2].'-'.$bits[1].'-'.$bits[0];

		return $date;
	}


	public function get_announce_user($id_annonce)
	{
		$req_sql_announce = new stdClass();
		$req_sql_announce->table = 'annonces';
		$req_sql_announce->data = "*";
		$req_sql_announce->where = ["id = $1", [$id_annonce]];
		$req_sql_announce->order = ["id DESC"];
		$req_sql_announce->limit = "1";
		$annonce = $this->_app->sql->select($req_sql_announce);

		if(!empty($annonce[0]))
		{
			$this->annonce = $annonce[0];

			$this->render_human_price_range();
			$this->render_type_vacances();

				
			$tmp = [];
			foreach($this->annonce->text_sql_to_human as $row_text)
				$tmp[$row_text->name_sql] = $row_text->name_human;
			$this->annonce->text_sql_to_human = $tmp;


			$tmp = [];
			foreach($this->annonce->sport[0] as $key => $row_sport)
				$tmp[] = (object)["value" => $row_sport, "name_human" => $this->annonce->text_sql_to_human[$key], "name_sql" => $key];
			$this->annonce->sport[0] = $tmp;


			$tmp = [];
			foreach($this->annonce->activity[0] as $key => $row_activity)
				$tmp[] = (object)["value" => $row_activity, "name_human" => $this->annonce->text_sql_to_human[$key], "name_sql" => $key];
			$this->annonce->activity[0] = $tmp;

			$this->annonce->url_annonce = "/Recherche/Vues/Annonces/".$this->annonce->id;
		}

		$this->annonce = (object)$this->annonce;
		return $this->annonce;
	}



	private function render_human_price_range()
	{
		$this->annonce->price_one_night_human = "<b class='text-muted'>Prix moyen pour une nuit : </b><br><i style='color:#008000;'>".
													ceil($this->render_moy_price($this->annonce->id, "price_one_night"))." Euros</i>";

		$this->annonce->price_week_end_human = "<b class='text-muted'>Prix moyen pour un week-end : </b><br><i style='color:#008000;'>".
													ceil($this->render_moy_price($this->annonce->id, "price_week_end"))." Euros</i>";

		$this->annonce->price_one_week_human = "<b class='text-muted'>Prix moyen pour une semaine : </b><br><i style='color:#008000;'>".
													ceil($this->render_moy_price($this->annonce->id, "price_one_week"))." Euros</i>";

		$this->annonce->caution_human = "Une caution de <b>".$this->annonce->caution."&nbsp;€</b> est demandée pour garantir le bien.";
	}

	private function render_type_vacances()
	{
		if(!empty($this->annonce->id_type_vacances))
		{
			$array_type_vacances_id = explode(",", $this->annonce->id_type_vacances);

			$this->annonce->array_type_vacances = new stdClass();

			foreach($array_type_vacances_id as $row_type_vacances)
			{
				$req_sql_type_vacance = new stdClass();
				$req_sql_type_vacance->table = "annonce_type_vacances";
				$req_sql_type_vacance->data = "name_sql, icon, title";
				$req_sql_type_vacance->where = ["id = $1", [$row_type_vacances]];
				$annonce_type_vacances = $this->_app->sql->select($req_sql_type_vacance);

				$this->annonce->array_type_vacances->id = $array_type_vacances_id;
				$this->annonce->array_type_vacances->text[] = $annonce_type_vacances[0]->title;
				$this->annonce->array_type_vacances->icon[] = $annonce_type_vacances[0]->icon;

			}
		}
	}

	
}



function affiche($var_a_print)
{
    ?><pre><?
        htmlentities(print_r($var_a_print));
    ?></pre><?
}

function paragraphe_style($text)
{
	?><p><?= $text; ?></p><?
}