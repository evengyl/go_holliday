<?
Class test extends base_module
{

	public function __construct(&$_app, $OtherClass = 0)
	{
		parent::__construct($_app);

		if($OtherClass == 1)
			$_app->stack_module[] = "__MOD_".__CLASS__."__";
	}

}