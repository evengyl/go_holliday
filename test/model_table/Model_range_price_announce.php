<?

class range_price_announce
{
	public function __construct()
	{
		$this->one_night = new NormalType("range_price_announce", "price_one_night", "");
		$this->week_end = new NormalType("range_price_announce", "price_week_end", "");
		$this->one_week = new NormalType("range_price_announce", "price_one_week", "");
	}
}