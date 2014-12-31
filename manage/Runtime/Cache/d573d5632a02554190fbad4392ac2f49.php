<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta http-equiv="Expires" content="-1000">
		<link href="__PUBLIC__/images/admin.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="__PUBLIC__images/common.js"></script>
		<script type="text/javascript">
			function clearLogin()
			{
				if (confirm("即将清空登陆日志 , 且该操作不能恢复! 是否继续 ?"))
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		</script>
	</head>
	<body>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr class="position">
				<td class="position">当前位置: 管理中心 -&gt; 系统管理 -&gt; 系统管理员</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo U('Admin/admin_list');?>">[刷新列表]</a>
					<a href="<?php echo U('Admin/admin_edit');?>">[增加]</a>
				</td>
			</tr>
		</table>
		<table width="100%" border="0" cellspacing="1" cellpadding="0" align="center" class="listTable">
			<tr class="listHeaderTr">
				<td>登陆帐号</td>
				<td width="30%">真实姓名</td>
				<td width="12%">管理等级</td>
				<td width="8%">登陆次数</td>
				<td width="12%">登陆日志</td>
				<td width="8%">状态</td>
				<td width="8%">删除</td>
			</tr>
			<?php if(is_array($info)): foreach($info as $key=>$v): ?><tr class="listTr">
				<td><a href="<?php echo U('Admin/admin_edit',array('id'=>$v['id']));?>"><?php echo ($v["name"]); ?></a></td>
				<td><?php echo ($v["realname"]); ?></td>
				<td>
				<?php switch($v['grade']): case "8": ?><font color='#FF6600'>系统管理员</font><?php break;?>
				<?php case "7": ?><font color='#0066FF'>高级管理员</font><?php break;?>
				<?php case "6": ?>审核管理员<?php break;?>
				<?php case "5": ?>普通管理员<?php break;?>
				<?php default: ?><font color='#FF0000'>错误</font><?php endswitch;?>
				</td>
				<td><?php echo ($v["login_count"]); ?></td>
				<td><a href="">查看日志</a>&nbsp;&nbsp;<a href="" onClick="return clearLogin()">清空</a></td>
				<td>
				<?php if($v['state'] == 1): ?>正常
				<?php else: ?><font color='#FF6600'>锁定</font><?php endif; ?>
				</td>
				<td><a href="" onClick="return del();">删除</a></td>
			</tr><?php endforeach; endif; ?>
			<tr class="listFooterTr">
				<td colspan="10"></td>
			</tr>
		</table>
	</body>
</html>