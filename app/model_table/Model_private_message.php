<?

class Model_private_message
{
	public function __construct()
	{
		$this->id = new NormalType("id");
		$this->id_utilisateurs  = new NormalType("id_utilisateurs");
		$this->id_user_sender = new NormalType("id_user_sender");
		$this->id_group = new NormalType("id_group");
		$this->id_annonce = new NormalType("id_annonce");
		$this->message = new NormalType("message");
		$this->send_date = new NormalType("send_date");
		$this->time = new NormalType("time");
		$this->vu = new NormalType("vu");
		$this->vu_receiver = new NormalType("vu_receiver");
		$this->answer = new NormalType("answer");

		$this->name_sender = new OneToOneType("utilisateurs", "name", "id_user_sender");
		$this->last_name_sender = new OneToOneType("utilisateurs", "last_name", "id_user_sender");
		$this->name_announce = new OneToOneType("annonces", "title", "id_annonce");
	}
}