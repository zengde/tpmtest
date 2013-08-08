<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="zh-cn">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta charset="UTF-8">
	<title>test</title>
</head>
<body>
	<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>电玩智搜</title>
		<link rel="stylesheet"  href="../Public/mobile/css/themes/default/jquery.mobile-1.3.0.min.css">
		<script src="../Public/js/jquery-1.9.1.min.js" type='text/javascript'></script>
		<script src="../Public/mobile/jquery.mobile-1.3.0.min.js" type='text/javascript'></script>
	</head>
    <body>
		<div data-role="page" id="MainPage">
            <div data-role="header" data-position="fixed" data-theme="b">
                <h1>ThinkPHP文档</h1>
            </div>
            <div data-role="content">
                <div data-role="collapsible-set" data-theme="d" data-content-theme="d">
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div data-role="collapsible">
						<h3><?php echo ($vo["title"]); ?></h3>
						<ul data-role="listview">
							<?php if(empty($vo['_child'])): ?><li><a href='__URL__/read?id=<?php echo ($vo["id"]); ?>&title=<?php echo ($vo["title"]); ?>'><?php echo ($vo["title"]); ?></a></li>
							<?php else: ?>
								<?php if(is_array($vo['_child'])): $i = 0; $__LIST__ = $vo['_child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?><li><a href='__URL__/read?id=<?php echo ($co["id"]); ?>&title=<?php echo ($co["title"]); ?>'><?php echo ($co["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
						</ul>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
            </div>
            <div data-role="footer" data-position="fixed">
                <p style="text-align:center;">
				ThinkPHP Mobile 测试版
                </p>
            </div>
        </div>
    </body>
</html>
</body>
</html>