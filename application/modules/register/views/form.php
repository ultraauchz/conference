<section class="content">
  <div class="row">
    <div class="col-xs-12">
		<div class="box" style="border:0px;">
			<form method="post" enctype="multipart/form-data" action="register/save">
			<div class="box-header">
			  <h4 class="box-title">ลงทะเบียนออนไลน์บุคคลทั่วไป</h4>			  
			</div><!-- /.box-header -->
			
			<div class="box-body">
				<div class="form-group">
		              <label for="exampleInputTitle">คำนำหน้า <span style="color:#f00;">*</span></label><br>
		              <div class="col-xs-4" style="padding-left:0px;">
		              <?php
		              	echo form_dropdown('titulation_id',get_option('id','titulation_title','titulations'),@$_POST['titulation_id'],'class="form-control-other"','--ระบุคำนำหน้าชื่อ--');
		              ?>
		              </div>
                      <div class="col-xs-2" style="padding:7px 1px;">อื่น ๆ โปรดระบุ</div>
                      <div class="col-xs-3">
		              <input type="text" class="form-control" style="text-align:left;" name="titulation_other" value="<?php echo @$_POST['titulation_other'];?>">
		              </div>		    
		              <div class="clearfix"></div>          
	            </div>	
	            <hr>    	            
	            <div class="form-group">
		              <label for="exampleInputFullname">ชื่อ - นามสกุล <span style="color:#f00;">*</span></label><br>
		              <div class="col-xs-5" style="padding-left:0px;">
		              	<input type="text" class="form-control" name="firstname" placeholder="ชื่อ" value="<?php echo @$_POST['firstname'];?>"> 
		              </div>
		              <div class="col-xs-6">
		              	<input type="text" class="form-control" name="lastname" placeholder="นามสกุล" value="<?php echo @$_POST['lastname'];?>">
		              </div>
		              <div class="clearfix"></div> 
	            </div>	            
	            <hr>
	            <div class="form-group">
	            	<label for="exampleInputGender">เพศ <span style="color:#f00;">*</span></label><br>
		              <div class="col-xs-5">
		              	<input type="radio" name="gender" class="gender_male" value="m" <?php if(@$_POST['gender']=='m')echo 'checked="checked"';?> > ชาย
		              	<input type="radio" name="gender" class="gender_female" value="f" <?php if(@$_POST['gender']=='f')echo 'checked="checked"';?> >หญิง 
		              </div>
		              <div class="clearfix"></div>
	            </div>
	            <hr>
	            <div class="form-group">
		              <label for="exampleInputPosition">ตำแหน่ง <span style="color:#f00;">*</span></label>
		              <input type="text" class="form-control" name="position" value="<?php echo @$_POST['position'];?>">
		              <div class="clearfix"></div>		              
	            </div>
	            <hr>
	            <div class="form-group">
		              <label for="exampleInputOrg">หน่วยงาน <span style="color:#f00;">*</span></label><br>
		              <?php							
		              		echo form_dropdown('org_id',get_option('id','org_name','organizations', " WHERE show_public = 'y' ORDER BY prefix_code,sortorder ASC "),@$_POST['org_id'],'class="form-control-other"','--กรุณาระบุหน่วยงาน--');
		              ?>
		              <div class="clearfix"></div>
                      <div class="col-xs-2" style="padding:15px 1px;">อื่น ๆ โปรดระบุ</div>
                      <div class="col-xs-5" style="padding:15px 1px;">
		              <input type="text" class="form-control" style="text-align:left;" name="org_other" value="<?php echo @$_POST['org_other'];?>">
		              </div>		    
		              <div class="clearfix"></div>	
	            </div>
	            <hr>
	            <div class="form-group">
		              <label for="exampleInputMobileNo">โทรศัพท์มือถือ <span style="color:#f00;">*</span></label>
		              <input type="text" class="form-control" name="mobile_no" placeholder="ตัวอย่าง 0851234567" value="<?php echo @$_POST['mobile_no'];?>">
		        	  <div class="clearfix"></div>       		              
	            </div>
	            <hr>          
	            <div class="form-group">
		              <label for="exampleInputEmail1">อีเมล์ <span style="color:#f00;">*</span></label>
		              <input type="email" class="form-control" name="email" value="<?php echo @$_POST['email'];?>">
		              <div class="clearfix"></div> 		              
	            </div>
	            <hr>
	            <div class="form-group">
	            	  <?php 
	            	  	$norest_ticket = PUBLIC_NOREST_TICKET_QUOTAS - get_public_ticket('n');
					  	$rest_ticket = PUBLIC_REST_TICKET_QUOTAS - get_public_ticket('y');
	            	  	$rest_ticket_desc = $rest_ticket > 0? ' [ ว่างอีก '.$rest_ticket.' ที่ ] ' : '[ เต็ม  ]';
	            	  	$norest_ticket_desc = $norest_ticket > 0? ' [ ว่างอีก '.$norest_ticket.' ที่ ] ' : '[ เต็ม  ]';
	            	  ?>  
		              <label for="exampleInputRestType">
		              	 ประเภทหน่วยงาน ที่สมัคร  
		              	 <span style="color:#004ead;">ส่วนกลาง  ::: <?php echo $norest_ticket_desc;?> </span>, <span style="color:#00ad02;">ส่วนภูมิภาค ::: <?php echo $rest_ticket_desc;?> </span>		              	 
		              </label>
		              <br>
		              <div class="rest_type_layout col-xs-6">
		              	<select name="rest_type" class="form-control">
		              		<option value="">กรุณาระบุ</option>
		              		<option value="1">ส่วนกลาง  <?php echo $norest_ticket_desc;?></option>
		              		<option value="2">ส่วนภูมิภาค <?php echo $rest_ticket_desc;?></option>
		              	</select>
		              </div>
		              <div class="clearfix"></div>              
	            </div>
	            <hr>
	            <div class="form-group">
		              <label for="exampleInputRestType">อาหาร <span style="color:#f00;">*</span></label>
		              <br>
		              <input type="radio" name="food_type" value="1" <?php if(@$_POST['food_type']=='1')echo 'checked="checked"';?> > ทั่วไป 
		              &nbsp;&nbsp;&nbsp;		              
		              <input type="radio" name="food_type" value="2" <?php if(@$_POST['food_type']=='2')echo 'checked="checked"';?>> มังสวิรัต
		              &nbsp;&nbsp;&nbsp;		              
		              <input type="radio" name="food_type" value="3" <?php if(@$_POST['food_type']=='3')echo 'checked="checked"';?>> มุสลิม  		  		
		              <div class="clearfix"></div>              
	            </div>
	            <hr>
	            <div class="form-group">	            	   
		              <input type="submit" class="btn btn-primary" value="สมัคร">		              
		              <a href="home/index" class="btn btn-default">กลับไปหน้าแรก</a>	              
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
      $(function(){
      		
      		
            $('form').validate({
                  rules: {
                        titulation_id: { required:true },
                        firstname: { required:true },
                        lastname: { required:true },
                        gender: { required:true },
                        position: { required:true },
                        org_id: { required:true },
                        mobile_no: { required:true },
                        email: { required:true },
                        rest_type: { required:true },
                        food_type: { required:true }
                  },
                  messages: {
                        titulation_id: { required:"กรุณาระบุ" },
                        firstname: { required:"กรุณาระบุ" },
                        lastname: { required:"กรุณาระบุ" },
                        gender: { required:"กรุณาระบุ" },
                        position: { required:"กรุณาระบุ" },
                        org_id: { required:"กรุณาระบุ" },
                        mobile_no: { required:"กรุณาระบุ" },
                        email: { required:"กรุณาระบุ" },
                        rest_type: { required:"กรุณาระบุ" },
                        food_type: { required:"กรุณาระบุ" }
                  },
                  errorPlacement: function(error, element) {
                        if (element.attr('name') == 'gender' || element.attr('name') == 'rest_type' || element.attr('name') == 'food_type') {
                              $("[name="+element.attr('name')+"]").parent().append(error);
                        } else {
                              error.insertAfter(element);
                        }
                  }
            });
            
            
            $('form').on('submit', function(){
                  breakSubmit = 0;
                  
                  
                  //Titulation is others.
                  optionText = $('[name=titulation_id] option:checked').text();
                  if(optionText == 'อื่นๆ' || optionText == 'อื่น ๆ') {
                        if(!$('[name=titulation_other]').val()) {
                              $('[name=titulation_other]').parent().append('<label for="titulation_other" generated="true" class="error">กรุณาระบุ</label>');
                              breakSubmit = 1;
                        }
                        $('[name=titulation_other]').on('keyup',function(){
                              $('label[for=titulation_other]').remove();
                        });
                  }
                  
                  
                  //Organization is others.
                  optionText = $('[name=org_id] option:checked').text();
                  if(optionText == 'อื่นๆ' || optionText == 'อื่น ๆ') {
                        if(!$('[name=org_other]').val()) {
                              $('[name=org_other]').parent().append('<label for="org_other" generated="true" class="error">กรุณาระบุ</label>');
                              breakSubmit = 1;
                        }
                        $('[name=org_other]').on('keyup',function(){
                              $('label[for=org_other]').remove();
                        });
                  }
                  
                  
                  //Rest_type validate
                  if($('[name=rest_type]:checked').val() == 'y') {
                        //--โรงแรมที่เข้าพัก
                        if(!$('[name=hotel_id]').val()) {
                              $('[name=hotel_id]').parent().append('<label for="hotel_id" generated="true" class="error">กรุณาระบุ</label>');
                              breakSubmit = 1;
                        }
                        $('[name=hotel_id]').on('change',function(){
                              $('label[for=hotel_id]').remove();
                        });
                        
                        //--คืนที่เข้าพัก
                        checkIn = ($('[name=checkin_day]').val()!='' && $('[name=checkin_month]').val() != '' && $('[name=checkin_year]').val() != '');
                        if(!checkIn) {
                              $('[name=checkin_year]').parent().parent().append('<label for="checkin" generated="true" class="error">กรุณาระบุ</label>');
                              breakSubmit = 1;
                        }
                        $('[name=checkin_day], [name=checkin_month], [name=checkin_year]').on('change',function(){
                              $('label[for=checkin]').remove();
                        });
                        
                        //--คืนที่ออกจากที่พัก
                        checkOut = ($('[name=checkout_day]').val()!='' && $('[name=checkout_month]').val() != '' && $('[name=checkout_year]').val() != '');
                        if(!checkOut) {
                              $('[name=checkout_year]').parent().parent().append('<label for="checkout" generated="true" class="error">กรุณาระบุ</label>');
                              breakSubmit = 1;
                        }
                        $('[name=checkout_day], [name=checkout_month], [name=checkout_year]').on('change',function(){
                              $('label[for=checkout]').remove();
                        });
                  }
                  
                  if(breakSubmit == 1) {
                        return false;
                  }
            });
      });
      
