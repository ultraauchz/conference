<?php
$curr_user = user();
?>
<!-- Logo -->
<a href="home/index" class="logo">
	<b>Admin</b>
</a>

<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <div style="float:left;position: absolute;top: 10px;left: 60px; font-weight: 700;font-size:20px;color:#FFFFFF;" >ระบบลงทะเบียนงานสัมมนา </div>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Welcome <span class="hidden-xs"><?php echo $curr_user->firstname.' '.$curr_user->lastname;?></span>
        </a>        
        <ul class="dropdown-menu">
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-right">
              <a href="admin/settings/profile" class="btn btn-info btn-flat">Edit Profile</a>
              <a href="admin/signout" class="btn btn-default btn-flat">Sign out</a>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>