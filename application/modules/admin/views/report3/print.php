<html xmlns="http://www.w3.org/1999/xhtml">
<head><base href="http://km.ddc.moph.go.th/conference/" />
<meta charset="UTF-8">
<title>Siteadmin</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
</head>
<body>
<div style="text-align:center;">
	<h4>รายงานสรุปจำนวนบุคคลทั่วไปที่ลงทะเบียน
	<br>สัมมนาวิชาการป้องกันควบคุมโรคแห่งชาติ
	</h4>
</div>
<div style="text-align:right;">ข้อมูล ณ วันที่ <?php echo mysql_to_th(date("Y-m-d H:i:s")); ?></div>
<hr>
<table cellspacing="0" cellpadding="5" border="1" align="center">
    <thead>
			      <tr>
					<th>ลำดับ</th>
					<th>ชื่อหน่วยงาน</th>
					<th>จำนวนผู้ลงทะเบียน</th>					
			      </tr>
			    </thead>
				<tbody>
				<tr>
					<td colspan="4" style="background:#FFF2C1">
						ส่วนกลาง 
					</td>
				</tr>
					<?php 
					$no=0;
					$total_participants = 0;
					$total_registered = 0;
					foreach ($center_result as $key => $value):
						$no++;
						$total_registered += $value->registered; 
					?>
					<tr>
						<td align="center"><?php echo $no;?></td>
						<td><?php echo $value->org_name?></td>					
						<td><?php echo $value->registered?></td>
					</tr>
					<?php endforeach?>
					<tr>
						<td></td>
						<td>สรุปรวม</td>
						<td><?php echo $total_registered;?></td>
					</tr>
					<tr>
						<td colspan="4" style="background:#FFF2C1">
							ส่วนภูมิภาค 
						</td>
					</tr>
					<?php 
					$no=0;
					$total_participants = 0;
					$total_registered = 0;
					foreach ($region_result as $key => $value):
						$no++;
						$total_registered += $value->registered; 
					?>
					<tr>
						<td align="center"><?php echo $no;?></td>
						<td><?php echo $value->org_name?></td>					
						<td><?php echo $value->registered?></td>
					</tr>
					<?php endforeach?>
					<tr>
						<td></td>
						<td>สรุปรวม</td>
						<td><?php echo $total_registered;?></td>
					</tr>
				</tbody>
</table>
<script type="text/javascript">
	window.print();
</script>
</body>
</html>