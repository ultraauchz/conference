<div style="text-align:center;">
	<h4>รายงานสรุปจำนวนผู้ลงทะเบียนงาน
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
							<td>ชื่อ - นามสกุล</td>
							<td>เพศ</td>
							<td>ตำแหน่ง</td>
							<td>เบอร์มือถือ</td>
							<td>อีเมล์</td>							
							<td>การเข้าพัก</td>	
							<td>โรงแรม</td>
							<td>เข้าพักกับ</td>
							<td>26</td>
							<td>27</td>
							<td>28</td>						
						</tr>
					<?
							$ino =0;
							$regist_data = new Register_data();
							$regist_data = $regist_data->where('org_id = '.$value->id)->get();
							foreach($regist_data as $rkey => $rvalue){
								$ino++;
								$checkin_day = substr($rvalue -> checkin_date, 8, 2);
								$checkout_day = substr($rvalue -> checkout_date, 8, 2);
					?>
						<tr>
							<td align="center"><?php echo $ino;?></td>
							<td align="center"><?php echo $rvalue->titulation->titulation_title.$rvalue->firstname.' '.$rvalue->lastname;?></td>
							<td ><?php echo $rvalue->gender?></td>
							<td ><?php echo $rvalue->position?></td>
							<td ><?php echo $rvalue->mobile_no?></td>
							<td ><?php echo $rvalue->email?></td>
							<td ><?php echo $rest_type_desc = $rvalue->rest_type == 'y'? 'เข้าพัก':'ไม่เข้าพัก';?></td>
							<td ><?php echo $rvalue->hotel->hotel_name?></td>
							<td>
							<?php
								if ($rvalue -> rest_with > 0) {
									$reg_data = new Register_data($rvalue -> rest_with);
									echo "พักคู่กับ " . $reg_data -> titulation -> titulation_title . $reg_data -> firstname . " " . $reg_data -> lastname;
								} else if ($rvalue -> rest_with == -1) {
									echo 'พักคนเดียว';
								} else {
									echo 'ไม่ระบุ';
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
