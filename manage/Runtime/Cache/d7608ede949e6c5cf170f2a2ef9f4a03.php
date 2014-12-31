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
<script charset="utf-8" src="__PUBLIC__/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="__PUBLIC__/kindeditor/lang/zh_CN.js"></script>
<script>
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
		var editor2 = K.create('textarea[name="content2"]', {
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
				<td class="position">当前位置: 管理中心 -&gt; 高级管理 -&gt; 招聘职位</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo U('Job/job_list',array('page_id'=>$page_id));?>">[返回列表]</a>&nbsp;
				</td>
			</tr>
		</table>
		<form name="form1" action="<?php echo U('Job/job_update');?>" method="post">
			<input type="hidden" name="page_id" value="<?php echo ($page_id); ?>"/>
			<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>
			<table width="100%" border="0" cellSpacing="1" cellPadding="0" align="center" class="editTable">
				<tr class="editHeaderTr">
					<td class="editHeaderTd" colSpan="2">招聘职位</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">序号</td>
					<td class="editRightTd"><input type="text" name="sortnum" value="<?php echo ($info["sortnum"]); ?>" size="5" maxlength="5"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">状态</td>
					<td class="editRightTd">
						<input type="radio" name="state" value="1" <?php if($info["state"] == 1): ?>checked<?php endif; ?>>显示
						<input type="radio" name="state" value="0" <?php if($info["state"] == 0): ?>checked<?php endif; ?>>不显示
					</td>
				</tr>
				<tr class="editTr" style="display:none">
					<td class="editLeftTd">有无表单</td>
					<td class="editRightTd">
						<input type="radio" name="showForm" value="1" <?php if($info["showForm"] == 1): ?>checked<?php endif; ?>>有
						<input type="radio" name="showForm" value="0" <?php if($info["showForm"] == 0): ?>checked<?php endif; ?>>无
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">招聘职位</td>
					<td class="editRightTd"><input type="text" name="name" value="<?php echo ($info["name"]); ?>" maxlength="50" size="30"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">招聘人数</td>
					<td class="editRightTd"><input type="text" name="num" value="<?php echo ($info["num"]); ?>" maxlength="50" size="30"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">电子信箱</td>
					<td class="editRightTd"><input type="text" name="email" value="<?php echo ($info["email"]); ?>" maxlength="50" size="30"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">发布日期</td>
					<td class="editRightTd"><input type="text" name="publishdate" value="<?php echo ($info["publishdate"]); ?>" maxlength="50" size="30"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">截止日期</td>
					<td class="editRightTd"><input type="text" name="deadline" value="<?php echo ($info["deadline"]); ?>" maxlength="50" size="30"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">任职资格</td>
					<td class="editRightTd"><textarea name="content" cols="100" rows="10"><?php echo ($info["content"]); ?></textarea>
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">岗位职责</td>
					<td class="editRightTd"><textarea name="content2" cols="100" rows="10"><?php echo ($info["content2"]); ?></textarea>
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
	</body>
</html>