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
			<tr height="28">
				<td background="__PUBLIC__/images/title_bg1.jpg">当前位置: 管理中心</td>
			</tr>
			<tr>
				<td bgcolor="#B1CEEF" height="1"></td>
			</tr>
			<tr height="20">
				<td background="__PUBLIC__/images/shadow_bg.jpg"></td>
			</tr>
		</table>
		<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="100">
				<td align="center" width="100"><img src="__PUBLIC__/images/admin_p.gif" width="90" height="100"></td>
				<td width="60">&nbsp;</td>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="0" height="100">
						<tr>
							<td id="time">当前时间：<?php echo date("Y-m-d H:m:s");?></td>
						</tr>
						<script>
						setInterval(function(){
						var dateTime=new Date();
						var hh=dateTime.getHours();
						if(hh<10)hh="0"+String(hh);
						var mm=dateTime.getMinutes();
						if(mm<10)mm="0"+String(mm);
						var ss=dateTime.getSeconds();
						if(ss<10)ss="0"+String(ss);
						
						var yy=dateTime.getFullYear();
						var MM=String(dateTime.getMonth()+1);
						if(MM<10)MM="0"+String(MM);
						var dd=dateTime.getDate();
						if(dd<10)dd="0"+String(dd);
						

						 var value=yy+"-"+MM+"-"+dd+" "+" "+hh+":"+mm+":"+ss;
						document.getElementById("time").innerHTML ="当前时间："+value;
						},1000);
						</script>
						<tr>
							<td style="font-size:16px;font-weight:bold;"><?php echo ($info["realname"]); ?></td>
						</tr>
						<tr>
							<td>欢迎进入网站管理中心！</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3" height="10"></td>
			</tr>
		</table>
		<table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr height="20">
				<td></td>
			</tr>
			<tr height="22">
				<td background="__PUBLIC__/images/title_bg2.jpg" align="center" style="PADDING-LEFT:20px;FONT-WEIGHT:bold;COLOR:#ffffff">您的相关信息</td>
			</tr>
			<tr height="12" bgcolor="#ECF4FC">
				<td></td>
			</tr>
			<tr height="20">
				<td></td>
			</tr>
		</table>
		<table width="95%" border="0" cellspacing="0" cellpadding="2" align="center">
			<tr>
				<td width="100" align="right">登陆帐号：</td>
				<td style="color:#880000;"><?php echo ($info["name"]); ?></td>
			</tr>
			<tr>
				<td align="right">真实姓名：</td>
				<td style="color:#880000;"><?php echo ($info["realname"]); ?></td>
			</tr>
			<tr>
				<td align="right">登陆次数：</td>
				<td style="color:#880000;"><?php echo ($info["login_count"]); ?></td>
			</tr>
			<tr>
				<td align="right">上线时间：</td>
				<td style="color:#880000;"><?php echo ($info["login_time"]); ?></td>
			</tr>
			<tr>
				<td align="right">IP地址：</td>
				<td style="color:#880000;"><?php echo ($info["login_ip"]); ?></td>
			</tr>
		</table>
	</body>
</html>