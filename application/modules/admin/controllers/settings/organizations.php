<?php
/**
 * Organizations Controller
 */
class Organizations extends Admin_Controller {
	
	function __construct() {
		parent::__construct();
		$this->menu_id = 5;
		$this->modules_name = 'organizations';
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
		 $data["rs"] = new Organization();
		 if(@$_GET['search'] != '') $data["rs"]->where("  org_name LIKE '%".$_GET['search']."%' ");
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
		 save_logs($this->menu_id, 'View', 0 , 'View Organizations ');
		 $this->template->build("organizations/index",$data);
	}

	public function form($id=null) {
		 $data['menu_id'] = $this->menu_id;
		 $data['modules_name'] = $this->modules_name;
		 $data['perm'] = $this->perm;
		 $data['current_user'] = $this->user;
		 $data["rs"] = new Organization($id);
		 save_logs($this->menu_id, 'View', @$data['rs']->id , 'View Organizations Detail '.@$data['rs']->org_name);
		 $this->template->build("organizations/form",$data);
	}

	public function save($id=null) {
			if($_POST) {
				$data = new Organization($id);				
				if($_POST['id']==''){
					$_POST['created_by'] = $this->user->id; 
				}else{
					$_POST['updated_by'] = $this->user->id;
				}
				$data->from_array($_POST);
				$data->show_rest = @$_POST['show_rest']==''? 'n' : $_POST['show_rest'];
				$data->show_public = @$_POST['show_public']==''? 'n' : $_POST['show_public'];
				$data->save();		
				$this->db->query("DELETE FROM hotels_organizations WHERE org_id=".$data->id);
				foreach($_POST['org_hotel'] as $key => $item)
				{
					if($item)
					{
						$hotel_org = new Hotel_organization();
						$hotel_org->hotel_id = $item;
						$hotel_org->org_id = $data->id;						
						$hotel_org->save();
					}
				}	
				$action = @$_POST['id'] > 0 ? 'UPDATE' : 'CREATE';
				save_logs($this->menu_id, $action, @$data->id , $action.' '.$data->org_name.' Organizations ');
			}
		redirect("admin/settings/organizations");
	}

	public function delete($id) {
			if($id) {				
				$data = new Organization($id);
				$this->db->query("DELETE FROM hotels_organizations WHERE org_id=".$data->id);
				$action = 'DELETE';
				save_logs($this->menu_id, $action, @$data->id , $action.' '.$data->org_name.' Organizations ');
				$data->delete();
			}
		redirect("admin/settings/organizations");
	}
}