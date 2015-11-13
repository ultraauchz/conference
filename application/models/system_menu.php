<?php
class System_menu extends ORM {

	var $table = "system_menus";
	public $has_one = array("system_log");
	
    function __construct($id = NULL)
	{
		parent::__construct($id);
    }
}