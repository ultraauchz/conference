<?php
class Prefixes extends Admin_Controller {
	
	function __construct() {
		parent::__construct();
		$this->menu_id = 25;
		$this->modules_name = 'prefixes';
		$this->user = user();
		$this->perm = current_user_permission($this->menu_id);
		if($this->perm->can_view!='y'){
			redirect("admin");
		}
	}

	public function index() {		
		 $data['menu_id'] = $this->menu_id;
		 $data['modules_name'] = $this->modules_name;
		 $data['no'] = (empty($_GET['page']))?0:($_GET['page']-1)*20;
	     $data['page'] = (empty($_GET['page']))? 1 : $_GET['page'];
		 $data['perm'] = $this->perm;
		 $data['current_user'] = $this->user;
		 $data["rs"] = new Prefix();
		 //if(@$_GET['search'] != '') $data["rs"]->where("  org_name LIKE '%".$_GET['search']."%' ");
		 //if($this->perm->can_access_all != 'y')
		 //{
		 	//$data["rs"]->where("  country_id = ".$this->user->organization->country_id." ");
		 //}
		 //else if(@$_GET['country_id'] != '') 
		 //{
			//$data["rs"]->where("  prefix_code = '".$_GET['prefix_code']."' ");
		 //}
		 if(@$_GET['prefix_code']!=''){		 
		 	$data["rs"]->where("  prefix_code = '".$_GET['prefix_code']."' ");
		 }
		 $data["rs"]->order_by("id","desc")->get_page();		 
		 save_logs($this->menu_id, 'View', 0 , 'View Prefixes ');
		 $this->template->build("prefixes/index",$data);
	}

	public function form($id=null) {
		 $data['menu_id'] = $this->menu_id;
		 $data['modules_name'] = $this->modules_name;
		 $data['perm'] = $this->perm;
		 $data['current_user'] = $this->user;
		 $data["rs"] = new Organization($id);
		 save_logs($this->menu_id, 'View', @$data['rs']->id , 'View Prefixes Detail '.@$data['rs']->prefix_name);
		 $this->template->build("prefixes/form",$data);
	}

	public function save($id=null) {
			if($_POST) {
				$data = new Prefix($id);
				if($_POST['id']==''){
					$_POST['created_by'] = $this->user->id; 
				}else{
					$_POST['updated_by'] = $this->user->id;
				}
				$data->from_array($_POST);
				$data->save();				
				$action = @$_POST['id'] > 0 ? 'UPDATE' : 'CREATE';
				save_logs($this->menu_id, $action, @$data->id , $action.' '.$data->org_name.' Prefixes ');
			}
		redirect("admin/settings/prefixes");
	}

	public function delete($id) {
			if($id) {
				$data = new Prefix($id);
				$action = 'DELETE';
				save_logs($this->menu_id, $action, @$data->id , $action.' '.$data->org_name.' Prefixes ');
				$data->delete();
			}
		redirect("admin/settings/prefixes");
	}
}