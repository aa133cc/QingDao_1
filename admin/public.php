
<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();

if(!$member_id=is_login($link)){
    skip('youke_login.php', 'error', '用户登陆后方可留言');
}
if(isset($_POST['submit'])){
    include 'check_public.inc.php';
    $_POST=escape($link,$_POST);
    $query="insert into sfk_content(module_name,content,time,member_id) values({$_POST['id']},'{$_POST['content']}',now(),{$member_id})";
    execute($link, $query);
    if(mysqli_affected_rows($link)==1){
        skip('list_father.php', 'ok', '发布成功！');
    }else{
        skip('publish.php', 'error', '发布失败，请重试！');
    }
}
$template['title']='游客留言回复';
$template['css']=array('style/public.css','style/publish.css');
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<title>用户留言页</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" type="text/css" href="style/public.css" />
<link rel="stylesheet" type="text/css" href="style/publish.css" />
<link rel="Bookmark" href="favicon.ico">
	<link rel="Shortcut Icon" href="favicon.ico" />
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap-theme.css" />
	<link rel="stylesheet" type="text/css" href="public/css/travel/index.css" />
	<link rel="stylesheet" type="text/css" href="public/css/banner-style.css" media="screen" />
	<!-- jQuery Paradigm Slider  -->
	<link rel="stylesheet" type="text/css" href="public/css/settings.css" media="screen" />
	<!-- FONT IMPORT -->
	<!-- <link rel='stylesheet' type='text/css' href='public/css/css.css'> -->
	<link type="text/css" rel="stylesheet" href="public/css/scen-ban.css" />
</head>
<body>





<header class="">
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed"
							data-toggle="collapse"
							data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span> <span
								class="icon-bar"></span> <span class="icon-bar"></span> <span
								class="icon-bar"></span>
						</button>
					<!--LOGO--></div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse"
						id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">

							<li ><a href="qingdao.php">魅力青岛</a></li>
							<li ><a href="travel.php">景点展示</a></li>
							<li><a href="list_father.php">景点资讯</a></li>
						</ul>
						<!-- 全站搜索 -->



						<ul class="nav navbar-nav navbar-right">
						<li ><?php
				if(isset($member_id) && $member_id){
$str=<<<A
					<a href="member.php?id={$member_id}" target="_blank">您好！{$_COOKIE['sfk']['name']}</a> <span style="color:#fff;">|</span>
<li><a href="logout.php">退出</a></li>
A;
					echo $str;
				}else{
$str=<<<A
					<a href="youke_login.php">登录</a>&nbsp;
					<a href="register.php">注册</a>
A;
					echo $str;
				}
				?></li >
						</ul>
						&nbsp;
						<!-- 天气预报插件-->

					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container-fluid -->
			</nav>
		</header>




			<div class="login">
				<?php
				if(isset($member_id) && $member_id){
$str=<<<A
					<a href="member.php?id={$member_id}" target="_blank">您好！{$_COOKIE['sfk']['name']}</a> <span style="color:#fff;">|</span> <a href="logout.php">退出</a>
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
		</div>
	</div>
	<div style="margin-top:55px;"></div>

	<div id="publish">
		<form method="post">
			<select name="id">

			<?php

				$query="select * from sfk_father_module {$where}order by sort desc";
				$result_father=execute($link, $query);
				while ($data_father=mysqli_fetch_assoc($result_father)){

					echo "<option  value='{$data_father['id']}'>{$data_father['module_name']}</option>";


				}
				?>
				<option>任意选择景点资讯</option>
			</select>

			<textarea name="content" class="content"></textarea>
			<input class="publish" type="submit" name="submit" value="" />

			<div style="clear:both;"></div>
		</form>
	</div>
	<div id="footer" class="auto">
		<div class="bottom">
			<a>私房库</a>
		</div>
		<div class="copyright">Powered by sifangku ©2015 sifangku.com</div>
	</div>
</body>
</html>