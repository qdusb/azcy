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
		<script charset="utf-8" src="__PUBLIC__/kindeditor/kindeditor.js"></script>
		<script charset="utf-8" src="__PUBLIC__/kindeditor/lang/zh_CN.js"></script>
		<script type="text/javascript">
			KindEditor.ready(function(K) {
				var editor = K.create('textarea[name="content"]', {
					uploadJson : '__PUBLIC__/kindeditor/php/upload_json.php',
					fileManagerJson : '__PUBLIC__/kindeditor/php/file_manager_json.php',
					width : '700px',
					height : '300px',
					pasteType : 1,
					allowFileManager : true,
					afterCreate : function() {
						var self = this;
						K.ctrl(document, 13, function() {
							self.sync();
							K('form[name=form1]')[0].submit();
						});
						K.ctrl(self.edit.doc, 13, function() {
							self.sync();
							K('form[name=form1]')[0].submit();
						});
					}
				});
			});
		</script>
	<body>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr class="position">
				<td class="position">当前位置: 管理中心 -&gt; <?php echo ($class_name); ?> -&gt; 分类编辑/新增</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td><a href="<?php echo ($returnURL); ?>">[返回列表]</a></td>
			</tr>
		</table>
		<form name="form1" action="<?php echo U('Category/manage_update');?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>
			<input type="hidden" name="pid" value="<?php echo ($info["pid"]); ?>"/>

			<table width="100%" border="0" cellSpacing="1" cellPadding="0" align="center" class="editTable">
				<tr class="editHeaderTr">
					<td class="editHeaderTd" colSpan="2">分类</td>
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
					<td class="editLeftTd">英文名称</td>
					<td class="editRightTd"><input type="text" name="en_name" value="<?php echo ($info["en_name"]); ?>" maxlength="200" size="30"></td>
				</tr>
				 <tr class="editTr">
					<td class="editLeftTd">链接模块</td>
					<td class="editRightTd"><input type="text" name="model" value="<?php echo ($info["model"]); ?>" maxlength="200" size="30"></td>
				</tr>
				 <tr class="editTr">
					<td class="editLeftTd">链接动作</td>
					<td class="editRightTd"><input type="text" name="action" value="<?php echo ($info["action"]); ?>" maxlength="200" size="30"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">使用状态</td>
					<td class="editRightTd">
						<input type="radio" name="state" value="1" <?php if($info["state"] == 1): ?>checked<?php endif; ?>>允许
						<input type="radio" name="state" value="0" <?php if($info["state"] == 0): ?>checked<?php endif; ?>>禁用
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">下级分类</td>
					<td class="editRightTd">
						<input type="radio" name="has_sub" value="1"<?php if($info["has_sub"] == 1): ?>checked<?php endif; ?>>有
						<input type="radio" name="has_sub" value="0"<?php if($info["has_sub"] == 0): ?>checked<?php endif; ?>>无
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">记录状态</td>
					<td class="editRightTd">
						<?php if(is_array($info_states)): foreach($info_states as $key=>$v): ?><input type="radio" name="info_state" value="<?php echo ($key); ?>" <?php if($info["info_state"] == $key): ?>checked<?php endif; ?>><?php echo ($v); endforeach; endif; ?>
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">图片</td>
					<td class="editRightTd">
						<input type="file" name="pic" size="40">
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">内容</td>
					<td class="editRightTd"><textarea name="content"><?php echo ($info["content"]); ?></textarea></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">注意事项</td>
					<td class="editRightTd">
						修改记录状态的值后，需要重新编辑此分类的下级分类。<br>
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