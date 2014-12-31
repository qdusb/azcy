<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta http-equiv="Expires" content="-1000">
		<link href="__PUBLIC__/images/admin.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="__PUBLIC__/images/common.js"></script>
		<script charset="utf-8" src="__PUBLIC__/kindeditor/kindeditor-all-min.js"></script>
		<script charset="utf-8" src="__PUBLIC__/kindeditor/lang/zh_CN.js"></script>
		<script>
			KindEditor.ready(function(K) {
				var editor = K.create('textarea[name="content"]', {
					uploadJson : 'kindeditor/php/upload_json.php',
					fileManagerJson : 'kindeditor/php/file_manager_json.php',
					width : '700px',
					height : '300px',
					pasteType : 1,
					allowFileManager : false,
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
				var editor1 = K.create('textarea[name="intro"]', {
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
	</head>
	<body>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr class="position">
				<td class="position">当前位置: 管理中心 -&gt; <?php echo ($info["class_name"]); ?> -&gt; 新增/编辑</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo ($returnURL); ?>">[返回列表]</a>
				</td>
			</tr>
		</table>

		<form name="form1" action="<?php echo U('Info/update');?>" method="post" enctype="multipart/form-data">
			<table width="100%" border="0" cellSpacing="1" cellPadding="0" align="center" class="editTable">
				<input name="class_id" type="hidden" value="<?php echo ($info["class_id"]); ?>"/>
				<input name="id" type="hidden" value="<?php echo ($info["id"]); ?>"/>
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
						<td class="editLeftTd">状态</td>
						<td class="editRightTd">
							<select name="state" style="width:80px;">
								<option value="0">未审核</option>
								<option value="1">正常</option>
								<option value="2">推荐</option>
							</select>
						</td>
					</tr>
				
					<tr class="editTr">
						<td class="editLeftTd">文章权限分配</td>
						<td class="editRightTd">
							<select name="level" style="width:80px;">
								<option value="0">普通用户</option>
								<option value="1">初级会员</option>
								<option value="2">中级会员</option>
								<option value="3">高级会员</option>
							</select>
						</td>
					</tr>
				

				
				<tr class="editTr">
					<td class="editLeftTd">发表时间</td>
					<td class="editRightTd"><input type="text" name="create_time" value="<?php echo (date('Y-m-d H:i:s',strtotime($info["create_time"]))); ?>" maxlength="20" size="24"> 时间格式为2009-01-01 00:00:00</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">标题名称</td>
					<td class="editRightTd"><input type="text" value="<?php echo ($info["title"]); ?>" name="title" maxlength="100" size="50"></td>
				</tr>
					<tr class="editTr">
						<td class="editLeftTd">文章类别</td>
						<td class="editRightTd">
						<input type="text" value="<?php echo ($info["class_name"]); ?>" name="title" maxlength="100" size="50">	
						</td>
					</tr>
				
					<tr class="editTr">
						<td class="editLeftTd">作者</td>
						<td class="editRightTd">
							<input type="text" value="<?php echo ($info["author"]); ?>" name="author" maxlength="50" size="30">
						</td>
					</tr>
				
					<tr class="editTr">
						<td class="editLeftTd">来源</td>
						<td class="editRightTd">
							<input type="text" value="<?php echo ($info["source"]); ?>" name="source" maxlength="50" size="30">
						</td>
					</tr>
				
					<tr class="editTr">
						<td class="editLeftTd">链接网址</td>
						<td class="editRightTd"><input type="text" value="<?php echo ($info["website"]); ?>" name="website" maxlength="300" size="50"></td>
					</tr>
				
					<tr class="editTr">
						<td class="editLeftTd">缩略图</td>
						<td class="editRightTd">
							<input type="file" name="pic" size="40">
							<?php echo '<?'; ?>

							if ($pic != "")
							{
							?>
								<input type="checkbox" name="del_pic" value="1"> 删除现有图片
							<?php echo '<?'; ?>

							}
							?>
						</td>
					</tr>
				
					<tr class="editTr">
						<td class="editLeftTd">附件</td>
						<td class="editRightTd">
							<input type="file" name="annex" size="40">
							<input type="checkbox" name="del_annex" value="1"> 删除现有附件
						</td>
					</tr>
				
					<tr class="editTr">
						<td class="editLeftTd">关键词</td>
						<td class="editRightTd">
							<input type="text" value="<?php echo ($info["keyword"]); ?>" name="keyword" maxlength="50" size="46">
						</td>
					</tr>
				
					<tr class="editTr">
						<td class="editLeftTd">简介</td>
						<td class="editRightTd"><textarea name="intro"><?php echo ($info["intro"]); ?></textarea></td>
					</tr>
				
					<tr class="editTr">
						<td class="editLeftTd">详细内容</td>
						<td class="editRightTd"><textarea name="content"><?php echo ($info["content"]); ?></textarea></td>
					</tr>
				
				<tr class="editFooterTr">
					<td class="editFooterTd" colSpan="2">
						<input type="submit" value=" 确 定 ">
						<input type="reset" value=" 重 填 ">
					</td>
				</tr>
			</table>
		</form>
		<script type="text/javascript">document.form1.title.focus();</script>
		
	</body>
</html>