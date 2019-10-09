<?

class ManyToManyType
{

	public function __construct($table, $liaison, $second_where = "")
	{
		$this->table = $table;
		$this->sql_liaison = $liaison;
		$this->second_where = $second_where;
	}

}