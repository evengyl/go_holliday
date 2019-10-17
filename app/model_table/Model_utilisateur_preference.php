<?

class Model_utilisateur_preference
{
	public function __construct()
	{
		$this->id = new NormalType("id");
		$this->name_sql = new NormalType("name_sql");
		$this->name_human = new NormalType("name_human");
	}

}