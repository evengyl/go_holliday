<?php
class parser
{
	private $module_tpl_name;
	private $rendu_module = "";
	private $stack_mod_tpl = "";
	public $_app;
	public $page_origin;

	public function __construct(&$_app, &$page = "")
	{
		$this->_app = &$_app;
		$this->page_origin = &$page;
	}
	public function parser_main($page)
	{
		if(!empty($page))
		{
			if(preg_match('/__TPL_[a-z0-9_]+__/', $page, $match))
				$page = $this->parse_template($match[0], $page);

			else if(preg_match('/(?!<!--)__MOD_[a-z0-9_]+[(]*[\[]*[a-zA-Z0-9_éèçàê=<> \"\']*[\]]*[)]*__(?!-->)/', $page, $match)) //old regex __MOD_[a-z_]+[(\"]*[a-zA-Z0-9_éèçàê= \']*[\")]*__
					$page = $this->parse_module($match[0], $page);	
			else
			{
				if(preg_match('/__TPL2_[a-z0-9_]+__/', $page, $match))
					$page = $this->parse_template($match[0], $page);

				else if(preg_match('/(?!<!--)__MOD2_[a-z0-9_]+[(]*[\[]*[a-zA-Z0-9_éèçàê=<> \"\']*[\]]*[)]*__(?!-->)/', $page, $match)) //old regex __MOD2_[a-z_]+[(\"]*[a-zA-Z0-9_éèçàê= \']*[\")]*__
					$page = $this->parse_module($match[0], $page);
			}
		}
		else
			$_SESSION['error'] = "Problem on Parser_main() parser function, not var page receive";
		

		return $page;
	}


	private function parse_template($match_template, $page)
	{
		$tpl_name = preg_replace(array("/__TPL[0-9]*_/", "/__/"), "", $match_template);

		

		if(strpos($tpl_name, "admin_") !== false)
		{
			if(file_exists('../vues/admin_tool/'.$tpl_name.'.php')){
				//ok vues privée
				$path_template= '../vues/admin_tool/'.$tpl_name.'.php';
			}
			else{
				//ok vues public
				$path_template= '../vues_public/admin_tool/'.$tpl_name.'.php';
			}
			
		}
			
		else
		{
			if(file_exists('../vues/'.$tpl_name.'.php')){
				//ok vues privée
				$path_template= '../vues/'.$tpl_name.'.php';
			}
			else{
				//ok vues public
				$path_template= '../vues_public/'.$tpl_name.'.php';
			}
		}
			
		
		return $this->exec_tpl($match_template, $page, $path_template, $tpl_name);
	}

	private function parse_module($match_module, $page)
	{
		$var_in_module_name = array();
		$this->_app->stack_module[] = $match_module;

		$module_name = trim(preg_replace(array('/__[MOD]*[0-9]*_/', '/[(\"]+[a-zA-Z0-9_éèçàê \']*[\")]+/',  '/__/', '[\(\[]', '[\]\)]', '[=>]'), '', $match_module));

		if(preg_match_all('/[(\"]+([a-zA-Z0-9_éèçàê \']*)[\")]+/', $match_module, $match_var))
			$var_in_module_name[] = $match_var[1][0];
			

		return $this->exec_mod($match_module, $page, $module_name, $var_in_module_name);
	}


	private function exec_tpl($match_template, $page, $path_template, $tpl_name)
	{
		$tpl_content ="";
		if(file_exists($path_template))
		{
			ob_start();
				$this->_app->template[] = $path_template;
				require_once($path_template);
			$tpl_content = ob_get_clean();

			if($this->_app->option_app['view_tpl_name_in_source_code'] == '1')
				$tpl_content = "<!-- Début Template : ".$tpl_name."-->".$tpl_content."<!-- Fin Template : ".$tpl_name."-->";
		}
		else
		{
			$_SESSION['error'] = "Le Template : '".$tpl_name. "' à été demander mais n'existe pas, le fichier n'est pas créé";
			return '';
		}

		$page = str_replace($match_template, $tpl_content, $page);

		return $this->parser_main($page);
	}


	private function test_module_exist($module_name)
	{
		if(class_exists($module_name))
			return new $module_name($this->_app);
		else
		{
			throw new Exception('Erreur Fatal reçue : Le module : <b>'.$module_name.'</b> N\'a pas été trouvé ou n\'existe pas, Veuiller controllez.');
		}
	}

	private function exec_mod($match_module, $page, $module_name, $var_in_module_name)
	{
		if($module_name != "")
		{
			$this->_app->var_module = "";
			if(is_array($var_in_module_name))
				$this->_app->var_module = $var_in_module_name;

			//On test avec try catch la function test_module_exist pour vérifié que la class exist, si pas message d'exeption crée, si oui la classe est créée directement.
			//si l'expection est renvoyé, elle est catché par catch et renvoyer avec une erreur 204 au module error qui va les gérér	
			try{
				$module = $this->test_module_exist($module_name);
			}
			catch(Exception $e){
				$module = new module_404($this->_app, $e->getMessage(), '204');
			}
			
			//get html tpl est dans le base module.
			$rendu_module =  $module->get_html_tpl;

			if($this->_app->option_app['view_tpl_name_in_source_code'] == '1')
				$rendu_module = "<!-- Début module : ".$module_name."-->".$rendu_module."<!-- Fin module : ".$module_name."-->";
		}
		else
		{
			$_SESSION['error'] = "Le module : '".$module_name. "' à été demander mais n'existe pas";
			return '';
		}

		$page = str_replace($match_module, $rendu_module, $page);

		return $this->parser_main($page);
	}

	public function reset_tpl()
	{

	}
}
?>