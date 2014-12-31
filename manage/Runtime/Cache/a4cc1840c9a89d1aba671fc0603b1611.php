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
				<td class="position">当前位置: 管理中心 -&gt; 高级管理 -&gt; 招聘职位</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo ($freshURL); ?>">[刷新列表]</a>
					<a href="<?php echo ($addURL); ?>">[增加]</a>
				</td>
				<td align="right">
					
				</td>
			</tr>
		</table>
		<form name="form1" action="<?php echo U('Job/job_delete');?>" method="post">
		<input type="hidden" name="class_id" value="<?php echo ($class_id); ?>"/>
		<table width="100%" border="0" cellspacing="1" cellpadding="0" align="center" class="listTable">
			
				<tr class="listHeaderTr">
					<td width="5%"></td>
					<td width="8%">序号</td>
					<td>职位名称</td>
					<td width="15%">联系邮箱</td>
					<td width="15%">招聘人数</td>
					<td width="15%">状态</td>
					<td width="15%">操作</td>
				</tr>
				<?php if(is_array($info)): foreach($info as $key=>$v): ?><tr class="listTr">
						<td><input type="checkbox" id="ids" name="ids[]" value="<?php echo ($v["id"]); ?>"></td>
						<td><?php echo ($v["sortnum"]); ?></td>
						<td><a href="<?php echo U('Job/job_edit',array('id'=>$v['id'],'class_id'=>$class_id));?>"><?php echo ($v["name"]); ?></a></td>
						<td><?php echo ($v["email"]); ?></td>
						<td><?php echo ($v["num"]); ?></td>
						<td>
						<?php switch($v["state"]): case "0": ?><font color=#FF9900>不显示</font><?php break;?>
							<?php case "1": ?><font color=#FF9900>显示</font><?php break;?>
							<?php default: ?><font color=#FF0000>错误</font><?php endswitch;?>
						</td>
						<td><a href="<?php echo U('Job/job_delete',array('id'=>$v['id']));?>" onClick="return del();">删除</a></td>
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