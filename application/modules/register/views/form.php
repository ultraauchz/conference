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
		              	echo form_dropdown('titulation_id',get_option('id','titulation_title','titulations'),'','class="form-control-other"','--ระบุคำนำหน้าชื่อ--');
		              ?>
		              </div>
                      <div class="col-xs-2" style="padding:7px 1px;">อื่น ๆ โปรดระบุ</div>
                      <div class="col-xs-3">
		              <input type="text" class="form-control" style="text-align:left;" name="titulation_other" value="">
		              </div>		    
		              <div class="clearfix"></div>          
	            </div>	
	            <hr>    	            
	            <div class="form-group">
		              <label for="exampleInputFullname">ชื่อ - นามสกุล <span style="color:#f00;">*</span></label><br>
		              <div class="col-xs-5" style="padding-left:0px;">
		              	<input type="text" class="form-control" name="firstname" placeholder="ชื่อ" value=""> 
		              </div>
		              <div class="col-xs-6">
		              	<input type="text" class="form-control" name="lastname" placeholder="นามสกุล" value="">
		              </div>
		              <div class="clearfix"></div> 
	            </div>	            
	            <hr>
	            <div class="form-group">
	            	<label for="exampleInputGender">เพศ <span style="color:#f00;">*</span></label><br>
		              <div class="col-xs-5">
		              	<input type="radio" name="gender" class="gender_male" value="m" > ชาย
		              	<input type="radio" name="gender" class="gender_female" value="f" >หญิง 
		              </div>
		              <div class="clearfix"></div>
	            </div>
	            <hr>
	            <div class="form-group">
		              <label for="exampleInputPosition">ตำแหน่ง <span style="color:#f00;">*</span></label>
		              <input type="text" class="form-control" name="position" value="">
		              <div class="clearfix"></div>		              
	            </div>
	            <hr>
	            <div class="form-group">
		              <label for="exampleInputOrg">หน่วยงาน <span style="color:#f00;">*</span></label><br>
		              <div class="col-xs-5" style="padding-left:0px;">
		              <?php							
		              		echo form_dropdown('org_id',get_option('id','org_name','organizations'),'','class="form-control-other"','--กรุณาระบุหน่วยงาน--');
		              ?>
		              </div>
                      <div class="col-xs-2" style="padding:7px 1px;">อื่น ๆ โปรดระบุ</div>
                      <div class="col-xs-5">
		              <input type="text" class="form-control" style="text-align:left;" name="org_other" value="">
		              </div>		    
		              <div class="clearfix"></div>	
	            </div>
	            <hr>
	            <div class="form-group">
		              <label for="exampleInputMobileNo">โทรศัพท์มือถือ <span style="color:#f00;">*</span></label>
		              <input type="text" class="form-control" name="mobile_no" placeholder="ตัวอย่าง 0851234567" value="">
		        	  <div class="clearfix"></div>       		              
	            </div>
	            <hr>          
	            <div class="form-group">
		              <label for="exampleInputEmail1">อีเมล์ <span style="color:#f00;">*</span></label>
		              <input type="email" class="form-control" name="email" value="">
		              <div class="clearfix"></div> 		              
	            </div>
	            <hr>
	            <div class="form-group">
		              <label for="exampleInputRestType">การเข้าพัก</label>
		              <br>
		              <input type="radio" name="rest_type" value="n" > ไม่เข้าพัก 
		              &nbsp;&nbsp;&nbsp;		              
		              <input type="radio" name="rest_type" value="y" > เข้าพัก  		
		              <div class="clearfix"></div>              
	            </div>
	            <hr>
				<div id="dvRest">	           
	            <div class="form-group" id="dvHotel">
		              <label for="exampleInputRestType">โรงแรมที่เข้าพัก <span style="color:#f00;">*</span></label>
		              <br>
		              <div class="col-xs-5" style="padding-left:0px;">
		              <?php echo form_dropdown('hotel_id',get_option('id','hotel_name','hotels'),'','class="form-control-other"','--โปรดระบุโรงแรม-');?>
		              </div>
		              <div class="clearfix"></div>              
	            </div>
	            <hr>
	            <div class="form-group" id="dvHotel">
		              <label for="exampleInputRestType">คืนที่เข้าพัก <span style="color:#f00;">*</span></label>
		              <br>
		              <div class="col-xs-5" style="padding-left:0px;">
		              <div class="input-group">
			              <span class="input-group-addon">วัน</span>
			              <select name="checkin_day" class="form-control input-group-addon">
			              	<option value="26">26</option>
			              	<option value="27">27</option>
			              	<option value="28">28</option>
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
		              </div>
		              <div class="clearfix"></div>              
	            </div>
	            <hr>	            
	            <div class="form-group" id="dvHotel">
		              <label for="exampleInputRestType">คืนที่ออกจากที่พัก <span style="color:#f00;">*</span></label>
		              <br>
		              <div class="col-xs-5" style="padding-left:0px;">
		              <div class="input-group">
			              <span class="input-group-addon">วัน</span>
			              <select name="checkout_day" class="form-control input-group-addon">
			              	<option value="26">26</option>
			              	<option value="27">27</option>
			              	<option value="28" selected="selected">28</option>
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
		              </div>
		              <div class="clearfix"></div>              
	            </div>	            
	            <hr>	            
	            </div>
	            <div class="form-group">
		              <label for="exampleInputRestType">อาหาร <span style="color:#f00;">*</span></label>
		              <br>
		              <input type="radio" name="food_type" value="1" > ทั่วไป 
		              &nbsp;&nbsp;&nbsp;		              
		              <input type="radio" name="food_type" value="2" > มังสวิรัต
		              &nbsp;&nbsp;&nbsp;		              
		              <input type="radio" name="food_type" value="3"> มุสลิม  		  		
		              <div class="clearfix"></div>              
	            </div>
	            <hr>
	            <div class="form-group">
	            	  <input type="checkbox" name="confirm" value="1">ยืนยันข้อมูลในการลงทะเบียน
		              <div class="clearfix"></div>              
	            </div>
	            <hr>
	            <div class="form-group">	            	   
		              <input type="submit" class="btn btn-primary" value="สมัคร">
		              <a href="home/index" class="btn btn-default">Back</a>	              
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
                        checkIn = (!$('[name=checkin_day]').val() || !$('[name=checkin_month]').val() || !$('[name=checkin_year]').val());
                        if(!checkIn) {
                              $('[name=checkin_year]').parent().parent().append('<label for="checkin" generated="true" class="error">กรุณาระบุ</label>');
                              breakSubmit = 1;
                        }
                        $('[name=checkin_day], [name=checkin_month], [name=checkin_year]').on('change',function(){
                              $('label[for=checkin]').remove();
                        });
                        
                        //--คืนที่ออกจากที่พัก
                        checkOut = (!$('[name=checkout_day]').val() || !$('[name=checkout_month]').val() || !$('[name=checkout_year]').val());
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
		<?php if(@$value->rest_type=='y') echo 'show_rest_layout(true);'; else echo 'show_rest_layout(false);';?>
		 
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
	})
      
</script>
