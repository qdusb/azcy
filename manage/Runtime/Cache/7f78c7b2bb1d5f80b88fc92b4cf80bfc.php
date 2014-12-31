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
				<td class="position">当前位置: 管理中心 -&gt; 列表</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo ($freshURL); ?>">[刷新列表]</a>
					<a href="<?php echo ($addURL); ?>">[增加]</a>
					<select name="select_class" onChange="window.location=this.options[this.selectedIndex].value;">
						<?php if(is_array($banner_class)): foreach($banner_class as $key=>$v): ?><option value="<?php echo U('Banner/banner_list',array('class_id'=>$v['id']));?>" <?php if($v["id"] == $class_id): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
					</select>
					<a href="javascript:reverseCheck(document.form1.ids);">[反向选择]</a>&nbsp;
					<a href="javascript:if(delCheck(document.form1.ids)) {document.form1.submit();}">[删除]</a>&nbsp;
				</td>
				<td align="right">
				</td>
			</tr>
		</table>
		<form name="form1" action="<?php echo U('Banner/banner_delete');?>" method="post">
		<input type="hidden" name="class_id" value="<?php echo ($class_id); ?>"/>
		<table width="100%" border="0" cellspacing="1" cellpadding="0" align="center" class="listTable">
			
                <tr class="listHeaderTr">
					<td width="5%"></td>
                    <td>序号</td>
                    <td>标题</td>
                    <td>宽度</td>
                    <td>高度</td>
                    <td>广告文件</td>
                    <td>状态</td>
					<td>删除</td>
                </tr>
				  <?php if(is_array($info)): foreach($info as $key=>$v): ?><tr class="listTr">
						<td><input type="checkbox" id="ids" name="ids[]" value="<?php echo ($v["id"]); ?>"></td>
                       	<td><?php echo ($v["sortnum"]); ?></td>
						<td><a href="<?php echo U('Banner/banner_edit',array('id'=>$v['id'],'class_id'=>$class_id));?>"><?php echo ($v["title"]); ?></a></td>
                        <td><?php echo ($v["width"]); ?></td>
                        <td><?php echo ($v["height"]); ?></td>
						<td>图片</td>
						<td>
						<?php switch($v["state"]): case "0": ?><font color=#FF9900>不显示</font><?php break;?>
							<?php case "1": ?><font color=#FF9900>显示</font><?php break;?>
							<?php default: ?><font color=#FF0000>错误</font><?php endswitch;?>
						</td>
						<td><a href="<?=$listUrl?>&id=<?=$row["id"]?>" onClick="return del();">删除</a></td>
			
					</tr><?php endforeach; endif; ?>
                <tr class="listFooterTr">
                    <td colspan="15"><?=$page_str?></td>
                </tr>
			
			</table>
		</form>
	</body>
</html>