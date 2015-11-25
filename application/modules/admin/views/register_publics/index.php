<style type="text/css">
	table#example1 td{
		vertical-align: middle;
	}
</style>
<?php echo bread_crumb($menu_id);?>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
		<div class="box">
			<form method="get" enctype="multipart/form-data">
			<div class="box-header">
			  <h3 class="box-title">ค้นหา</h3>			  
			</div><!-- /.box-header -->
			<div style="float:left;width:100%;">
				<div class="col-xs-3">
			  	<label for="organization_id">ประเภทหน่วยงาน * (กรุณาระบุ)</label> 
			  	<span>
			  		<select name="rest_type" class="form-control">
			  			<option value="">-- กรุณาระบุประเภทหน่วยงานที่สมัคร --</option>			  			
			  			<option value="n" <?php if(@$_GET['rest_type']=='n')echo 'selected="selected"';?>>ส่วนกลาง</option>
			  			<option value="y" <?php if(@$_GET['rest_type']=='y')echo 'selected="selected"';?>>ส่วนภูมิภาค</option>
			  		</select>
			  	</span>
				</div>				
				<div class="col-xs-5">
			  	<label for="organization_id">หน่วยงาน</label> 
			  	<span class="span_org_data">
			  	<?php 
			  		$org_type = @$_GET['rest_type']=='n' ? 1 : '';
					$org_type = @$_GET['rest_type']=='y' ? 2 : $org_type;
			  		$ext_condition = ' WHERE 1=1 ';
					$ext_condition .= $org_type != '' ? " AND org_type_id = ".$org_type : '';
			  		echo form_dropdown('org_id',get_option('id','org_name','organizations',$ext_condition." ORDER BY prefix_code,sortorder ASC "),@$_GET['org_id'],'class="form-control-other"','-- ระบุหน่วยงาน --');
			  	?>
			  	</span>
				</div>
				<div class="col-xs-3">
			  	<label for="search">คำค้น</label> 
			  	<input type="text" name="search" value="<?php echo @$_GET['search'];?>" placeholder="ชื่อ/นามสกุล/รหัสลงทะเบียน" class="form-control">
			    </div>
			  <div class="col-xs-3">
			  	<br>
			  	<input type="submit" name="b" class="btn btn-primary" value="แสดงรายการ">
			  </div>
			</div>
			</form>
		<div class="box-body" style="min-height:500px;">
			<?php if(@$_GET['rest_type']!=''): ?>
			<?php echo $variable->pagination()?>
			<table id="example1" class="table table-bordered table-striped table-hover table_data">
			    <thead>
			      <tr>
					<th>ลำดับ</th>
					<th>รหัสการลงทะเบียน</th>
					<th>ชื่อ - สกุล</th>					
					<th>ตำแหน่ง</th>
					<th>หน่วยงาน</th>
			        <th class="th_manage">Manage</th>
			      </tr>
			    </thead>
				<tbody>
					<?php 
					$no=0;
					foreach ($variable as $key => $value):
						$no++;
						$checkin_day = substr($value -> checkin_date, 8, 2);
						$checkout_day = substr($value -> checkout_date, 8, 2);
					?>
					<tr <?php
					if ($value -> firstname == '') {echo 'style="background:#F44;"';
					}
					?>>
						<td align="center"><?php echo $no; ?></td>
						<td align="center" style="background:#fbffa3;"><?php echo $value -> register_code; ?></td>
						<?php if($value->firstname==''){ ?>
						<td colspan="3" style="text-align:center;">--- ว่าง ---</td>
						<?php
						}else{
						?> 
						<td><?php echo $value->titulation->titulation_title.$value->firstname." ".$value->lastname?></td>						
						<td><?php echo $value->position?></td>
						<td><?php echo $value->organization->org_name;?>
						</td>
						<?php } ?>						
						<td>
							<?php if($perm->can_create == 'y'){?>
							<a href="admin/<?php echo $modules_name; ?>/form/<?php echo $value->id?>" class="btn btn-primary" ><span class="glyphicon glyphicon-wrench" ></span> Edit</a>
							<?php }else{ ?>
							<a href="admin/<?php echo $modules_name; ?>/form/<?php echo $value->id?>" class="btn btn-info" ><span class="glyphicon glyphicon-search" ></span> View</a>
							<?php } ?>
							<?php if($perm->can_delete =='y'){?>
							<a href="admin/<?php echo $modules_name; ?>/delete/<?php echo $value->id?>" class="btn btn-danger btn_delete"><span class="glyphicon glyphicon-trash" ></span> Delete</a>
							<?php } ?>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
				<tfoot>
			      <tr>
					<th>ลำดับ</th>
					<th>รหัสการลงทะเบียน</th>
					<th>ชื่อผู้ลงทะเบียน</th>					
					<th>ตำแหน่ง</th>
					<th>หน่วยงาน</th>
			        <th class="th_manage">Manage</th>
			      </tr>
			    </tfoot>
			</table>
			<?php if($perm->can_create=='y' && $n_register_number < $max_participants){?>
			<div style="text-align:right;">
			  	<a href="admin/<?php echo $modules_name; ?>/form" class="btn btn-info"><li class="fa fa-plus"></li> Create new</a>
			</div>
			<?php } ?>
			<?php echo $variable->pagination()?>
			<?php endif; ?>
		</div>
		</div><!-- /.box -->
	</div>
  </div>
</section>		
<script>
	$(document).ready(function(){
		$("select[name=rest_type]").change(function(){
			set_organization_dropdown();
		})
		
		function set_organization_dropdown(){
			var rest_type = $("select[name=rest_type]").val();
			var org_type = rest_type == 'n' ? 1 : '';
			org_type = rest_type == 'y' ? 2 : org_type;
			$.post('ajax/get_organization_dropdown',{
				'org_type' : org_type,
			},function(data){
					$('.span_org_data').html(data);
					$('.form-control-other').select2();
			});	
		}
	})
</script>