<?

class Model_annonce_address
{
	public function __construct()
	{
		$this->id = new NormalType("id");
		$this->address_lieux_dit = new NormalType("address_lieux_dit");
		$this->address_rue = new NormalType("address_rue");
		$this->address_numero = new NormalType("address_numero");

		$this->address_localite = new NormalType("address_localite");
		$this->address_zip_code = new NormalType("address_zip_code");
	}
}