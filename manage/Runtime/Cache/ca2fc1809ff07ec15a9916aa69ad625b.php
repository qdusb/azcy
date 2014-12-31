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
				<td class="position">当前位置: 管理中心 -&gt; Banner分类管理</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo U('Banner/banner_class_list');?>">[返回列表]</a>
				</td>
			</tr>
		</table>
		<form name="form1" action="<?php echo U('Banner/banner_class_update');?>" method="post">
		<input name="id" value="<?php echo ($info["id"]); ?>" type="hidden"/>
		<table width="100%" border="0" cellSpacing="1" cellPadding="0" align="center" class="editTable">
			
				<tr class="editHeaderTr">
					<td class="editHeaderTd" colSpan="2">子分类</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">排列序号</td>
					<td class="editRightTd"><input type="text" name="sortnum" value="<?php echo ($info["sortnum"]); ?>" size="10" maxlength="5"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">分类名称</td>
					<td class="editRightTd"><input type="text" name="name" value="<?php echo ($info["name"]); ?>" maxlength="50" size="30"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">禁止增加</td>
					<td class="editRightTd">
						
						<input type="radio" name="add_deny" value="1"<?php if($info["add_deny"] == 1): ?>checked<?php endif; ?>>是
						<input type="radio" name="add_deny" value="0"<?php if($info["add_deny"] == 0): ?>checked<?php endif; ?>>否
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">禁止删除</td>
					<td class="editRightTd">
						<input type="radio" name="delete_deny" value="1"<?php if($info["delete_deny"] == 1): ?>checked<?php endif; ?>>是
						<input type="radio" name="delete_deny" value="0"<?php if($info["delete_deny"] == 0): ?>checked<?php endif; ?>>否
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