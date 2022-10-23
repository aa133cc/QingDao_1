<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/manage_tool.inc.php';
$link=connect();
if(!$member_id=is_login($link)){
    skip('youke_login.php', 'error', '请登录管理员');
}
$template['title']='景点资讯列表页';
$template['css']=array('style/publicold.css');
?>
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
		后台管理中心</div>
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
<div id="main">
	<div class="title">景点资讯列表</div>
	<table class="list">
		<tr>

			<th>景点资讯</th>
			<th>操作</th>
		</tr>
		<?php
		$query="select * from sfk_father_module";
		$result=execute($link,$query);
		while ($data=mysqli_fetch_assoc($result)){
			$url=urlencode("father_module_delete.php?id={$data['id']}");
			$return_url=urlencode($_SERVER['REQUEST_URI']);
			$message="你真的要删除景点内容 {$data['module_name']} 吗？";
			$delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";
$html=<<<A
			<tr>

				<td>{$data['module_name']}[id:{$data['id']}]</td>
				<td>&nbsp;&nbsp;<a href="father_module_update.php?id={$data['id']}">[编辑]</a>&nbsp;&nbsp;<a href="$delete_url">[删除]</a></td>
			</tr>
A;
			echo $html;
		}
		?>

	</table>
</div>
<?php include 'inc/footer.inc.php'?>