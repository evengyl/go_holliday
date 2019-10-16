<?

class Model_annonce_sport
{
	public function __construct()
	{
		$this->id = new NormalType("id");
		$this->name_human = new NormalType("name_human");
		$this->name_sql = new NormalType("name_sql");
	}
}