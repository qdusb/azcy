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
				<td class="position">当前位置: 管理中心 -&gt; 系统管理 -&gt; 系统管理员</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo U('Admin/admin_list');?>">[返回列表]</a>
				</td>
			</tr>
		</table>
		<form name="form1" action="<?php echo U('Admin/admin_update');?>" method="post" onSubmit="return check(this);">
			<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>
			<table width="100%" border="0" cellSpacing="1" cellPadding="0" align="center" class="editTable">
				<tr class="editHeaderTr">
					<td class="editHeaderTd" colSpan="2">修改资料</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">登陆帐号</td>
					<td class="editRightTd">
						
                        <input type="text" name="name" value="<?php echo ($info["name"]); ?>" <?php if($info['id'] != ''): ?>readonly<?php endif; ?> size="30" maxlength="50">
                    </td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">真实姓名</td>
					<td class="editRightTd"><input type="text" name="realname" value="<?php echo ($info["realname"]); ?>" size="30" maxlength="20"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">密码</td>
					<td class="editRightTd"><input type="password" name="pass" size="30" maxlength="20"> 密码最少8位！</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">确认密码</td>
					<td class="editRightTd"><input type="password" name="pass2" size="30" maxlength="20"></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">管理权限</td>
					<td class="editRightTd">
						<?php if(is_array($grade)): foreach($grade as $key=>$v): ?><input type="radio" name="grade" value="<?php echo ($key); ?>" <?php if($info['grade'] == $key): ?>checked<?php endif; ?>><?php echo ($v); endforeach; endif; ?>
					</td>
				</tr>
                <tr class="editTr">
					<td class="editLeftTd">状态</td>
					<td class="editRightTd">
                        <input type="radio" name="state" value="0"<?php if($info['state'] == 0): ?>checked<?php endif; ?>>锁定
                        <input type="radio" name="state" value="1"<?php if($info['state'] == 1): ?>checked<?php endif; ?>>正常
                    </td>
                </tr>
				<tr class="editTr">
					<td class="editLeftTd">管理权限</td>
					<td class="editRightTd">
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                        	<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
									<td colspan="6"><input type="checkbox" name="class_id[]" value="<?php echo ($v["base"]["id"]); ?>"> <font color="#FF6600"><?php echo ($v["base"]["name"]); ?></font></td>
								</tr>
                                <?php if(is_array($v["sub"])): foreach($v["sub"] as $key=>$t): ?><td><input type="checkbox" name="class_id[]" value="<?php echo ($t["id"]); ?>"><?php echo ($t["name"]); ?></td><?php endforeach; endif; endforeach; endif; else: echo "" ;endif; ?>
						</table>
					</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">高级权限</td>
					<td class="editRightTd">
						<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
							<?php if(is_array($advanced)): foreach($advanced as $key=>$v): ?><td><input type="checkbox" name="advanced_id[]" value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></td><?php endforeach; endif; ?>
						</table>						
					</td>
				</tr>
                <tr class="editTr">
					<td class="editLeftTd">说明</td>
					<td class="editRightTd">
                        1、普通管理员：在指定栏目内，允许新增，允许编辑、删除自己发布的并且未审核的内容。<br />
                        2、审核管理员：在指定栏目内，允许新增、审核、编辑、删除栏目内的所有内容。<br />
                        3、高级管理员：在所有栏目内，具有新增、审核、编辑、删除的权限。<br />
                        4、以上管理员的高级权限都需要单独分配。<br />
                        5、系统管理员：具有最高权限。<br />
					</td>
				</tr>
				<tr class="editFooterTr">
					<td class="editFooterTd" colSpan="2">
						<input type="submit" value=" 确 定 ">
						<input type="reset" value=" 重 填 ">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>