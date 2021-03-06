<?php echo bread_crumb($menu_id);?>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
		<div class="box">
			<form method="post" enctype="multipart/form-data" action="admin/configurations/save">
			<div class="box-header">
			  <h3 class="box-title">Add/Edit</h3>			  
			</div><!-- /.box-header -->
			
			<div class="box-body">
				<div class="form-group">
		              <label for="exampleInputEmail1">หมายเหตุการเข้า</label>
		              <textarea name="rest_remark" id="rest_remark" ><?=@$rs->rest_remark?></textarea>
	            </div>
				<div class="form-group">
					   <input type="checkbox" name="public_status" value="y" <?php echo $status = $rs->public_status =='y' ? 'checked="checked"' : '';?>
		              <label for="exampleInputEmail1">การลงทะเบียน สำหรับบุคคลทั่วไป</label>
		              
	            </div>
	            <div class="form-group">		              
		              <input type="checkbox" name="internal_status" value="y" <?php echo $status = $rs->internal_status =='y' ? 'checked="checked"' : '';?>
		              <label for="exampleInputEmail1">การลงทะเบียน สำหรับบุคคลากรของกรม</label>
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
	            	  <?php if($can_save=='y'): ?>
	            	  <input type="hidden" name="id" value="<?=@$rs->id?>">
		              <input type="submit" class="btn btn-primary" value="Save">
		              <?php endif;?>		              
	            </div>          	            	           	           
            </div>            
			</form>						
		</div><!-- /.box -->
	</div>
  </div>
</section>
<!-- Load TinyMCE -->
<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce/config.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		tiny("rest_remark");
		
	});
</script>  
