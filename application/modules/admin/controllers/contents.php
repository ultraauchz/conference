<?php
class Contents extends Admin_Controller {
	
	function __construct() {
		parent::__construct();
		$this->menu_id = 32;
		$this->perm = current_user_permission($this->menu_id);
		if($this->perm->can_view!='y'){
			redirect("admin");
		}
	}
	
	public function index() {
		$data['can_save'] = $this->perm->can_create;				
		save_logs($this->menu_id, 'View', $this->session->userdata("id"), ' View explanation ');
		$rs = new Content();
		$data['rs'] = $rs->where("slug","explanation")->get(1);
		$data['menu_id'] = $this->menu_id;
		$this->template->build("contents/form",$data);
	}
	
	public function save(){
		if($this->perm->can_create=='y'){
			$data = new Content();
			if($_POST['id']==''){
				$_POST['created_by'] = $this->current_user->id; 		
				$_POST['created'] = date("Y-m-d H:i:s");		
			}else{
				$_POST['updated_by'] = $this->current_user->id;
				$_POST['updated'] = date("Y-m-d H:i:s");
			}
			$data->from_array($_POST);
			$data->save();
			save_logs($this->menu_id, 'Update', $this->session->userdata("id"), ' Update Explanation ');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}
