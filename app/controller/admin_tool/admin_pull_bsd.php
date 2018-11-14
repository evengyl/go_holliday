<?php 

Class admin_pull_bsd extends base_module
{

	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);
		$_app->navigation->set_breadcrumb('Pull de la base de donnée', 'pull_bsd');
		$txt = "";

		if(strstr(php_uname(), 'Windows'))
		{
			$rec = '../';
			shell_exec("C:/xampp\mysql\bin\mysqldump --host=".Config::$hote." --user=".Config::$user." --password=".Config::$Mpass." ".Config::$base." > ".$rec.Config::$base.".sql");
		}
		elseif(strstr(php_uname(), "Linux"))
		{
			$rec = '/var/www/framework_evengyl/';
			shell_exec("mysqldump --host=".Config::$hote." --user=".Config::$user." --password=".Config::$Mpass." ".Config::$base." > ".$rec.Config::$base.".sql");
		}

		if($dossier = opendir($_app->base_path))
		{
			while(false !== ($fichier = readdir($dossier)))
			{
				if($fichier == Config::$base.".sql")
				{
					similar_text((date("d-m-Y H\hi", filemtime($_app->base_path."/".Config::$base.".sql"))), date("d-m-Y H\hi", time()), $percent);

					if((int)$percent >= 95)
					{
						$txt = "La base de donnée à bien été enregistrée le : ".date("d-m-Y H\hi", time());
						break;
					}
				}
				else
					$txt = "le fichier à été mal créé";
			}
		}
		else
			$txt = "le dossier n'existe pas";

		$this->get_html_tpl =  $this->assign_var('reponse', $txt)->render_tpl();
	}


}
