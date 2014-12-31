<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<title>网站管理系统</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta http-equiv="Expires" content="-1000">
        <link href="__PUBLIC__/images/admin.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="__PUBLIC__/images/common.js"></script>
	</head>
	<frameset rows="60, *" border="0" frameborder="0" framespacing="0">
		<frame name="header" src="<?php echo U('Index/header');?>" frameborder="0" scrolling="no" noresize>
		<frameset cols="170, *">
			<frame name="menu" src="<?php echo U('Index/menu');?>" frameborder="0" scrolling="yes" noresize>
			<frame name="main" src="<?php echo U('Index/main');?>" frameborder="0" scrolling="yes" noresize>
		</frameset>
	</frameset><noframes></noframes>
</html>