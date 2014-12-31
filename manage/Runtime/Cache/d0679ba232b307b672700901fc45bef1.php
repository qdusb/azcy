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
		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr class="position">
				<td class="position">当前位置: 管理中心 -&gt; 高级管理 -&gt; 应聘人员</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo ($returnURL); ?>">[返回列表]</a>&nbsp;
				</td>
			</tr>
		</table>
		<table width="100%" border="0" cellSpacing="1" cellPadding="0" align="center" class="editTable">
			<tr class="editHeaderTr">
				<td class="editHeaderTd" colSpan="2">招聘职位</td>
			</tr>
			<tr class="editTr">
				<td class="editLeftTd">序号</td>
				<td class="editRightTd"><?php echo ($info["sortnum"]); ?></td>
			</tr>
			<tr class="editTr">
				<td class="editLeftTd">应聘职位</td>
				<td class="editRightTd"><?php echo ($info["job_name"]); ?></td>
			</tr>
			<tr class="editTr">
				<td class="editLeftTd">姓名</td>
				<td class="editRightTd"><?php echo ($info["name"]); ?></td>
			</tr>
			<tr class="editTr">
				<td class="editLeftTd">性别</td>
				<td class="editRightTd"><?php echo ($info["sex"]); ?></td>
			</tr>
			<tr class="editTr">
				<td class="editLeftTd">年龄</td>
				<td class="editRightTd"><?php echo ($info["age"]); ?></td>
			</tr>
			<tr class="editTr">
				<td class="editLeftTd">所学专业</td>
				<td class="editRightTd"><?php echo ($info["major"]); ?></td>
			</tr>
			<tr class="editTr">
				<td class="editLeftTd">毕业时间</td>
				<td class="editRightTd"><?php echo ($info["graduate_time"]); ?></td>
			</tr>
			<tr class="editTr">
				<td class="editLeftTd">毕业院校</td>
				<td class="editRightTd"><?php echo ($info["college"]); ?></td>
			</tr>
			<tr class="editTr">
				<td class="editLeftTd">电话</td>
				<td class="editRightTd"><?php echo ($info["college"]); ?></td>
			</tr>
			<tr class="editTr">
				<td class="editLeftTd">邮箱</td>
				<td class="editRightTd"><?php echo ($info["email"]); ?></td>
			</tr>
			<tr class="editTr">
				<td class="editLeftTd">个人履历</td>
				<td class="editRightTd"><?php echo ($info["resumes"]); ?></td>
			</tr>
			<tr class="editTr">
				<td class="editLeftTd">自我评价</td>
				<td class="editRightTd"><?php echo ($info["appraise"]); ?></td>
			</tr>
			<tr class="editTr">
				<td class="editLeftTd">应聘时间</td>
				<td class="editRightTd"><?php echo ($info["create_time"]); ?></td>
			</tr>
		</table>
	</body>
</html>