<?php
class Organization extends ORM {

	var $table = "organizations";
	
	//var $has_one = array('country');
	
	var $has_many = array(			
            'user' => array(			// in the code, we will refer to this relation by using the object name 'book'
            'class' => 'user',			// This relationship is with the model class 'book'
            'other_field' => 'org',		// in the Book model, this defines the array key used to identify this relationship
            'join_self_as' => 'org',		// foreign key in the (relationship)table identifying this models table. The column name would be 'author_id'
            'join_other_as' => 'id',		// foreign key in the (relationship)table identifying the other models table as defined by 'class'. The column name would be 'book_id'
            'join_table' => 'users'),
            'register_data' => array(			// in the code, we will refer to this relation by using the object name 'book'
            'class' => 'register_data',			// This relationship is with the model class 'book'
            'other_field' => 'org',		// in the Book model, this defines the array key used to identify this relationship
            'join_self_as' => 'org',		// foreign key in the (relationship)table identifying this models table. The column name would be 'author_id'
            'join_other_as' => 'id',		// foreign key in the (relationship)table identifying the other models table as defined by 'class'. The column name would be 'book_id'
            'join_table' => 'register_datas')         
	);
	
    function __construct($id = NULL)
	{
		parent::__construct($id);
    }
}