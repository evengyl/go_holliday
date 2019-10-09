<?
Class parse_table_jointure
{
	public function set_jointure_chain($table = array(), $var = array())
	{
		$from_jointure = " FROM ".$table[0];


		$count_jointure = count($table)-1; //2
		$i = 1; //1
		$j = 0;

		while($count_jointure > 0)
		{
			$from_jointure .= " LEFT JOIN ";
			$from_jointure .= $table[$i]." ON ";


			$from_jointure .= $table[0].".id_".$table[$i]." = ".$table[$i].".id";

			$count_jointure--;			
			$i++;
			$j++;
		}

		return $from_jointure;
	}
}