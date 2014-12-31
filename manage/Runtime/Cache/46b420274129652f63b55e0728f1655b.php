<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta http-equiv="Expires" content="-1000">
		<link href="__PUBLIC__/images/admin.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="__PUBLIC__/images/common.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
	</head>
	<body>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr class="position">
				<td class="position">当前位置: 管理中心 -&gt; <?php echo ($class_name); ?> -&gt; 列表</td>
			</tr>
		</table>
		<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="30">
				<td>
					<a href="<?php echo ($freshURL); ?>">[刷新列表]</a>
					<a href="<?php echo ($addURL); ?>">[增加]</a>
					<a href="javascript:reverseCheck(document.form1.ids);">[反向选择]</a>&nbsp;
					<a href="javascript:if(delCheck(document.form1.ids)) {document.form1.action.value = 'delete';document.form1.submit();}">[删除]</a>&nbsp;
			
					<select name="select_state" style="width:90px;" onChange="window.location=this.options[this.selectedIndex].value;">
						<option value="">请选择</option>
						<?php if(is_array($state_label)): foreach($state_label as $key=>$v): ?><option value="<?php echo U('Info/infolist',array('class_id'=>$class_id,'page_id'=>$page_id,'select_state'=>$key));?>" <?php if($select_state == $key): ?>selected="selected"<?php endif; ?>><?php echo ($state_label["$key"]); ?></option><?php endforeach; endif; ?>
					</select>
					<select name="state" id="state" onChange="if(stateCheck(document.form1.ids)) {document.form1.action.value = 'state';document.form1.state.value='' + this.options[this.selectedIndex].value + '';document.form1.submit();}">
						<option value="-1">设置状态为</option>
						<option value="0">未审核</option>
						<option value="1">正常</option>
						<option value="2">推荐</option>
					</select>
				</td>
				<td align="right">
					<form name="searchForm" method="get" action="<?php echo I('Info/search');?>" style="margin:0px;">
						查询：<input name="keyword" type="text" value="<?php echo urldecode($keyword);?>" size="30" maxlength="50" />
						<input type="submit" value="查询" style="width:60px;">
						<input type="hidden" name="class_id" value="<?php echo ($class_id); ?>" />
							<input type="hidden" name="select_class" value="<?php echo ($select_class); ?>" />
						<input type="hidden" name="select_state" value="<?php echo ($select_state); ?>" />
					</form>
				</td>
			</tr>
		</table>
		<form name="form1" action="<?php echo U('Info/delete');?>" method="post">
		<table width="100%" border="0" cellspacing="1" cellpadding="0" align="center" class="listTable">
				<input type="hidden" name="action" value="">
				<input type="hidden" name="state" value="">
				<input type="hidden" name="class_id" value="<?php echo ($class_id); ?>">
				<input type="hidden" name="page_id" value="<?php echo ($page_id); ?>">
				<tr class="listHeaderTr">
					<td width="30"></td>
					<td width="60">序号</td>
					<td>标题</td>
					<td width="60">缩略图</td>
					<td width="60">附件</td>
					<td width="60">浏览量</td>
					<td width="60">状态</td>
					<td width="120">发表时间</td>
				</tr>
				<?php if(is_array($record)): foreach($record as $key=>$v): ?><tr class="listTr">
						<td><input type="checkbox" id="ids" name="ids[]" value="<?php echo ($v["id"]); ?>"></td>
						<td><?php echo ($v["sortnum"]); ?></td>
						<td><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["title"]); ?></a></td>
						<td><p style="cursor:pointer" class="info_pic" href="<?php echo U('UploadFile/index',array('id'=>$v['id']));?>">图片</p></td>
						<td><a href='' target='_blank'>附件</a></td>
						<td><?php echo ($v["views"]); ?></td>
						<td>
							<?php if($v["state"] == 0): ?><font color=#FF9900>未审核</font>
							<?php elseif($v["state"] == 1): ?>
							正常
							<?php else: ?>
							<font color=#FF9900>推荐</font><?php endif; ?>
						</td>
						<td><?php echo (date('Y-m-d H:i:s',strtotime($v["create_time"]))); ?></td>
					</tr><?php endforeach; endif; ?>
				
				<script>
				$(function(){
					var iTop = (window.screen.availHeight-30-400)/2;
					var iLeft = (window.screen.availWidth-10-600)/2;
					var params ="height=400,innerHeight=400,width=600,innerWidth=600,top="+iTop+",left="+iLeft+", scrollbars=yes, resizable=yes";
					$(".info_pic").click(function(){
						var url=$(this).attr("href");
						window.open(url,"图片上传",params);
					});
				});
				</script>
				
				<tr class="listFooterTr">
					<td colspan="15"><a href="<?php echo ($page["home"]); ?>">首页</a>
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