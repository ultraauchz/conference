<section class="content">
  <div class="row">
    <div class="col-xs-12">
		<div class="box" style="border:0px;">
			<form method="post" enctype="multipart/form-data" action="register/show_detail">
			<div class="box-header">
			  <h4 class="box-title">พิมพ์ใบลงทะเบียน</h4>			  
			</div><!-- /.box-header -->
			
			<div class="box-body">
	            <div class="form-group">
		              <label for="exampleInputFullname">ชื่อ - นามสกุล</label><br>
		              <div class="col-xs-5" style="padding-left:0px;">
		              	<input type="text" class="form-control" name="firstname" placeholder="ชื่อ" value="<?php echo @$_POST['firstname'];?>" required="required"> 
		              </div>
		              <div class="col-xs-6">
		              	<input type="text" class="form-control" name="lastname" placeholder="นามสกุล" value="<?php echo @$_POST['lastname'];?>" required="required">
		              </div>
		              <div class="clearfix"></div> 
	            </div>	            
	            <hr>
	            <div class="form-group">
	            	  <label for="exampleInputFullname">กรุณาป้อนข้อมูลที่ปรากฎด้านล่าง</label><br>
	            	  <input type="text" name="captcha" class="form-control" style="width:100px;" required="required">
	            	  <br>
	            	  <img src="home/captcha">	            	  
		              <div class="clearfix"></div>              
	            </div>
	            <hr>
	            <div class="form-group">	            	   
		              <input type="submit" class="btn btn-primary" value="แสดง">
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
	})
</script>