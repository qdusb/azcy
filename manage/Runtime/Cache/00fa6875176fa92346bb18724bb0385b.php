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
		<script>
			KindEditor.ready(function(K) {
				var editor = K.create('textarea[name="contact"]', {
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
				var editor1 = K.create('textarea[name="copyright"]', {
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
				<td class="position">当前位置: 管理中心  -&gt; 高级管理 -&gt; 基本设置</td>
			</tr>
		</table>
		<table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="20">
				<td></td>
			</tr>
		</table>
		<form name="form1" action="<?php echo U('Advanced/base_update');?>" method="post" onSubmit="return check(this);">
			<table width="100%" border="0" cellSpacing="1" cellPadding="0" align="center" class="editTable">
				<tr class="editHeaderTr">
					<td class="editHeaderTd" colSpan="2">基本设置</td>
				</tr>
					<td class="editLeftTd">网站标题</td>
					<td class="editRightTd">
						<input type="text" name="title" value="<?php echo ($info["title"]); ?>" size="50" maxlength="100">
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">公司名称</td>
					<td class="editRightTd">
						<input type="text" name="name" value="<?php echo ($info["name"]); ?>" size="50" maxlength="100">
					</td>
				</tr>
              	<tr class="editTr">
					<td class="editLeftTd">公司地址</td>
					<td class="editRightTd">
						<input type="text" name="address" value="<?php echo ($info["address"]); ?>" size="50" maxlength="100">
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">ICP备案号</td>
					<td class="editRightTd">
						<input type="text" name="icp" value="<?php echo ($info["icp"]); ?>" size="30" maxlength="30">
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">网站关键字</td>
					<td class="editRightTd" style="padding:10px;">
						<input type="text" name="keyword" value="<?php echo ($info["keyword"]); ?>" size="100" maxlength="200">
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">网站描述</td>
					<td class="editRightTd" style="padding:10px;">
						<input type="text" name="description" value="<?php echo ($info["description"]); ?>" size="100" maxlength="200">
					</td>
				</tr>
                <tr class="editTr">
					<td class="editLeftTd">公司联系信息</td>
					<td class="editRightTd">
						<textarea name="contact"><?php echo ($info["contact"]); ?></textarea>
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">版权信息</td>
					<td class="editRightTd" style="padding:10px;">
						<textarea name="copyright"><?php echo ($info["copyright"]); ?></textarea>
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">Javascript 代码</td>
					<td class="editRightTd" style="padding:10px;">
						<textarea name="javascript" cols="105" rows="5"><?php echo ($info["javascript"]); ?></textarea>
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">备注</td>
					<td class="editRightTd">
						请确保Javascript代码的安全性，防止可能引用错误甚至恶意的代码，造成网站瘫痪和数据丢失。
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