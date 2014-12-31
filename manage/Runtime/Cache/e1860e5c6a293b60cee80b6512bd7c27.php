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
				<td class="position">当前位置: 管理中心 -&gt; 高级管理 -&gt; 会员管理</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo U('Member/member_list',array('page_id'=>$page_id));?>">[返回列表]</a>&nbsp;
				</td>
			</tr>
		</table>
		<form name="form1" action="<?php echo U('Member/member_update');?>" method="post">
			<input type="hidden" name="page_id" value="<?php echo ($page_id); ?>"/>
			<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>"/>

			<table width="100%" border="0" cellSpacing="1" cellPadding="0" align="center" class="editTable">
				<tr class="editHeaderTr">
					<td class="editHeaderTd" colSpan="2">会员管理</td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">序号</td>
					<td class="editRightTd"><input type="text" name="sortnum" maxlength="20" size="24" value="<?php echo ($info["sortnum"]); ?>"/></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">会员用户名</td>
					<td class="editRightTd"><input type="text" name="user_name" maxlength="20" size="60" value="<?php echo ($info["user_name"]); ?>"/></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">会员密码</td>
					<td class="editRightTd"><input type="password" name="password" maxlength="20" size="60" value=""/></td>
				</tr>
                <tr class="editTr">
					<td class="editLeftTd">会员等级</td>
					<td class="editRightTd">
                    <select name="level" style="width:80px;">
                    	<?php if(is_array($levels)): foreach($levels as $key=>$v): ?><option value="<?php echo ($key); ?>"  <?php if($key == $info['level']): ?>selected<?php endif; ?>><?php echo ($v); ?></option><?php endforeach; endif; ?>
                    </select>
                    </td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">会员姓名</td>
					<td class="editRightTd"><input type="text" name="real_name" maxlength="20" size="60" value="<?php echo ($info["real_name"]); ?>"/></td>
				</tr>
                <tr class="editTr">
					<td class="editLeftTd">电话</td>
					<td class="editRightTd"><input type="text" name="phone" maxlength="20" size="60" value="<?php echo ($info["phone"]); ?>"/></td>
				</tr>
	
                <tr class="editTr">
					<td class="editLeftTd">电子邮箱</td>
					<td class="editRightTd"><input type="text" name="email" maxlength="20" size="60" value="<?php echo ($info["email"]); ?>"/></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">性别</td>
                    
					<td class="editRightTd">
                    <input type="radio" name="sex" value="男" <?php if($info["sex"] == '男'): ?>checked<?php endif; ?>/>&nbsp;男&nbsp;
                    <input type="radio" name="sex" value="女" <?php if($info["sex"] == '女'): ?>checked<?php endif; ?>/>&nbsp;女&nbsp;
                    </td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">工作单位</td>
					<td class="editRightTd"><input type="text" name="job" maxlength="20" size="60" value="<?php echo ($info["job"]); ?>"/></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">家庭地址</td>
					<td class="editRightTd"><input type="text" name="address" maxlength="20" size="60" value="<?php echo ($info["address"]); ?>"/></td>
				</tr>
				<tr class="editTr">
					<td class="editLeftTd">备注</td>
					<td class="editRightTd"><input type="text" name="remark" maxlength="20" size="60" value="<?php echo ($info["remark"]); ?>"/></td>
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