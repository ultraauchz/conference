<?php
/**
 * Permission Model
 */
class Permission extends ORM {
	
	var $table = "system_menu_permissions";
	
	var $has_one = array("user_types");
	
	function __construct($id=null) {
		parent::__construct($id);
	}
}
