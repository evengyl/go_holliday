<?

class annonces
{
	public function __construct()
	{
		$this->title = new NormalType("title");
		$this->sub_title = new NormalType("sub_title");
		$this->id_type_vacances = new NormalType("id_type_vacances");

		$this->habitat_name_human = new OneToOneType("habitat", "name_human", "id_habitat");
		$this->habitat_name_sql = new OneToOneType("habitat", "name_sql", "id_habitat");

		$this->sport = new OneToManyType("sport", "id");
		$this->activity = new OneToManyType("activity", "id");

		$this->annonce_address = new OneToManyType("annonce_address", "id");
		$this->commoditer_announces = new OneToManyType("commoditer_announces", "id");
	}
}