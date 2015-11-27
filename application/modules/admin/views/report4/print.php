<html xmlns="http://www.w3.org/1999/xhtml">
<head><base href="http://km.ddc.moph.go.th/conference/" />
<meta charset="UTF-8">
<title>Siteadmin</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
</head>
<body>
<div style="text-align:center;">
	<h4>รายงานรายชื่อบุคคลทั่วไปที่ลงทะเบียนเข้าร่วมงาน
	<br>สัมมนาวิชาการป้องกันควบคุมโรคแห่งชาติ
	</h4>
</div>
<div style="text-align:right;">ข้อมูล ณ วันที่ <?php echo mysql_to_th(date("Y-m-d H:i:s"));?></div>
<hr>
					<table border="1" cellpadding="5" cellspacing="0">
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
								$regist_data = $regist_data->where("gender = '".$_GET['gender']."'");
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
							<td >
								<?php echo $rvalue->organization->org_name?>
								<?php echo $org_other = $rvalue->org_other !='' ? ':::'.$rvalue->org_other : '';?>
							</td>
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
								$regist_data = $regist_data->where("gender = '".$_GET['gender']."'");
							}
							$regist_data = $regist_data->where(" rest_type = 'y' ");
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
							<td >
								<?php echo $rvalue->organization->org_name?>
								<?php echo $org_other = $rvalue->org_other !='' ? ':::'.$rvalue->org_other : '';?>
							</td>
							<td ><?php echo $rvalue->position?></td>
							<td ><?php echo $rvalue->mobile_no?></td>
							<td ><?php echo $rvalue->email?></td>							
						</tr>
					<?php } ?>
					<?php endif;?>
					</table>
					</fieldset>
					<br>
<script type="text/javascript">
	window.print();	
</script>
</body>
</html>