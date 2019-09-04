<?
//OneToOne
class habitat
{
	public function __construct()
	{
		$this->habitat_name_human = new NormalType("name_human");
		$this->habitat_name_sql = new NormalType("name_sql");
		

	}

}