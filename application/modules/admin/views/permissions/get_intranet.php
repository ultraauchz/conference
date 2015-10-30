<table class="table table-bordered table-striped" >
	<thead>
		<th>ฟังก์ชัน <a><small>(อินทราเน็ต)</small></a></th>
		<th style="width:50px;" >ดู</th>
		<th style="width:50px;" >เพิ่ม</th>
		<th style="width:50px;" >ลบ</th>
		<th style="width:80px;" >ทั้งหมด</th>
	</thead>
	
	<tbody>
		<tr class="hidden" >
			<td colspan="4" ><input type="hidden" name="intranet" value="1" /></td>
		</tr>
		<?php foreach ($module as $key => $value):?>
		<?php if($value->extra==1):?>
		<tr>
			<td><?php echo $value->title?></td>
			<td colspan="4" ><input type="checkbox" class="checkbox checkbox-int_<?php echo $value->module?>" name="int_<?php echo $value->module?>_extra" value="1" <?php if(permission("int_".$value->module, "extra", $id)) echo "checked"?> /></td>
		</tr>
		<?php else:?>
		<tr>
			<td><?php echo $value->title?></td>
			<td><input type="checkbox" class="checkbox checkbox-int_<?php echo $value->module?>" name="int_<?php echo $value->module?>_view" value="1" <?php if(permission("int_".$value->module, "views", $id)) echo "checked"?> /></td>
			<td><input type="checkbox" class="checkbox checkbox-int_<?php echo $value->module?>" name="int_<?php echo $value->module?>_create" value="1" <?php if(permission("int_".$value->module, "create", $id)) echo "checked"?> /></td>
			<td><input type="checkbox" class="checkbox checkbox-int_<?php echo $value->module?>" name="int_<?php echo $value->module?>_delete" value="1" <?php if(permission("int_".$value->module, "delete", $id)) echo "checked"?> /></td>
			<td>
				<button type="button" class="btn btn-success btn-xs checkall" data-check="true" value="int_<?php echo $value->module?>" ><span class="glyphicon glyphicon-check"></span></button>
				<button type="button" class="btn btn-warning btn-xs checkall" data-check="false" value="int_<?php echo $value->module?>" ><span class="glyphicon glyphicon-unchecked"></span></button>
			</td>
		</tr>
		<?php endif?>
		<?php endforeach?>
	</tbody>
	
</table>