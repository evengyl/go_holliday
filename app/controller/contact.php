<?php 

Class contact extends base_module
{
	public $message_send_mail_contact_us = "";
	public $status_send_mail = 'form';

	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);
		$this->_app->add_view("contact_us");


		if(isset($_SESSION['rand_id_form_contact_us']) && isset($_POST['rand_id_form_contact_us']))
		{
			if($_SESSION['rand_id_form_contact_us'] == $_POST['rand_id_form_contact_us'])
			{
				$this->contact = new stdClass;
				$this->contact->user_infos = new stdClass;
				$this->contact->user_infos->uniq_id = $_POST['rand_id_form_contact_us'];
				$this->contact->user_infos->mail = $_POST['email'];
				$this->contact->user_infos->content = $_POST['text'];

				$subject = "Message de contact du site ".$this->_app->site_name." avec le l'identifiant unique ID : ".$this->contact->user_infos->uniq_id.".";

				$content = "L'adresse E-mail suivante : ".$this->contact->user_infos->mail." Vous à envoyé un message depuis le site ".$this->_app->site_name." : ".
				$this->contact->user_infos->content;

				if(mail(Config::$mail, $subject, $content))
				{
					$this->status_send_mail = 'sent';
					unset($_POST);
					$this->message_send_mail_contact_us = "Votre message à bien été délivré.";
				}
				else{
					$this->status_send_mail = 'error';
					$this->message_send_mail_contact_us = "Une erreur d'envoi avec le serveur est survenue veuillez ré-essayer plus tard.";	
				}
			}
			else{
				$this->status_send_mail = 'error';
				$this->message_send_mail_contact_us = "Vous ne pouvez envoyer que un seul message à la fois.";	
			}
		}
			
		//on génère un nombre aléatoire pour valider un form unique pour creation de compte Client
		$rand_id_form_contact_us = rand();
		$_SESSION['rand_id_form_contact_us'] = $rand_id_form_contact_us;	

		
		$this->assign_var('rand_id_form_contact_us',$rand_id_form_contact_us)
			->assign_var('status_send_mail', $this->status_send_mail)
			->assign_var("message_send_mail_contact_us", $this->message_send_mail_contact_us)
			->render_tpl();
	}

}


