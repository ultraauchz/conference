<?php
class Register extends Base_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		form();
	}
	
	public function form() {
		//$this->template->set_layout("default/index");
		$this->template->build("form");	
	}

	public function save($id=false) {
			if($_POST) {
				$data = new Register_data($id);
				$data->titulation_id = strip_tags($_POST["titulation_id"]);
				$data->titulation_other = strip_tags($_POST["titulation_other"]);
				$data->firstname = strip_tags($_POST["firstname"]);
				$data->lastname = strip_tags($_POST["lastname"]);
				$data->gender = strip_tags($_POST["gender"]);
				$data->position = strip_tags($_POST["position"]);
				$data->org_id = $_POST['org_id'];
				$data->org_other = strip_tags($_POST["org_other"]);
				$data->position = strip_tags($_POST['position']);
				$data->mobile_no = strip_tags($_POST["mobile_no"]);
				$data->email = strip_tags($_POST["email"]);
				$data->rest_type = $_POST['rest_type'];
				$data->food_type = $_POST['food_type'];
				if($data->rest_type =='y'){
					$data->hotel_id = $_POST['hotel_id'];
					$checkin_date = $_POST['checkin_year'].'-'.$_POST['checkin_month'].'-'.$_POST['checkin_day'];
					$data->checkin_date = $checkin_date;
					$checkout_date = $_POST['checkout_year'].'-'.$_POST['checkout_month'].'-'.$_POST['checkout_day'];
					$data->checkout_date = $checkout_date;	
					$data->rest_with = null;						
					//$data->rest_with = $_POST['rest_with'];
				}else{
					$data->hotel_id = null;
					$data->checkin_date = null;
					$data->checkout_date = null;
					$data->rest_with = null;
				}				
				if($_POST['id']==''){
					$data->ip_address = $_SERVER['REMOTE_ADDR'];
					$data->register_date = date("Y-m-d H:i:s");
					$data->creat_by = 0;
					$data->creat_date = date("Y-m-d H:i:s");
				}

				if($data->register_code == ''){
					$org = new Organization($_POST['org_id']);
					$register_code = $org->prefix_code.$org->sortorder;
					$sql = "select max(register_number)max_register_number from register_datas where org_id=".$_POST['org_id'];
					$max_register_number = $this->db->query($sql)->result();
					$max_register_number = @$max_register_number[0];
					$max_register_number = $max_register_number->max_register_number;
					$register_code .= str_pad(($max_register_number +1) ,2,"0",STR_PAD_LEFT);
					$data->register_code = $register_code;
					$data->register_number = $max_register_number +1;
				}
				$data->save();
				$action = 'CREATE';
				save_logs($this->menu_id, $action, @$data->id , $action.' '.$data->firstname.' '.$data->lastname.' User Detail');
			}
			redirect("register/success");
		}	
		
		public function success(){
			$this->template->build('success');
		}
		
		public function search_detail(){
			$data='';
			$this->template->build('search_detail',$data);
		}	
}
