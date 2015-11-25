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
		<div class="box-body" style="min-height:500px;">
			<div align="right">
				<a href="admin/reports/report3?act=print&org_id=<?php echo @$_GET['org_id'];?>" class="btn btn-info" target="_blank"><i class="fa fa-print"></i> พิมพ์หน้านี้</a>
				<a href="admin/reports/report3?act=export&org_id=<?php echo @$_GET['org_id'];?>" class="btn btn-info" target="_blank"><i class="fa fa-file-excel-o"></i> ส่งออกเป็น Excel</a>
			</div>
			<hr>
			<table id="example1" class="table table-bordered table-striped table-hover table_data">
			    <thead>
			      <tr>
					<th>ลำดับ</th>
					<th>รหัสหน่วยงาน</th>
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
						$total_participants += $value->max_participants;
						$total_registered += $value->registered; 
					?>
					<tr>
						<td align="center"><?php echo $no;?></td>
						<td align="center"><?php echo $value->prefix_code.$value->sortorder;?></td>
						<td><?php echo $value->org_name?></td>					
						<td><?php echo $value->registered?></td>
					</tr>
					<?php endforeach?>
					<tr>
						<td></td>
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
						$total_participants += $value->max_participants;
						$total_registered += $value->registered; 
					?>
					<tr>
						<td align="center"><?php echo $no;?></td>
						<td align="center"><?php echo $value->prefix_code.$value->sortorder;?></td>
						<td><?php echo $value->org_name?></td>					
						<td><?php echo $value->registered?></td>
					</tr>
					<?php endforeach?>
					<tr>
						<td></td>
						<td></td>
						<td>สรุปรวม</td>
						<td><?php echo $total_registered;?></td>
					</tr>
				</tbody>
			</table>
		</div>
		</div><!-- /.box -->
	</div>
  </div>
</section>		