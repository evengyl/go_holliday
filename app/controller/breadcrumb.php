<?php

Class breadcrumb extends base_module
{

	public function __construct(&$_app)
	{	
		parent::__construct($_app);
		
		if(!$this->_app->option_app['view_breadcrumb'])
			return;

		$breadcrumb_brut = [];


		if(isset($this->_app->navigation->_stack_nav))
		{
			$nav = $this->_app->navigation->_stack_nav;

			foreach($nav as $key_navigation => $row_navigation)
			{
				
				if(!empty($row_navigation[1]))
					$breadcrumb_brut[][$row_navigation[0]] = $row_navigation[1];
				else	
					$breadcrumb_brut[][$row_navigation[0]] = $_GET['page'];
			}
		}
		else
		{
			if(isset($_GET['page']))
				$breadcrumb_brut[] = array($_GET['page'] => $_GET['page']);
			else
				$breadcrumb_brut[] = array("Autre(s)" => "home");
		}

		

		$bread_final = "";	
		$count_number_onglet_nav = count($breadcrumb_brut);
		$j = 1;
		$tmp_bread[0] = $breadcrumb_brut[0];
		if($count_number_onglet_nav > 1)
		{
			while($j < $count_number_onglet_nav)
			{
				$tmp_j = $j - 1;
				/*j'indique au array de merger la cellule d'avant avec la nouvelle
				  ça donnera ça value1
								value1 value2
								value1 value2 value3
								value1 value2 value3 value4*/
				$tmp_bread[$j] = array_merge($tmp_bread[$tmp_j], $breadcrumb_brut[$j]);
				$j++;
			}
		}

		$i_active = count($tmp_bread);
		$active = "";
		//decomposition des multibread imbriquer avec remise des liens
		foreach($tmp_bread as $key => $value_bread)
		{
			if($i_active == 1)
				$active = "active";
			//si il y a plus de un element dans le bread ça veux dire que je dois le décomposer pour en faire une seul

			if(count($value_bread) > 1)
			{
				$tmp_sub_value = "";
				foreach($value_bread as $key_2 => $value_bread_2)
				{
					if($value_bread_2 == "home")
						continue;
					$tmp_sub_value .= "/".$value_bread_2;
				}

				$tmp_sub_value = "<li class='".$active."'><a href='".$tmp_sub_value."'>".$key_2."</a></li>";

				$bread_final .= $tmp_sub_value;
			}
			else
				$bread_final = "<li class='".$active."'><a href='/".$value_bread[key($value_bread)]."'>".key($value_bread)."</a></li>";

			$i_active--;
		}


		$breadcrumb_top ="<ol class='breadcrumb'><li><a href='home'><span class='glyphicon glyphicon-home'></span></a></li>&nbsp;&nbsp;".$bread_final."</ol>";



		$this->assign_var("breadcrumb", $breadcrumb_top)->render_tpl();
	}

}
