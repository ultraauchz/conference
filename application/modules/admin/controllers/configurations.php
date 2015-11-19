<?php
class Configurations extends Admin_Controller {
	
	function __construct() {
		parent::__construct();
		$this->menu_id = 34;
		$this->current_user = user();
		$this->perm = current_user_permission($this->menu_id);
		if($this->perm->can_view!='y'){
			redirect("admin");
		}
	}
	
	public function index() {
		$data['can_save'] = $this->perm->can_create;				
		save_logs($this->menu_id, 'View', $this->session->userdata("id"), ' View Configurations ');
		$rs = new Configuration(1);
		$data['rs'] = $rs;
		$data['menu_id'] = $this->menu_id;
		$this->template->build("configurations/form",$data);
	}
	
	public function save(){
		if($this->perm->can_create=='y'){
			$data = new Configuration();
			$data->public_status = @$_POST['public_status']=='' ? 'n' : $_POST['public_status'];
			$data->internal_status = @$_POST['internal_status']=='' ? 'n' : $_POST['internal_status'];
			if($_POST['id']==''){
				$_POST['created_by'] = $this->current_user->id; 		
				$_POST['created'] = date("Y-m-d H:i:s");		
			}else{
				$_POST['updated_by'] = $this->current_user->id;
				$_POST['updated'] = date("Y-m-d H:i:s");
			}
			$data->from_array($_POST);
			$data->save();
			save_logs($this->menu_id, 'Update', $this->session->userdata("id"), ' Update Configurations ');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}
