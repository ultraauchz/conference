<?php echo bread_crumb($menu_id);?>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
		<div class="box">
			<form method="get" enctype="multipart/form-data">
			<div class="box-header">
			  <h3 class="box-title">Search</h3>			  
			</div><!-- /.box-header -->
			<div style="float:left;width:100%;">
				<div class="col-xs-3">
			  	<label for="country_id">Country</label> 
			  	<?php
			  	if( $perm->can_access_all == 'y' ){
			  		echo form_dropdown("country_id",get_option("id","country_name","acm_country"," ORDER BY country_name ASC"),@$_GET["country_id"],"class=\"form-control\" style=\"display:inline;\" ","-- Select Country --","");	
			  	}else{
			  		$ext_condition = $perm->can_access_all == 'y' ? '' : " WHERE id = ".$current_user->organization->country_id;
			  		echo form_dropdown("country_id",get_option("id","country_name","acm_country",$ext_condition." ORDER BY country_name ASC"),@$_GET["country_id"],"class=\"form-control\" style=\"display:inline;\" ");
			  	}			  	
			  	?>
			    </div>
			  <div class="col-xs-3">
			  	<label for="search">State name</label> 
			  	<input type="text" name="search" class="form-control" placeholder="Enter State name" value="<?=@$_GET['search'];?>">
			  </div>
			  <div class="col-xs-3">
			  	<br>
			  	<input type="submit" name="b" class="btn btn-primary" value="Search">
			  </div>
			</div>
			</form>
			<div class="box-body">
			  <?php echo $result->pagination()?>
			  <table id="example1" class="table table-bordered table-striped table-hover table_data">
			    <thead>
			      <tr>
			        <th style="width:50px;">NO</th>		
			        <th>Country</th>	        
			        <th>Name</th>			        
			        <th class="th_manage">Manage</th>
			      </tr>
			    </thead>
			    <tbody>
					<?php foreach ($result as $key => $item):
						$no++;
					?>
						<tr>
							<td><?php echo $no;?></td>		
							<td><?php echo $item->country->country_name;?></td>					
							<td><?php echo $item->state_name;?></td>
							<td>
								<?php if($perm->can_create == 'y'){?>
								<a href="admin/<?php echo $modules_name;?>/form/<?php echo $item->id?>" class="btn btn-primary" ><span class="glyphicon glyphicon-wrench" ></span> Edit</a>
								<?php }else{ ?>
								<a href="admin/<?php echo $modules_name;?>/form/<?php echo $item->id?>" class="btn btn-info" ><span class="glyphicon glyphicon-search" ></span> View</a>
								<?php } ?>
								<?php if($perm->can_delete =='y'){?>
								<a href="admin/<?php echo $modules_name;?>/delete/<?php echo $item->id?>" class="btn btn-danger btn_delete"><span class="glyphicon glyphicon-trash" ></span> Delete</a>
								<?php } ?>
							</td>
						</tr>
					<?php endforeach;?>	      
			    </tbody>
			    <tfoot>
			      <tr>
			      	<th>NO</th>
			      	<th>Country</th>
			        <th>Name</th>
			        <th class="th_manage">Manage</th>
			      </tr>
			    </tfoot>
			  </table>
			  <?php if($perm->can_create=='y'){?>
			  <div style="text-align:right;">
			  	<a href="admin/<?php echo $modules_name;?>/form" class="btn btn-info"><li class="fa fa-plus"></li> Create new</a>
			  </div>
			  <?php } ?>
			  <?php echo $result->pagination()?>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
  </div>
</section>