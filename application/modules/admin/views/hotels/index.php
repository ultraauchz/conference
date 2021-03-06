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
			  	<label for="search">ชื่อโรงแรม</label> 
			  	<input type="text" name="search" class="form-control" placeholder="Enter Hotel name" value="<?=@$_GET['search'];?>">
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
						<th>ชื่อโรงแรม</th>
						<th class="th_manage">Manage</th>
					</tr>
				</thead>
				
				<tbody>
					<?php foreach ($rs as $key => $row):
						$no++;
					?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $row->hotel_name?></td>
						<td>
							<?php if($perm->can_create == 'y'){?>
							<a href="admin/settings/<?php echo $modules_name;?>/form/<?php echo $row->id?>" class="btn btn-primary" ><span class="glyphicon glyphicon-wrench" ></span> Edit</a>
							<?php }else{ ?>
							<a href="admin/settings/<?php echo $modules_name;?>/form/<?php echo $row->id?>" class="btn btn-info" ><span class="glyphicon glyphicon-search" ></span> View</a>
							<?php } ?>
							<?php 
							if($perm->can_delete =='y'){
								$regist = new Register_data();
								$regist->where('hotel_id = '.$row->id)->get(1);
								if(@$regist->id < 1){
							?>
							<a href="admin/settings/<?php echo $modules_name;?>/delete/<?php echo $row->id?>" class="btn btn-danger btn_delete"><span class="glyphicon glyphicon-trash" ></span> Delete</a>
							<?php } 
								 }
							?>
						</td>
					</tr>
					<?php endforeach?>
				</tbody>
				 <tfoot>
			      <tr>
					<th style="width:50px;">ลำดับ</th>
					<th>ชื่อโรงแรม</th>
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