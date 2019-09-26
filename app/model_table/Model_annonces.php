<?

class Model_annonces
{
	public function __construct()
	{
		$this->id = new NormalType("id");
		$this->title = new NormalType("title");
		$this->sub_title = new NormalType("sub_title");
		$this->id_utilisateurs = new NormalType("id_utilisateurs");
		$this->id_type_vacances = new NormalType("id_type_vacances");
		$this->pays_name_human = new OneToOneType("annonce_pays", "name_human", "id_pays");
		$this->date_start_saison = new NormalType("start_saison");
		$this->date_end_saison = new NormalType("end_saison");
		

		$this->active = new NormalType("active");
		$this->user_validate = new NormalType("user_validate");
		$this->admin_validate = new NormalType("admin_validate");
		$this->create_date = new NormalType("create_date");
		$this->vues = new NormalType("vues");


		$this->habitat_name_human = new OneToOneType("annonce_habitat", "name_human", "id_habitat");
		$this->habitat_name_sql = new OneToOneType("annonce_habitat", "name_sql", "id_habitat");
		$this->habitat_img = new OneToOneType("annonce_habitat", "img", "id_habitat");
		$this->habitat_text = new OneToOneType("annonce_habitat", "text", "id_habitat");

		$this->sport = new ManyToManyType("annonce_sport", "id", "id");
		$this->activity = new ManyToManyType("annonce_activity", "id", "id");
		$this->text_sql_to_human = new ManyToManyType("text_sql_to_human", "", "");

		$this->address = new ManyToManyType("annonce_address", "id", $second_where = "id");
		$this->commoditer_announces = new OneToManyType("annonce_commoditer", "id");

		$this->private_message = new ManyToManyType($table = "private_message", $link_a_to_b = "id_utilisateurs", $second_where = "id_annonce");
		
		$this->date_annonces = new ManyToManyType($table = "annonce_dates", $link_a_to_b = "id_utilisateurs", $second_where = "id_annonce");


		$this->price = new OneToManyType("range_price_announce", "id");

		$this->id_user = new OneToOneType("utilisateurs", "id", "id_utilisateurs");
		$this->user_name = new OneToOneType("utilisateurs", "name", "id_utilisateurs");
		$this->user_last_name = new OneToOneType("utilisateurs", "last_name", "id_utilisateurs");
		$this->user_mail = new OneToOneType("utilisateurs", "mail", "id_utilisateurs");
	}
}