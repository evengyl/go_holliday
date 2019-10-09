<?
class var_processing
{
	public $table = "";
	public $table_join_on = "";


	public function set_var_chain($table, $var = false)
	{
		$chain_var = "";
		$multi_table_var = false;

		if(!$var)
			$chain_var .= "*";

		foreach($table as $row_table)
		{
			if(is_array($var))
			{
				if(isset($var[$row_table]) && $this->is_assoc($var))
				{
					foreach($var[$row_table] as $row_var_table)
						$chain_var .= $row_table.".".$row_var_table.", ";	

					$multi_table_var = true;
				}
				else if($var[0] == "*")
					$chain_var .= "*";
				else
				{
					foreach($var as $row_var)
						$chain_var .= $table[0].".".$row_var.", ";
					
					$multi_table_var = true;
				}
			}
			else{
				$chain_var .= $var;
			}
			
		}

		if($multi_table_var)
			$chain_var = substr($chain_var, 0, -2);

		return $chain_var;
	}

	public function set_var_trans_chain($var, $chain_var_or_not, $lang)
	{
		$array_lang = ["fr" => false, "en" => false, "nl" => false];
		$array_lang[$lang] = true;

		$chain_var_tr_tmp = "";

		if($chain_var_or_not)
			$chain_var_tr = ", ";
		else 
			$chain_var_tr = "";

		foreach($var as $table => $var_tr_table)
		{
			foreach($var_tr_table as $row)
			{
				$chain_var_tr .= $table.".".$row;

				foreach($array_lang as $lang => $value)
				{
					if($value)
						$chain_var_tr_tmp .= $chain_var_tr."_".$lang;
				}
			}
		}

		return $chain_var_tr_tmp;
	}

	public function is_assoc($arr)
	{
	    return array_keys($arr) !== range(0, count($arr) - 1);
	}
}