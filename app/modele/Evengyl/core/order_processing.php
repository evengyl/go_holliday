<?

Class order_processing
{
	public function set_order($order = "", $table)
	{
		$chain_order = "";
		if(!empty($order))
		{
			if(is_array($order))
			{
				foreach($order as $key => $ord)
					$chain_order = " ORDER BY ".$table.".".$ord;	
			}
			
		}

		return $chain_order;
	}
}