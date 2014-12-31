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
				<td class="position">当前位置: 管理中心 -&gt; 隐藏管理 -&gt; 高级功能管理</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo U('Advanced/advanced_list');?>">[刷新列表]</a>&nbsp;
					<a href="<?php echo U('Advanced/advanced_edit');?>">[增加]</a>&nbsp;
				</td>
				<td width="500" align="right">
				</td>
			</tr>
		</table>
		<table width="100%" border="0" cellspacing="1" cellpadding="0" align="center" class="listTable">
			<tr class="listHeaderTr">
				<td width="5%">ID号</td>
				<td width="8%">序号</td>
				<td width="30%">功能名称</td>
				<td>首页文件</td>
				<td width="8%">状态</td>
				<td width="8%">删除</td>
			</tr>
			<?php if(is_array($info)): foreach($info as $key=>$v): ?><tr class="listTr">
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["sortnum"]); ?></td>
				<td><a href="<?php echo U('Advanced/advanced_edit',array('id'=>$v['id']));?>"><?php echo ($v["name"]); ?></a></td>
				<td><?php echo ($v["default_file"]); ?></td>
				<td><?php if($v["state"] == 0): ?><font color=#FF6600>不显示</font><?php else: ?>显示<?php endif; ?></td>
				<td><a href="<?php echo U('Advanced/advanced_delete',array('id'=>$v['id']));?>" onClick="return del('<?php echo ($v["name"]); ?>');">删除</a></td>
			</tr><?php endforeach; endif; ?>
			<tr class="listFooterTr">
				<td colspan="10"></td>
			</tr>
		</table>
	</body>
</html>