<?

class Model_utilisateur_preference
{
	public function __construct()
	{
		$this->id = new NormalType("id");
		$this->see_phone = new NormalType("see_phone");
		$this->see_mail = new NormalType("see_mail");
	}

}