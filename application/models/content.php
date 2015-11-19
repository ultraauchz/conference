<?php
/*
 * Content Model
 */
class Content extends ORM {

	var $table = "contents";
	
    function __construct($id = NULL)
	{
		parent::__construct($id);
		// if($this->id!=true) {
			// $this->where("web_type_id",1);
		// }
    }
}