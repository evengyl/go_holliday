<?

class Model_pays
{
	public function __construct()
	{
		$this->id = new NormalType("id");
		$this->name_sql = new NormalType("name_sql");
		$this->name_human = new NormalType("name_human");
		$this->img = new NormalType("img");
		$this->text = new NormalType("text");
	}

}