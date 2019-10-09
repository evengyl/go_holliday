<?

class Model_annonce_avis
{
	public function __construct()
	{
		$this->id_annonce = new NormalType("id_annonce");
		$this->create_date = new NormalType("create_date");
		$this->user_name = new OneToOneType("utilisateurs", "name", "id_utilisateurs");
		$this->user_last_name = new OneToOneType("utilisateurs", "last_name", "id_utilisateurs");
		$this->message = new NormalType("message");
		$this->active = new NormalType("active");
		$this->star = new NormalType("star");
	}

}