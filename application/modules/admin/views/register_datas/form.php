<?php echo bread_crumb($menu_id); ?>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
		<div class="box">
			<form method="post" enctype="multipart/form-data" action="admin/<?php echo $modules_name; ?>/save/<?php echo @$value -> id; ?>">
			<div class="box-header">
			  <h3 class="box-title">Add/Edit</h3>			  
			</div><!-- /.box-header -->
			
			<div class="box-body">
				<?php if($value->register_code!=''): ?>
				<div class="form-group">
		              <div class="input-group">
		              	<div class="input-group-addon" style="background:#fbffa3;font-size:20px;padding-top:25px;padding-bottom:25px;">
		              		รหัสลงทะเบียน ::: 
		              		<span style="color:#0006ce"><?php echo $value -> register_code; ?></span>
		              	</div>
		              </div>
		              <div class="clearfix"></div>          
	            </div>
	            <?php endif; ?>
				<div class="form-group">
		              <label for="exampleInputTitle">คำนำหน้า</label><br>
		              <div class="col-xs-3" style="padding-left:0px;">
		              <?php
					echo form_dropdown('titulation_id', get_option('id', 'titulation_title', 'titulations'), @$value -> titulation_id, 'class="form-control-other"', '--ระบุคำนำหน้าชื่อ--');
		              ?>
		              </div>
                      <div class="col-xs-1" style="padding:7px 1px;">อื่น ๆ โปรดระบุ</div>
                      <div class="col-xs-3">
		              <input type="text" class="form-control" style="text-align:left;" name="titulation_other" value="<?php echo $value -> titulation_other; ?>">
		              </div>		    
		              <div class="clearfix"></div>          
	            </div>	
	            <hr>    	            
	            <div class="form-group">
		              <label for="exampleInputFullname">ชื่อ - นามสกุล</label><br>
		              <div class="col-xs-3" style="padding-left:0px;">
		              	<input type="text" class="form-control" name="firstname" placeholder="ชื่อ" value="<?php echo @$value -> firstname; ?>"> 
		              </div>
		              <div class="col-xs-3">
		              	<input type="text" class="form-control" name="lastname" placeholder="นามสกุล" value="<?php echo @$value -> lastname; ?>">
		              </div>
		              <div class="clearfix"></div> 
	            </div>	            
	            <hr>
	            <div class="form-group">
	            	<label for="exampleInputGender">เพศ</label><br>
		              <div class="col-xs-5">
		              	<input type="radio" name="gender" class="gender_male" value="m" <?php
						if ($value -> gender == 'm')
							echo 'checked="checked"';
					?>> ชาย
		              	<input type="radio" name="gender" class="gender_female" value="f" <?php
							if ($value -> gender == 'f')
								echo 'checked="checked"';
						?>>หญิง 
		              </div>
		              <div class="clearfix"></div>
	            </div>
	            <hr>
	            <div class="form-group">
		              <label for="exampleInputPosition">ตำแหน่ง</label>
		              <input type="text" class="form-control" name="position" value="<?php echo @$value -> position; ?>">
		              <div class="clearfix"></div>		              
	            </div>
	            <hr>
	            <div class="form-group">
		              <label for="exampleInputOrg">หน่วยงาน</label><br>
		              <div class="col-xs-6" style="padding-left:0px;">
		              <?php
						$ext_condition = $perm -> can_access_all != 'y' ? 'where id = ' . $current_user -> org_id : '';
						if (@$value -> id) {
							$ext_condition = 'where id = ' . $value -> org_id;
							echo form_dropdown('org_id', get_option('id', 'org_name', 'organizations', $ext_condition), @$value -> org_id, 'class="form-control-other" ', '', false);
						} else {
							if ($perm -> can_access_all != 'y') {
								echo form_dropdown('org_id', get_option('id', 'org_name', 'organizations', $ext_condition), @$current_user->org_id, 'class="form-control-other" ', '', false);
							} else {
								echo form_dropdown('org_id', get_option('id', 'org_name', 'organizations', $ext_condition . ' ORDER BY prefix_code,sortorder ASC '), @$value -> org_id, 'class="form-control-other" ', '--โปรดระบุหน่วยงาน--');
							}
						}
		              ?>
		              </div>
                      <div class="col-xs-1" style="padding:7px 1px;">อื่น ๆ โปรดระบุ</div>
                      <div class="col-xs-3">
		              <input type="text" class="form-control" style="text-align:left;" name="org_other" value="<?php echo $value -> org_other; ?>">
		              </div>		    
		              <div class="clearfix"></div>	
	            </div>
	            <hr>
	            <div class="form-group">
		              <label for="exampleInputMobileNo">โทรศัพท์มือถือ</label>
		              <input type="text" class="form-control" name="mobile_no" placeholder="ตัวอย่าง 0851234567" value="<?php echo @$value -> mobile_no; ?>">
		        	  <div class="clearfix"></div>       		              
	            </div>
	            <hr>          
	            <div class="form-group">
		              <label for="exampleInputEmail1">อีเมล์</label>
		              <input type="email" class="form-control" name="email" value="<?php echo @$value -> email; ?>">
		              <div class="clearfix"></div> 		              
	            </div>
	            <hr>
	            <div id="dvRestLayout">
	            <div class="form-group">
		              <label for="exampleInputRestType">การเข้าพัก</label>
		              <br>
		              <input type="radio" name="rest_type" value="n" <?php if (@$value -> rest_type == 'n')echo 'checked="checked"';?>> ไม่เข้าพัก 
		              &nbsp;&nbsp;&nbsp;		              
		              <input type="radio" name="rest_type" value="y" <?php if (@$value -> rest_type == 'y')echo 'checked="checked"';?>> เข้าพัก  		
		              <div class="clearfix"></div>              
	            </div>
	            <hr>
				<div id="dvRest">	           
	            <div class="form-group" id="dvHotel">
		              <label for="exampleInputRestType">หมายเหตุการเข้าพัก</label>
		              <br>
		              <div style="padding-left:0px;">
		              	<?php
		              		$configuration = new Configuration(1);
		              		echo $configuration->rest_remark; 
		              	?>
		              </div>
		              <div class="clearfix"></div>              
	            </div>
	            <div class="form-group" id="dvHotel">
		              <label for="exampleInputRestType">โรงแรมที่เข้าพัก</label>
		              <br>
		              <div class="col-xs-5 dvHotelList" style="padding-left:0px;">
		              	 <?php $ext_condition = @$value->org_id > 0 ? ' WHERE id IN (select hotel_id FROM hotels_organizations WHERE org_id = '.$value->org_id.')' : '';?>
		             	 <?php echo form_dropdown('hotel_id', get_option('id', 'hotel_name', 'hotels',$ext_condition.' order by hotel_name '), @$value -> hotel_id, 'class="form-control" ', '--โปรดระบุโรงแรม-'); ?>
		              </div>
		              <div class="clearfix"></div>              
	            </div>
	            <hr>
	            <div class="form-group" id="dvHotel">
		              <label for="exampleInputRestType">คืนที่เข้าพัก</label>
		              <br>
		              <div class="col-xs-5" style="padding-left:0px;">
		              <div class="input-group">
			              <span class="input-group-addon">วัน</span>
			              <select name="checkin_day" class="form-control input-group-addon">
			              	<option value="26" <?php
							if (@$checkin_day == '' || @$checkin_day == 26)
								echo 'selected="selected"';
						?>>26</option>
			              	<option value="27" <?php
								if (@$checkin_day == 27)
									echo 'selected="selected"';
							?>>27</option>
			              	<option value="28" <?php
								if (@$checkin_day == 28)
									echo 'selected="selected"';
							?>>28</option>
							<option value="29" <?php
								if (@$checkin_day == 29)
									echo 'selected="selected"';
							?>>29</option>
			              </select>
			              <span class="input-group-addon">เดือน</span>
			              <select name="checkin_month" class="form-control input-group-addon">
			              	<option value="01">มกราคม</option>
			              </select>
			              <span class="input-group-addon">ปี</span>
			              <select name="checkin_year" class="form-control input-group-addon">
			              	<option value="2016">2559</option>
			              </select>
		              </div>
		                <br>
			            <div class="input-group" style="width:158px;">
			              <span class="input-group-addon">เวลา</span>
			              <select name="checkin_hour" style="width:72px;" class="form-control input-group-addon">
			              	<?php 
			              	for($hour=00;$hour<=23;$hour++):
								$txt_hour = str_pad($hour,2,"0",STR_PAD_LEFT)
			              	?>
			              	<option value="<?php echo $txt_hour; ?>" <?php
								if ((@$checkin_minute == '' && $txt_hour == '00') || @$checkin_hour == $txt_hour)
									echo 'selected="selected"';
							?>><?php echo $txt_hour; ?></option>
			              	<?php endfor; ?>
			              </select>
			              <span class="input-group-addon">:</span>
			              <select name="checkin_minute" style="width:72px;" class="form-control input-group-addon" >
			              	<?php 
			              	for($minute=0;$minute<=59;$minute++):
								$txt_minute = str_pad($minute,2,"0",STR_PAD_LEFT)
			              	?>
			              	<option value="<?php echo $txt_minute; ?>" <?php
								if ((@$checkin_minute == '' && $txt_minute == '00') || @$checkin_minute == $txt_minute)
									echo 'selected="selected"';
							?>><?php echo $txt_minute; ?></option>
			              	<?php endfor; ?>
			              </select>
		              </div>
		              </div>
		              <div class="clearfix"></div>              
	            </div>
	            <hr>	            
	            <div class="form-group" id="dvHotel">
		              <label for="exampleInputRestType">คืนที่ออกจากที่พัก</label>
		              <br>
		              <div class="col-xs-5" style="padding-left:0px;">
		              <div class="input-group">
			              <span class="input-group-addon">วัน</span>
			              <select name="checkout_day" class="form-control input-group-addon">
			              	<option value="26" <?php
							if (@$checkout_day == '' || @$checkout_day == 26)
								echo 'selected="selected"';
						?>>26</option>
			              	<option value="27" <?php
								if (@$checkout_day == 27)
									echo 'selected="selected"';
							?>>27</option>
			              	<option value="28" <?php
								if (@$checkout_day == 28)
									echo 'selected="selected"';
							?>>28</option>
							<option value="29" <?php
								if (@$checkout_day == 29)
									echo 'selected="selected"';
							?>>29</option>
			              </select>
			              <span class="input-group-addon">เดือน</span>
			              <select name="checkout_month" class="form-control input-group-addon">
			              	<option value="1">มกราคม</option>
			              </select>
			              <span class="input-group-addon">ปี</span>
			              <select name="checkout_year" class="form-control input-group-addon">
			              	<option value="2016">2559</option>
			              </select>
		              </div>
		              <br>
		              <div class="input-group" style="width:158px;">
			              <span class="input-group-addon">เวลา</span>
			              <select name="checkout_hour" style="width:72px;" class="form-control input-group-addon" style="width:100px;">
			              	<?php 
			              	for($hour=00;$hour<=23;$hour++):
								$txt_hour = str_pad($hour,2,"0",STR_PAD_LEFT)
			              	?>
			              	<option value="<?php echo $txt_hour; ?>" <?php
								if ((@$checkout_hour == '' && $txt_hour == '00') || @$checkout_hour == $txt_hour)
									echo 'selected="selected"';
							?>><?php echo $txt_hour; ?></option>
			              	<?php endfor; ?>
			              </select>
			              <span class="input-group-addon">:</span>
			              <select name="checkout_minute" style="width:72px;" class="form-control input-group-addon" style="width:100px;">
			              	<?php 
			              	for($minute=0;$minute<=59;$minute++):
								$txt_minute = str_pad($minute,2,"0",STR_PAD_LEFT)
			              	?>
			              	<option value="<?php echo $txt_minute; ?>" <?php
								if ((@$checkout_minute == '' && $txt_minute == '00') || @$checkout_minute == $txt_minute)
									echo 'selected="selected"';
							?>><?php echo $txt_minute; ?></option>
			              	<?php endfor; ?>
			              </select>
		              	</div>
		              </div>
		              <div>		              	
		              </div>
		              <div class="clearfix"></div>              
	            </div>	            
	            <hr>	   
	            <!--         
	            <div class="form-group">
		              <label for="exampleInputRestType">พักคู่กับ</label>
		              <div class="input-group col-xs-10">
		              	<div id="dvRestWith"></div>
		              </div>					  
		              <div class="clearfix"></div>              
	            </div>
	            -->	            
	            <hr>	            
	            </div>
	            
	            </div>
	            <div class="form-group">
		              <label for="exampleInputRestType">อาหาร</label>
		              <br>
		              <input type="radio" name="food_type" value="1" <?php if ($value -> food_type == '1' || $value -> food_type == '')echo 'checked="checked"';
					?>> ทั่วไป 
		              &nbsp;&nbsp;&nbsp;		              
		              <input type="radio" name="food_type" value="2" <?php
						if ($value -> food_type == '2')
							echo 'checked="checked"';
					?>> มังสวิรัต
		              &nbsp;&nbsp;&nbsp;		              
		              <input type="radio" name="food_type" value="3"<?php
						if ($value -> food_type == '3')
							echo 'checked="checked"';
					?>> มุสลิม  		  		
		              <div class="clearfix"></div>              
	            </div>
	            <hr>
	            <table>
	            	<tr>
	            		<td>
				            <div class="form-group">
					              <label for="exampleInputEmail1">Create By / Created Date</label>
					              <div class="input-group" style="width:350px;">
						              <span class="input-group-addon"><i class="fa fa-user"></i></span>
						              <?php
										$user = @$value -> created_by > 0 ? user($value -> created_by) : '';
										$username = $value -> created_by > 0 ? $user -> titulation . ' ' . $user -> firstname . ' ' . $user -> lastname : '';
									  ?>
						              <input type="text" class="form-control" disabled="disabled" id="register_date" name="create"  value="<?php echo @$username . '  ' . @$value -> created; ?>">
					              </div>
				            </div>			
	            		</td>
	            		<td>
	            			<div class="form-group">
					              <label for="exampleInputEmail1">Update By / Updated Date</label>
					              <div class="input-group" style="width:350px;">
						              <span class="input-group-addon"><i class="fa fa-user"></i></span>
						              <?php
										$user = @$value -> updated_by > 0 ? user($value -> updated_by) : '';
										$username = @$value -> updated_by > 0 ? $user -> titulation . ' ' . $user -> firstname . ' ' . $user -> lastname : '';
									  ?>
						              <input type="text" class="form-control" disabled="disabled" id="register_date" name="update"  value="<?php echo @$username . '  ' . @$value -> updated; ?>">
					              </div>
				            </div>
	            		</td>
	            	</tr>
	            </table>
	            <div class="form-group">
	            	<?php if($configurations->internal_status!='y' && $perm->can_access_all != 'y'){ ?>
						<div>
							<ul class="pagination" style="background:#fce8e8;text-align:center;">
								<li>
									<span style="border:0px;margin-top:2px;background:none;text-align:center;">
										ขณะนี้การระบบได้ทำการปิดการลงทะเบียนในส่วนของบุคคลากรของกรมอยู่ เจ้าหน้าที่หน่วยงานจะไม่สามารถลงทะเบียนได้
									</span>
								</li>
							</ul>
						</div>
					<?php } ?>
	            	  <?php if($perm->can_create=='y'){ ?>
	            	  <input type="hidden" name="id" value="<?php echo @$value -> id; ?>">
	            	  	<?php if($configurations->internal_status=='y' || $perm->can_access_all == 'y'){ ?>
		              	<input type="submit" class="btn btn-primary" value="Save">
		              	<?php } ?>
					  <?php } ?>	
					  <input type="button" onclick="history.back()" class="btn btn-default" value="ย้อนกลับ">
	            </div>          	            	           	           
            </div>            
			</form>						
		</div><!-- /.box -->
	</div>
