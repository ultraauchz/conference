<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/main.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>:: ระบบลงทะเบียนออนไลน์ :: สำนักจัดการความรู้ กรมควบคุมโรค</title>
<!-- InstanceEndEditable -->
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #CCCCCC;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
}
</style>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<LINK rel="stylesheet" type="text/css" href="css/recruitstyle.css">
<META name="GENERATOR" content="MSHTML 9.00.8112.16448">
</head>

<body>
<table width="825" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="image/blue_top.jpg" width="825" height="25" /></td>
  </tr>
  <tr>
    <td><table width="825" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td width="781"><img src="image/logo.jpg" width="781" height="115" /></td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="825" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="277" bgcolor="#FFFFFF">&nbsp;</td>
        <td width="195" valign="top" bgcolor="#00adef"><img src="image/btn5.jpg" width="195" height="40" /><a href="index.php"><img src="image/btn1.jpg" width="195" height="40" /></a><a href="searchcode.php"><img src="image/btn2.jpg" width="195" height="40" /></a><a href="contact.php"><img src="image/btn4.jpg" width="195" height="40" /></a><img src="image/menu_bottom.jpg" width="195" height="162" /></td>
        <td width="586" valign="top" bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="content" -->
          <table width="97%" border="0" align="right" cellpadding="0" cellspacing="0">
            <tr>
              <td height="249" valign="top" bgcolor="#FFFFFF">
              
                <FORM id="form1" onSubmit="return checkdata();" method="post" name="form1" 
      action="submit.php">
              
                <p><strong>ลงทะเบียนออนไลน์บุคคลทั่วไป
                </strong>                </p>
                <p><strong><br />
                  คำนำหน้า</strong><strong><font color="red">*</font></strong>
                  <select name="title" id="title">
                    <option>--คำนำหน้า--</option>
                    <option>นาย</option>
                    <option>นาง</option>
                    <option>นางสาว</option>
                    <option>นายแพทย์</option>
                    <option>แพทย์หญิง</option>
                    <option>ทันตแพทย์</option>
                    <option>ทันตแพทย์หญิง</option>
                    <option>นายสัตวแพทย์</option>
                    <option>สัตวแพทย์หญิง</option>
                    <option>เภสัชกร</option>
                    <option>เภสัชกรหญิง</option>
                    <option>เทคนิคการแพทย์</option>
                    <option>เทคนิคการแพทย์หญิง</option>
                  </select>
                  <label for="other_title"><strong>อื่นๆ โปรดระบุ</strong></label>
                  <input name="other_title" type="text" id="other_title" size="0" maxlength="50" />
              </p>
                <p><strong>ชื่อ<FONT COLOR=red>*</FONT></strong>
                  <input name="firstname" type="text" id="firstname" maxlength="50" />
                  <strong>นามสกุล<FONT COLOR=red>*</FONT></strong>
                  <input name="lastname" type="text" id="lastname" maxlength="50" />
                </p>
                <p><strong>เพศ</strong><strong><font color="red">*</font></strong> 
                  <label for="sex"></label>
                  <select name="sex" id="sex">
                    <option>--เลือกเพศ--</option>
                    <option>ชาย</option>
                    <option>หญิง</option>
                  </select>
                </p>
                <p><strong>ตำแหน่ง<FONT COLOR=red>*</FONT></strong>
                  <label for="position"></label>
                  <input name="position" type="text" id="position" maxlength="50" />
                </p>
                <p><strong>หน่วยงาน<FONT COLOR=red>*</FONT></strong>
                  <select name="organization" id="organization">
                    <option selected="selected">--เลือกหน่วยงาน--</option>
                  </select>
                  <label for="other_organization"><strong>อื่นๆ โปรดระบุ</strong></label>
                  <input name="other_organization" type="text" id="other_organization" size="0" maxlength="50" />
                </p>
                <p><strong>โทรศัพท์มือถือ<FONT COLOR=red>*</FONT></strong>
                  <input name="telephone" type="text" id="telephone" maxlength="10" /> 
                  <FONT COLOR=red>(ตัวอย่าง 0851234567)</FONT>
                </p>
                <p><strong>อีเมล<FONT COLOR=red>*</FONT></strong>
                  <input name="email" type="text" id="email" maxlength="50" />
                </p>
                <p>
                  <label><strong><br />
                    การเข้าพัก<FONT COLOR=red>*</FONT></strong><br />
                    <input type="radio" name="status_hotel" value="ไม่เข้าพัก" id="status_hotel_0" />
                    <strong>ไม่เข้าพัก</strong></label>
                  เหลือที่ว่าง   50 คน <font color="red">(บุคลากรที่อยู่ส่วนกลาง กลุ่ม/กอง/ศูนย์/สำนัก/สถาบัน/กรม/กระทรวง) </font><br />
                  <label>
                    <input type="radio" name="status_hotel" value="เข้าพัก" id="status_hotel_1" />
                    <strong>เข้าพัก</strong></label>
                  เหลือที่ว่าง   150 คน
                  <label><strong> </strong></label>
                  <font color="red">(บุคลากรที่อยู่ส่วนภูมิภาค สคร./สสจ./สสอ./รพศ./รพท./รพช./รพสต.)</font></p>
                <p><strong>เข้าพัก โรงแรม</strong>
                  <select name="hotel" id="hotel">
                    <option>--เลือกโรงแรม--</option>
                  </select>
                </p>
                <p><strong>
                  <label for="date_in3">คืนที่</label>เข้า</strong>
                  <select name="date_in" id="date_in">
                    <option>วันที่</option>
                    <option>26</option>
                    <option>27</option>
                    <option>28</option>
