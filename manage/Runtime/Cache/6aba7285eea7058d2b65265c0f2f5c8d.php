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
					resizeType : 1,
					allowFileManager : false,
					width : '700px',
					height : '200px',
					pasteType : 1,
					items : [
							'source', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
							'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
							'insertunorderedlist', '|', 'link'],
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
				<td class="position">当前位置: 管理中心 -&gt;Baner管理 -&gt; <?php echo ($banner_name); ?> -&gt;新增/编辑</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo ($returnURL); ?>">[返回列表]</a>
				</td>
			</tr>
		</table>
	<form name="form1" action="<?php echo U('Banner/banner_update');?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="class_id" value="<?php echo ($class_id); ?>"/>
		<input type="hidden" name="id" value="<?php echo ($id); ?>"/>
		<table width="100%" border="0" cellSpacing="1" cellPadding="0" align="center" class="editTable">
			
				<tr class="editHeaderTr">
					<td class="editHeaderTd" colSpan="2">修改资料</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">排列序号</td>
					<td class="editRightTd">
						<input type="text" name="sortnum" value="<?php echo ($info["sortnum"]); ?>" maxlength="10" size="5">
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">名称</td>
					<td class="editRightTd"><input type="text" value="<?php echo ($info["title"]); ?>" name="title" maxlength="100" size="50"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">详细内容</td>
					<td class="editRightTd"><textarea name="content" style="width:700px;height:300px"><?php echo ($info["content"]); ?></textarea></td>
				</tr>
				
				<tr class="editTr">
					<td class="editLeftTd">链接网址</td>
					<td class="editRightTd"><input type="text" value="<?php echo ($info["url"]); ?>" name="url" maxlength="300" size="50"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">宽度</td>
					<td class="editRightTd"><input type="text" value="<?php echo ($info["width"]); ?>" name="width" maxlength="50" size="10"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">高度</td>
					<td class="editRightTd"><input type="text" value="<?php echo ($info["height"]); ?>" name="height" maxlength="50" size="10"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">状态</td>
					<td class="editRightTd">
					
						<input type="radio" name="state" value="1"<?php if($info["state"] == 1): ?>checked<?php endif; ?>>显示
						<input type="radio" name="state" value="0"<?php if($info["state"] == 0): ?>checked<?php endif; ?>>不显示
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">缩略图</td>
					<td class="editRightTd">
						<input type="file" name="pic" size="40">
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">大图</td>
					<td class="editRightTd">
						<input type="file" name="pic2" size="40">
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