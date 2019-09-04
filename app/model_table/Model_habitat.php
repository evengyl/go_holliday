<?
//OneToOne
class Model_habitat
{
	public function __construct()
	{
		$this->id = new NormalType("id");
		$this->habitat_name_human = new NormalType("name_human");
		$this->habitat_name_sql = new NormalType("name_sql");
		$this->habitat_img = new NormalType("img");
		$this->habitat_text = new NormalType("text");

		

	}

}