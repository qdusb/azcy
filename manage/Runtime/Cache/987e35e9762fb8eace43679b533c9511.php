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
				<td class="position">当前位置: 管理中心 -&gt; 高级管理 -&gt; 一级分类管理</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo U('Category/base_list');?>">[刷新列表]</a>&nbsp;
					<a href="<?php echo U('Category/base_edit');?>">[增加]</a>&nbsp;
				</td>
			</tr>
		</table>
		<table width="100%" border="0" cellspacing="1" cellpadding="0" align="center" class="listTable">
			<tr class="listHeaderTr">
				<td width="10%">ID号</td>
                <td width="10%">序号</td>
				<td>分类名称</td>
                <td>图片</td>
                <td width="12%">记录状态</td>
                <td width="12%">最大层次</td>
                <td width="12%">二级分类</td>
				<td width="8%">删除</td>
			</tr>
			<?php if(is_array($classes)): foreach($classes as $key=>$v): ?><tr class="listTr">
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["sortnum"]); ?></td>
				<td><a href="<?php echo U('Category/base_edit',array('id'=>$v['id']));?>"><?php echo ($v["name"]); ?></a></td>
				<td>
					<?php switch($v["info_state"]): case "content": ?>图文模式<?php break;?>
					<?php case "list": ?>新闻列表<?php break;?>
					<?php case "pic": ?>图片列表<?php break;?>
					<?php case "pictxt": ?>图文列表<?php break;?>
					<?php case "custom": ?><font color=#FF6600>自定义</font><?php break;?>
					<?php default: ?><font color=#FF0000>错误</font><?php endswitch;?>
				</td>
				<td><a href=""><?php if($v['pic'] != ''): ?>有图片<?php else: ?>无图片<?php endif; ?></a></td>
				<td><?php echo ($v["max_level"]); ?></td>
				<td><?php if($v['state'] == 1): ?>正常<?php else: ?>停止<?php endif; ?></td>
				<td><a href="<?php echo U('Category/class_delete',array('id'=>$v['id']));?>" onClick="return del();">删除</a></td>
			</tr><?php endforeach; endif; ?>
			<tr class="listFooterTr">
				<td colspan="10"></td>
			</tr>
		</table>
	</body>
</html>