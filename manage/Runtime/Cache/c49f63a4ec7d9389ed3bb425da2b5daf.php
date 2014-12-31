<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta http-equiv="Expires" content="-1000">
		<link href="__PUBLIC__/images/admin.css" rel="stylesheet" type="text/css">
		<script type="text/javascript">
			function expand(el)
			{
				childObj = document.getElementById("child" + el);

				if (childObj.style.display == "none")
				{
					childObj.style.display = "block";
				}
				else
				{
					childObj.style.display = "none";
				}
			}
		</script>
	</head>
	<body>
		<table width="170" height="100%" border="0" cellspacing="0" cellpadding="0" background="__PUBLIC__/images/menu_bg.jpg">
			<tr>
				<td valign="top" align="center">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td height="10"></td>
						</tr>
					</table>
            		<?php if(is_array($menus)): foreach($menus as $key=>$v): ?><table width="150" border="0" cellspacing="0" cellpadding="0">
					    <tr height="22">
					        <td background="__PUBLIC__/images/menu_bt.jpg" style="padding-left:30px"><a href="javascript:void(0)" onClick="expand(<?php echo ($key); ?>)" class="menuParent"><?php echo ($v['base']["name"]); ?></a></td>
					    </tr>
					    <tr height="4">
					        <td></td>
					    </tr>
					</table>
					<table id="child<?php echo ($key); ?>" width="150" border="0" cellspacing="0" cellpadding="0" style="display:none">
						<?php if(is_array($v['sub'])): foreach($v['sub'] as $key=>$t): ?><tr height="20">
						    <td width="30" align="center"><img src="__PUBLIC__/images/menu_icon.gif" width="9" height="9">
						    </td>
						    <td><a href="<?php echo ($t["url"]); ?>" class="menuChild" target="main"><?php echo ($t["name"]); ?></a></td>
						</tr><?php endforeach; endif; ?>
						<?php if($grade > 6): ?><tr height="20">
						    <td width="30" align="center"><img src="__PUBLIC__/images/menu_icon.gif" width="9" height="9"></td>
						   
						    <td><a href="<?php echo U('Category/manage_list',array('id'=>$v['base']['id']));?>" class="menuChild" target="main">分类管理</a></td>
						</tr><?php endif; ?>
					    <tr height="4">
					        <td colspan="2"></td>
					    </tr>
					</table><?php endforeach; endif; ?>
				<!-- 高级管理员 -->
				<?php if($grade > 6): ?><table width="150" border="0" cellspacing="0" cellpadding="0">
				    <tr height="22">
				        <td background="__PUBLIC__/images/menu_bt.jpg" style="padding-left:30px"><a href="javascript:void(0)" onClick="expand('advanced')" class="menuParent">高级管理</a></td>
				    </tr>
				    <tr height="4">
				        <td></td>
				    </tr>
				</table>
				<table id="childadvanced" width="150" border="0" cellspacing="0" cellpadding="0" style="DISPLAY:none">
					<?php if(is_array($advanced)): foreach($advanced as $key=>$v): ?><tr height="20">
				        <td width="30" align="center"><img src="__PUBLIC__/images/menu_icon.gif" width="9" height="9"></td>
				        <td><a href="<?php echo ($v["url"]); ?>" class="menuChild" target="main"><?php echo ($v["name"]); ?></a></td>
				    </tr><?php endforeach; endif; ?>
				    <tr height="4">
				        <td colspan="2"></td>
				    </tr>
				</table><?php endif; ?>
				 <!-- 系统管理员 -->
				<?php if($grade > 7): ?><table width="150" border="0" cellspacing="0" cellpadding="0">
				    <tr height="22">
				        <td background="__PUBLIC__/images/menu_bt.jpg" style="padding-left:30px"><a href="javascript:void(0)" onClick="expand('system')" class="menuParent">系统管理</a></td>
				    </tr>
				    <tr height="4">
				        <td></td>
				    </tr>
				</table>
				<table id="childsystem" width="150" border="0" cellspacing="0" cellpadding="0" style="DISPLAY:none">
					<tr height="20">
						<td width="30" align="center"><img src="__PUBLIC__/images/menu_icon.gif" width="9" height="9"></td>
						<td><a href="<?php echo U('Admin/admin_list');?>" class="menuChild" target="main">管理员列表</a></td>
					</tr>
				    <tr height="4">
				        <td colspan="2"></td>
				    </tr>
				</table><?php endif; ?>
				<!-- 隐藏管理员 -->
				<?php if($grade == 9): ?><table width="150" border="0" cellspacing="0" cellpadding="0">
				    <tr height="22">
				        <td background="__PUBLIC__/images/menu_bt.jpg" style="padding-left:30px"><a href="javascript:void(0)" onClick="expand('hide')" class="menuParent">隐藏管理</a></td>
				    </tr>
				    <tr height="4">
				        <td></td>
				    </tr>
				</table>
				<table id="childhide" width="150" border="0" cellspacing="0" cellpadding="0" style="DISPLAY:none">
				    <tr height="20">
				        <td width="30" align="center"><img src="__PUBLIC__/images/menu_icon.gif" width="9" height="9"></td>
				        <td><a href="<?php echo U('Category/base_list');?>" class="menuChild" target="main">一级分类管理</a></td>
				    </tr>
				    <tr height="20">
				        <td width="30" align="center"><img src="__PUBLIC__/images/menu_icon.gif" width="9" height="9"></td>
				        <td><a href="<?php echo U('Advanced/advanced_list');?>" class="menuChild" target="main">高级功能管理</a></td>
				    </tr>
				    <tr height="4">
				        <td colspan="2"></td>
				    </tr>
				</table><?php endif; ?>
				<table width="150" border="0" cellspacing="0" cellpadding="0">
					<tr height="22">
						<td background="__PUBLIC__/images/menu_bt.jpg" style="padding-left:30px"><a href="javascript:void(0)" onClick="expand('personal')" class="menuParent">个人管理</a></td>
					</tr>
					<tr height="4">
						<td></td>
					</tr>
				</table>
				<table id="childpersonal" width="150" border="0" cellspacing="0" cellpadding="0">
					<?php if($grade > 7): ?><tr height="20">
						<td width="30" align="center"><img src="__PUBLIC__/images/menu_icon.gif" width="9" height="9"></td>
						<td><a href="<?php echo U('Admin/change_pass');?>" class="menuChild" target="main">修改口令</a></td>
					</tr><?php endif; ?>
					<tr height="20">
						<td width="30" align="center"><img src="__PUBLIC__/images/menu_icon.gif" width="9" height="9"></td>
						<td><a href="<?php echo U('Login/loginout');?>" class="menuChild" target="_top" onClick="if (confirm('确定要退出吗？')) return true; else return false;">退出系统</a></td>
					</tr>
				</table>
				</td>
				<td bgcolor="#D1E6F7" width="1"></td>
			</tr>
		</table>
	</body>
</html>