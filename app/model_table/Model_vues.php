<?
//OneToMany
class Model_vues
{
	public function __construct()
	{
		$this->id = new NormalType("id");
		$this->sign_up = new NormalType("sign_up");
		$this->login = new NormalType("login");
		$this->login_success = new NormalType("login_success");
		$this->accueil = new NormalType("accueil");
		$this->contact_us = new NormalType("contact_us");
		$this->periode = new NormalType("periode");
	}
}