<?php echo bread_crumb($menu_id);?>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
		<div class="box">
			<form method="get" enctype="multipart/form-data">
			<div class="box-header">
			  <h3 class="box-title">Search</h3>			  
			</div><!-- /.box-header -->
			<div style="float:left;width:100%;">
				<div class="col-xs-3">
			  	<label for="search">Search</label> 
			  	<input type="text" name="search" value="<?php echo @$_GET['search'];?>" placeholder="Firstname/Lastname/Username/Email" class="form-control">
			    </div>
				<div class="col-xs-5">
			  	<label for="organization_id">Organization</label> 
			  	<span class="span_org_data">
			  	<?php 
			  		$org_id = $perm->can_access_all != 'n' && @$_GET['country_id'] > 0 ? $current_user->org_id : @$_GET['org_id'];
			  		$ext_condition = $org_id > 0 ? " WHERE org_id = ".$org_id : "";
			  		echo form_dropdown('org_id',get_option('id','org_name','organizations',$ext_condition." ORDER BY prefix_code,sortorder ASC "),@$_GET['org_id'],'class="form-control-other"','-- all organization --');
			  	?>
			  	</span>
				</div>
			  <div class="col-xs-3">
			  	<br>
			  	<input type="submit" name="b" class="btn btn-primary" value="Search">
			  </div>
			</div>
			</form>
		<div class="box-body">
			<?php echo $variable->pagination()?>
			<table id="example1" class="table table-bordered table-striped table-hover table_data">
			    <thead>
			      <tr>
					<th>ลำดับ</th>
					<th>รหัสการลงทะเบียน</th>
					<th>หน่วยงาน</th>
					<th>ชื่อผู้ลงทะเบียน</th>					
					<th>ตำแหน่ง</th>
					<th>เพศ</th>
					<th>พักคู่กับ</th>
					<th>26</th>
					<th>27</th>
					<th>28</th>			        
			        <th class="th_manage">Manage</th>
			      </tr>
			    </thead>
				<tbody>
					<?php 
					$no=0;
					foreach ($variable as $key => $value):
						$no++;
					?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $value->register_code;?></td>
						<td><?php echo $value->organization->org_name?></td>
						<td><?php echo $value->titulation->titulation_title.$value->firstname." ".$value->lastname?></td>						
						<td><?php echo $value->position?></td>
						<td><small><?php if($value->gender=='m')echo 'ชาย'; else echo 'หญิง';?></small></td>
						<td><?php echo $value->titulation->titulation_title.$value->firstname." ".$value->lastname?></td>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<?php if($perm->can_create == 'y'){?>
							<a href="admin/<?php echo $modules_name;?>/form/<?php echo $value->id?>" class="btn btn-primary" ><span class="glyphicon glyphicon-wrench" ></span> Edit</a>
							<?php }else{ ?>
							<a href="admin/<?php echo $modules_name;?>/form/<?php echo $value->id?>" class="btn btn-info" ><span class="glyphicon glyphicon-search" ></span> View</a>
							<?php } ?>
							<?php if($perm->can_delete =='y'){?>
							<a href="admin/<?php echo $modules_name;?>/delete/<?php echo $value->id?>" class="btn btn-danger btn_delete"><span class="glyphicon glyphicon-trash" ></span> Delete</a>
							<?php } ?>
						</td>
					</tr>
					<?php endforeach?>
				</tbody>
				<tfoot>
			      <tr>
					<th>ลำดับ</th>
					<th>รหัสการลงทะเบียน</th>
					<th>หน่วยงาน</th>
					<th>ชื่อผู้ลงทะเบียน</th>					
					<th>ตำแหน่ง</th>
					<th>เพศ</th>
					<th>พักคู่กับ</th>
					<th>26</th>
					<th>27</th>
					<th>28</th>		        
			        <th class="th_manage">Manage</th>
			      </tr>
			    </tfoot>
			</table>
			<?php if($perm->can_create=='y'){?>
			<div style="text-align:right;">
			  	<a href="admin/<?php echo $modules_name;?>/form" class="btn btn-info"><li class="fa fa-plus"></li> Create new</a>
			</div>
			<?php } ?>
			<?php echo $variable->pagination()?>
		</div>
		</div><!-- /.box -->
	</div>
  </div>
</section>		
<script type="text/javascript">
	$(document).ready(function(){
		
		$('button[data-loading-text]').click(function () {
		    var btn = $(this);
		    if(btn.val()==1) {
				btn.val(0);
		    	btn.removeClass("btn-primary");
		    	btn.addClass("btn-danger");
		    	var status = 0;
		    	var textstatus = "Off";
		    } else {
				btn.val(1);
		    	btn.removeClass("btn-danger");
		    	btn.addClass("btn-primary");
		    	var status = 1;
		    	var textstatus = "On";
		    }
		    btn.button('loading');
		    setTimeout(function(){
				btn.button('reset');
				btn.html(textstatus);
		    },1000);
		    
		    var id = btn.attr("id");
		    $.post("admin/approve/user/"+id,{status:status});
		    return false;
		    
		});
		
		$("select[name=country_id]").change(function(){
			var country_id = $(this).val();
			$.post('admin/settings/organizations/load_organizations',{
			'country_id' : country_id,
			},function(data){
				$(".span_org_data").html(data);												
			});	
		});
		
	});
</script>