</div>
</section>
<script type="text/javascript" src="js/validate/jquery.validate.min.js" ></script>
<link rel="stylesheet" type="text/css" href="js/validate/jquery.validate.css" />

<script type="text/javascript">
	$(function() {

		$('form').validate({
			rules : {
				titulation_id : {
					required : true
				},
				firstname : {
					required : true
				},
				lastname : {
					required : true
				},
				gender : {
					required : true
				},
				position : {
					required : true
				},
				org_id : {
					required : true
				},
				mobile_no : {
					required : true
				},
				email : {
					required : true
				},
				rest_type : {
					required : true
				},
				food_type : {
					required : true
				}
			},
			messages : {
				titulation_id : {
					required : "กรุณาระบุ"
				},
				firstname : {
					required : "กรุณาระบุ"
				},
				lastname : {
					required : "กรุณาระบุ"
				},
				gender : {
					required : "กรุณาระบุ"
				},
				position : {
					required : "กรุณาระบุ"
				},
				org_id : {
					required : "กรุณาระบุ"
				},
				mobile_no : {
					required : "กรุณาระบุ"
				},
				email : {
					required : "กรุณาระบุ"
				},
				rest_type : {
					required : "กรุณาระบุ"
				},
				food_type : {
					required : "กรุณาระบุ"
				}
			},
			errorPlacement : function(error, element) {
				if (element.attr('name') == 'gender' || element.attr('name') == 'rest_type' || element.attr('name') == 'food_type') {
					$("[name=" + element.attr('name') + "]").parent().append(error);
				} else {
					error.insertAfter(element);
				}
			}
		});

		$('form').on('submit', function() {
			breakSubmit = 0;

			//Titulation is others.
			optionText = $('[name=titulation_id] option:checked').text();
			if (optionText == 'อื่นๆ' || optionText == 'อื่น ๆ') {
				if (!$('[name=titulation_other]').val()) {
					$('[name=titulation_other]').parent().append('<label for="titulation_other" generated="true" class="error">กรุณาระบุ</label>');
					breakSubmit = 1;
				}
				$('[name=titulation_other]').on('keyup', function() {
					$('label[for=titulation_other]').remove();
				});
			}

			//Organization is others.
			optionText = $('[name=org_id] option:checked').text();
			if (optionText == 'อื่นๆ' || optionText == 'อื่น ๆ') {
				if (!$('[name=org_other]').val()) {
					$('[name=org_other]').parent().append('<label for="org_other" generated="true" class="error">กรุณาระบุ</label>');
					breakSubmit = 1;
				}
				$('[name=org_other]').on('keyup', function() {
					$('label[for=org_other]').remove();
				});
			}

			//Rest_type validate
			if ($('[name=rest_type]:checked').val() == 'y') {
				//--โรงแรมที่เข้าพัก
				if (!$('[name=hotel_id]').val()) {
					$('[name=hotel_id]').parent().append('<label for="hotel_id" generated="true" class="error">กรุณาระบุ</label>');
					breakSubmit = 1;
				}
				$('[name=hotel_id]').on('change', function() {
					$('label[for=hotel_id]').remove();
				});

				//--คืนที่เข้าพัก
				checkIn = ($('[name=checkin_day]').val() != '' && $('[name=checkin_month]').val() != '' && $('[name=checkin_year]').val() != '');
				if (!checkIn) {
					$('[name=checkin_year]').parent().parent().append('<label for="checkin" generated="true" class="error">กรุณาระบุ</label>');
					breakSubmit = 1;
				}
				$('[name=checkin_day], [name=checkin_month], [name=checkin_year]').on('change', function() {
					$('label[for=checkin]').remove();
				});

				//--คืนที่ออกจากที่พัก
				checkOut = ($('[name=checkout_day]').val() != '' && $('[name=checkout_month]').val() != '' && $('[name=checkout_year]').val() != '');
				if (!checkOut) {
					$('[name=checkout_year]').parent().parent().append('<label for="checkout" generated="true" class="error">กรุณาระบุ</label>');
					breakSubmit = 1;
				}
				$('[name=checkout_day], [name=checkout_month], [name=checkout_year]').on('change', function() {
					$('label[for=checkout]').remove();
				});
			}

			if (breakSubmit == 1) {
				return false;
			}
		});
	});
