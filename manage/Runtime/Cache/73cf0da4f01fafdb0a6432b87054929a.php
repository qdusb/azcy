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
		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr class="position">
				<td class="position">当前位置: 管理中心 -&gt; 个人管理 -&gt; 修改口令</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td></td>
			</tr>
		</table>
		<form name="form1" action="<?php echo U('Admin/pass_update');?>" method="post">
		<table width="100%" border="0" cellSpacing="1" cellPadding="0" align="center" class="editTable">
			
				<tr class="editHeaderTr">
					<td class="editHeaderTd" colSpan="2">修改口令</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">登陆帐号</td>
					<td class="editRightTd"><?php echo ($info["name"]); ?></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">原密码</td>
					<td class="editRightTd"><input type="password" name="oldpass" value="" size="30" maxlength="20"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">新密码</td>
					<td class="editRightTd"><input type="password" name="newpass" value="" size="30" maxlength="20"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">确认新密码</td>
					<td class="editRightTd"><input type="password" name="newpass2" value="" size="30" maxlength="20"></td>
				</tr>
				<tr class="editFooterTr">
					<td class="editFooterTd" colSpan="2">
						<input type="submit" value=" 确 定 ">
						<input type="reset" value=" 重 填 ">
					</td>
				</tr>
		</table>
		</form>
		<script type="text/javascript">document.form1.oldpass.focus();</script>
	</body>
</html>