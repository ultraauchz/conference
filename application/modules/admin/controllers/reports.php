<?php
/**
 * Reports Controller
 */
class Reports extends Admin_Controller {
	
	function __construct() {
		parent::__construct();
		parent::__construct();		
		$this->modules_name = 'register_datas';
		$this->current_user = user();		
	}
	
	public function report1(){
		$menu_id = 28;
		$data['menu_id'] = $menu_id;
		$perm = current_user_permission($menu_id);
		$data['perm'] = $perm;
		if($perm->can_view!='y'){
			redirect("admin");
		}else{
			$query = "SELECT
						id,
						prefix_code,
						sortorder,
						org_name,
	   					max_participants,
					  	(select count(*) from register_datas where org_id = organizations.id and firstname is NOT NULL)registered 
					  FROM organizations WHERE 1=1 ";
			$query.= @$_GET['org_id'] > 0 ? " AND id = ".$_GET['org_id'] : '';
			$query.= ' ORDER BY prefix_code,sortorder ASC  ';
			$data['result'] = $this->db->query($query)->result();
			switch(@$_GET['act']){
				case 'print';
					$this->load->view('report1/print',$data);
				break;
				case  'export';
					$filename= "รายงานสรุปจำนวนผู้ลงทะเบียนแต่ล่ะหน่วยงาน ณ วันที่ ".date("Y-m-d_H_i_s").".xls";
					header("Content-Disposition: attachment; filename=".$filename);
					$this->load->view('report1/print',$data);
				break;
				default:
					$this->template->build('report1/index',$data);		
				break;	
			}			
		}
	}
	
	public function report2(){
		$menu_id = 27;
		$data['menu_id'] = $menu_id;
		$perm = current_user_permission($menu_id);
		$data['perm'] = $perm;
		if($perm->can_view!='y'){
			redirect("admin");
		}else{
			$query = "SELECT
						id,
						prefix_code,
						sortorder,
						org_name,
	   					max_participants,
					  	(select count(*) from register_datas where org_id = organizations.id and firstname is NOT NULL)registered 
					  FROM organizations WHERE 1=1 ";
			$query.= @$_GET['org_id'] > 0 ? " AND id = ".$_GET['org_id'] : '';
			$query.= ' ORDER BY prefix_code,sortorder ASC  ';
			$data['result'] = $this->db->query($query)->result();
			switch(@$_GET['act']){
				case 'print';
					$this->load->view('report2/print',$data);
				break;
				case  'export';
					$filename= "รายงานสรุปจำนวนผู้ลงทะเบียนแต่ล่ะหน่วยงาน ณ วันที่ ".date("Y-m-d_H_i_s").".xls";
					header("Content-Disposition: attachment; filename=".$filename);
					$this->load->view('report2/print',$data);
				break;
				default:
					$this->template->build('report2/index',$data);		
				break;	
			}			
		}
	}
}
