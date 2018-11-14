<?php 

Class admin_push_bsd extends base_module
{

	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);

		$_app->navigation->_stack_nav[] = 'Push de la base de donnée';

		$rec = '../';


		//test de la version de la base et dans le fichier (compare voir quelle version est la plus récente)
		$req_sql = new stdClass();
		$req_sql->table = "_option";
		$req_sql->var = "value";
		$req_sql->where = "name = 'version'";
		$req_sql->limit ="1";
		$res_sql = $_app->sql->select($req_sql);


		$sql_content = file_get_contents($rec.Config::$base.".sql");

		//on récupère le numero de la version dans le fichier sql
		if(preg_match("/INSERT INTO `_option` VALUES \(1,'version',[(0-9)*]\);/", $sql_content, $match))
			$num_version = preg_replace(["/INSERT INTO `_option` VALUES \(1,'version',/", "/\);/"], "", $match);

		//on retravaille le versionning
		$num_version = intval($num_version[0]);
		$num_version++;
		$num_version = "INSERT INTO `_option` VALUES (1,'version',".$num_version.");";
		$sql_content = preg_replace("/INSERT INTO `_option` VALUES \(1,'version',[(0-9)*]\);/", $num_version, $sql_content);

		//si c'est bon on peux renvoyer la var dans le fichier
		if(preg_match("/INSERT INTO `_option` VALUES \(1,'version',[(0-9)*]\);/", $sql_content, $match))
		{
			$fp = fopen($rec.Config::$base.".sql", 'w');
			ftruncate($fp, 0);
			fwrite($fp, $sql_content);
			fclose($fp);
		}
		
		shell_exec("C:/xampp\mysql\bin\mysql --host=".Config::$hote." --user=".Config::$user." --password=".Config::$Mpass." ".Config::$base." < ".$rec.Config::$base.".sql");
		$value_return = 1;

		$this->get_html_tpl =  $this->assign_var("value",$value_return)->use_template("admin_action_ok")->render_tpl();
	}


}
