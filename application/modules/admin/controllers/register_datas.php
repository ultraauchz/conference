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
		// 	$data["variable"]->where("org_id ".$this->current_user->org_id." ");
		 }
		 else if(@$_GET['org_id'] != '') 
		 {
		 //	$data["variable"]->where("org_id ".$this->current_user->org_id." ");
		 }		
		
		$data["variable"]->get_page();
		save_logs($this->menu_id, 'View', 0 , 'View Register Data ');
		$this->template->build("register_datas/index",$data);
	}

	public function form($id=false) {
		$data['menu_id'] = $this->menu_id;
		$data['modules_name'] = $this->modules_name;
		$data['current_user'] = $this->current_user;
		$data['perm'] = $this->perm;
		$data["value"] = new Register_data($id);
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
				$data->is_rest = $_POST['is_rest'];
				$data->hotel_id = $_POST['hotel_id'];
				$data->checkin_date = $checkin_date;
				$data->checkout_date = $checkout_date;			
				$data->food_type = $_POST['food_type'];
				$data->ip_address = $_SERVER['REMOTE_ADDR'];
				$data->rest_with = $_POST['rest_with'];
				if($_POST['id']==''){
					$data->register_date = date("Y-m-d H:i:s");
					$data->created_by = $this->current_user->id; 
				}else{
					$data->updated_by = $this->current_user->id;
				}
				$data->save();
				$action = $_POST['id'] > 0 ? 'UPDATE' : 'CREATE';
				save_logs($this->menu_id, $action, @$data->id , $action.' '.$data->firstname.' '.$data->lastname.' User Detail');
			}
		}
		redirect("admin/register_datas");
	}

	public function delete($id = null) {
		if($this->perm->can_delete == 'y'){
			if($id) {
				$data  = new User($id);
				$action = 'DELETE';
				save_logs($this->menu_id, $action, @$data->id , $action.' '.$data->firstname.' '.$data->lastname.' User Detail');
				$this->db->query("DELETE FROM acm_user WHERE id=".$id);
			}		
		}
		redirect('admin/settings/users');
	}
}
