<?

class navigation
{
	public $_stack_nav;

	public function __construct()
	{
		$this->_stack_nav = [];
	}

	public function set_breadcrumb($breadcrumb, $url_id = "") //recois un tableau contenant les trois langue et traduction des titre ou que __TRANS_tata__ si besoin de traduire en bsd
	{
		$i = count($this->_stack_nav);
		$i++;
		if(is_array($breadcrumb)){
			$this->_stack_nav[][] = $breadcrumb[$_SESSION['lang']];
		}
		else{
			$this->_stack_nav[$i][] = $breadcrumb;
			$this->_stack_nav[$i][] = $url_id;
		}
	}
}
