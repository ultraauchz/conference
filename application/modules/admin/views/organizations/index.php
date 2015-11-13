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
			  	<label for="search">ชื่อหน่วยงาน</label> 
			  	<input type="text" name="search" class="form-control" placeholder="Enter Organization name" value="<?=@$_GET['search'];?>">
			  </div>
			  <div class="col-xs-3">
			  	<label for="coutry_id">รหัสประเภทหน่วยงาน</label> 
			  	<?php
			  	//if( $perm->can_access_all == 'y' ){
			  		echo form_dropdown("prefix_code",get_option("code","title","(select code,CONCAT(CODE , ':::' , prefix_name) title from code_prefixes)code_prefixes"," ORDER BY code ASC"),@$_GET["prefix_code"],"class=\"form-control-other\" ","-- แสดงทั้งหมด --","");	
			  	//}else{
			  		//$ext_condition = $perm->can_access_all == 'y' ? '' : " WHERE id = ".$current_user->organization->country_id;
			  		//echo form_dropdown("prefix_code",get_option("code","code","prefix_code",$ext_condition." ORDER BY code ASC"),@$_GET["prefix_code"],"class=\"form-control\" style=\"display:inline;\" ");
			  	//}			  	
			  	?>
			  </div>
			  <div class="col-xs-3">
			  	<br>
			  	<input type="submit" name="b" class="btn btn-primary" value="Search">
			  </div>
			</div>
			</form>
			
			<div class="box-body">
			  <?php echo $rs->pagination()?>
			  <table id="example1" class="table table-bordered table-striped table-hover table_data">
				<thead>
					<tr>
						<th style="width:50px;">ลำดับ</th>
						<th>รหัส</th>
						<th>ชื่อหน่วยงาน</th>
						<th>โควต้า</th>
						<th>ลงทะเบียนแล้ว</th>
						<th class="th_manage">Manage</th>
					</tr>
				</thead>
				
				<tbody>
					<?php foreach ($rs as $key => $row):
						$no++;
					?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $row->prefix_code?></td>
						<td><?php echo $row->org_name?></td>
						<td><?php echo $row->max_participants;?></td>
						<td></td>
						<td>
							<?php if($perm->can_create == 'y'){?>
							<a href="admin/settings/<?php echo $modules_name;?>/form/<?php echo $row->id?>" class="btn btn-primary" ><span class="glyphicon glyphicon-wrench" ></span> Edit</a>
							<?php }else{ ?>
							<a href="admin/settings/<?php echo $modules_name;?>/form/<?php echo $row->id?>" class="btn btn-info" ><span class="glyphicon glyphicon-search" ></span> View</a>
							<?php } ?>
							<?php if($perm->can_delete =='y'){?>
							<a href="admin/settings/<?php echo $modules_name;?>/delete/<?php echo $row->id?>" class="btn btn-danger btn_delete"><span class="glyphicon glyphicon-trash" ></span> Delete</a>
							<?php } ?>
						</td>
					</tr>
					<?php endforeach?>
				</tbody>
				 <tfoot>
			      <tr>
					<th style="width:50px;">ลำดับ</th>
					<th>รหัส</th>
					<th>ชื่อหน่วยงาน</th>
					<th>โควต้า</th>
					<th>ลงทะเบียนแล้ว</th>
					<th class="th_manage">Manage</th>
				</tr>
			    </tfoot>
			</table>
			<?php if($perm->can_create=='y'){?>
			<div style="text-align:right;">
			  	<a href="admin/settings/<?php echo $modules_name;?>/form" class="btn btn-info"><li class="fa fa-plus"></li> Create new</a>
			</div>			
			<?php } ?>
			<?php echo $rs->pagination()?>
			</div>
		</div>
	</div>
</div>	
</section>

<script type="text/javascript">
	$(document).ready(function(){
		
		$('button[data-loading-text]').click(function () {
		    var btn = $(this);
		    if(btn.val()==1) {
				btn.val(0);
		    	btn.removeClass("btn-primary");
		    	btn.addClass("btn-danger");
		    	var status = 0;
		    	var textstatus = "Off";
		    } else {
				btn.val(1);
		    	btn.removeClass("btn-danger");
		    	btn.addClass("btn-primary");
		    	var status = 1;
		    	var textstatus = "On";
		    }
		    btn.button('loading');
		    
		    setTimeout(function(){
				btn.button('reset');
				btn.html(textstatus);
		    },1000);
		    
		    var id = btn.attr("id");
		    $.post("admin/approve/organization/"+id,{status:status});
		    return false;
		    
		});
		
	});
</script>
