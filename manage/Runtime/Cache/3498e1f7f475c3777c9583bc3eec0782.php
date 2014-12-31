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
				<td class="position">当前位置: 管理中心 -&gt;  -&gt; 列表</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo ($freshURL); ?>">[刷新列表]</a>
					<a href="<?php echo ($addURL); ?>">[增加]</a>
					<a href="javascript:reverseCheck(document.form1.ids);">[反向选择]</a>&nbsp;
					<a href="javascript:if(delCheck(document.form1.ids)) {document.form1.action.value = 'delete';document.form1.submit();}">[删除]</a>&nbsp;
			
					<select name="select_state" style="width:90px;" onChange="window.location='<?=$baseUrl?>&select_class=<?=$select_class?>&select_state=' + this.options[this.selectedIndex].value;">
						<option value="">请选择</option>
						<option value="1"<?php echo '<?'; ?>
 if ($select_state == 1) echo " selected"?>>未审核</option>
						<option value="2"<?php echo '<?'; ?>
 if ($select_state == 2) echo " selected"?>>正常</option>
						<option value="3"<?php echo '<?'; ?>
 if ($select_state == 3) echo " selected"?>>推荐</option>
					</select>
					<select name="state" id="state" onChange="if(stateCheck(document.form1.ids)) {document.form1.action.value = 'state';document.form1.state.value='' + this.options[this.selectedIndex].value + '';document.form1.submit();}">
						<option value="-1">设置状态为</option>
						<option value="0">未审核</option>
						<option value="1">正常</option>
						<option value="2">推荐</option>
					</select>
				</td>
				<td align="right">
					<form name="searchForm" method="get" action="" style="margin:0px;">
						查询：<input name="keyword" type="text" value="<?=urldecode($keyword)?>" size="30" maxlength="50" />
						<input type="submit" value="查询" style="width:60px;">
						<input type="hidden" name="class_id" value="<?=$class_id?>" />
						<input type="hidden" name="select_class" value="<?=$select_class?>" />
						<input type="hidden" name="select_state" value="<?=$select_state?>" />
					</form>
				</td>
			</tr>
		</table>
		<form name="form1" action="<?php echo U('InfoList/manage');?>" method="post">
		<table width="100%" border="0" cellspacing="1" cellpadding="0" align="center" class="listTable">
				<input type="hidden" name="action" value="">
				<input type="hidden" name="state" value="">
				<tr class="listHeaderTr">
					<td width="30"></td>
					<td width="60">序号</td>
					<td>标题</td>
					<td width="60">缩略图</td>
					<td width="60">附件</td>
					<td width="60">浏览量</td>
					<td width="60">状态</td>
					<td width="120">发表时间</td>
				</tr>
				<?php if(is_array($record)): foreach($record as $key=>$v): ?><tr class="listTr">
						<td><input type="checkbox" id="ids" name="ids[]" value="<?php echo ($v["id"]); ?>"></td>
						<td><?php echo ($v["sortnum"]); ?></td>
						<td><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["title"]); ?></a></td>
						<td><a href='' target='_blank'>图片</a></td>
						<td><a href='' target='_blank'>附件</a></td>
						<td><?php echo ($v["views"]); ?></td>
						<td><font color=#FF9900>未审核</font></td>
						<td><?php echo ($v["create_time"]); ?></td>
					</tr><?php endforeach; endif; ?>
				<tr class="listFooterTr">
					<td colspan="15"></td>
				</tr>
		</table>
		</form>
	</body>
</html>