<?php 

Class admin_edit_user extends base_module
{

	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);

		if(isset($_POST['id']))
		{
			$id_user = htmlentities((int)$_POST['id']);
			unset($_POST['id']);
			$verif_post = array();

			foreach($_POST as $key_post => $value_post)
			{
				$verif_post[$key_post] = htmlentities($value_post);
			}
			$req_sql = new stdClass();
			$req_sql->table = "login";
			$req_sql->ctx = new stdClass();
			$req_sql->ctx = $verif_post;
			$req_sql->where = "id = ".$id_user;

			if($this->sql->update($req_sql))
				$var_txt = '<p class="btn btn-primary btn-lg btn-block">Modification faite.</p>';	
			else
				$var_txt = '<p class="btn btn-danger btn-lg btn-block">Modification Ratée veuillez vérifier.</p>';	

			$res_sql_list_user = $this->get_list_user();
			$this->get_html_tpl = $this->assign_var('list_user', $res_sql_list_user)->assign_var('var_txt', $var_txt)->use_template('admin_list_user')->render_tpl();
		}
		else
		{
			if(isset($_GET['id'])){
				$id = htmlentities((int)$_GET['id']);
				$html_render_user_id_table = $this->sql->generate_form_unpdate('login', $id);
				$this->get_html_tpl = $this->assign_var('user', $html_render_user_id_table)->use_template('admin_edit_user')->render_tpl();
			}
			else{
				$res_sql_list_user = $this->get_list_user();
				$this->get_html_tpl = $this->assign_var('list_user', $res_sql_list_user)->use_template('admin_list_user')->render_tpl();
			}
		}
	}

	public function get_list_user()
	{
       	$req_sql = new StdClass();
       	$req_sql->table = "login";
       	$req_sql->var = "id, login, email, avertissement, password, level, password_no_hash, last_connect";
		$res_fx = $this->sql->select($req_sql);
		return $res_fx;
	}
}