</script>

<script type="text/javascript">
      
	$(document).ready(function(){
		<?php if(@$_POST['rest_type']=='y') echo 'show_rest_layout(true);'; else echo 'show_rest_layout(false);';?>
		 
		function show_rest_layout(is_show){
			if(is_show){
				$("#dvRest").show();
			}else{
				$("#dvRest").hide();
			}
		}
		
		$('input[name=rest_type]').click(function(){
			value = $(this).val();
			if(value=='y'){
				show_rest_layout(true);
			}else{
				show_rest_layout(false);
			}
		})
				
		$("select[name=titulation_id]").change(function(){
			var value = $(this).val();
			
			$.post('admin/register_datas/ajax_get_titulation_gender',{
				'titulation_id' : value,
			},function(data){
				switch(data){
					case 'm':
					break;
					case 'f':
					break;
					default:
					break;	
				}													
			});	
		})
		
		$("select[name=org_id]").change(function(){
			set_rest_type_layout();
		})
		
		function set_rest_type_layout(){
			var register_id = '';
			var org_id = $('select[name=org_id]').val();
			$.post('ajax/get_public_rest_type_layout',{
				'org_id' : org_id,
				'register_id' : register_id,
			},function(data){
					if(data > 0){
						$('select[name=rest_type]').val(data); 
						$('select[name=rest_type]').attr('readonly','readonly');
						$('select[name=rest_type]').attr('disabled','disabled');
					}else{
						$('select[name=rest_type]').removeAttr('readonly');
						$('select[name=rest_type]').removeAttr('disabled');
					}
			});	
		}
	})
      
</script>
