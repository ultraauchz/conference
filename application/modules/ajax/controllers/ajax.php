<?php
class Ajax extends Base_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	
	public function get_public_rest_type_layout() {
		$org_id = @$_POST['org_id'];
		$register_id = @$_POST['register_id'];
		$org = new Organization($org_id);
		echo $org->org_type_id;
	}
}