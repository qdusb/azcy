<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<title>登陆管理中心</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta http-equiv="Expires" content="-1000">
		<link href="__PUBLIC__/images/admin.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#002779">
			<tr>
				<td align="center">
					<table width="468" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td><img src="__PUBLIC__/images/login_1.jpg" width="468" height="23"></td>
						</tr>
						<tr>
							<td><img src="__PUBLIC__/images/login_2.jpg" width="468" height="147"></td>
						</tr>
					</table>
					<table width="468" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
						<tr>
							<td width="16"><img src="__PUBLIC__/images/login_3.jpg" width="16" height="122"></td>
							<td align="center">
								<form name="form1" action="<?php echo U('Login/login');?>" method="post">
								<table width="230" border="0" cellspacing="0" cellpadding="0">
									<tr height="5">
										<td width="5"></td>
										<td width="56"></td>
										<td></td>
									</tr>
									<tr height="36">
										<td></td>
										<td>用户名</td>
										<td><input type="text" name="name" size="24" maxlength="30" style="border:1px solid #000000;"></td>
									</tr>
									<tr height="36">
										<td>&nbsp; </td>
										<td>口　令</td>
										<td><input type="password" name="pass" size="24" maxlength="30" style="border:1px solid #000000;"></td>
									</tr>
									<tr height="5">
										<td colspan="3"></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td><input type="image" src="__PUBLIC__/images/bt_login.gif" width="70" height="18"></td>
									</tr>
								</table>
								</form>
							</td>
							<td width="16"><img src="__PUBLIC__/images/login_4.jpg" width="16" height="122"></td>
						</tr>
					</table>
					<table width="468" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td><img src="__PUBLIC__/images/login_5.jpg" width="468" height="16"></td>
						</tr>
					</table>
					<table width="468" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td align="right">
								<a href="http://www.ibw.cn" target="_blank">
									<img src="__PUBLIC__/images/login_6.gif" width="165" height="26" border="0">
								</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>