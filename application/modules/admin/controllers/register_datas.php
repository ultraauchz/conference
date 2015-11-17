<?php
class Register_datas extends Admin_Controller {

	function __construct() {
		parent::__construct();
		$this->menu_id = 29;
		$this->modules_name = 'register_datas';
		$this->current_user = user();
		$this->perm = current_user_permission($this->menu_id);
		if($this->perm->can_view!='y'){
			redirect("admin");
		}
	}

	public function index() {
		$data['menu_id'] = $this->menu_id;
		$data['modules_name'] = $this->modules_name;
		$data['current_user'] = $this->current_user;
		$data['perm'] = $this->perm;
		$data['no'] = (empty($_GET['page']))?0:($_GET['page']-1)*20;
		$data['page'] = (empty($_GET['page']))? 1 : $_GET['page'];
		
		$data["variable"] = new Register_data();
		//echo $data["variable"]->check_last_query();
		//if(@$_GET['search']!='')$data["variable"]->where("firstname LIKE '%".$_GET['search']."%' OR lastname LIKE '%".$_GET['search']."%' ");
		//if(@$_GET['org_id']>0)$data["variable"]->where("org_id = ".$_GET['org_id']);
		
		if($this->perm->can_access_all != 'y')
		 {
		 	$_GET['org_id'] = $this->current_user->org_id;
		 	$data["variable"]->where("org_id = ".$this->current_user->org_id." ");
		 }
		 else if(@$_GET['org_id'] != '') 
		 {
		 	$data["variable"]->where("org_id = ".$_GET['org_id']." ");
			$data["variable"]->get_page(100);
			$data['org'] = new Organization(@$_GET['org_id']);
			$sql = "select count(*)n_register_number from register_datas where org_id=".$_GET['org_id'];
			$n_register_number = $this->db->query($sql)->result();
			$n_register_number = @$n_register_number[0];
			$data['n_register_number'] = $n_register_number->n_register_number;
		}	
		save_logs($this->menu_id, 'View', 0 , 'View Register Data ');	
		$this->template->build("register_datas/index",$data);
	}

	public function form($id=false) {
		$data['menu_id'] = $this->menu_id;
		$data['modules_name'] = $this->modules_name;
		$data['current_user'] = $this->current_user;
		$data['perm'] = $this->perm;
		$data["value"] = new Register_data($id);
		if($id > 0){
			$data['checkin_day'] = substr($data['value']->checkin_date,8,2);
			$data['checkin_month'] = substr($data['value']->checkin_date,4,2);
			$data['checkin_year'] = substr($data['value']->checkin_date,0,4);
			
			$data['checkout_day'] = substr($data['value']->checkout_date,8,2);
			$data['checkout_month'] = substr($data['value']->checkout_date,4,2);
			$data['checkout_year'] = substr($data['value']->checkout_date,0,4);
		}		
		save_logs($this->menu_id, 'View', @$data['value']->id , 'View Register Data Detail');
		$this->template->build("register_datas/form",$data);
	}

	public function save($id=false) {
		if($this->perm->can_create =='y'){
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
					$data->rest_with = $_POST['rest_with'];
				}else{
					$data->hotel_id = null;
					$data->checkin_date = null;
					$data->checkout_date = null;
					$data->rest_with = null;
				}				
				if($_POST['id']==''){
					$data->ip_address = $_SERVER['REMOTE_ADDR'];
					$data->register_date = date("Y-m-d H:i:s");
					$data->creat_by = $this->current_user->id;
					$data->creat_date = date("Y-m-d H:i:s");
				}else{
					$data->updat_by = $this->current_user->id;
					$data->update_date = date("Y-m-d H:i:s");
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
				$action = $_POST['id'] > 0 ? 'UPDATE' : 'CREATE';
				save_logs($this->menu_id, $action, @$data->id , $action.' '.$data->firstname.' '.$data->lastname.' User Detail');
			}
		}
		redirect("admin/register_datas/index?org_id=".$_POST['org_id']);
	}

	public function delete($id = null) {
		$org_id = $current_user->org_id;
		if($this->perm->can_delete == 'y'){
			if($id) {
				$data  = new Register_data($id);
				if($data->firstname==''){
					$org_id = $data->org_id;
					$action = 'DELETE';
					save_logs($this->menu_id, $action, @$data->id , $action.' '.$data->register_code.' '.$data->firstname.' '.$data->lastname.' Register Data');
					$this->db->query("DELETE FROM register_datas WHERE id=".$id);
				}else{
					$data->titulation_id = null;
					$data->titulation_other = null;
					$data->firstname = null;
					$data->lastname = null;
					$data->gender = null;
					$data->position = null;				
					$data->org_other = null;
					$data->position = null;
					$data->mobile_no = null;
					$data->email = null;
					$data->rest_type = null;
					$data->food_type = null;
					$data->hotel_id = null;
					$data->checkin_date = null;
					$data->checkout_date = null;
					$data->rest_with = null;
					$data->ip_address = $_SERVER['REMOTE_ADDR'];
					$data->updat_by = $this->current_user->id;
					$data->update_date = date("Y-m-d H:i:s");
					$org_id = $data->org_id;
					$action = 'Clear';
					save_logs($this->menu_id, $action, @$data->id , $action.' '.$data->register_code.' '.$data->firstname.' '.$data->lastname.' Register Data');
					$data->save();
				}
			}
		}
		redirect('admin/register_datas/index?org_id='.$org_id);
	}

	public function ajax_rest_with_list(){
		$org_id = @$_POST['org_id'];
		$register_data_id = @$_POST['register_data_id'];
		$rest_with_id = @$_POST['rest_with_id'];
		$rest_list = new Register_data();
		$rest_list->where('org_id = '.$org_id);
		if($register_data_id>0){
			$rest_list->where(' id <> '.$register_data_id);
		}
		$select = '<select name="rest_with" class="form-control-other" style="padding-left:0px;">';
		$select.= '<option value="null" selected="selected">ไม่ระบุ</option>';
		$select.= $rest_with_id == '0' ? '<option value="0" selected="selected">พักคนเดียว</option>' : '<option value="0">พักคนเดียว</option>';
		foreach ($rest_list as $key => $value):
			$checked = $value->id==$rest_with_id ? 'checked="checked"' : '';
			$select.='<option value="'.$value->id.'" '.$selected.'>'.$value->titulation->titulation_title.$value->firstname.' '.$value->lastname.'</option>';
		endforeach;
		$select .='</select>';
		echo $select; 
	}
}
