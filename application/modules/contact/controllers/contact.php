<?php
class Contact extends Base_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function contacts() {
		if($_POST) {
			$_POST["contact_ip"] = $_SERVER["REMOTE_ADDR"];
			
			$data = new Contact_Us();
			$data->from_array($_POST);
			$data->save();
		}
		
		if($data->id) {
			echo "ได้รับข้อความของคุณเรียบร้อย"; 
		}
	}
	
	public function index() {
		$this->template->build("index");	
	}
}