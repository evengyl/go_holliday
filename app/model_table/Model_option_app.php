<?
//OneToOne
class Model_option_app
{
	public function __construct()
	{
		$this->id = new NormalType("id");
		$this->name = new NormalType("name");
		$this->value = new NormalType("value");
		$this->name_human_see = new NormalType("name_human");
		

	}

}