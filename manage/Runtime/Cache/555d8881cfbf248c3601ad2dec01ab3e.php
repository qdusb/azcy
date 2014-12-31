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
				var editor = K.create('textarea[name="reply"]', {
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
				<td class="position">当前位置: 管理中心 -&gt; 高级管理 -&gt; 留言簿</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo U('Message/message_list',array('page_id'=>$page_id));?>">[返回列表]</a>&nbsp;
				</td>
			</tr>
		</table>
		<form name="form1" action="<?php echo U('Message/message_update');?>" method="post">
			<input type="hidden" value="<?php echo ($page_id); ?>" name="page_id" />
			<input type="hidden" value="<?php echo ($info["id"]); ?>" name="id" />
			<table width="100%" border="0" cellSpacing="1" cellPadding="0" align="center" class="editTable">
				<tr class="editHeaderTr">
					<td class="editHeaderTd" colSpan="2">留言簿</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">序号</td>
					<td class="editRightTd"><input type="text" name="sortnum" maxlength="20" size="24" value="<?php echo ($info["sortnum"]); ?>"/></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">留言人姓名</td>
					<td class="editRightTd"><?php echo ($info["name"]); ?></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">工作单位</td>
					<td class="editRightTd"><?php echo ($info["company"]); ?></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">地址</td>
					<td class="editRightTd"><?php echo ($info["address"]); ?></td>
				</tr>
				
				<tr class="editTr">
					<td class="editLeftTd">电子信箱</td>
					<td class="editRightTd"><?php echo ($info["email"]); ?></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">联系电话</td>
					<td class="editRightTd"><?php echo ($info["phone"]); ?></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">留言主题</td>
					<td class="editRightTd"><?php echo ($info["title"]); ?></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">留言内容</td>
					<td class="editRightTd" height="100px" width="600px"><?php echo ($info["content"]); ?></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">留言时间</td>
					<td class="editRightTd"><?php echo ($info["create_time"]); ?></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">留言IP</td>
					<td class="editRightTd"><?php echo ($info["ip"]); ?></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">是否显示</td>
					<td class="editRightTd">
						<input type="radio" name="state" value="1" <?php if($info["state"] == 1): ?>checked<?php endif; ?>> 不显示
						<input type="radio" name="state" value="2" <?php if($info["state"] == 2): ?>checked<?php endif; ?>> 显示
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">回复</td>
					<td class="editRightTd"><textarea name="reply" cols="100" rows="10"><?php echo ($info["reply"]); ?></textarea>
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