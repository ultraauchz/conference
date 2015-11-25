<html xmlns="http://www.w3.org/1999/xhtml">
<head><base href="http://km.ddc.moph.go.th/conference/" />
<meta charset="UTF-8">
<title>Siteadmin</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
</head>
<body>
<div style="text-align:center;">
	<h4>รายงานรายชื่อบุคคลากรของกรมที่ลงทะเบียนเข้าร่วมงาน
	<br>สัมมนาวิชาการป้องกันควบคุมโรคแห่งชาติ
	</h4>
</div>
<div style="text-align:right;">ข้อมูล ณ วันที่ <?php echo mysql_to_th(date("Y-m-d H:i:s"));?></div>
<hr>
<?php 
					$no=0;
					foreach ($result as $key => $value):
						$no++;							
					?>
					<fieldset style="">
						<legend style="font-size:16px;margin-bottom:15px;padding-left:15px;">
							
						</legend>
						
						<div class="col-xs-5" style="padding-top:0px;"><?php echo $value->prefix_code.$value->sortorder;?> ::: <?php echo $value->org_name?></div>
						<div class="col-xs-5" style="padding-top:0px;">โควต้าการลงทะเบียน : <?php echo $value->max_participants?></div>
						<div class="col-xs-5" style="padding-top:0px;">จำนวนที่ลงทะเบียน ณ ปัจจุบัน : <?php echo $value->registered?></div>	
					<table border="1" cellpadding="5" cellspacing="0">
						<tr>
							<td>ลำดับ</td>
							<td>รหัสลงทะเบียน</td>
							<td>ชื่อ - นามสกุล</td>
							<td>เพศ</td>
							<td>ตำแหน่ง</td>
							<td>เบอร์มือถือ</td>
							<td>อีเมล์</td>							
							<td>โรงแรม</td>							
							<td>26</td>
							<td>27</td>
							<td>28</td>						
						</tr>
					<?
							$ino =0;
							$regist_data = new Register_data();
							$regist_data = $regist_data->where('register_type = 1');
							if(@$_GET['gender']!=''){
								$regist_data = $regist_data->where('gender = '.$_GET['gender']);	
							}
							$regist_data = $regist_data->where('org_id = '.$value->id);
							$regist_data = $regist_data->order_by('gender','asc');
							$regist_data = $regist_data->order_by('register_code','asc');
							$regist_data = $regist_data->get();
							foreach($regist_data as $rkey => $rvalue){
								$ino++;
								$checkin_day = substr($rvalue -> checkin_date, 8, 2);
								$checkout_day = substr($rvalue -> checkout_date, 8, 2);
					?>
						<tr>
							<td align="center"><?php echo $ino;?></td>
							<td ><?php echo $rvalue->register_code;?></td>
							<td align="center"><?php echo $rvalue->titulation->titulation_title.$rvalue->firstname.' '.$rvalue->lastname;?></td>
							<td ><?php echo $gender = $rvalue->gender == 'm' ? 'ชาย' : 'หญิง';?></td>
							<td ><?php echo $rvalue->position?></td>
							<td ><?php echo $rvalue->mobile_no?></td>
							<td ><?php echo $rvalue->email?></td>							
							<td ><?php echo $rvalue->hotel->hotel_name?></td>
							<td>
							<?php
								if($checkin_day == 26){
							?>
							X
							<?php } ?>
						</td>
						<td>
							<?php
								if($checkin_day == 27 || $checkout_day >= 27){
							?>
							X
							<?php } ?>
						</td>
						<td>
							<?php
								if($checkin_day == 28 || $checkout_day == 28){
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
<script type="text/javascript">
	window.print();	
</script>
</body>
</html>