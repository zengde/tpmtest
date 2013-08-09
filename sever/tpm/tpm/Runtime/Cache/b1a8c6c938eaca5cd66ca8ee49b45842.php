<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="zh-cn">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta charset="UTF-8">
	<title>test</title>
</head>
<body>
	<!DOCTYPE html>
<html class="sidebar_default no-js" lang="en">
<head>
<meta charset="utf-8">
<title>Profile - Start - Admin Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="css/images/favicon.png">
<!-- Le styles -->
<link href="../Public/metro/css/twitter/bootstrap.css" rel="stylesheet">
<link href="../Public/metro/css/base.css" rel="stylesheet">
<link href="../Public/metro/css/twitter/responsive.css" rel="stylesheet">
<link href="../Public/metro/css/jquery-ui-1.8.23.custom.css" rel="stylesheet">
<script src="../Public/metro/js/plugins/modernizr.custom.32549.js"></script>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
</head>

<body>
<div id="loading"><img src="../Public/metro/img/ajax-loader.gif"></div>
<div id="responsive_part">
  <div class="logo"> <a href="index.html"><span>Start</span><span class="icon"></span></a> </div>
  <ul class="nav responsive">
    <li>
      <button class="btn responsive_menu icon_item" data-toggle="collapse" data-target=".overview"> <i class="icon-reorder"></i> </button>
    </li>
  </ul>
</div>
<!-- Responsive part -->

<div id="sidebar" class=" collapse1 in">
  <div class="scrollbar">
    <div class="track">
      <div class="thumb">
        <div class="end"></div>
      </div>
    </div>
  </div>
  <div class="viewport ">
    <div class="overview collapse">
      <div class="search row-fluid container">
        <h2>Search</h2>
        <form class="form-search">
          <div class="input-append">
            <input type="text" class=" search-query" placeholder="">
            <button class="btn_search color_4">Search</button>
          </div>
        </form>
      </div>
      <ul id="sidebar_menu" class="navbar nav nav-list container full">
        <li class="accordion-group  color_4"> <a class="dashboard " href="index.html"><img src="img/menu_icons/dashboard.png"><span>Dashboard</span></a> </li>
        <li class="accordion-group color_7"> <a class="accordion-toggle widgets collapsed " data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse1"> <img src="img/menu_icons/forms.png"><span>Form Elements</span></a>
          <ul id="collapse1" class="accordion-body collapse">
            <li><a href="forms_general.html">General</a></li>
<li><a href="forms_wizard.html">Wizards</a></li>
            <li><a href="forms_validation.html">Validation</a></li>
            <li><a href="forms_editor.html">Editor</a></li>
          </ul>
        </li>
        <li class="accordion-group color_3"> <a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse2"> <img src="img/menu_icons/widgets.png"><span>UI Widgets</span></a>
          <ul id="collapse2" class="accordion-body collapse">
            <li><a href="ui_buttons.html">Buttons</a></li>
            <li><a href="ui_dialogs.html">Dialogs</a></li>
            <li><a href="ui_icons.html">Icons</a></li>
            <li><a href="ui_tabs.html">Tabs</a></li>
            <li><a href="ui_accordion.html">Accordion</a></li>
          </ul>
        </li>
        <li class="color_13"> <a class="widgets" href="calendar2.html"> <img src="img/menu_icons/calendar.png"><span>Calendar</span></a> </li>
        <li class="color_10"> <a class="widgets"data-parent="#sidebar_menu" href="maps.html"> <img src="img/menu_icons/maps.png"><span>Maps</span></a> </li>
        <li class="accordion-group color_12"> <a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse3"> <img src="img/menu_icons/tables.png"><span>Tables</span></a>
          <ul id="collapse3" class="accordion-body collapse">
            <li><a href="tables_static.html">Static</a></li>
            <li><a href="tables_dynamic.html">Dynamics</a></li>
          </ul>
        </li>
        <li class="accordion-group color_19"> <a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse4"> <img src="img/menu_icons/statistics.png"><span>Charts</span></a>
          <ul id="collapse4" class="accordion-body collapse">
            <li><a href="statistics.html">Statistics Elements</a></li>
            <li><a href="charts.html">Charts</a></li>
          </ul>
        </li>
        <li class="color_24 "> <a class="widgets"data-parent="#sidebar_menu" href="grid.html"> <img src="img/menu_icons/grid.png"><span>Grid</span></a> </li>
        <li class="color_8"> <a class="widgets"data-parent="#sidebar_menu" href="media.html"> <img src="img/menu_icons/gallery.png"><span>Media</span></a> </li>
        <li class="color_4 "> <a class="widgets"data-parent="#sidebar_menu" href="file_explorer.html"> <img src="img/menu_icons/explorer.png"><span>File Explorer</span> </a> </li>
        <li class="accordion-group color_25 active"> <a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse5"> <img src="img/menu_icons/others.png"><span>Specific Pages</span></a>
          <ul id="collapse5" class="accordion-body collapse in">
            <li class="active"><a href="profile.html">Profile</a></li>
            <li><a href="search.html">Search</a></li>
            <li><a href="index2.html">Login</a></li>
           <li><a href="404.html">404 Error</a></li>
