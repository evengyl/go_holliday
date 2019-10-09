<?

class select extends all_query
{
	public $construct_requete_sql = "";
	public $is_var_translate = false;
	public $db_link = "";

	private $var_processing;
	private $from_processing;
	private $where_processing;
	private $order_processing;
	private $limit_processing;

	
	public function __construct($req_sql, $db_link)
	{
		$this->db_link = $db_link;

		$this->var_processing = new var_processing();
		$this->from_processing = new parse_table_jointure();
		$this->where_processing = new where($this->db_link);
		$this->order_processing = new order_processing();
		$this->limit_processing = new limit_processing();

		if(is_object($req_sql))
		{
			if(is_array($req_sql->table))
				$this->construct_requete_sql = $this->select_($req_sql);
		}
	}

	public function select_($req_sql)
	{
		$construct_req = "SELECT ";
		$chain_var = "";
		$chain_var_trans = "";
		$chain_jointure = "";
		$chain_where = "";
		$chain_order = "";
		$chain_limit = "";

		$chain_var = $this->var_processing->set_var_chain($req_sql->table, (isset($req_sql->var)?$req_sql->var:""));
		if(isset($req_sql->var_translate))
			$chain_var_trans = $this->var_processing->set_var_trans_chain(
						$req_sql->var_translate, 
						(!empty($chain_var)?true:false), 
						(isset($_SESSION['lang'])?$_SESSION['lang']:"")
					);
		

		$chain_jointure = $this->from_processing->set_jointure_chain($req_sql->table, (isset($req_sql->var)?$req_sql->var:""));


		$chain_where = $this->where_processing->where_processing($req_sql->table, (isset($req_sql->where[0])?$req_sql->where[0]:"1"), (isset($req_sql->where[1])?$req_sql->where[1]:""), (isset($req_sql->where[2])?$req_sql->where[2]:""));

		$chain_order = $this->order_processing->set_order((isset($req_sql->order))?$req_sql->order:"", $req_sql->table[0]);

		$chain_limit = $this->limit_processing->set_limit((isset($req_sql->limit))?$req_sql->limit:"");



		$construct_req .= $chain_var.$chain_var_trans.$chain_jointure.$chain_where.$chain_order.$chain_limit;
		return $construct_req;
	}
}

/* DOCUMENTATION DU SELECT

TABLE
		1	$sql->table = ["table_1"]
	OR
		2	$sql->table = ["table_1", "table_2", "table_3"]

VAR 
		1	$sql->var = ["id", "var_1", "var_2"]
	OR
		2	$sql->var = [
							"table_1" => ["id", "var_1", "var_2"]
							"table_2" => ["id_table_1_join", "id", "var_1", "var_2"]
							"table_3" => ["id_table_2_join", "id", "var_1", "var_2"]
						]
	OR 
		3 	$sql->var = ['*']

VAR_TRANSLATE
		1	$sql->var_translate = ["table" => ["var_translate_without_fr_rn_nl"]];

WHERE
		1	$sql->where = "var = 'tata'"
	OR
		2	$sql->where = "var_table_1 = 'tata'"
	OR
		3   $sql->where = ["var_table_1 = 'tata'", "OR/AND", "var2_table_1 = 'tata'"] //attention que le symbole OR ou AND doit toujours être placé en position pair
	OR
		4 	$sql->where = ["var_table_1", "LIKE NOT LIKE", "tata"] //attention que le symbole LIKE/NOT LIKE doit toujours être placé en position pair

ORDER
		1	$sql->order = ["var" => "DESC/ASC"]

LIMIT
		1   $sql->limit = "number_limit"

*/