<?
Class lang_select
{
	public function auto_detect($_app)
	{
		$lang_navigateur = explode(',', $_SERVER["HTTP_ACCEPT_LANGUAGE"]);

		if($lang_navigateur[0] == "fr")
			$_SESSION['lang'] = 'fr';

		else if($lang_navigateur[0] == 'nl')
			$_SESSION['lang'] = 'nl';

		else
			$_SESSION['lang'] = 'en';

		$_app->lang = $_SESSION['lang'];
	}

	public function assign_lang($get_lang, &$_app)
	{
		$_app->lang = $get_lang;

		if(!empty($get_lang) && $get_lang != "auto_detect")
		{
			switch($get_lang)
			{
				case 'fr':
					$_SESSION['lang'] = 'fr';
					break;

				case 'en':
					$_SESSION['lang'] = 'en';
					break;

				case 'nl':
					$_SESSION['lang'] = 'nl';
					break;
			}
		}
	}
}
