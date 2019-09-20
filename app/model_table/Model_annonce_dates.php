<?

class Model_annonce_dates
{
	public function __construct()
	{
		$this->id = new NormalType("id");
		$this->start_date = new NormalType("start_date");
		$this->end_date = new NormalType("end_date");
		$this->prix = new NormalType("prix");
		$this->state = new NormalType("state");
		$this->id_annonce = new NormalType("id_annonce");
	}

}