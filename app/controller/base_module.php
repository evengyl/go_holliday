<?php 


Class base_module
{

	public $get_html_tpl;
	public $var_to_extract;
	public $template_name;
	public $template_path;
	public $user;
	public $module_name;
	public $sql;
	public $_app;
	public $module_name_secondary;

	public function __construct(&$_app)
	{
		$this->_app = &$_app;
		$this->module_name = $this->_app->module_name;
	}

	public function assign_var($var_name , $value)
	{
		if(empty($var_name) && !empty($value))
			$this->var_to_extract[$value] = $value;

		else if(empty($value) && !empty($var_name))
			$this->var_to_extract[$var_name] = "";
		else		
        	$this->var_to_extract[$var_name] = $value;
        
        return $this;
	}

//partie setter du get_html_tpl


	public function render_tpl()
	{
		ob_start();
			if(!empty($this->var_to_extract))
				extract($this->var_to_extract);
			
			$this->set_template_path();	
			require($this->template_path);

		$get_html_tpl = ob_get_contents();
			
		if(!empty($this->module_name_secondary))
			$get_html_tpl = "__MOD_".$this->module_name_secondary."__";
			
		ob_end_clean();
		return $get_html_tpl;
	}

	public function use_template($template_name = "")
	{
		$this->template_name = $template_name;
		$this->set_template_path();
			
		return $this;
	}

	public function use_module($module_name_secondary = "")
	{
		$this->module_name_secondary = $module_name_secondary;
		return $this;
	}

	public function set_template_path()
	{
		if(empty($this->template_name))
			$this->template_name = $this->module_name;

		if(strpos($this->template_name, "admin_") !== false)
		{
			if(file_exists('../vues/admin_tool/'.$this->template_name.'.php'))
				$this->template_path = '../vues/admin_tool/'.$this->template_name.'.php';
		}
			
		else
		{
			if(file_exists('../vues/'.$this->template_name.'.php'))
				$this->template_path = '../vues/'.$this->template_name.'.php';
		}

	}

	public function check_post_login($text, $is_pseudo = 0)
	{
		$text = trim($text);
		$text = htmlentities($text);
		$nb_char = strlen($text);

		$caractere_min = ($is_pseudo)? 4 : 6;
		if($nb_char < $caractere_min)
			return 0;		
		else
			return $text;
	}
}