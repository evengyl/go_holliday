<?
class select extends all_query
{
	public $construct_requete_sql;
	public $req;
	public $stack_data;

	public $tmp_var_except;
	public $array_sql_many = [];

	public $chain_where;
	
	public function __construct($req_sql, $db_link)
	{

		$this->req = $req_sql;
		$this->primary_table = $this->req->table;


		//cas des many déjà fait
		if(!is_string($this->req->where))
		{
			$where_processing = new where($db_link);
			$this->chain_where = $where_processing->where_processing($this->req->table, (isset($this->req->where[0])?$this->req->where[0]:"1"), (isset($this->req->where[1])?$this->req->where[1]:""), (isset($this->req->where[2])?$this->req->where[2]:""));
		}


		$order_processing = new order_processing();
		$chain_order = $order_processing->set_order((isset($this->req->order))?$this->req->order:"", $this->req->table);


		$limit_processing = new limit_processing();
		$chain_limit = $limit_processing->set_limit((isset($this->req->limit))?$this->req->limit:"");



		//function principale du programme select
		$this->create_object($this->req->table);
		//va filtrer les var demandée dans le stack pour ne pas rendre les requete trop gourmande
		if($this->req->data != "*")
			$this->render_opti_stack_data();

		$this->construct_requete_sql = $this->construct_sql($this->stack_data[$this->primary_table]);

		$this->construct_requete_sql .= $this->chain_where;
		$this->construct_requete_sql .= " ".$chain_order;
		$this->construct_requete_sql .= " ".$chain_limit;
		return $this->construct_requete_sql;
			
	}


	private function render_opti_stack_data()
	{
		//liste des variable demandée dans l'objet de la requete
		$list_data_array = $this->multiexplode([',', ' ,', ', '], $this->req->data);

		//on for sur l'objet initial pour eliminer les var inutile de l'objet
		foreach($this->stack_data[$this->primary_table] as $var_name => $row_data)
		{
			if(!in_array($var_name, $list_data_array))//si initial n'est pas dans la liste des var demandée on unset dans initial
				unset($this->stack_data[$this->primary_table][$var_name]);

		}



		//prévoir de opti aussi sur le array_stack_sql, car sinon il vas d'office passer dessus en requete alors que l'on en a pas besoin
		//on for sur l'objet MANY pour eliminer les var inutile de l'objet
		if(!empty($this->array_sql_many))
		{
			foreach($this->array_sql_many as $var_name_model => $row_data)
			{
				if(!in_array($var_name_model, $list_data_array))//si initial n'est pas dans la liste des var demandée on unset dans initial
					unset($this->array_sql_many[$var_name_model]);
			}
		}

		//si on a plus de variable dans le stack c'est ou qu'il y a une erreur dans les var ou qu'il s'agit d'une execption
		if(count($this->stack_data[$this->primary_table]) == 0)
		{
			//on va vérifier si il ne s'agit pas d'une exception comme count ou autre
			foreach($list_data_array as $row_except)
			{
				$pos = strpos($row_except, "COUNT(");
				if($pos !== false)
					$this->tmp_var_except = $row_except;
			}

			if(empty($this->tmp_var_except))
				affiche("ERREUR DE VARIABLE DANS LA DERNIERE REQUETE");
		}


		
	}


	private function construct_sql($object_opti)
	{
		$select = [];
		$from = [];
		$where = "";
		$origin = "";

		
		foreach($object_opti as $name_var_in_model => $row_var)
		{
			if(isset($row_var["select_var_name"]))
				$select[] = $row_var["select_var_name"]." AS ".$name_var_in_model;

			if(isset($row_var["data"]))
			{
				foreach($row_var["data"] as $row_data)
					$select[] = $row_data;
			}

			if(isset($row_var["origin_table"]))
				$origin = $row_var["origin_table"];
			else
				$origin = $this->primary_table;


			if(!empty($row_var["sql_liaison"])){
				$from[] = "LEFT JOIN ".$row_var['table']." ON ".$row_var['table'].".id = ".$origin.".".$row_var["sql_liaison"];
			}

		}

		$from = array_unique($from);


		$str_select = "SELECT ";
		if(count($select) > 0)
		{
			foreach($select as $row_var_select)
				$str_select .= $row_var_select.", ";
			$str_select = substr($str_select, 0, -2);
		}
		else
			$str_select .= $this->tmp_var_except;
		


		$str_form = "FROM ".$this->primary_table." "; 
		foreach($from as $row_from)
		{
			$str_form .= $row_from." ";
		}

		return $str_select." ".$str_form;
	}



