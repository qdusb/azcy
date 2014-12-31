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
				<td class="position">当前位置: 管理中心 -&gt; 高级管理 -&gt; 广告管理</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo ($freshURL); ?>">[刷新列表]</a>
					<a href="<?php echo U('Adver/adver_edit');?>">[增加]</a>
					<a href="javascript:reverseCheck(document.form1.ids);">[反向选择]</a>&nbsp;
					<a href="javascript:if(delCheck(document.form1.ids)) {document.form1.submit();}">[删除]</a>&nbsp;
				</td>
			</tr>
		</table>
		<form name="form1" action="<?php echo U('Adver/adver_delete');?>" method="post">
		<input type="hidden" name="page_id" value="<?php echo ($page_id); ?>"/>
		<table width="100%" border="0" cellspacing="1" cellpadding="0" align="center" class="listTable">
			
				<tr class="listHeaderTr">
					<td width="3%"></td>
					<td>标题名称</td>
					<td width="8%">广告方式</td>
					<td width="8%">宽度</td>
					<td width="8%">高度</td>
					<td width="8%">链接</td>
					<td width="8%">广告文件</td>
					<td width="8%">状态</td>
				</tr>
				<?php if(is_array($info)): foreach($info as $key=>$v): ?><tr class="listTr">
						<td><input type="checkbox" id="ids" name="ids[]" value="<?=$row["id"]?>"></td>
						<td><a href="<?php echo U('Adver/adver_edit',array('id'=>$v['id']));?>"><?php echo ($v["title"]); ?></a></td>
						<td>
							<?php switch($v["mode"]): case "popup": ?>弹出广告<?php break;?>
								<?php case "float": ?>漂浮广告<?php break;?>
								<?php case "hangL": ?>左侧门帘<?php break;?>
								<?php case "hangR": ?>右侧门帘<?php break;?>
								<?php case "hangLR": ?>左右门帘<?php break;?>
								<?php case "bigScreen": ?>拉屏广告<?php break;?>
								<?php default: ?><font color='#FF0000'>错误</font><?php endswitch;?>
						</td>
						<td><?php echo ($v["width"]); ?></td>
						<td><?php echo ($v["height"]); ?></td>
						<td><?php if($v['url'] == ''): ?>无<?php else: ?>有<?php endif; ?></td>
						<td><?php if($v['pic'] == ''): ?>无<?php else: ?>有<?php endif; ?></td>
						<td><?php if($v['state'] == 1): ?>显示<?php else: ?>不显示<?php endif; ?></td>
					</tr><?php endforeach; endif; ?>
				<tr class="listFooterTr">
					<td colspan="10"><a href="<?php echo ($page["home"]); ?>">首页</a>
<a href="<?php echo ($page["prev"]); ?>">上一页</a>
<?php if(is_array($page['page'])): $i = 0; $__LIST__ = $page['page'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo ($v["url"]); ?>" <?php if($v['label'] == $page['page_id']): ?>class="on"<?php endif; ?>><?php echo ($v["label"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
<a href="<?php echo ($page["next"]); ?>">下一页</a>
<a href="<?php echo ($page["end"]); ?>">末页</a>
</td>
				</tr>
			</table>
		</form>
	</body>
</html>