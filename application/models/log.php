<?php
class Log extends ORM {

	public $table = "system_logs";

	public $has_one = array("users");

    function __construct($id = NULL)
	{
		parent::__construct($id);
    }
	
}