	private function multiexplode($delimiters,$string)
	{
   
	    $ready = str_replace($delimiters, $delimiters[0], $string);
	    $launch = explode($delimiters[0], $ready);
	    return  $launch;
	}


//var process

	private function create_object($table_name)
	{
		$for_folder = "Model_".$table_name;
		$table_obj = new $for_folder;

		
			//eliminer les var qui ne sont pas demander dans les model descendant a cause du data *


			if(!empty($this->stack_data))
			{
				$tmp = [];
				foreach($this->stack_data[$this->primary_table] as $name_var_in_model => $row_stack)
				{
					if(in_array($name_var_in_model, (array)$table_obj))
						$tmp[] = $table_obj->$name_var_in_model;
				}
				$table_obj = (object)$tmp;
			}




		foreach($table_obj as $name_var_in_model => $data_table)
		{
			$name_table = (isset($data_table->table)?$data_table->table:$table_name);
			if(!isset($this->stack_data[$this->primary_table][$name_var_in_model]))
			{

					$this->stack_data[$this->primary_table][$name_var_in_model]["table"] = $name_table;


					if(isset($data_table->var))
						$this->stack_data[$this->primary_table][$name_var_in_model]["select_var_name"] = $name_table.".".$data_table->var;
					

					if(isset($data_table->sql_liaison))
					{
						if(!isset($this->stack_data[$this->primary_table][$name_var_in_model]["sql_liaison"]))
							$this->stack_data[$this->primary_table][$name_var_in_model]["sql_liaison"] = $data_table->sql_liaison;
					}

					if(isset($data_table->second_where))
					{
						if(!isset($this->stack_data[$this->primary_table][$name_var_in_model]["second_where"]))
							$this->stack_data[$this->primary_table][$name_var_in_model]["second_where"] = $data_table->second_where;
					}


					if(isset($data_table->origin))
						$this->stack_data[$this->primary_table][$name_var_in_model]["origin_table"] = $data_table->origin;

					$type = get_class($data_table);
					$this->stack_data[$this->primary_table][$name_var_in_model]["type"] = $type;


					if($type == "OneToOneType")
						$this->stack_data[$this->primary_table][$name_var_in_model]["type"] = "TMP_OPERATE_OneToOne";

					else if($type == "OneToManyType")
						$this->stack_data[$this->primary_table][$name_var_in_model]["type"] = "TMP_OPERATE_OneToMany";

					else if($type == "ManyToManyType")
						$this->stack_data[$this->primary_table][$name_var_in_model]["type"] = "TMP_OPERATE_ManyToMany";

					else
						$this->stack_data[$this->primary_table][$name_var_in_model]["type"] = "NormalType";

			}



		}



		foreach($table_obj as $name_var_in_model => $data_table)
		{
			$name_table = (isset($data_table->table)?$data_table->table:$table_name);

			$type = $this->stack_data[$this->primary_table][$name_var_in_model]["type"];

			if($type == "TMP_OPERATE_OneToOne")
			{
				$this->OneToOne($name_table, $name_var_in_model);
			}

			if($type == "TMP_OPERATE_OneToMany")
			{
				$this->OneToMany($name_table, $name_var_in_model);
			}

			if($type == "TMP_OPERATE_ManyToMany")
			{
				$this->ManyToMany($name_var_in_model, $data_table);
			}
		}


	}

	public function ManyToMany($name_var_in_model, $data_table)
	{
		$this->array_sql_many[$name_var_in_model] = [
				"table"  => $data_table->table,
				"data" => "*",
				"second_where" => (!empty($data_table->second_where)?"WHERE ".$data_table->second_where." = ":"")
		];
	}


	public function OneToMany($name_table, $name_var_in_model)
	{
		$tmp_name_table = "Model_".$name_table;
		$this->stack_data[$this->primary_table][$name_var_in_model]["MULTI"] = get_object_vars(new $tmp_name_table);
		foreach($this->stack_data[$this->primary_table][$name_var_in_model]["MULTI"] as $key => $row)
		{
			$this->stack_data[$this->primary_table][$name_var_in_model]["data"][$key] = $name_table.".".$key;
		}
		$this->stack_data[$this->primary_table][$name_var_in_model]["type"] = "NoramlType";
		unset($this->stack_data[$this->primary_table][$name_var_in_model]["MULTI"]);

	}

	public function OneToOne($name_table, $name_var_in_model)
	{
		$this->stack_data[$this->primary_table][$name_var_in_model]["type"] = "NoramlType";
		$this->stack_data[$this->primary_table][$name_var_in_model]["table"] = $name_table;
		$this->create_object($name_table);
	}
}

?>
