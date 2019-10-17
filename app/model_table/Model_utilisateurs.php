<?

class Model_utilisateurs
{
	public function __construct()
	{
		$this->id = new NormalType("id");
		$this->name = new NormalType("name");
		$this->last_name = new NormalType("last_name");
		$this->mail = new NormalType("mail");
		$this->age = new NormalType("age");
		$this->tel = new NormalType("tel");
		$this->address_rue = new NormalType("address_rue");
		$this->address_numero = new NormalType("address_numero");
		$this->address_localite = new NormalType("address_localite");
		$this->zip_code = new NormalType("zip_code");
		$this->pays = new NormalType("pays");
		$this->genre = new NormalType("genre");
		$this->user_type = new NormalType("user_type");
		$this->id_background_profil = new NormalType("id_background_profil");
		$this->account_verify = new NormalType("account_verify");
		$this->id_create_account = new NormalType("id_create_account");
		$this->newsletter = new NormalType("newsletter");
		$this->id_favorite = new NormalType("id_favorite");
		$this->date_create = new NormalType("date_create");
		$this->id_preference = new NormalType("id_preference");
	}

}