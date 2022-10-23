<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';

$link=connect();
$member_id=is_login($link);
if($member_id){
    skip('qingdao.php','error','你已经登录，请不要重复注册！');
}
if(isset($_POST['submit'])){
    include 'check_register.inc.php';
    $query="insert into sfk_member(name,pw,register_time) values('{$_POST['name']}',('{$_POST['pw']}'),now())";
    execute($link,$query);
    if(mysqli_affected_rows($link)==1){

        skip('youke_login.php','ok','注册成功！');
    }else{
        skip('register.php','eror','注册失败,请重试！');
    }
}
$template['title']='会员注册页';
$template['css']=array('style/public.css','style/register.css');
?>



<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="青岛旅游，青岛，旅游">
<meta name="description" content="青岛旅游游客注册">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<LINK rel="Bookmark" href="favicon.ico">
<LINK rel="Shortcut Icon" href="favicon.ico" />
<link type="text/css" rel="stylesheet" href="admin/css/H-ui.css" />
<link href="admin/css/bootstrap.min.css" rel="stylesheet">
<link href="admin/css/signin.css" rel="stylesheet">
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
<title>游客注册 - 青岛旅游网</title>
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
						<li><a href="register.php">注册</a></li>
							<li><a href="youke_login.php">登陆</a></li>


							<li><a href="login.php">管理员登录</a></li>

						</ul>
						&nbsp;
						<!-- 天气预报插件-->

					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container-fluid -->
			</nav>
		</header>
	<div class="signin pd-20">
		<div class="signin-head"></div>
		<form class="form-signin Huiform" id="loginform" method="post">
			<label>游客名称<input type="text" name="name" class="form-control input-text" /><span></span></label>
			<label>密码<input type="password" name="pw" class="form-control input-text"  /><span></span></label>


			<label>验证码：<input name="vcode" name="vocode" type="text" class="form-control input-text"  /><span></span></label>
			<img class="vcode" src="show_code.php" />
			<div style="clear:both;"></div>
			<input class="btn" name="submit" type="submit" value="确定注册" />
		</form>
	</div>

</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Validform_v5.3.2_min.js"></script>
<script type="text/javascript" src="layer/layer.min.js"></script>
<script type="text/javascript" src="js/H-ui.js"></script>
<script type="text/javascript" src="js/H-ui.admin.js"></script>
<script type="text/javascript">
	$(".Huiform").Validform();
</script>
</html>