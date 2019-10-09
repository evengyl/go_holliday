<?
Class limit_processing
{
	public function set_limit($limit)
	{
		$chain_limit = "";

		if($limit != "")
			$chain_limit .= " LIMIT ".$limit;	

		return $chain_limit;
	}
}