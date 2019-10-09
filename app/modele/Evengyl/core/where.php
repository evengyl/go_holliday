<?
class where
{
	public $db_link = "";


	public function __construct($db_link)
	{
		$this->db_link = $db_link;
	}

	public function where_processing($table = array(), $columns, $var_array = array(), $other_condition_last = "")
	{
		$where_chain = " WHERE ";


		if($columns == "1")
			$where_chain .= "1";

		else if(preg_match_all('/([.a-z_]+[ ]*)([LIKE|IN|=<>!]*[ ]*)(\$[1-9]+[ ]*)(AND|OR[ ]*)*/', $columns, $matches))
		{
			unset($matches[0]);
			$matches = array_values($matches);

			$i = 0;

			$count_value = count($matches[0]);


			while($count_value > 0)
			{
				$first_for_table = true;
				$activate_like = false;
				$activate_in = false;

				foreach($matches as $key_matche => $matche)
				{
					$str_value = trim($matches[$key_matche][$i]);



					if($activate_like)
					{
						$where_chain .= "%".$str_value."% ";
						$activate_like = false;
						continue ;
					}


					if($activate_in)
					{
						$where_chain .= "(".$str_value.") ";
						$activate_in = false;
						continue ;
					}



					if($first_for_table)
					{
						//on va voir si la var que l'on désigne dans le where est déjà sous '.' 
						if(!strpos($str_value, "."))
							$where_chain .= $table.".";
					}

					$where_chain .= $str_value." ";

					//part spec affectation
					if($str_value == "LIKE")
						$activate_like = true;

					if($str_value == "IN")
						$activate_in = true;

					$first_for_table = false;
				}

				$i++;
				$count_value--;
			}
		}


		if(is_array($var_array))
		{
			foreach($var_array as $key_var => $row_var)
			{
				$tmp_key = $key_var +1;
				if(is_array($row_var))
				{

					foreach($row_var as $key => $row)
					{
						if(!is_numeric($row))
							$row_var[$key] = mysqli_real_escape_string($this->db_link, $row);
					}
					$row_var = implode("','",$row_var);
					$row_var = "'".$row_var."'";
				}
				else if(is_string($row_var))
				{
					$where_chain = str_replace("$".$tmp_key, "'$".$tmp_key."'", $where_chain);	

					//affiche($where_chain);
				}
				else
					$row_var = mysqli_real_escape_string($this->db_link, $row_var);

				$where_chain = str_replace("$".$tmp_key, $row_var, $where_chain);
			}
			//if like
			$where_chain = str_replace("%'", "A%", $where_chain);
			$where_chain = str_replace("'%", "B%", $where_chain);

			$where_chain = str_replace("A%", "'%", $where_chain);
			$where_chain = str_replace("B%", "%'", $where_chain);
		}

		if(!empty($other_condition_last))
			$where_chain .= $other_condition_last; 

		return $where_chain;
		
	}

}