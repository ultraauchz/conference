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
		$this -> template -> build("form");
	}

	public function save($id = false) {
		if ($_POST) {
			$sql = "select count(*)max_register_number from register_datas where firstname='" . trim(@$_POST['firstname']) . "' AND lastname='" . trim(@$_POST['lastname']) . "'";
			$max_register_number = $this -> db -> query($sql) -> result();
			$max_register_number = @$max_register_number[0];
			$max_register_number = $max_register_number -> max_register_number;
			if ($max_register_number > 0) {
				set_notify('error', 'ชื่อ - นามสกล ของคุณมีอยู่แล้วในระบบ');
				$this -> form();
			} else {

				$id = '';
				$data = new Register_data($id);
				$data -> register_type = 2;
				$data -> titulation_id = strip_tags($_POST["titulation_id"]);
				$data -> titulation_other = strip_tags($_POST["titulation_other"]);
				$data -> firstname = strip_tags(trim($_POST["firstname"]));
				$data -> lastname = strip_tags(trim($_POST["lastname"]));
				$data -> gender = strip_tags($_POST["gender"]);
				$data -> position = strip_tags($_POST["position"]);
				$data -> org_id = $_POST['org_id'];
				$data -> org_other = strip_tags($_POST["org_other"]);
				$data -> position = strip_tags($_POST['position']);
				$data -> mobile_no = strip_tags($_POST["mobile_no"]);
				$data -> email = strip_tags($_POST["email"]);
				$data -> rest_type = $_POST['rest_type'];
				$data -> food_type = $_POST['food_type'];
				if ($data -> rest_type == 'y') {
					$data -> hotel_id = $_POST['hotel_id'];
					$checkin_date = $_POST['checkin_year'] . '-' . $_POST['checkin_month'] . '-' . $_POST['checkin_day'].' '.$_POST['checkin_hour'].":".$_POST['checkin_minute'];
					$data -> checkin_date = $checkin_date;
					$checkout_date = $_POST['checkout_year'] . '-' . $_POST['checkout_month'] . '-' . $_POST['checkout_day'].' '.$_POST['checkout_hour'].":".$_POST['checkout_minute'];;
					$data -> checkout_date = $checkout_date;
					$data -> rest_with = null;
					//$data->rest_with = $_POST['rest_with'];
				} else {
					$data -> hotel_id = null;
					$data -> checkin_date = null;
					$data -> checkout_date = null;
					$data -> rest_with = null;
				}
				$data -> ip_address = $_SERVER['REMOTE_ADDR'];
				$data -> register_date = date("Y-m-d H:i:s");
				$data -> create_by = 0;
				$data -> create_date = date("Y-m-d H:i:s");

				if ($data -> register_code == '') {
					$register_code = $data -> rest_type == 'y' ? 'E02' : 'E01';
					$sql = "select max(register_number)max_register_number from register_datas where rest_type='" . $data -> rest_type . "' AND register_type = 2 ";
					$max_register_number = $this -> db -> query($sql) -> result();
					$max_register_number = @$max_register_number[0];
					$max_register_number = $max_register_number -> max_register_number;
					$register_code .= str_pad(($max_register_number + 1), 2, "0", STR_PAD_LEFT);
					$data -> register_code = $register_code;
					$data -> register_number = $max_register_number + 1;
				}
				$data -> save();
				$action = 'CREATE';
				save_logs($this -> menu_id, $action, @$data -> id, $action . ' ' . $data -> firstname . ' ' . $data -> lastname . ' Register Public');
				set_notify('success', 'ลงทะเบียนเสร็จเรียบร้อย');
				redirect("register/success");
			}
		}		
	}

	public function success() {
		$this -> template -> build('success');
	}

	public function search_detail() {
		$data = '';
		$this->template->append_metadata(js_notify());
		$this -> template -> build('search_detail', $data);
	}

	public function show_detail() {
		if ($_POST) {
			if (@$this -> session -> userdata("captcha") == $_POST['captcha']) {
				$sql = "select id from register_datas where firstname='" . trim(@$_POST['firstname']) . "' AND lastname='" . trim(@$_POST['lastname']) . "'";
				$register_id = $this -> db -> query($sql) -> result();
				$register_id = @$register_id[0];
				$register_id = $register_id -> id;
				if ($register_id > 0) {
					$data['value'] = new Register_data($register_id);
					if($data['value']->rest_type=='y'){
						$data['checkin_day'] = substr($data['value'] -> checkin_date, 8, 2);
						$data['checkin_month'] = substr($data['value'] -> checkin_date, 5, 2);
						$month_name = get_month_name(number_format($data['checkin_month'],0),'F');
						$data['checkin_month_name'] = $month_name;
						$data['checkin_year'] = substr($data['value'] -> checkin_date, 0, 4) + 543;
						$data['checkin_time'] = substr($data['value']->checkin_date,11,5);
	
						$data['checkout_day'] = substr($data['value'] -> checkout_date, 8, 2);
						$data['checkout_month'] = substr($data['value'] -> checkout_date, 5, 2);
						$month_name = get_month_name(number_format($data['checkout_month'],0),'F');
						$data['checkout_month_name'] = $month_name;
						$data['checkout_year'] = substr($data['value'] -> checkout_date, 0, 4) + 543;
						$data['checkout_time'] = substr($data['value']->checkout_date,11,5);
					}else{
						$data['checkin_day'] = '-';
						$data['checkin_month'] = '-';
						$data['checkin_month_name'] = '-';
						$data['checkin_year'] = '-';
						
						$data['checkout_day'] = '-';
						$data['checkout_month'] = '-';
						$data['checkout_month_name'] = '-';
						$data['checkout_year'] = '-';
					}
					$this -> load -> view('show_detail', $data);
				} else {
					set_notify('error', 'ไม่พบข้อมูลของคุณกรุณาลองใหม่อีกครั้ง');
					redirect('register/search_detail');
				}
			} else {
				set_notify('error', 'รหัสรูปภาพไม่ถูกต้อง');
				redirect('register/search_detail');
			}
		} else {
			set_notify('error', 'ไม่พบข้อมูลของคุณกรุณาลองใหม่อีกครั้ง');
			redirect('register/search_detail');
		}
	}

}
