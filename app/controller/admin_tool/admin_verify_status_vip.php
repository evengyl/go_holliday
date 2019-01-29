<?php 

Class admin_verify_status_vip extends base_module
{

	public function __construct(&$_app)
	{		
		$_app->module_name = __CLASS__;
		parent::__construct($_app);

		$list_user_vip = $this->get_list_users_vip();

		$this->check_status_vip();

		

		$this->get_html_tpl = $this->assign_var("list_user_vip", $list_user_vip)->render_tpl();
	}

	public function check_status_vip()
	{


		/*

			$req_sql = new stdClass;
			$req_sql->table = "annonces";
			$req_sql->ctx = new stdClass;
			$req_sql->ctx->active = "0";
			$req_sql->where = "id_utilisateurs = '".$this->_app->user->id."'";
			$res_sql = $this->_app->sql->update($req_sql);*/
	}

	public function get_list_users_vip()
	{
				$req_sql_get_all_user = new stdClass();
		$req_sql_get_all_user->table = ["utilisateurs"];
		$req_sql_get_all_user->var = ["id", "user_type", "name", "last_name", "tel", "date_fin_abonement"];
		$req_sql_get_all_user->where = ["user_type != $1", ["0"]];
		$res_sql = $this->_app->sql->select($req_sql_get_all_user);
		return $res_sql;
	}
}
