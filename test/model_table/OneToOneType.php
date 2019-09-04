<?

class OneToOneType
{

	public function __construct($table, $var, $liaison)
	{
		
		$this->table = $table;
		$this->var = $var;
		$this->sql_liaison = $liaison;
		
	}

}