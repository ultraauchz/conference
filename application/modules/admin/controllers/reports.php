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
		$current_user = $this->current_user;
		$data['current_user'] = $current_user;
		$perm = current_user_permission($menu_id);		
		$data['perm'] = $perm;
		if($perm->can_view!='y'){
			redirect("admin");
		}else{
			if(@$_GET){
				$query = "SELECT
							id,
							prefix_code,
							sortorder,
							org_name,
		   					max_participants,
						  	(select count(*) from register_datas where org_id = organizations.id and register_type = 1 and firstname is NOT NULL)registered 
						  FROM organizations WHERE 1=1 ";				
				if($perm->can_access_all !='y'){
					$query.=  " AND id = ".$current_user->org_id;
				}else{
					$query.= @$_GET['org_id'] > 0 ? " AND id = ".$_GET['org_id'] : '';
				}
				$query.= ' ORDER BY prefix_code,sortorder ASC  ';
				$data['result'] = $this->db->query($query)->result();
			}
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
		$current_user = $this->current_user;
		$data['current_user'] = $current_user;
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
					  	(select count(*) from register_datas where org_id = organizations.id and register_type = 1 and firstname is NOT NULL)registered 
					  FROM organizations WHERE 1=1 ";			
			if($perm->can_access_all !='y'){
					$query.=  " AND id = ".$current_user->org_id;
				}else{
					$query.= @$_GET['org_id'] > 0 ? " AND id = ".$_GET['org_id'] : '';
				}
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
	
	public function report3(){
		$menu_id = 35;
		$data['menu_id'] = $menu_id;
		$current_user = $this->current_user;
		$data['current_user'] = $current_user;
		$perm = current_user_permission($menu_id);
		$data['perm'] = $perm;
		if($perm->can_view!='y'){
			redirect("admin");
		}else{
			$query = "select
			org_id,
			org_name,
			prefix_code,
			sortorder,
			count(*)registered
			from
			register_datas 
			left join organizations on register_datas.org_id = organizations.id
			WHERE
			register_type = 2
			and rest_type = 'n'
			group by org_id
			order by prefix_code, sortorder";
			$data['center_result'] = $this->db->query($query)->result();
			$query = "select
			org_id,
			org_name,
			prefix_code,
			sortorder,
			count(*)registered
			from
			register_datas 
			left join organizations on register_datas.org_id = organizations.id
			WHERE
			register_type = 2
			and rest_type = 'y'
			group by org_id
			order by prefix_code, sortorder";
			$data['region_result'] = $this->db->query($query)->result();
			switch(@$_GET['act']){
				case 'print';
					$this->load->view('report3/print',$data);
				break;
				case  'export';
					$filename= "รายงานสรุปจำนวนผู้บุคคลทั่วไปที่ลงทะเบียน ณ วันที่ ".date("Y-m-d_H_i_s").".xls";
					header("Content-Disposition: attachment; filename=".$filename);
					$this->load->view('report3/print',$data);
				break;
				default:
					$this->template->build('report3/index',$data);		
				break;	
			}			
		}
	}

	public function report4(){
		$menu_id = 36;
		$data['menu_id'] = $menu_id;
		$current_user = $this->current_user;
		$data['current_user'] = $current_user;
		$perm = current_user_permission($menu_id);
		$data['perm'] = $perm;
		if($perm->can_view!='y'){
			redirect("admin");
		}else{
			switch(@$_GET['act']){
				case 'print';
					$this->load->view('report4/print',$data);
				break;
				case  'export';
					$filename= "รายงานสรุปจำนวนผู้ลงทะเบียนแต่ล่ะหน่วยงาน ณ วันที่ ".date("Y-m-d_H_i_s").".xls";
					header("Content-Disposition: attachment; filename=".$filename);
					$this->load->view('report4/print',$data);
				break;
				default:
					$this->template->build('report4/index',$data);		
				break;	
			}			
		}
	}
}
