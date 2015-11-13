<?php
class System_Log extends ORM {

	var $table = "system_logs";
	public $has_one = array("user","system_menu");
	//public $has_many = array("menu");

    function __construct($id = NULL)
	{
		parent::__construct($id);
    }
	
}
