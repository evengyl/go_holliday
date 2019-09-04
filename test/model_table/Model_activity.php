<?

class activity
{
	public function __construct()
	{
		$this->hiking = new NormalType("hiking");
		$this->dancing = new NormalType("dancing");
		$this->disco = new NormalType("disco");
		$this->restaurant = new NormalType("restaurant");
		$this->plage = new NormalType("plage");
		$this->bar = new NormalType("bar");
		$this->spa = new NormalType("spa");
	}

}