<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<title></title>
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
				<td class="position">当前位置: 管理中心 -&gt; 隐藏管理 -&gt; 高级功能管理</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo U('Advanced/advanced_list');?>">[返回列表]</a>&nbsp;
				</td>
			</tr>
		</table>
		<form name="form1" action="<?php echo U('Advanced/advanced_update');?>" method="post" onSubmit="return check(this);">
			<input type="hidden" value="<?php echo ($info["id"]); ?>" name="id"/>
			<table width="100%" border="0" cellSpacing="1" cellPadding="0" align="center" class="editTable">
				<tr class="editHeaderTr">
					<td class="editHeaderTd" colSpan="2">高级功能管理</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">序号</td>
					<td class="editRightTd">
						<input type="text" name="sortnum" value="<?php echo ($info["sortnum"]); ?>" size="10" maxlength="4">
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">状态</td>
					<td class="editRightTd">
						<input type="radio" name="state" value="1" <?php if($info["state"] == 1): ?>checked<?php endif; ?>> 显示
						<input type="radio" name="state" value="0" <?php if($info["state"] == 0): ?>checked<?php endif; ?>> 不显示
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">功能名称</td>
					<td class="editRightTd">
						<input type="text" name="name" value="<?php echo ($info["name"]); ?>" size="50" maxlength="50">
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">模块</td>
					<td class="editRightTd">
						<input type="text" name="model" value="<?php echo ($info["model"]); ?>" size="50" maxlength="50">
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">动作</td>
					<td class="editRightTd">
						<input type="text" name="action" value="<?php echo ($info["action"]); ?>" size="50" maxlength="50">
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">首页文件</td>
					<td class="editRightTd">
						<input type="text" name="default_file" value="<?php echo ($info["default_file"]); ?>" size="50" maxlength="50">
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">说明</td>
					<td class="editRightTd">
						当新增了新功能，必须在config.php文件中新增自定义常量的值，否则无法正确判断权限。
					</td>
				</tr>
				<tr class="editFooterTr">
					<td class="editFooterTd" colSpan="2">
						<input type="submit" value=" 确 定 ">
						<input type="reset" value=" 重 填 ">
					</td>
				</tr>
			</table>
		</form>
		<script type="text/javascript">document.form1.name.focus();</script>
	</body>
</html>