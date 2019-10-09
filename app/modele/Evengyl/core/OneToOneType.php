<?

class OneToOneType
{

	public function __construct($table, $var, $liaison)
	{
		
		$this->table = $table;
		$this->var = $var;
		$this->sql_liaison = $liaison;
		$class_origin = debug_backtrace()[1]['class'];
		$class_origin = substr($class_origin, 6);
		$this->origin = $class_origin;
	}

}