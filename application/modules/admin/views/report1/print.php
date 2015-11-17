<div style="text-align:center;">
	<h4>รายงานสรุปจำนวนผู้ลงทะเบียนงาน
	<br>สัมมนาวิชาการป้องกันควบคุมโรคแห่งชาติ
	</h4>
</div>
<div style="text-align:right;">ข้อมูล ณ วันที่ <?php echo mysql_to_th(date("Y-m-d H:i:s"));?></div>
<hr>
<table cellspacing="0" cellpadding="5" border="1" align="center">
    <thead>
      <tr>
		<th>ลำดับ</th>
		<th>รหัสหน่วยงาน</th>
		<th>ชื่อหน่วยงาน</th>
		<th>โควต้าการลงทะเบียน</th>
		<th>จำนวนผู้ลงทะเบียน</th>					
      </tr>
    </thead>
	<tbody>
		<?php 
		$no=0;
		foreach ($result as $key => $value):
			$no++;
		?>
		<tr>
			<td align="center"><?php echo $no;?></td>
			<td align="center"><?php echo $value->prefix_code.$value->sortorder;?></td>
			<td><?php echo $value->org_name?></td>
			<td align="center"><?php echo $value->max_participants?></td>
			<td align="center"><?php echo $value->registered?></td>
		</tr>
		<?php endforeach?>
	</tbody>
</table>
<script type="text/javascript">
	window.print();	
</script>
