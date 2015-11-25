<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url()?>" ></base>	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: รหัสลงทะเบียน :: สำนักจัดการความรู้ กรมควบคุมโรค</title>
<style type="text/css">
	body {
		margin-left: 0px;
		margin-top: 0px;
		margin-right: 0px;
		margin-bottom: 0px;
		text-align: left;
	}
	a:link {
		text-decoration: none;
		color: rgb(54, 54, 54);
	}
	a:visited {
		text-decoration: none;
		color: rgb(112, 112, 112);
	}
	a:hover {
		text-decoration: none;
		color: rgb(78, 78, 78);
	}
	a:active {
		text-decoration: none;
		color: rgb(78, 78, 78);
	}
</style>
<LINK rel="stylesheet" type="text/css" href="css/recruitstyle.css">
<META name="GENERATOR" content="MSHTML 9.00.8112.16448">
</head>

<body>
<table width="595" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><center><img src="images/Logo-Full-Final.png" width="363" height="78" /></center></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><center>
      <strong class="black14bold"><strong>ประชุมสัมมนาวิชาการป้องกันควบคุมโรคแห่งชาติ ประจําปี 2559<br />
วันที่ 27-29 มกราคม 2559<br />
ณ โรงแรมเซ็นทราศูนย์ราชการและคอนเวนชันเซ็นเตอร์  ถนนแจ้งวัฒนะ กรุงเทพมหานคร</strong></strong></center></td>
  </tr>
  <tr>
    <td><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5">
        	<span class="black14" style="font-size:24px;font-weight:bold;color:red;">
        		รหัสลงทะเบียน : <?php echo $value -> register_code; ?>
        	</span>
    	</td>
      </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5"><span class="black14"><strong>คำนำหน้า :</strong>&nbsp;&nbsp;<?php echo $value -> titulation -> titulation_title; ?></span></td>
        </tr>
      <tr>
        <td colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2">&nbsp;</td>
            </tr>
          <tr>
            <td width="40%"><span class="black14"><strong>ชื่อ :</strong>&nbsp;&nbsp;<?php echo $value -> firstname; ?></span></td>
            <td width="60%"><span class="black14"><strong>นามสกุล :</strong>&nbsp;&nbsp;<?php echo $value -> lastname; ?></span></td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" class="black14bold">
        	เพศ : 
        	<?php
        	switch($value->gender){
				case 'm':
					echo 'ชาย';
				break;
				case 'f':
					echo 'หญิง';
					break;
				default:
					echo 'ไม่ระบุ';
					break;
        	} 
        	?>
        	
        </td>
      </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5"><span class="black14"><strong>ตำแหน่ง :</strong>&nbsp;&nbsp;<?php echo $value -> position; ?></span></td>
      </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5"><span class="black14"><strong>หน่วยงาน :</strong>&nbsp;&nbsp;<?php echo $value -> organization -> org_name; ?></span></td>
        </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5"><span class="black14"><strong>โทรศัพท์มือถือ :</strong>&nbsp;&nbsp;<?php echo $value -> mobile_no; ?></span></td>
        </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5">
        	<span class="black14"><strong>อีเมล :</strong></span>&nbsp;&nbsp;
        	<?php echo $value -> email; ?>
        </td>
      </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
        </tr>
      <tr>
        <td colspan="5">
        	<span class="black14"><strong>ประเภทหน่วยงาน :</strong></span>&nbsp;&nbsp;
        	<?php 
        		switch($value->organization->org_type_id){
					case '1':
						echo 'ส่วนกลาง';
						break;
					case '2':
						echo 'ส่วนภูมิภาค';
						break;
					default:
						echo 'ไม่ระบุ';
						break;
        		} 
        	?>
        </td>
      </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
        </tr>
      <tr>
        	<td colspan="5"><span class="black14">
        		<strong>การเข้าพัก :</strong></span>&nbsp;&nbsp;
        		<?php
        			if($value->register_type == 2){
        				echo '-';
        			}else{
        				echo $rest_type = $value -> rest_type == 'y' ? 'เข้าพัก' : 'ไม่เข้าพัก';	
        			}        			
        		?>
        	</td>
        </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5"><span class="black14"><strong>เข้าพัก โรงแรม :</strong>&nbsp;&nbsp;
        	<?php echo $value -> hotel -> hotel_name; ?></span>
        </td>
        </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
        </tr>
      <tr>
        <td width="20%"><span class="black14"><strong><label for="date_in3">คืนที่</label>เข้า</strong>&nbsp;&nbsp;<?php echo @$checkin_day; ?></span></td>
        <td width="22%"><span class="black14"><strong>เดือน</strong>&nbsp;&nbsp;<?php echo @$checkin_month_name; ?></span></td>
        <td width="20%"><span class="black14"><strong>ปี</strong>&nbsp;&nbsp;<?php echo @$checkin_year; ?></span></td>
        <td width="22%"><span class="black14"><strong>เวลาเข้า</strong>&nbsp;&nbsp;<?php echo @$checkin_time; ?></span></td>
        <td width="16%"><span class="black14"><strong>น.</strong></span></td>
      </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
        </tr>
      <tr>
        <td><span class="black14"><strong>
          <label for="date_in2">วันที่</label>ออก</strong>&nbsp;&nbsp;<?php echo @$checkout_day; ?></span></td>
        <td><span class="black14"><strong>เดือน</strong>&nbsp;&nbsp;<?php echo @$checkout_month_name; ?></span></td>
        <td><span class="black14"><strong>ปี</strong>&nbsp;&nbsp;<?php echo @$checkout_year; ?></span></td>
        <td><span class="black14"><strong>เวลาออก</strong>&nbsp;&nbsp;<?php echo @$checkout_time; ?></span></td>
        <td><span class="black14"><strong>น.</strong></span></td>
      </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5">
        <span class="black14"><strong>อาหาร :</strong>
        	<?php
			$food = array('0' => 'ไม่ระบุ', '1' => 'ทั่วไป', '2' => 'มังสะวิรัติ', '3' => 'อิสลาม');
			echo $food = $food[$value -> food_type];
        	?>
        </span>
        </td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="red13">*** หมายเหตุ กรุณานำใบลงทะเบียนออนไลน์ฉบับนี้ไปแสดงต่อเจ้าหน้าที่เพื่อลงทะเบียนเข้างาน</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="post" action="">
      <center>
        <p>
          <input onclick="javascript:window.print()"name="Submit" type="submit" id="Submit" value="พิมพ์หน้านี้" />
        </p>
        <p>&nbsp;</p>
        <p><a href="home/index">กลับหน้าหลัก</a> </p>
      </center>
    </form></td>
  </tr>
</table>
</body>
</html>
