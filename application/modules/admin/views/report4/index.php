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
				<div class="col-xs-5">
			  	<label for="organization_id">ประเภทการสมัคร</label> 
			  	<span class="span_org_data">
			  		<select name="rest_type" class="form-control">
			  			<option value="">แสดงทั้งหมด</option>
			  			<option value="n" <?php if(@$_GET['rest_type']=='n')echo 'selected="selected"';?>>ส่วนกลาง</option>
			  			<option value="y" <?php if(@$_GET['rest_type']=='y')echo 'selected="selected"';?>>ส่วนภูมิภาค</option>
			  		</select>
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
				<a href="admin/reports/report4?act=print&rest_type=<?php echo @$_GET['rest_type'];?>&gender=<?php echo @$_GET['gender'];?>" class="btn btn-info" target="_blank"><i class="fa fa-print"></i> พิมพ์หน้านี้</a>
				<a href="admin/reports/report4?act=export&rest_type=<?php echo @$_GET['rest_type'];?>&gender=<?php echo @$_GET['gender'];?>" class="btn btn-info" target="_blank"><i class="fa fa-file-excel-o"></i> ส่งออกเป็น Excel</a>
			</div>
			<hr>			
					<table id="example1" class="table table-bordered table-striped table-hover table_data">
						<tr>
							<td>ลำดับ</td>
							<td>รหัสลงทะเบียน</td>
							<td>ชื่อ - นามสกุล</td>
							<td>เพศ</td>
							<td>หน่วยงาน</td>
							<td>ตำแหน่ง</td>
							<td>เบอร์มือถือ</td>
							<td>อีเมล์</td>							
						</tr>
					<?php if(@$_GET['rest_type']=='n' || @$_GET['rest_type']==''):?>
						<tr>
							<td colspan="8">ส่วนกลาง</td>
						</tr>
					<?
							$ino =0;
							$regist_data = new Register_data();
							$regist_data = $regist_data->where('register_type = 2');
							if(@$_GET['gender']!=''){
								$regist_data = $regist_data->where('gender = '.$_GET['gender']);	
							}
							$regist_data = $regist_data->where("rest_type = 'n'");
							$regist_data = $regist_data->order_by('gender','asc');
							$regist_data = $regist_data->order_by('register_code','asc');
							$regist_data = $regist_data->get();
							foreach($regist_data as $rkey => $rvalue){
								$ino++;
					?>
						<tr>
							<td align="center"><?php echo $ino;?></td>
							<td ><?php echo $rvalue->register_code;?></td>
							<td align="center"><?php echo $rvalue->titulation->titulation_title.$rvalue->firstname.' '.$rvalue->lastname;?></td>
							<td ><?php echo $gender = $rvalue->gender == 'm' ? 'ชาย' : 'หญิง';?></td>
							<td ><?php echo $rvalue->organization->org_name?></td>
							<td ><?php echo $rvalue->position?></td>
							<td ><?php echo $rvalue->mobile_no?></td>
							<td ><?php echo $rvalue->email?></td>							
						</tr>
					<?php } ?>
					<?php endif;?>
					<?php if(@$_GET['rest_type']=='y' || @$_GET['rest_type']==''):?>
						<tr>
							<td colspan="8">ส่วนภูมิภาค</td>
						</tr>
						<?
							$ino =0;
							$regist_data = new Register_data();
							$regist_data = $regist_data->where('register_type = 2');
							if(@$_GET['gender']!=''){
								$regist_data = $regist_data->where('gender = '.$_GET['gender']);	
							}
							$regist_data = $regist_data->where(" rest_type = 'n' ");
							$regist_data = $regist_data->order_by('gender','asc');
							$regist_data = $regist_data->order_by('register_code','asc');
							$regist_data = $regist_data->get();
							foreach($regist_data as $rkey => $rvalue){
								$ino++;
					?>
						<tr>
							<td align="center"><?php echo $ino;?></td>
							<td ><?php echo $rvalue->register_code;?></td>
							<td align="center"><?php echo $rvalue->titulation->titulation_title.$rvalue->firstname.' '.$rvalue->lastname;?></td>
							<td ><?php echo $gender = $rvalue->gender == 'm' ? 'ชาย' : 'หญิง';?></td>
							<td ><?php echo $rvalue->organization->org_name?></td>
							<td ><?php echo $rvalue->position?></td>
							<td ><?php echo $rvalue->mobile_no?></td>
							<td ><?php echo $rvalue->email?></td>							
						</tr>
					<?php } ?>
					<?php endif;?>
					</table>
					</fieldset>
					<br>
				<?php } ?>							
		</div>
		</div><!-- /.box -->
	</div>
  </div>
</section>		