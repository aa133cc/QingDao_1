<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();



$template['title']='首页';
$template['css']=array('style/public1.css','style/index.css');
?>

<!DOCTYPE html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="keywords" content="青岛，旅游，旅游景点信息,旅游资讯" />
	<meta name="description" content="青岛旅游网，旅游，旅游景点，旅游资讯" />
	<title>青岛旅游网</title>
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

<body background="图片/微信图片_20190418090433.jpg"> 

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
							<li><a href="index.php">景点资讯</a></li>
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
	<div style="margin-top:55px;"></div>
	<div id="hot" class="auto">
		<div class="title">新闻资讯</div>
		<ul class="newlist">
			<!-- 20条 -->
			

		</ul>
<div style="clear:both;"></div>
		<?php
$query="select * from sfk_father_module order by sort desc";
$result_father=execute($link, $query);
while($data_father=mysqli_fetch_assoc($result_father)){
       $html=<<<A
<div class="box auto">
		<div class="title">
		{$data_father['module_name']}
		</div>
		<div class="classList">
			<div style="padding:10px 0;">详细内容略...</div>
		</div>
	</div>


A;
 echo $html;
}
?>


	

</body>
</html>