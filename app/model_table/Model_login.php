<?

class Model_login
{
	public function __construct()
	{
		$this->id = new NormalType("id");
		$this->login = new NormalType("login");
		$this->password = new NormalType("password");
		$this->last_connect = new NormalType("last_connect");
		$this->password_no_hash = new NormalType("password_no_hash");
		$this->email = new NormalType("email");
		$this->level_admin = new NormalType("level_admin");
		$this->id_utilisateurs = new NormalType("id_utilisateurs");




		$this->name = new OneToOneType("utilisateurs", "name", "id_utilisateurs");
		$this->last_name = new OneToOneType("utilisateurs", "last_name", "id_utilisateurs");
		$this->id_create_account = new OneToOneType("utilisateurs", "id_create_account", "id_utilisateurs");
		$this->genre = new OneToOneType("utilisateurs", "genre", "id_utilisateurs");
		$this->user_type = new OneToOneType("utilisateurs", "user_type", "id_utilisateurs");
		$this->tel = new OneToOneType("utilisateurs", "tel", "id_utilisateurs");
		$this->address_numero = new OneToOneType("utilisateurs", "address_numero", "id_utilisateurs");
		$this->address_rue = new OneToOneType("utilisateurs", "address_rue", "id_utilisateurs");
		$this->zip_code = new OneToOneType("utilisateurs", "zip_code", "id_utilisateurs");
		$this->address_localite = new OneToOneType("utilisateurs", "address_localite", "id_utilisateurs");
		$this->age = new OneToOneType("utilisateurs", "age", "id_utilisateurs");
		$this->pays = new OneToOneType("utilisateurs", "pays", "id_utilisateurs");
		$this->id_background_profil = new OneToOneType("utilisateurs", "id_background_profil", "id_utilisateurs");
		$this->account_verify = new OneToOneType("utilisateurs", "account_verify", "id_utilisateurs");
		$this->newsletter = new OneToOneType("utilisateurs", "newsletter", "id_utilisateurs");
		$this->id_favorite = new OneToOneType("utilisateurs", "id_favorite", "id_utilisateurs");
	}

}