</select>
                  <strong>เดือน</strong>
                  <select name="month_in" id="month_in">
                    <option>เดือน</option>
                    <option>มกราคม</option>
                  </select>
                  <strong>ปี
                  <select name="year_in" id="year_in">
                    <option>ปี</option>
                    <option>2559</option>
</select>
                   เวลาเข้า</strong>
                  <select name="time_in" id="time_in">
                    <option>เวลา</option>
                  </select>
                  <strong>น.</strong></p>
                <p><strong>
                  <label for="date_in4">คืนที่</label>ออก</strong>
                  <select name="date_out" id="date_out">
                    <option>วันที่</option>
                    <option>26</option>
                    <option>27</option>
                    <option>28</option>
</select>
                  <strong> <strong>เดือน
                  <strong>
<select name="month_out" id="month_out">
  <option>เดือน</option>
  <option>มกราคม</option>
</select>
ปี </strong></strong>
                  <select name="year_out" id="year_out">
                    <option>ปี</option>
                    <option>2559</option>
                  </select>
                  </strong></p>
                <p>
                  <label><strong><br />
                    อาหาร<FONT COLOR=red>*</FONT></strong><br />
                    <input type="radio" name="food" value="ทั่วไป" id="food_0" />
                    <strong>ทั่วไป</strong></label>
                  <input type="radio" name="food" value="มังสวิรัติ" id="food_1" />
                  <strong>มังสวิรัต</strong>
                  <label>
                    <input type="radio" name="food" value="มุสลิม" id="food_2" />
                    <strong>มุสลิม</strong></label>
                </p>
                <p>                  <br />
                </p>
                <p>
                  <center><strong><input name="check" type="checkbox" id="check" />
                    
                    <FONT COLOR=red>
                  กรุณาตรวจสอบข้อมูลของท่านให้ถูกต้อง ยืนยันการลงทะเบียน</FONT><br />
                  <br />
                  </strong></center>
                </p>
                <p>
                  <center>
                    <input type="submit" name="submit" id="submit" value="ลงทะเบียน" /></center>
                  <br />
                </p>
                <p><br />
            </p>
              </form></td>
            </tr>
          </table>
        <!-- InstanceEndEditable --></td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
  <TD style="background-repeat: repeat-x; color: #FFF; font-family: Tahoma, Geneva, sans-serif; font-size: 14px;" class="white13" height="54" vAlign="middle" 
    background="image/footer_bg.jpg" align="center">powered by <SPAN 
      class="white14bold">สำนักจัดการความรู้ กรมควบคุมโรค</SPAN></tr>
</table>
</body>
<!-- InstanceEnd --></html>
