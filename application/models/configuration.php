<?php
class Configuration extends ORM {

	var $table = "configurations";
	
    function __construct($id = NULL)
	{
		parent::__construct($id);
    }
}