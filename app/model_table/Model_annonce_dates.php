<?

class Model_annonce_dates
{
	public function __construct()
	{
		$this->id = new NormalType("id");
		$this->start_date = new NormalType("start_date");
		$this->end_date = new NormalType("end_date");
		$this->prix = new NormalType("prix");
		$this->state = new NormalType("state");
		$this->id_annonce = new NormalType("id_annonce");
		$this->id_utilisateurs = new NormalType("id_utilisateurs");
		$this->name_user = new OneToOneType("utilisateurs", "name", "id_utilisateurs");
		$this->last_name_user = new OneToOneType("utilisateurs", "last_name", "id_utilisateurs");
		$this->user_mail = new OneToOneType("utilisateurs", "mail", "id_utilisateurs");
		$this->title = new OneToOneType("annonces", "title", "id_annonce");
	}

}