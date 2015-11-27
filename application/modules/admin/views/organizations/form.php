<?php echo bread_crumb($menu_id);?>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
		<div class="box">
			<form method="post" enctype="multipart/form-data" action="admin/settings/organizations/save/<?php echo @$rs->id?>">
			<div class="box-header">
			  <h3 class="box-title">เพิ่ม/แก้ไข</h3>			  
			</div><!-- /.box-header -->
			
			<div class="box-body">
				<div class="form-group">
		              <label>ชื่อหน่วยงาน</label>
		              <input type="text" class="form-control" name="org_name" required="required" value="<?php echo @$rs->org_name;?>">
	            </div>
	            <div class="form-group">
		              <label>รหัสประเภทหน่วยงาน</label>
		              <?php echo form_dropdown("prefix_code",get_option("code","title","(select code,CONCAT(CODE , ':::' , prefix_name) title from code_prefixes)code_prefixes"," ORDER BY code ASC"), @$rs->prefix_code,"class=\"form-control-other\"  required=\"required\" ","-- ระบุรหัสประเภทหน่วยงาน --","");?>
	            </div>
	            <div class="form-group">
		              <label>ลำดับ</label>
		              <input type="text" name="sortorder" class="form-control" size="4" value="<?php echo @$rs->sortorder;?>">
	            </div>
	            <div class="form-group">
		              <label>ประเภทหน่วยงาน</label>
		              <?php echo form_dropdown("org_type_id",get_option("id","organization_type_title","organization_types"," ORDER BY id ASC"), @$rs->org_type_id,"class=\"form-control-other\"  required=\"required\" ",'',"false");?>
	            </div>
	            <div class="form-group">
	            	  <input type="checkbox" name="show_public" value="y" <?php if($rs->show_public=='y')echo 'checked="checked"';?>>
		              <label>การแสดงสำหรับบุคคลทั่วไป</label>
		              
	            </div>
	            <div class="form-group">
	            	  <input type="checkbox" name="show_rest" value="y" <?php if($rs->show_rest=='y')echo 'checked="checked"';?>>
		              <label>การแสดงสำหรับการเข้าพัก</label>		              
	            </div>	
				<div class="form-group">
		              <label>จำนวนที่นั่งสูงสุด</label>
		              <input type="text" class="form-control" name="max_participants" required="required" value="<?php echo @$rs->max_participants;?>">
	            </div>
	            <div class="form-group">
		              <label>โรงแรมที่สามารถเลือกเข้าพักได้</label>
		              <div class="clearfix"></div>
		              <?php
		               	$hotel = new Hotel();
						$hotel->get();
						foreach ($hotel as $key => $row):
							$checked='';
							if($rs->id > 0){
								$org_hotel = new Hotel_Organization();
								$org_hotel->where('org_id = '.$rs->id.' and hotel_id = '.$row->id)->get(1);
								$checked = @$org_hotel->hotel_id == $row->id ? 'checked="checked"' : '';
							} 
							echo '<div class="col-xs-3"><input type="checkbox" name="org_hotel[]" '.$checked.' value="'.$row->id.'"> '.$row->hotel_name.'</div>';
						endforeach;
		              ?>
		              <div class="clearfix"></div>
	            </div>	
	            <hr>	            
	            <table>
	            	<tr>
	            		<td>
				            <div class="form-group">
					              <label for="exampleInputEmail1">Create By / Created Date</label>
					              <div class="input-group" style="width:350px;">
						              <span class="input-group-addon"><i class="fa fa-user"></i></span>
						              <?php 
						              $user = @$rs->created_by > 0 ? user($rs->created_by) : '';
									  $username = $rs->created_by > 0 ? $user->titulation.' '.$user->firstname.' '.$user->lastname : '';
									  ?>
						              <input type="text" class="form-control" disabled="disabled" id="register_date" name="register_date"  value="<?php echo @$username.'  '.@$rs->created;?>">
					              </div>
				            </div>			
	            		</td>
	            		<td>
	            			<div class="form-group">
					              <label for="exampleInputEmail1">Update By / Updated Date</label>
					              <div class="input-group" style="width:350px;">
						              <span class="input-group-addon"><i class="fa fa-user"></i></span>
						              <?php 
						              $user = @$rs->updated_by > 0 ? user($rs->updated_by) : '';
									  $username = @$rs->updated_by > 0 ? $user->titulation.' '.$user->firstname.' '.$user->lastname : '';
									  ?>
						              <input type="text" class="form-control" disabled="disabled" id="register_date" name="register_date"  value="<?php echo @$username.'  '.@$rs->updated;?>">
					              </div>
				            </div>
	            		</td>
	            	</tr>
	            </table>
	            <div class="form-group">
	            	 <?php if($perm->can_create=='y'){ ?>
<!--	            	  <input type="hidden" name="id" value="<?php echo @$rs->id;?>">-->
		              <input type="submit" class="btn btn-primary" value="Save">
		             <?php } ?>		    
		              <a href="admin/settings/organizations/index" class="btn btn-default">Back</a>          
	            </div>          	            	           	           
            </div>            
			</form>						
		</div><!-- /.box -->
	</div>
  </div>
</section>