<?php
##########################################
#	Createur : Evengyl
#	Date de creation : 29-09-2014
#	Version : 1.2
#	Date de modif : 12-11-2018
##########################################

class all_query extends _db_connect
{
	public $_app;

	public function __construct(&$_app)
	{
		//part for assign toute les req sql pour listing
		$this->_app = $_app;

		if(empty(parent::$base))
			parent::$base = $this->_app->base_dir;

		parent::__construct();
	}


	public function select($req_sql, $return_sql_prepare = 0)
	{
		if(empty($this->db_link))
			$this->set_db_link();

		//phase de test ORM
		$select = new select($req_sql, $this->db_link, $this->_app);
		$construct_requete_sql = $select->construct_requete_sql;

		$i = 0;
		while($row = parent::fetch_object($construct_requete_sql, $this->_app))
		{
			$res_fx[$i] = $row;
			$i++;
		}


		if($return_sql_prepare)
			$res_fx[] = $construct_requete_sql;
		else
			unset($construct_requete_sql); //vide le buffer de memoire $req_sql pour liberer de la place 	


		//si on a du manytomany
		if(!empty($select->array_sql_many))
		{
			//il faut boucles sur les many, ensuite sur les res_fx pour faire chaque requete une a une dans le foreach des res_fx et y stocker les res_fx_many, 
			//comme on sera dans la boucle des res on peux utiliser la liaison sql
			foreach($select->array_sql_many as $name_var_model => $row_many)
			{	
				if(!empty($res_fx))
				{
					foreach($res_fx as $row_first)
					{
						$row_many_tmp = $row_many;
						$row_many_tmp['where'] = (!empty($row_many_tmp['second_where'])?trim($row_many_tmp['second_where'].$row_first->id):"");
						$many_select = new select((object)$row_many_tmp, $this->db_link, $this->_app);

						$construct_requete_sql_to_many = $many_select->construct_requete_sql.$row_many_tmp['where'];

						$i = 0;
						while($row_many_tmp = parent::fetch_object($construct_requete_sql_to_many, $this->_app))
						{
							$res_fx_many[$i] = $row_many_tmp;
							$i++;
						}

						if(isset($res_fx_many))
						{
							$row_first->$name_var_model = $res_fx_many;
							unset($res_fx_many);
						}
					}
				}
			}
		}

		if(!isset($res_fx))
			return '';
		else 
			return $res_fx;
	}


	public function insert_into($req_sql, $view_sql_prepare = 0, $return_insert_id = 0) // opérationnel et fonctionnel , reste à tester sur la validation
	{
		$this->set_db_link();


		$columns = "";
		$values = "";

		foreach($req_sql->ctx as $nom_colonne => $valeur)
		{			
			$valeur = mysqli_real_escape_string($this->db_link, $valeur);

			if($nom_colonne == "id")
				$valeur = intval($valeur);

			$columns = $columns.', '.$nom_colonne;
			$values = $values.', "'.$valeur.'"';			
		}

		$columns = substr($columns,2);

		$values = substr($values,2);
		$req_sql = "INSERT INTO ".$req_sql->table." (".$columns.") VALUES (".$values.")";
		
		if($view_sql_prepare)
			affiche_pre($req_sql);

		parent::query($req_sql, $this->_app);

		if($return_insert_id)
			return parent::get_last_insert_id();

		unset($req_sql);

	}


	public function update($req_sql, $view_sql_prepare = 0)
	{
		$set_all = "";

		$this->set_db_link();

		

		foreach($req_sql->ctx as $key => $values)
		{
			$values = mysqli_real_escape_string($this->db_link, $values);

			if($key == "id")
				$values = intval($values);

			$set_all .= ', '.$key.' = "'.$values.'"';				
		}
	
		$set_all = substr($set_all,2);

		if(isset($req_sql->where))
		{				
			if($req_sql->where == "" OR $req_sql->where == " ")
				$req_sql = 'UPDATE '.$req_sql->table.' SET '.$set_all;
			else
				$req_sql = 'UPDATE '.$req_sql->table.' SET '.$set_all.' WHERE '.$req_sql->where;	
		}

		if($view_sql_prepare)
			var_dump($req_sql);

		$requete_win_lost = parent::query_update($req_sql, $this->_app);
		

		if($requete_win_lost > 0)
			return $erreur = 'modification bien appliquée';
		else
		{
			return false;
		}
		unset($req_sql);
        return $erreur = true;

	}


	public function delete_row($table, $where)
	{
		$req_sql = "DELETE FROM ".$table." WHERE ".$where;
		parent::query($req_sql, $this->_app);
	}

	public function delete($obj)
	{
		$construct_req = "";

		if(is_object($obj))
		{
			if(isset($obj->where) && $obj->where != "")
			{
				$construct_req = "DELETE FROM ".$obj->table ." WHERE ". $obj->where ."";	
				parent::query($construct_req, $this->_app);
			}
			else
				return 0;
		}
		else
			return 0;
	}




	public function other_query($req_sql)
	{
		if(isset($req_sql))
		{
			$i = 0;
			while($row = parent::fetch_object($req_sql, $this->_app))
			{
				$res_fx[$i] = $row;
				$i++;
			}
            if(isset($res_fx))
            {
                if(empty($res_fx))
                {
                    return $res_fx = NULL;
                }
                else
                {
                    return $res_fx;
                }
            }
            else
            {
                return $res_fx = NULL;
            }
		}
		else
		{
			return false;
		}
	}

	public function set_db_link()
	{
		$this->db_link = parent::get_db_link();
	}

    public function query_simple($query)
    {
        parent::query($query, $this->_app);
    }
}

?>