<li ><a href="blog.html">Blog</a></li>
          </ul>
        </li>
      </ul>
      
    </div>
  </div>
</div>
<div id="main">
  <div class="container">
    <div class="header row-fluid">
      <div class="logo"> <a href="index.html"><span>Start</span><span class="icon"></span></a> </div>
      <div class="top_right">
        <ul class="nav nav_menu">
          <li class="dropdown"> <a class="dropdown-toggle administrator" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
            <div class="title"><span class="name">George</span><span class="subtitle">Future Buyer</span></div>
            <span class="icon"><img src="img/thumbnail_george.jpg"></span></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
              <li><a href="profile.html"><i class=" icon-user"></i> My Profile</a></li>
              <li><a href="forms_general.html"><i class=" icon-cog"></i>Settings</a></li>
              <li><a href="index2.html"><i class=" icon-unlock"></i>Log Out</a></li>
              <li><a href="search.html"><i class=" icon-flag"></i>Help</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- End top-right --> 
    </div>
    <div id="main_container">
      <div class="row-fluid">
        <div class="span12">
          <div class="content spacer-big">
            <h3><span>About Me</span></h3>
            <hr>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit, dolor at molestie bibendum, diam est imperdiet libero, vel malesuada augue metus ultricies velit. In semper, neque vel luctus ullamcorper, lectus ligula faucibus risus, eget ultrices nisl magna eu ligula. Proin ipsum metus, varius sit amet dapibus id, dapibus vel felis. Duis eu odio mauris. Maecenas pulvinar dignissim arcu, quis elementum erat volutpat ac. Ut et neque a justo scelerisque pellentesque. Maecenas ut quam vitae mi condimentum iaculis at sed erat.</p>
            <p> In sit amet urna turpis, sit amet pretium nisi. Maecenas quam sem, aliquam nec vehicula sed, fringilla nec leo. Phasellus nec orci orci, vestibulum rutrum urna. Maecenas aliquam ipsum ut purus posuere suscipit. Vivamus posuere gravida metus. Aliquam erat volutpat. Suspendisse euismod pellentesque leo et imperdiet.</p>
            <p> In sit amet urna turpis, sit amet pretium nisi. Maecenas quam sem, aliquam nec vehicula sed, fringilla nec leo. Phasellus nec orci orci, vestibulum rutrum urna. Maecenas aliquam ipsum ut purus posuere suscipit. Vivamus posuere gravida metus. Aliquam erat volutpat. Suspendisse euismod pellentesque leo et imperdiet.</p>
            <hr>
            <blockquote>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
              <small>Someone famous <cite title="Source Title">Source Title</cite></small> </blockquote>
            <hr>
            <h3><span>Address</span></h3>
            <address>
            <strong>PixelGrade, Inc.</strong><br>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            <abbr title="Phone">P:</abbr> (123) 456-7890
            </address>
            <address>
            <strong>Full Name</strong><br>
            <a href="mailto:#">first.last@gmail.com</a>
            </address>
            <hr>
            <h3><span>Other info</span></h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit, dolor at molestie bibendum, diam est imperdiet libero, vel malesuada augue metus ultricies velit. In semper, neque vel luctus ullamcorper, lectus ligula faucibus risus, eget ultrices nisl magna eu ligula. Proin ipsum metus, varius sit amet dapibus id, dapibus vel felis. Duis eu odio mauris. Maecenas pulvinar dignissim arcu, quis elementum erat volutpat ac. Ut et neque a justo scelerisque pellentesque. Maecenas ut quam vitae mi condimentum iaculis at sed erat.</p>
            <p> In sit amet urna turpis, sit amet pretium nisi. Maecenas quam sem, aliquam nec vehicula sed, fringilla nec leo. Phasellus nec orci orci, vestibulum rutrum urna. Maecenas aliquam ipsum ut purus posuere suscipit. Vivamus posuere gravida metus. Aliquam erat volutpat. Suspendisse euismod pellentesque leo et imperdiet.</p>
            <p> In sit amet urna turpis, sit amet pretium nisi. Maecenas quam sem, aliquam nec vehicula sed, fringilla nec leo. Phasellus nec orci orci, vestibulum rutrum urna. Maecenas aliquam ipsum ut purus posuere suscipit. Vivamus posuere gravida metus. Aliquam erat volutpat. Suspendisse euismod pellentesque leo et imperdiet.</p>
          </div>
          <!-- End .content --> 
        </div>
        <!-- End .span9 --> 
      </div>
      <!-- End .row-fluid --> 
      
    </div>
    <!-- End #container --> 
  </div>
  <div id="footer">
    <p> &copy; Start - Admin Template 2012 </p>
    <span class="company_logo"><a href="http://www.pixelgrade.com"></a></span> </div>