</script>
<script type="text/javascript">
		$(document).ready(function(){
		<?php 
		if (@$value -> rest_type == 'y')
			echo 'show_rest_layout(true);';
		else
			echo 'show_rest_layout(false);';
		?>
		<?php if(@$value->id > 0 ){ ?>
			var org_id = '<?php echo @$value->org_id;?>';
			var rest_type = '<?php echo @$value->rest_type;?>';
			var hotel_id = '<?php echo @$value->hotel_id;?>';
			load_office_rest_layout(org_id, rest_type, hotel_id);
		<?php }else if ($perm -> can_access_all != 'y') { ?>
			var org_id = '<?php echo @$current_user->org_id;?>';
			var rest_type = '<?php echo @$value->rest_type;?>';
			var hotel_id = '<?php echo @$value->hotel_id;?>';			
			load_office_rest_layout(org_id, rest_type, hotel_id);
		<?php } ?>
			function show_rest_layout(is_show) {
				if (is_show) {
					$("#dvRest").show();
				} else {
					$("#dvRest").hide();
				}
			}


			$('input[name=rest_type]').click(function() {
				value = $(this).val();
				if (value == 'y') {
					show_rest_layout(true);
				} else {
					show_rest_layout(false);
				}
			})

			$("select[name=org_id]").change(function() {
				var org_id = $(this).val();
				var rest_type = $('[name=rest_type]').val();
				var hotel_id = $('select[name=hotel_id]').val();
				load_office_rest_layout(org_id);								
			})
			
			function load_office_rest_layout(org_id, rest_type, hotel_id){
				$.post('ajax/get_office_rest_layout',{
					'org_id' : org_id,
					'rest_type' : rest_type,
				},function(data){
					if(data=='y'){
						$('#dvRestLayout').show();
						load_office_rest_type_layout(org_id, rest_type);		
						load_office_hotel_list_layout(org_id, hotel_id);						
					}else{
						$('#dvRestLayout').hide();
						$('[name=rest_type][value=n]').attr('checked','checked');
					}
				});
			}
			
			function load_office_rest_type_layout(org_id, rest_type){				
				$.post('ajax/get_office_rest_type_layout',{
					'org_id' : org_id,
					'rest_type' : rest_type,
				},function(data){					
					if(rest_type != ''){
						$('input[name=rest_type][value='+rest_type+']').attr('checked', 'checked');
						if(rest_type=='y'){
							show_rest_layout(true);
						}else{
							show_rest_layout(false);
						}
					}else{
						$('input[name=rest_type][value=n]').removeAttr('checked');
						$('input[name=rest_type][value=y]').removeAttr('checked');
						switch(data){
							case '1':
								$('input[name=rest_type][value=n]').attr('checked', 'checked');
								show_rest_layout(false);
							break;
							case '2':
								$('input[name=rest_type][value=y]').attr('checked', 'checked');
								show_rest_layout(true);
								if(rest_type != ''){
									$('input[name=rest_type][value='+rest_type+']').attr('checked', 'checked');
								}
							break;
							default:
							$('input[name=rest_type][value=n]').attr('checked', 'checked');
							break;
						}	
					}									
				});
			}
			
			function load_office_hotel_list_layout(org_id, hotel_id){				
				$.post('ajax/get_office_hotel_list_layout',{
					'org_id' : org_id,
					'hotel_id' : hotel_id,
				},function(data){
					$('.dvHotelList').html(data);
					if(hotel_id!='')$('select[name=hotel_id]').val(hotel_id);
				});
			}
		})
</script>