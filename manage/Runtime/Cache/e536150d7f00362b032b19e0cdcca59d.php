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
				<td class="position">当前位置: 管理中心 -&gt; 高级管理 -&gt; 应聘人员</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo ($freshURL); ?>">[刷新列表]</a>&nbsp;
					<a href="javascript:reverseCheck(document.form1.ids);">[反向选择]</a>&nbsp;
                    <a href="javascript:if(delCheck(document.form1.ids)) {document.form1.submit();}">[删除]</a>&nbsp;
				</td>
				<td align="right">
				</td>
			</tr>
		</table>
		<form name="form1" action="<?php echo U('Job/jobseeker_delete');?>" method="post">
		<input type="hidden" value="<?php echo ($page_id); ?>" name="page_id"/>
		<table width="100%" border="0" cellspacing="1" cellpadding="0" align="center" class="listTable">
				<tr class="listHeaderTr">
					<td width="5%"></td>
					<td width="5%">序号</td>
					<td>姓名</td>
					<td>应聘职位</td>
					<td>毕业院校</td>
					<td width="10%">电话</td>
					<td width="10%">毕业时间</td>
					<td width="15%">应聘时间</td>
					<td width="5%">状态</td>
				</tr>
				 <?php if(is_array($info)): foreach($info as $key=>$v): ?><tr class="listTr">
						<td><input type="checkbox" id="ids" name="ids[]" value="<?php echo ($v["id"]); ?>"></td>
						<td><?php echo ($v["sortnum"]); ?></td>
						
						<td><a href="<?php echo U('Job/jobseeker_edit',array('id'=>$v['id']));?>"><?php echo ($v["name"]); ?></a></td>
						<td><?php echo ($v["job_name"]); ?></td>
						<td><?php echo ($v["major"]); ?></td>
						<td><?php echo ($v["phone"]); ?></td>
						<td><?php echo ($v["graduate_time"]); ?></td>
						<td><?php echo ($v["create_time"]); ?></td>
						<td>
						<?php switch($v["state"]): case "0": ?><font color='#0066FF'>未查看</font><?php break;?>
	                        <?php case "1": ?>已查看<?php break;?>
	                        <?php default: ?><font color='#FF0000'>错误</font><?php endswitch;?>
						</td>
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