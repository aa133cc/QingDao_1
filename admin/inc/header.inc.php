<?php

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<title><?php echo $template['title'] ?></title>
<meta name="keywords" content="后台界面" />
<meta name="description" content="后台界面" />
<?php
foreach ($template['css'] as $val){
	echo "<link rel='stylesheet' type='text/css' href='{$val}' />";
}
?>
</head>
<body>
<div id="top">
	<div class="logo">
		管理中心
	</div>
<div class="login_info">
	  <?php
				if(isset($member_id) && $member_id){
$str=<<<A
					<a href="" target="_blank">您好！{$_COOKIE['sfk']['name']}</a> <span style="color:#fff;">|</span>
<a href="manage_logout.php">退出</a>
A;
					echo $str;
				}else{
$str=<<<A
					<a href="youke_login.php">登录</a>&nbsp;
					<a href="register.php">注册</a>
A;
					echo $str;
				}
				?>

</div>
<div id="sidebar">
	<ul>
		<li>
			<div class="small_title">系统</div>
			<ul class="child">

				<li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='manage.php'){echo 'class="current"';}?> href="manage.php">管理员列表</a></li>
				<li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='manage_add.php'){echo 'class="current"';}?> href="manage_add.php">管理员添加</a></li>
                <li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='member.php'){echo 'class="current"';}?> href="member.php">用户列表</a></li>
				<li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='member_add.php'){echo 'class="current"';}?> href="member_add.php">用户添加</a></li>
				<li><a href="#">站点设置</a></li>
			</ul>
		</li>
		<li><!--  class="current" -->
			<div class="small_title">内容管理</div>
			<ul class="child">
				<li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='father_module.php'){echo 'class="current"';}?> href="father_module.php">景点资讯</a></li>
				<li><a <?php if(basename($_SERVER['SCRIPT_NAME'])=='father_module_add.php'){echo 'class="current"';}?> href="father_module_add.php">发布新闻</a></li>
			</ul>
		</li>
		<li>
			<div class="small_title"></div>
		</li>
	</ul>
</div>