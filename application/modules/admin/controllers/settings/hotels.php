<?php
class Hotels extends Admin_Controller {
	
	function __construct() {
		parent::__construct();
		$this->menu_id = 33;
		$this->modules_name = 'hotels';
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
		 $data["rs"] = new Hotel();
		 if(@$_GET['search'] != '') $data["rs"]->where("  hotel_name LIKE '%".$_GET['search']."%' ");
		 $data["rs"]->order_by("id","desc")->get_page();		 
		 save_logs($this->menu_id, 'View', 0 , 'View Hotels ');
		 $this->template->build("hotels/index",$data);
	}

	public function form($id=null) {
		 $data['menu_id'] = $this->menu_id;
		 $data['modules_name'] = $this->modules_name;
		 $data['perm'] = $this->perm;
		 $data['current_user'] = $this->user;
		 $data["rs"] = new Hotel($id);
		 save_logs($this->menu_id, 'View', @$data['rs']->id , 'View Hotel Detail '.@$data['rs']->hotel_name);
		 $this->template->build("hotels/form",$data);
	}

	public function save($id=null) {
			if($_POST) {
				$data = new Hotel($id);
				if($id ==''){
					$_POST['created_by'] = $this->user->id; 
				}else{
					$_POST['updated_by'] = $this->user->id;
				}
				$data->from_array($_POST);
				$data->save();				
				$action = @$_POST['id'] > 0 ? 'UPDATE' : 'CREATE';
				save_logs($this->menu_id, $action, @$data->id , $action.' '.$data->hotel_name.' Hotel ');
			}
		redirect("admin/settings/hotels");
	}

	public function delete($id) {
			if($id) {
				$data = new Hotel($id);
				$action = 'DELETE';
				save_logs($this->menu_id, $action, @$data->id , $action.' '.$data->hotel_name.' Hotel ');
				$data->delete();
			}
		redirect("admin/settings/hotels");
	}
}