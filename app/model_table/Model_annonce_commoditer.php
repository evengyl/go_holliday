<?

class Model_annonce_commoditer
{
	public function __construct()
	{
		$this->id = new NormalType("id");
		$this->pet = new NormalType("pet");
		$this->parking = new NormalType("parking");
		$this->handicap = new NormalType("handicap");
		$this->max_personn = new NormalType("max_personn");
		$this->caution = new NormalType("caution");
	}
}