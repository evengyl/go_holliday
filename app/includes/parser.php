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
			if(preg_match('/(?!<!--)__MOD_[a-z0-9_]+[(]*[\[]*[a-zA-Z0-9_éèçàê=<> \"\']*[\]]*[)]*__(?!-->)/', $page, $match))
				$page = $this->parse_module($match[0], $page);	
			else
			{
				if(preg_match('/(?!<!--)__MOD2_[a-z0-9_]+[(]*[\[]*[a-zA-Z0-9_éèçàê=<> \"\']*[\]]*[)]*__(?!-->)/', $page, $match))
					$page = $this->parse_module($match[0], $page);

				else
				{
					if(preg_match('/(?!<!--)__MOD3_[a-z0-9_]+[(]*[\[]*[a-zA-Z0-9_éèçàê=<> \"\']*[\]]*[)]*__(?!-->)/', $page, $match))
						$page = $this->parse_module($match[0], $page);
				}
			}
		}
		else
			$_SESSION['error'] = "Problem on Parser_main() parser function, not var page receive";
		
		return $page;
	}


	private function parse_module($match_module, $page)
	{
		$var_in_module_name = array();
		$this->_app->stack_module[] = $match_module;

		$module_name = trim(preg_replace(array('/__[MOD]*[0-9]*_/', '/[(\"]+[a-zA-Z0-9_éèçàê \']*[\")]+/',  '/__/', '[\(\[]', '[\]\)]', '[=>]'), '', $match_module));

		if(preg_match_all('/[(\"]+([a-zA-Z0-9_éèçàê \']*)[\")]+/', $match_module, $match_var))
			$var_in_module_name[$match_var[1][0]] = $match_var[1][0];
			
		if($module_name != "")
		{
			$this->_app->var_module = "";
			if(is_array($var_in_module_name))
				$this->_app->var_module = $var_in_module_name;

			//On test avec try catch la function test_module_exist pour vérifié que la class exist, si pas message d'exeption crée, si oui la classe est créée directement.
			//si l'expection est renvoyé, elle est catché par catch et renvoyer avec une erreur 204 au module error qui va les gérér	
			try{
				if(class_exists($module_name))
					$module = new $module_name($this->_app);
				else
					throw new Exception('Erreur Fatal reçue : Le module : <b>'.$module_name.'</b> N\'a pas été trouvé ou n\'existe pas, Veuiller controllez.');
			}
			catch(Exception $e){
				$module = new module_404($this->_app, $e->getMessage(), '204');
			}
			
			//get html tpl est dans le base module.
			$rendu_module =  $module->get_html_tpl;

			if($this->_app->option_app['view_tpl_name_in_source_code'] == '1')
				$rendu_module = "<!-- Début module : ".$module_name."-->".$row_rendu_module."<!-- Fin module : ".$module_name."-->";	
			
			$page = str_replace($match_module, $rendu_module, $page);	
		}
		else
		{
			$_SESSION['error'] = "Le module : '".$module_name. "' à été demander mais n'existe pas";
			return '';
		}

		return $this->parser_main($page);
	}
}
?>