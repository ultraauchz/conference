<?php
class Titulation extends ORM {

	var $table = "titulations";
	var $has_one = array("user","register_data");
    
    function __construct($id = NULL)
	{
		parent::__construct($id);
    }
}