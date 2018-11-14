<?php 

Class contact extends base_module
{
	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);

		$_app->navigation->set_breadcrumb("__TRANS_contact_us__");

		if(isset($_POST['return_post_contact']))
		{
			if($_POST['return_post_contact'] == 1 && $_POST['key_safe'] == 55157141)
			{
				$this->contact = new stdClass;
				$this->contact->user_infos = new stdClass;
				$this->contact->user_infos->mail = $_POST['email'];
				$this->contact->user_infos->content = $_POST['text'];

				$content = "L'adresse E-mail suivante : "
				.$this->contact->user_infos->mail." Vous à envoyé un message depuis le site FT Matedex <br> - '".
				$this->contact->user_infos->content."'";
				mail(Config::$mail, "Message de contact du site FT Matedex.", $content);
				$_SESSION['error_mail'] = "Votre message à bien été délivré";
			}
		}

		$this->get_html_tpl = $this->render_tpl();
	}

}


