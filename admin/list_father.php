<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();


$template['title']='游客留言回复';
$template['css']=array('style/public.css','style/publish.css');
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<title>青岛旅游网</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" type="text/css" href="style/public.css" />
<link rel="stylesheet" type="text/css" href="style/list.css" />
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
	<div style="margin-top:55px;"></div>

	<div id="main" class="auto">
		<div id="left">
			<div class="box_wrap">
				<h3><?php
$query="select * from sfk_father_module order by sort desc";
$result_father=execute($link, $query);
while($data_father=mysqli_fetch_assoc($result_father)){
       $html=<<<A
<div class="box auto">
		<div class="title">
		{$data_father['module_name']}
		</div>

	</div>


A;
 echo $html;
}
?></h3>

				<div class="pages_wrap">
					<a class="btn publish" href="public.php"></a>
					<div class="pages">
						<a>« 上一页</a>
						<a>1</a>
						<span>2</span>
						<a>3</a>
						<a>4</a>
						<a>...13</a>
						<a>下一页 »</a>
					</div>
					<div style="clear:both;"></div>
				</div>
			</div>
			<div style="clear:both;"></div>



			<?php
$query="select * from sfk_content ";
$result_father=execute($link, $query);
while($data_father=mysqli_fetch_assoc($result_father)){
       $html=<<<A
<div class="box auto">
		<div class="title">
		{$data_father['content']}
       {$data_father['time']}
		</div>

	</div>


A;
 echo $html;
}
?>
		</div>

		<div style="clear:both;"></div>
	</div>

</body>
</html>