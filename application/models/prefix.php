<?php
class Prefix extends ORM {

	var $table = "code_prefixes";
	
    function __construct($id = NULL)
	{
		parent::__construct($id);
    }
}