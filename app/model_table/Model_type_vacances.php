<?

class Model_type_vacances
{
	public function __construct()
	{
		$this->id = new NormalType("id");
		$this->type_vacances_name_human = new NormalType("name_human");
		$this->type_vacances_name_sql = new NormalType("name_sql");
		$this->icon = new NormalType("icon");
		$this->url = new NormalType("url");
		$this->img = new NormalType("img");
		$this->title = new NormalType("title");
		$this->text = new NormalType("text");
	}
}