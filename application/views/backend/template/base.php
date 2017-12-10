<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title><?php echo $page_title;?></title>
	<?php foreach ($css as $_css){?>
	<link rel="stylesheet" href="<?php echo $_css;?>">
	<?php }?>
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Loading Scripts -->
	<?php foreach ($js as $_js){?>
	<script src="<?php echo $_js;?>"></script>
	<?php }?>
</head>
<body>
	<div class="brand clearfix">
		<a href="index.html" class="logo"><img src="<?php echo $assets;?>img/logo.jpg" class="img-responsive" alt=""></a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<li class="ts-account">
				<a href="#"><img src="<?php echo $assets;?>img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> <?php echo $ManagerName;?><i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="<?php echo site_url("backend/Dashboard/View")?>"><?php echo lang("account");?></a></li>
					<li><a href="<?php echo site_url("backend/Login/LogOut")?>"><?php echo lang("logout");?></a></li>
				</ul>
			</li>
		</ul>
		<div class="top-title"><?php echo $top_title;?></div>
		<ul class="ts-profile-nav ts-profile-nav-left">
			<?php foreach ($top_menu as $_top_menu){?>
		 	<li><?php echo $_top_menu;?></li>
			<?php }?>
		</ul>	 
	</div>

	<div class="ts-main-content">
		<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
				<li class="ts-label"><?php echo lang("search");?></li>
				<li>
					<input type="text" class="ts-sidebar-search" placeholder="<?php echo lang("search");?>。。。">
				</li>
				<?php  echo admin_menu($menu); ?>
			</ul>
		</nav>
		<div class="content-wrapper">
			<div class="container-fluid">
			<?php echo $the_view_content;?>
			</div>
		</div>
	</div>
	</body>
</html>