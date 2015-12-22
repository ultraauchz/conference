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
				<div class="col-xs-5">
			  	<label for="organization_id">หน่วยงาน* (กรุณาระบุ)</label> 
			  	<span class="span_org_data">
			  	<?php 
			  		//$org_id = $perm->can_access_all != 'n' && @$_GET['country_id'] > 0 ? $current_user->org_id : @$_GET['org_id'];
			  		$ext_condition = $perm->can_access_all != 'y' ? " WHERE id = ".$current_user->org_id : "";
			  		echo form_dropdown('org_id',get_option('id','org_name','organizations',$ext_condition." ORDER BY prefix_code,sortorder ASC "),@$_GET['org_id'],'class="form-control-other" ','-- แสดงทั้งหมด --');
			  	?>
			  	</span>
				</div>
			  <div>
			  	<div class="col-xs-2">
			  	<label for="organization_id">เพศ </label>
			  		<select name="gender" class="form-control">
			  			<option value="">แสดงทั้งหมด</option>
			  			<option value="m"  <?php if(@$_GET['gender']=='m')echo 'selected="selected"';?>>ชาย</option>
			  			<option value="f" <?php if(@$_GET['gender']=='f')echo 'selected="selected"';?>>หญิง</option>
			  		</select> 
				</div>
			  </div>
			  <div>
			  	<div class="col-xs-2">
			  	<label for="organization_id">เรียงลำดับ </label>
			  		<select name="order_by" class="form-control">
			  			<option value="" <?php if(@$_GET['order_by']=='')echo 'selected="selected"';?>>รหัสลงทะเบียน</option>
			  			<option value="gender"  <?php if(@$_GET['order_by']=='gender')echo 'selected="selected"';?>>เพศ</option>
			  		</select> 
				</div>
			  </div>
			  <div class="col-xs-3">
			  	<br>
			  	<input type="submit" name="b" class="btn btn-primary" value="แสดงรายการ">
			  </div>
			</div>
			</form>		
		<div class="box-body" style="min-height:500px;">
			<br>
			<hr>
			<br>
			<?php if(@$_GET){ ?>
			<div align="right">
				<a href="admin/reports/report1?act=print&org_id=<?php echo @$_GET['org_id'];?>&gender=<?php echo @$_GET['gender'];?>&order_by=<?php echo @$_GET['order_by'];?>" class="btn btn-info" target="_blank"><i class="fa fa-print"></i> พิมพ์หน้านี้</a>
				<a href="admin/reports/report1?act=export&org_id=<?php echo @$_GET['org_id'];?>&gender=<?php echo @$_GET['gender'];?>&order_by=<?php echo @$_GET['order_by'];?>" class="btn btn-info" target="_blank"><i class="fa fa-file-excel-o"></i> ส่งออกเป็น Excel</a>
			</div>
			<hr>			
					<?php 
					$no=0;
					foreach ($result as $key => $value):
						$no++;							
					?>
					<fieldset style="">
						<legend style="font-size:16px;margin-bottom:15px;padding-left:15px;">
							<?php echo $value->prefix_code.$value->sortorder;?> ::: <?php echo $value->org_name?>
						</legend>
						<div class="col-xs-5" style="padding-top:0px;">โควต้าการลงทะเบียน : <?php echo $value->max_participants?></div>
						<div class="col-xs-5" style="padding-top:0px;">จำนวนที่ลงทะเบียน ณ ปัจจุบัน : <?php echo $value->registered?></div>	
					<table id="example1" class="table table-bordered table-striped table-hover table_data">
						<tr>
							<td>ลำดับ</td>
							<td>รหัสลงทะเบียน</td>
							<td>ชื่อ - นามสกุล</td>
							<td>เพศ</td>
							<td>ตำแหน่ง</td>
                            <td>อื่นๆ หน่วยงาน</td>
							<td>เบอร์มือถือ</td>
							<td>อีเมล์</td>							
							<td>โรงแรม</td>							
							<td>26</td>
							<td>27</td>
							<td>28</td>
							<td>29</td>						
						</tr>
					<?
							$ino =0;
							$regist_data = new Register_data();
							$regist_data = $regist_data->where('register_type = 1');
							if(@$_GET['gender']!=''){
								$regist_data = $regist_data->where("gender = '".$_GET['gender']."'");
							}
							$regist_data = $regist_data->where('org_id = '.$value->id);
							if(@$_GET['order_by']=='gender'){
								$regist_data = $regist_data->order_by('gender','asc');
							}else{
								$regist_data = $regist_data->order_by('register_code','asc');
							}
							$regist_data = $regist_data->get();
							foreach($regist_data as $rkey => $rvalue){
								$ino++;
								$checkin_day = substr($rvalue -> checkin_date, 8, 2);
								$checkout_day = substr($rvalue -> checkout_date, 8, 2);
					?>
						<tr>
							<td align="center"><?php echo $ino;?></td>
							<td ><?php echo $rvalue->register_code;?></td>
							<td align="left"><?php echo $rvalue->titulation->titulation_title.$rvalue->titulation_other.$rvalue->firstname.' '.$rvalue->lastname;?></td>
							<td ><?php echo $gender = $rvalue->gender == 'm' ? 'ชาย' : 'หญิง';?></td>
							<td ><?php echo $rvalue->position?></td>
							<td ><?php echo $rvalue->org_other?></td>
							<td ><?php echo $rvalue->email?></td>							
							<td >
								<?php if($rvalue->rest_type=='y'){
									echo $rvalue->hotel->hotel_name;
								}else{
									echo 'ไม่เข้าพัก';
								}
								?>
							</td>
							<td>
							<?php
								if($checkin_day == 26){
							?>
							X
							<?php } ?>
						</td>
						<td>
							<?php
								if($checkin_day <= 27 && $checkout_day >= 27){
							?>
							X
							<?php } ?>
						</td>
						<td>
							<?php
								if($checkin_day <= 28 && $checkout_day == 28){
							?>
							X
							<?php } ?>
						</td>
						<td>
							<?php
								if($checkin_day <= 29 || $checkout_day == 29){
							?>
							X
							<?php } ?>
						</td>
						</tr>
					<?php } ?>
					</table>
					</fieldset>
					<br>
					<?php endforeach?>	
				<?php } ?>							
		</div>
		</div><!-- /.box -->
	</div>
  </div>
</section>		