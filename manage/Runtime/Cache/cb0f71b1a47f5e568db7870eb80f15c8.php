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
				<td class="position">当前位置: 管理中心 -&gt;  高级管理 -&gt; 广告管理</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo U('Adver/adver_list',array('page_id'=>$page_id));?>">[返回列表]</a>
				</td>
			</tr>
		</table>
		<form name="form1" action="<?php echo U('Adver/adver_update');?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="page_id" value="<?php echo ($page_id); ?>"/>
			<input type="hidden" name="id" 		value="<?php echo ($info["id"]); ?>"/>
			<table  width="100%" border="0" cellSpacing="1" cellPadding="0" align="center" class="editTable">
				<tr class="editHeaderTr">
					<td class="editHeaderTd" colSpan="2">修改资料</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">是否显示</td>
					<td class="editRightTd">
						<input type="radio" name="state" value="0" <?php if($info["state"] == 0): ?>checked<?php endif; ?>>不显示
						<input type="radio" name="state" value="1" <?php if($info["state"] == 1): ?>checked<?php endif; ?>>显示
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">广告类型</td>
					<td class="editRightTd">
						<?php if(is_array($mods)): foreach($mods as $key=>$v): ?><input type="radio" name="mode" value="<?php echo ($key); ?>"><?php echo ($v); endforeach; endif; ?>
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">广告文件</td>
					<td class="editRightTd">
						<input type="file" name="pic" size="40">
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">标题名称</td>
					<td class="editRightTd"><input type="text" value="<?php echo ($info["title"]); ?>" name="title" maxlength="50" size="50"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">链接网址</td>
					<td class="editRightTd"><input type="text" value="<?php echo ($info["url"]); ?>" name="url" maxlength="100" size="70"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">宽度</td>
					<td class="editRightTd"><input type="text" value="<?php echo ($info["width"]); ?>" name="width" maxlength="5" size="10"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">高度</td>
					<td class="editRightTd"><input type="text" value="<?php echo ($info["height"]); ?>" name="height" maxlength="5" size="10"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">拉屏时间</td>
					<td class="editRightTd"><input type="text" value="<?php echo ($info["time"]); ?>" name="time" maxlength="3" size="6"> 秒</td>
				</tr>
				<tr class="editFooterTr">
					<td class="editFooterTd" colSpan="2">
						<input type="submit" value=" 确 定 ">
						<input type="reset" value=" 重 填 ">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>