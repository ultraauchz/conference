<?php
class Register_data extends ORM {
	var $table = "register_datas";
	var $has_one = array("organization","titulation","hotel");
	
	function __construct($id=null) {
		parent::__construct($id);
	}
}