<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta http-equiv="Expires" content="-1000">
		<link href="__PUBLIC__/images/admin.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="__PUBLIC__/images/common.js"></script>
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
	</head>
	<body>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr class="position">
				<td class="position">当前位置: 管理中心 -&gt; 高级管理 -&gt; 一级分类管理</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td><a href="<?php echo U('Category/base_list');?>">[返回列表]</a></td>
			</tr>
		</table>
		<form name="form1" action="<?php echo U('Category/base_update');?>" method="post"  enctype="multipart/form-data" onSubmit="return check(this);">
		<table width="100%" border="0" cellSpacing="1" cellPadding="0" align="center" class="editTable">
			
				<tr class="editHeaderTr">
					<td class="editHeaderTd" colSpan="2">一级分类</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">ID号</td>
					<td class="editRightTd"><input type="text" name="id" value="<?php echo ($info["id"]); ?>" size="10" maxlength="20"></td>
				</tr>
                <tr class="editTr">
					<td class="editLeftTd">序号</td>
					<td class="editRightTd"><input type="text" name="sortnum" value="<?php echo ($info["sortnum"]); ?>" size="10" maxlength="5"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">分类名称</td>
					<td class="editRightTd"><input type="text" name="name" value="<?php echo ($info["name"]); ?>" maxlength="50" size="30"></td>
				</tr>
                <tr class="editTr">
					<td class="editLeftTd">英文名称</td>
					<td class="editRightTd"><input type="text" name="en_name" value="<?php echo ($info["en_name"]); ?>" maxlength="50" size="30"></td>
				</tr>
                <tr class="editTr">
					<td class="editLeftTd">分类状态</td>
					<td class="editRightTd">
                        <input type="radio" name="state" value="1" <?php if($info["state"] == 1): ?>checked<?php endif; ?>>使用
                        <input type="radio" name="state" value="0" <?php if($info["state"] == 0): ?>checked<?php endif; ?>>停用
                    </td>
				</tr>
				 <tr class="editTr">
					<td class="editLeftTd">内容设置</td>
					<td class="editRightTd">
                        <input type="checkbox" name="sub_content" value="1" <?php if($info["sub_content"] == 1): ?>checked<?php endif; ?>>有内容
                        <input type="checkbox" name="sub_pic" value="1" <?php if($info["sub_pic"] == 1): ?>checked<?php endif; ?>>有图片
                    </td>
				</tr>
                <tr class="editTr">
					<td class="editLeftTd">最大分类层次</td>
					<td class="editRightTd">
                        <select name="max_level">
							<?php $__FOR_START_16124__=2;$__FOR_END_16124__=7;for($i=$__FOR_START_16124__;$i < $__FOR_END_16124__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($info["max_level"] == 1): ?>selected<?php endif; ?>><?php echo ($i); ?></option><?php } ?>
                        
                        </select>
				    </td>
				</tr>
                <tr class="editTr">
					<td class="editLeftTd">记录状态</td>
					<td class="editRightTd">
					<?php if(is_array($info_states)): foreach($info_states as $key=>$v): ?><input type="radio" name="info_state" value="<?php echo ($key); ?>" <?php if($info["info_state"] == $key): ?>checked<?php endif; ?>><?php echo ($v); endforeach; endif; ?>
                    </td>
                </tr>
                <tr class="editTr">
					<td class="editLeftTd">记录设置</td>
					<td class="editRightTd">
                        <input type="checkbox" name="hasViews" value="1" <?php if($info["hasViews"] == 1): ?>checked<?php endif; ?>> 点击次数
						<input type="checkbox" name="hasState" value="1" <?php if($info["hasState"] == 1): ?>checked<?php endif; ?>> 是否显示
                        <input type="checkbox" name="hasAuthor" value="1" <?php if($info["hasAuthor"] == 1): ?>checked<?php endif; ?>> 文章作者
						<input type="checkbox" name="hasSource" value="1" <?php if($info["hasSource"] == 1): ?>checked<?php endif; ?>> 文章来源
                        <input type="checkbox" name="hasKeyword" value="1" <?php if($info["hasKeyword"] == 1): ?>checked<?php endif; ?>> 关键词
                        
						<br>

						<input type="checkbox" name="hasPic" value="1" <?php if($info["hasPic"] == 1): ?>checked<?php endif; ?>> 图片上传
						<input type="checkbox" name="hasAnnex" value="1" <?php if($info["hasAnnex"] == 1): ?>checked<?php endif; ?>> 附件上传
						<input type="checkbox" name="hasIntro" value="1" <?php if($info["hasIntro"] == 1): ?>checked<?php endif; ?>> 简要介绍
						<input type="checkbox" name="hasContent" value="1" <?php if($info["hasContent"] == 1): ?>checked<?php endif; ?>> 详细内容
						<input type="checkbox" name="hasWebsite" value="1" <?php if($info["hasWebsite"] == 1): ?>checked<?php endif; ?>> 链接地址
                        <br>
                        <input type="checkbox" name="hasLevel" value="1" <?php if($info["hasLevel"] == 1): ?>checked<?php endif; ?>> 等级设置
                        <input type="checkbox" name="hasShare" value="1" <?php if($info["hasShare"] == 1): ?>checked<?php endif; ?>> 是否分享
                    </td>
                </tr>
				<tr class="editTr">
					<td class="editLeftTd">内容</td>
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
		<script type="text/javascript">document.form1.name.focus();</script>

	</body>
</html>