<!DOCTYPE html>
<html lang="en">
<head>    
	<?php require_once '_meta.php';?>
</head>

<body>
<table width="825" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/blue_top.jpg" width="825" height="25" /></td>
  </tr>
  <tr>
    <td><table width="825" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td width="781">
        	 <!--<img src="images/logo.jpg" width="781" height="115" />-->
		     <object width="780" height="130"  data="medias/banner/logo.swf"></object>
        </td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>
    <table width="825" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="277" bgcolor="#FFFFFF">&nbsp;</td>
        <td width="195" valign="top" bgcolor="#00adef">
        	<?php
			require_once '_menu.php';
			?>
        </td>
        <td width="586" valign="top" bgcolor="#FFFFFF" >
        	<!-- InstanceBeginEditable name="content" -->
          	<?php echo $template['body']; ?>
        	<!-- InstanceEndEditable -->
        </td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
  	<td style="background-repeat: repeat-x; color: #FFF; font-family: Tahoma, Geneva, sans-serif; font-size: 14px;" class="white13" height="54" vAlign="middle" 
    background="images/footer_bg.jpg" align="center">
    powered by 
    <span class="white14bold">สำนักจัดการความรู้ กรมควบคุมโรค</span>
   	</td>
  </tr>
</table>
</body>
</html>