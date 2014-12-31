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
	<body>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" background="__PUBLIC__/images/header_bg.jpg">
			<tr height="56">
				<td width="260"><img src="__PUBLIC__/images/header_left.jpg" width="260" height="56"></td>
				<td align="center" style="padding-top:20px;color:#FFF;font-weight:bold;">
					当前用户：<?php echo (session('ADMIN_NAME')); ?>
					&nbsp;&nbsp;
					<a href="<?php echo U('Admin/change_pass');?>" target="main" style="color:#FFF;">修改口令</a>
					&nbsp;&nbsp;
					<a href="<?php echo U('Home/index');?>"  style="color:#FFF;" >系统首页</a>
					&nbsp;&nbsp;
					&nbsp;&nbsp;
					<a href="../" style="color:#FFF;" target="_blank">网站首页</a>
					&nbsp;&nbsp;
					<a href="<?php echo U('Login/loginout');?>" target="_top" style="color:#FFF;" onClick="if (confirm('确定要退出吗？')) return true; else return false;">退出系统</a>
				</td>
				<td width="268" align="right"><img src="__PUBLIC__/images/header_right.jpg" width="268" height="56"></td>
			</tr>
		</table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr height="4" bgcolor="#1C5DB6">
                <td></td>
            </tr>
        </table>
	</body>
</html>