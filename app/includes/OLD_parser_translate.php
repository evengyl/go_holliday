<?php
class parser_translate
{
	public $_app;
	public $page;
	public $not_in_bsd = [];

	public function __construct(&$_app, $page)
	{
		$this->_app = &$_app;
		$this->page = $page;

		if($this->_app->option_app["translate_site"])
		{
			preg_match_all("/__TRANS_([a-zA-Z0-9_éèçàê]*)__/", $this->page, $matches);
			$this->_app->translate = array_unique($matches[0]);
			$res_translate = $this->get_translation();

			foreach($res_translate as $row_translate)
				$this->page = str_replace($row_translate->name_code, $row_translate->{"name_".$this->_app->lang}, $this->page);
		}

		$this->add_translation_to_bsd();
	}

	public function get_translation()
	{
		$res_fx = [];
		foreach($this->_app->translate as $row_translate)
		{
			$sql = new stdClass();
			$sql->table = "translate";
			$sql->data = "id", "name_code";
			$sql->var_translate = ["translate" => ["name"]];
			$sql->where = ["name_code = $1", [$row_translate]];
			$res_sql = $this->_app->sql->select($sql);

			if(!empty($res_sql))
				$res_fx[] = $res_sql[0];
			else
			{
				$this->not_in_bsd[] = $row_translate;
				$this->page = str_replace($row_translate, "<b style='color:red; font-size:110%;'>".$row_translate."</b>", $this->page);
			}
		}
		return $res_fx;
	}

	private function add_translation_to_bsd()
	{
		if(!empty($this->not_in_bsd))
		{
			foreach($this->not_in_bsd as $row_to_bsd)
			{
				$sql_add_translate = new stdClass();
				$sql_add_translate->table = "translate";
				$sql_add_translate->ctx = new stdClass();
				$sql_add_translate->ctx->name_code = $row_to_bsd;
				$this->_app->sql->insert_into($sql_add_translate);	
			}
			
		}
	}
}
?>