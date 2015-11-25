<?php
class Ajax extends Base_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	
	public function get_public_rest_type_layout() {
		$org_id = @$_POST['org_id'];
		$register_id = @$_POST['register_id'];
		$org = new Organization($org_id);
		echo $org->org_type_id;
	}
	
	public function get_office_rest_type_layout() {
		$org_id = @$_POST['org_id'];
		$register_id = @$_POST['register_id'];
		$org = new Organization($org_id);
		echo $org->org_type_id;
	}
	
	public function get_office_hotel_list_layout(){
		$org_id = @$_POST['org_id'];
		$hotel_id = @$_POST['hotel_id'];
		$ext_condition = @$org_id > 0 ? ' WHERE id IN (select hotel_id FROM hotels_organizations WHERE org_id = '.$org_id.')' : '';
		echo form_dropdown('hotel_id', get_option('id', 'hotel_name', 'hotels',$ext_condition.' order by hotel_name '), @$value -> hotel_id, 'class="form-control" ', '--โปรดระบุโรงแรม-');
	}
	
	public function get_organization_dropdown(){
		$org_type = @$_POST['org_type'];
		$ext_condition = ' WHERE 1=1 ';
		$ext_condition .= $org_type != '' ? " AND org_type_id = ".$org_type : ''; 
		echo form_dropdown('org_id',get_option('id','org_name','organizations',$ext_condition." ORDER BY prefix_code,sortorder ASC "),@$_GET['org_id'],'class="form-control-other"','-- ระบุหน่วยงาน --');
	}
}