<?php
class Hotel_organization extends ORM {

	var $table = "hotels_organizations";
	
    function __construct($id = NULL)
	{
		parent::__construct($id);
    }
}