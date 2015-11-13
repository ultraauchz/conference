<?php
/**
 * User Model
 */
class User extends ORM {
	
	var $table = "users";
	var $has_one = array("organization","user_type");
	var $has_many = array("log","system_log");

	function __construct($id=null) {
		parent::__construct($id);
	}
}