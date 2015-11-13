<?php
class Menu extends ORM {

	var $table = "system_menus";

	// var $has_one = array();

	 var $has_many = array('system_logs');
	
	function __construct($id=null) {
		parent::__construct($id);
	}
}
