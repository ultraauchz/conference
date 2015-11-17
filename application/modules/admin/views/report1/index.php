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
			
			<div align="right">
				<a href="admin/reports/report1?act=print&org_id=<?php echo @$_GET['org_id'];?>" class="btn btn-info" target="_blank"><i class="fa fa-print"></i> พิมพ์หน้านี้</a>
				<a href="admin/reports/report1?act=export&org_id=<?php echo @$_GET['org_id'];?>" class="btn btn-info" target="_blank"><i class="fa fa-file-excel-o"></i> ส่งออกเป็น Excel</a>
			</div>
			<hr>
			<table id="example1" class="table table-bordered table-striped table-hover table_data">
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
						<td><?php echo $value->max_participants?></td>
						<td><?php echo $value->registered?></td>
					</tr>
					<?php endforeach?>
				</tbody>
			</table>
		</div>
		</div><!-- /.box -->
	</div>
  </div>
</section>		