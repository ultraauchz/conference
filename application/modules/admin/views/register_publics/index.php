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
			  	<label for="organization_id">การเข้าพัก* (กรุณาระบุ)</label> 
			  	<span>
			  		<select name="rest_type" class="form-control">
			  			<option value="">-- กรุณาระบุการเข้าพัก --</option>
			  			<option value="y" <?php if(@$_GET['rest_type']=='y')echo 'selected="selected"';?>>เข้าพัก</option>
			  			<option value="n" <?php if(@$_GET['rest_type']=='n')echo 'selected="selected"';?>>ไม่เข้าพัก</option>
			  		</select>
			  	</span>
				</div>
				<div class="col-xs-3">
			  	<label for="search">คำค้น</label> 
			  	<input type="text" name="search" value="<?php echo @$_GET['search'];?>" placeholder="ชื่อ/นามสกุล/รหัสลงทะเบียน" class="form-control">
			    </div>
				<div class="col-xs-5">
			  	<label for="organization_id">หน่วยงาน</label> 
			  	<span class="span_org_data">
			  	<?php 
			  		echo form_dropdown('org_id',get_option('id','org_name','organizations'," ORDER BY prefix_code,sortorder ASC "),@$_GET['org_id'],'class="form-control-other"','-- ระบุหน่วยงาน --');
			  	?>
			  	</span>
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
					<th>ชื่อผู้ลงทะเบียน</th>					
					<th>ตำแหน่ง</th>
					<th>การเข้าพัก</th>
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
						<td colspan="6" style="text-align:center;">--- ว่าง ---</td>
						<?php
						}else{
						?> 
						<td><?php echo $value->titulation->titulation_title.$value->firstname." ".$value->lastname?></td>						
						<td><?php echo $value->position?></td>
						<td>							
							<?php
							if ($value -> rest_type == 'y') {
								echo $value -> hotel -> hotel_name . '<br>';
								if ($value -> rest_with > 0) {
									$reg_data = new Register_data($value -> rest_with);
									echo "พักคู่กับ " . $reg_data -> titulation -> titulation_title . $reg_data -> firstname . " " . $reg_data -> lastname;
								} else if ($value -> rest_with == -1) {
									echo 'พักคนเดียว';
								} else {
									echo 'ไม่ระบุ';
								}
							} else {
								echo 'ไม่เข้าพัก';
							}
						?>
						</td>
						<td>
							<?php
								if($checkin_day == 26){
							?>
							<i class="glyphicon glyphicon-ok"></i>
							<?php } ?>
						</td>
						<td>
							<?php
								if($checkin_day == 27 || $checkout_day >= 27){
							?>
							<i class="glyphicon glyphicon-ok"></i>
							<?php } ?>
						</td>
						<td>
							<?php
								if($checkin_day == 28 || $checkout_day == 28){
							?>
							<i class="glyphicon glyphicon-ok"></i>
							<?php } ?>
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
					<th>พักคู่กับ</th>
					<th>26</th>
					<th>27</th>
					<th>28</th>		        
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