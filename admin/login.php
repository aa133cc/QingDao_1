<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
if(isset($_POST['submit'])){
include_once 'check_login.inc.php';
$_POST=escape($link,$_POST);
$query="select * from sfk_manage where name='{$_POST['name']}' and pw=('{$_POST['pw']}')";
$result=execute($link, $query);
if(mysqli_num_rows($result)==1){
    setcookie('sfk[name]',$_POST['name']);
    setcookie('sfk[pw]',$_POST['pw']);
    skip('father_module.php', 'ok', '用户名或密码填写OK！');
}else{
    skip('login.php', 'error', '用户名或密码填写错误！');
}
}



?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="青岛旅游，青岛，旅游">
<meta name="description" content="青岛旅游后台登录">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<LINK rel="Bookmark" href="favicon.ico">
<LINK rel="Shortcut Icon" href="favicon.ico" />
<link type="text/css" rel="stylesheet" href="admin/css/H-ui.css" />
<link href="admin/css/bootstrap.min.css" rel="stylesheet">
<link href="admin/css/signin.css" rel="stylesheet">
<title>后台登录 - 青岛旅游网</title>
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
		<form class="form-signin Huiform" id="loginform"
			 method="post">
			<input type="text" name="name" class="form-control input-text"
				/>
			<input
				type="password" name="pw" class="form-control input-text"
				 />
               <img class="vcode" src="show_code.php" /><label>  验证码 <input class="form-control input-text" type="text" name="vcode" /></label>
		 	<button class="btn btn-lg btn-warning btn-block"   type="submit" name="submit" value="登陆">登录</button>
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