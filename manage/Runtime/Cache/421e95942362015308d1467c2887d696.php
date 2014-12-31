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
	<body>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr class="position">
				<td class="position">当前位置: 管理中心 -&gt; 产品系列管理</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo U('Link/link_class_list');?>">[刷新列表]</a>&nbsp;
					<a href="<?php echo U('Link/link_class_edit');?>">[增加]</a>&nbsp;
				</td>
				<td align="right">
				</td>
			</tr>
		</table>
		<table width="100%" border="0" cellspacing="1" cellpadding="0" align="center" class="listTable">
			<tr class="listHeaderTr">
				<td>序号</td>
				<td>系列名称</td>
				<td>记录状态</td>
				<td>删除</td>
			</tr>
			<?php if(is_array($info)): foreach($info as $key=>$v): ?><tr class="listTr">
				<td><?php echo ($v["sortnum"]); ?></td>
				<td><a href="<?php echo U('Link/link_class_edit',array('id'=>$v['id']));?>"><?php echo ($v["name"]); ?></a></td>
				<td>
				<?php if($v["haspic"] == 1): ?>图片链接
				<?php else: ?>文字链接<?php endif; ?>
				</td>
				<td><a href="<?php echo U('Link/link_class_delete',array('id'=>$v['id']));?>" onClick="return del();">删除</a></td>
			</tr><?php endforeach; endif; ?>
			<tr class="listFooterTr">
				<td colspan="10"><?=$page_str?></td>
			</tr>
		</table>
	</body>
</html>