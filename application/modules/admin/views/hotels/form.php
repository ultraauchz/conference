<?php echo bread_crumb($menu_id);?>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
		<div class="box">
			<form method="post" enctype="multipart/form-data" action="admin/settings/hotels/save/<?=@$rs->id?>">
			<div class="box-header">
			  <h3 class="box-title">เพิ่ม/แก้ไข</h3>			  
			</div><!-- /.box-header -->
			
			<div class="box-body">
				<div class="form-group">
		              <label>ชื่อโรงแรม</label>
		              <input type="text" class="form-control" name="hotel_name" required="required" value="<?php echo @$rs->hotel_name;?>">
	            </div>
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
	            	  <input type="hidden" name="id" value="<?php echo @$rs->id;?>">
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