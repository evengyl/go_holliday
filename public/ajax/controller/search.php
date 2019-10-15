<?
require("ajax_min_load.php");

if(isset($_POST['action']))
{
	if($_POST["action"] == "pre_search")
	{
		$data = array();

		$req_sql_pays = new stdClass();
		$req_sql_pays->table = 'annonces';
		$req_sql_pays->data = "pays_name_human, img_pays";
		$req_sql_pays->distinct = true;
		$req_sql_pays->where = ["active = $1 AND on_off = $2 AND admin_validate = $3", ["1", "1", "1"]];
		$res_sql_pays = $_app->sql->select($req_sql_pays);

		$i = 0;
		if(!empty($res_sql_pays))
		{
			foreach($res_sql_pays as $row)
			{
				$data["<i class='fas fa-flag'></i>&nbsp;Pays qui contient des annonces"][$i]["data"] = "<li class='col-xs-4 bot_categ'>
																		<a href='/Search/Pays/".$row->pays_name_human."'>(".$row->pays_name_human.")<br>
																			<img style='width:80px;' src='/images/drapeaux/".$row->img_pays."'/>
																		</a>
																	</li>";
				$i++;
			}
		}


		$req_sql_habitat = new stdClass();
		$req_sql_habitat->table = 'annonces';
		$req_sql_habitat->data = "habitat_name_human, habitat_img";
		$req_sql_habitat->distinct = true;
		$req_sql_habitat->where = ["active = $1 AND on_off = $2 AND admin_validate = $3", ["1", "1", "1"]];
		$res_sql_habitat = $_app->sql->select($req_sql_habitat);

		$i = 0;
		if(!empty($res_sql_habitat))
		{
			foreach($res_sql_habitat as $row)
			{
				$data["<i class='fas fa-home'></i>&nbsp;Type d'habitats disponible"][$i]["data"] =  "<li class='col-xs-4 bot_categ'>
																		<a href='/Search/Habitat/".$row->habitat_name_human."'>(".$row->habitat_name_human.")<br>
																			<img style='width:80px;' src='/images/habitats/".$row->habitat_img."'/>
																		</a>
																	</li>";
				$i++;
			}
		}




		$req_sql_type = new stdClass();
		$req_sql_type->table = 'annonce_type_vacances';
		$req_sql_type->data = "type_vacances_name_human, img";
		$req_sql_type->where = ["1"];
		$res_sql_type = $_app->sql->select($req_sql_type);

		$i = 0;
		if(!empty($res_sql_type))
		{
			foreach($res_sql_type as $row)
			{
				$data["<i class='fas fa-hiking'></i>&nbsp;Type de vacances disponible"][$i]["data"] = "<li class='col-xs-4 bot_categ'>
																		<a href='/Search/Type/".$row->type_vacances_name_human."'>(".$row->type_vacances_name_human.")<br>
																			<img style='width:80px;' src='/images/categories/".$row->img."'/>
																		</a>
																	</li>";
				$i++;
			}
		}


		echo json_encode($data);
	}

	else if($_POST["action"] == "res_search")
	{
		if(!empty($_POST["value"]))
		{
			$req_sql_search = new stdClass();
			$req_sql_search->table = 'annonces';
			$req_sql_search->data = "id, title, sub_title, price, start_saison, end_saison, vues, commoditer_announces";
			$req_sql_search->where = ["active = $1 AND on_off = $2 AND admin_validate = $3 AND title LIKE $4 OR sub_title LIKE $5", ["1", "1", "1", $_POST["value"], $_POST["value"]]];
			$res_sql_search = $_app->sql->select($req_sql_search);

			if(!empty($res_sql_search))
			{
				$data = array();
				

				foreach($res_sql_search as $row_search)
				{
					$row_search = $_app->get_announce_user($row_search->id);
					$row_search = $_app->get_first_image($row_search);

					$data[] = "<div class='col-xs-12 block_search_annonce'>
								<a href='/Annonces/".$row_search->id."'>
									<div class='col-xs-4'>
										<img src='".$row_search->img_principale."' class='img-responsive'>
									</div>
									<div class='col-xs-8'>
										<span class='title'>".$row_search->title."</span><br>
										<span class='sub_title text-muted thin'>".$row_search->sub_title."</span><br>
										<span class='vues text-muted thin'>L'annonce à été vues : ".$row_search->vues." fois</span><br>
										<span class='price'>".$row_search->price_one_night_human."</span>
									</div>
								</a>
							</div>";
				}
			}

			echo json_encode($data);
		}
	}
}