</div>
</div>
<!-- /container --> 

<!-- Le javascript
    ================================================== --> 
<!-- General scripts --> 
<script src="../Public/metro/js/jquery.js" type="text/javascript"> </script> 
<!--[if !IE]> -->
<script src="../Public/metro/js/plugins/enquire.min.js" type="text/javascript"></script> 
<!-- <![endif]-->
<script language="javascript" type="text/javascript" src="../Public/metro/js/plugins/jquery.sparkline.min.js"></script> 
<script src="../Public/metro/js/plugins/excanvas.compiled.js" type="text/javascript"></script> 
<script src="../Public/metro/js/bootstrap-transition.js" type="text/javascript"></script> 
<script src="../Public/metro/js/bootstrap-alert.js" type="text/javascript"></script> 
<script src="../Public/metro/js/bootstrap-modal.js" type="text/javascript"></script> 
<script src="../Public/metro/js/bootstrap-dropdown.js" type="text/javascript"></script> 
<script src="../Public/metro/js/bootstrap-scrollspy.js" type="text/javascript"></script> 
<script src="../Public/metro/js/bootstrap-tab.js" type="text/javascript"></script> 
<script src="../Public/metro/js/bootstrap-tooltip.js" type="text/javascript"></script> 
<script src="../Public/metro/js/bootstrap-popover.js" type="text/javascript"></script> 
<script src="../Public/metro/js/bootstrap-button.js" type="text/javascript"></script> 
<script src="../Public/metro/js/bootstrap-collapse.js" type="text/javascript"></script> 
<script src="../Public/metro/js/bootstrap-carousel.js" type="text/javascript"></script> 
<script src="../Public/metro/js/bootstrap-typeahead.js" type="text/javascript"></script> 
<script src="../Public/metro/js/bootstrap-affix.js" type="text/javascript"></script> 
<script src="../Public/metro/js/fileinput.jquery.js" type="text/javascript"></script> 
<script src="../Public/metro/js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script> 
<script src="../Public/metro/js/jquery.touchdown.js" type="text/javascript"></script> 
<script language="javascript" type="text/javascript" src="../Public/metro/js/plugins/jquery.uniform.min.js"></script> 
<script language="javascript" type="text/javascript" src="../Public/metro/js/plugins/jquery.tinyscrollbar.min.js"></script> 
<script language="javascript" type="text/javascript" src="../Public/metro/js/jnavigate.jquery.min.js"></script> 
<script language="javascript" type="text/javascript" src="../Public/metro/js/jquery.touchSwipe.min.js"></script> 
<script language="javascript" type="text/javascript" src="../Public/metro/js/plugins/jquery.peity.min.js"></script> 

<!-- Custom made scripts for this template --> 
<script src="../Public/metro/js/scripts.js" type="text/javascript"></script> 

</body>
</html>
</body>
</html>