<?php 


Class base_module
{

	public $get_html_tpl;
	public $var_in_module;
	public $template_name;
	public $template_path;
	public $sql;
	public $_app;
	public $var_to_module;

	public $module_secondary = [];

	public function __construct(&$_app)
	{
		$this->_app = &$_app;
		$this->var_in_module["_app"] = $this->_app;

		$this->_app->module_for_exec[] = get_class($this);

	}

	public function render_tpl()
	{


		$this->set_template_path();

		ob_start();
		
			if(!empty($this->var_in_module))
				extract($this->var_in_module);
			
			require($this->template_path);

			$this->get_html_tpl = ob_get_contents();
			
			if(!empty($this->module_secondary))
			{
				foreach($this->module_secondary as $row_module_secondary)
				{
					$this->get_html_tpl .= $row_module_secondary."&nbsp;";	
				}
				
			}

		ob_end_clean();
	}

	public function use_template($template_name = "")
	{
		$this->template_name = $template_name;
		$this->set_template_path();
		return $this;
	}


	public function use_module($module_name = "")
	{
		$this->module_secondary[] = "__MOD_".$module_name."__";
		return $this;
	}



	public function set_template_path()
	{
		$final_path = '../vues/home.php';

		$this->template_name = end($this->_app->module_for_exec);


		if(strpos($this->template_name, "admin_") !== false)
			$final_path = '../vues/admin_tool/'.$this->template_name.'.php';

		else if(strpos($this->template_name, "sign_up") !== false)
			$final_path = '../vues/sign_up/'.$this->template_name.'.php';

		else if(strpos($this->template_name, "search") !== false)
			$final_path = '../vues/search/'.$this->template_name.'.php';
		else
			$final_path = '../vues/'.$this->template_name.'.php';	


		$this->template_path = $final_path;
	}

	public function assign_var($var_name , $value)
	{
    	$this->var_in_module[$var_name] = $value;
        return $this;
	}
}
