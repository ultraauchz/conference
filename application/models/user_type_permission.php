<?php
/**
 * User_Type Model
 */
class User_Type_Permission extends ORM {
	
	var $table = "user_type_permissions";

	var $has_many = array("user_type","user");
	
	function __construct($id=null) {
		parent::__construct($id);
	}
}
