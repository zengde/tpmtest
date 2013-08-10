<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="zh-cn">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta charset="UTF-8">
	<title><?php echo ($title); ?>-ThinkPhp文档</title>
	<link href="../Public/metro/css/base.css" rel="stylesheet">
	<link href="../Public/metro/css/twitter/responsive.css" rel="stylesheet">
</head>
<body>
	<script src="../Public/metro/js/plugins/modernizr.custom.32549.js"></script>
<div id="loading"><img src="../Public/metro/img/ajax-loader.gif"></div>
<div id="responsive_part">
  <div class="logo"> <a href="index.html"><span>首页</span><span class="icon"></span></a> </div>
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
        <h2>搜索</h2>
        <form class="form-search">
          <div class="input-append">
            <input type="text" class=" search-query" placeholder="">
            <button class="btn_search color_4">搜索</button>
          </div>
        </form>
      </div>
      <ul id="sidebar_menu" class="navbar nav nav-list container full">
        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li class="accordion-group color_<?php echo ($k); ?>">
			<?php if(empty($vo['_child'])): ?><a class="dashboard " href="__URL__/read.html?id=<?php echo ($vo["id"]); ?>&title=<?php echo ($vo["title"]); ?>"><img src="../Public/metro/img/menu_icons/<?php echo ($k); ?>.png"><span><?php echo ($vo["title"]); ?></span></a>
			<?php else: ?>
				<a class="accordion-toggle widgets collapsed " data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse<?php echo ($k); ?>"> <img src="../Public/metro/img/menu_icons/<?php echo ($k); ?>.png"><span><?php echo ($vo["title"]); ?></span></a>
				<ul id="collapse<?php echo ($k); ?>" class="accordion-body collapse">
				<?php if(is_array($vo['_child'])): $i = 0; $__LIST__ = $vo['_child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?><li><a href='__URL__/read.html?id=<?php echo ($co["id"]); ?>&title=<?php echo ($co["title"]); ?>'><?php echo ($co["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul><?php endif; ?>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      
    </div>
  </div>
</div>
<div id="main">
  <div class="container">
    <div class="header row-fluid">
      <div class="logo"> <a href="index.html"><span>首页</span><span class="icon"></span></a> </div>
      <!-- End top-right --> 
    </div>
    <div id="main_container">
      <div class="row-fluid">
        <div class="span12">
          <div class="content spacer-big" style='padding:5px;'>
            <h3><span><?php echo ($title); ?></span></h3>
            <hr>
			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p><?php echo ($vo["content"]); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
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
    <p> ThinkPHP Mobile 测试版 </p>
  </div>
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
<script src="../Public/metro/js/bootstrap-collapse.js" type="text/javascript"></script> 
<script language="javascript" type="text/javascript" src="../Public/metro/js/plugins/jquery.tinyscrollbar.min.js"></script> 
<script language="javascript" type="text/javascript" src="../Public/metro/js/jquery.touchSwipe.min.js"></script> 

<!-- Custom made scripts for this template --> 
<script src="../Public/metro/js/scripts.js" type="text/javascript"></script> 
</body>
</html>