<?

class Model_private_message
{
	public function __construct()
	{
		$this->id = new NormalType("id");
		$this->id_utilisateurs = new NormalType("id_utilisateurs");
		$this->id_user_sender = new NormalType("id_user_sender");
		$this->id_annonce = new NormalType("id_annonce");
		$this->message = new NormalType("message");
		$this->send_date = new NormalType("send_date");
		$this->vu = new NormalType("vu");
		$this->answer = new NormalType("answer");
	}
}