<?

class OneToManyType
{

	public function __construct($table, $liaison)
	{
		$this->table = $table;
		$this->sql_liaison = $liaison;
	}

}