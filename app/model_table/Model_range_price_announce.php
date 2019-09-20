<?

class Model_range_price_announce
{
	public function __construct()
	{
		$this->id = new NormalType("id");
		$this->price_one_night = new NormalType("price_one_night");
		$this->price_week_end = new NormalType("price_week_end");
		$this->price_one_week = new NormalType("price_one_week");
	}
}