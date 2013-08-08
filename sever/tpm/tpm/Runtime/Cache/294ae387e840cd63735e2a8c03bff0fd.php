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
		<style>
		.ui-content {
			line-height: 1.6em;
			font-size: 14px;
			font-family: "微软雅黑";
		}
		code.prettyprint {
			position: relative;
			border: 0;
			border: 1px solid #D1D7DC;
			margin-left: 0;
			padding: 2px;
			font-size: 14px;
			display: block;
			font-family: "Consolas",\5FAE\8F6F\96C5\9ED1;
			margin: 10px 0;
			white-space: normal;
			word-wrap: break-word;
		}
		
		table {
			border-collapse: separate;
			border-spacing: 2px;
			border-color: gray;
		}
		tbody {
			display: table-row-group;
			vertical-align: middle;
			border-color: inherit;
		}
		.ui-content table{
			background: #666;
			margin: 10px 0;
		}

		.ui-content table th{
			color: #fff;
			text-align: left;
			padding-left: 10px;
			padding-right: 10px;
			background: #666;
		}

		.ui-content td{
			padding-left: 10px;
			padding-right: 10px;
			background: #fff; 
			cursor: pointer;
		}

		.ui-content .add td{
			background: #efefef; 
		}

		.ui-content table .hover td{
			background: #D9E5F5;
		}
		.ui-header .jqm-navmenu-link{right:6%;}
		</style>
	</head>
    <body>
        <div data-role="page" id="DocPage">
            <div data-role="header" data-theme="b" data-position="fixed">
                <a href="__URL__" data-rel="back" class="ui-btn-left" data-icon="back">返回</a>
                <h1 id="doctitle"><?php echo ($title); ?></h1>
                <a href="#mypanel" class="ui-btn-right jqm-navmenu-link" data-icon="bars">目录</a>
				<a href="__URL__" data-icon="home" class="ui-btn-right">首页</a>
            </div>
            <div data-role="content" id="doccontent">
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["content"]); endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div data-role="footer" data-position="fixed">
                <p style="text-align:center;">
				ThinkPHP Mobile 测试版
                </p>
            </div>
			<div id='mypanel' data-role="panel" class="jqm-nav-panel jqm-navmenu-panel" data-position="right" data-display="overlay" data-theme="c">
				<ul data-role="listview" data-theme="d" data-divider-theme="d" data-icon="false" data-global-nav="demos" class="jqm-list">
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-role="list-divider"><?php echo ($vo["title"]); ?></li>
					<?php if(empty($vo['_child'])): ?><li><a href='__URL__/read?id=<?php echo ($vo["id"]); ?>&title=<?php echo ($vo["title"]); ?>'><?php echo ($vo["title"]); ?></a></li>
					<?php else: ?>
						<?php if(is_array($vo['_child'])): $i = 0; $__LIST__ = $vo['_child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$co): $mod = ($i % 2 );++$i;?><li><a href='__URL__/read?id=<?php echo ($co["id"]); ?>&title=<?php echo ($co["title"]); ?>'><?php echo ($co["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
        </div>
    </body>
</html>
</body>
</html>