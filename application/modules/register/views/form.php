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
		              <label for="exampleInputTitle">คำนำหน้า</label><br>
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
		              <label for="exampleInputFullname">ชื่อ - นามสกุล</label><br>
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
	            	<label for="exampleInputGender">เพศ</label><br>
		              <div class="col-xs-5">
		              	<input type="radio" name="gender" class="gender_male" value="m" > ชาย
		              	<input type="radio" name="gender" class="gender_female" value="f" >หญิง 
		              </div>
		              <div class="clearfix"></div>
	            </div>
	            <hr>
	            <div class="form-group">
		              <label for="exampleInputPosition">ตำแหน่ง</label>
		              <input type="text" class="form-control" name="position" value="">
		              <div class="clearfix"></div>		              
	            </div>
	            <hr>
	            <div class="form-group">
		              <label for="exampleInputOrg">หน่วยงาน</label><br>
		              <div class="col-xs-5" style="padding-left:0px;">
		              <?php							
		              		echo form_dropdown('org_id',get_option('id','org_name','organizations'),'','class="form-control-other" required="required"','--กรุณาระบุหน่วยงาน--');
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
		              <label for="exampleInputMobileNo">โทรศัพท์มือถือ</label>
		              <input type="text" class="form-control" name="mobile_no" placeholder="ตัวอย่าง 0851234567" value="">
		        	  <div class="clearfix"></div>       		              
	            </div>
	            <hr>          
	            <div class="form-group">
		              <label for="exampleInputEmail1">อีเมล์</label>
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
		              <label for="exampleInputRestType">โรงแรมที่เข้าพัก</label>
		              <br>
		              <div class="col-xs-5" style="padding-left:0px;">
		              <?php echo form_dropdown('hotel_id',get_option('id','hotel_name','hotels'),'','class="form-control-other" required="required"','--โปรดระบุโรงแรม-');?>
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
		              <label for="exampleInputRestType">คืนที่ออกจากที่พัก</label>
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
		              <label for="exampleInputRestType">อาหาร</label>
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