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

	<?php foreach ($js as $_js){?>
	<script src="<?php echo $_js;?>"></script>
	<?php }?>
</head>
<body>
		<div class="header">
			<div class="container">
				<nav class="navbar navbar-default movie-navbar" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
							<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
							 <span class="icon-bar"></span> <span class="icon-bar"></span>
						</button>
						<a class="brand"><img src="<?php echo $assets;?>img/logo.png" /></a>
					</div>

					<div class="collapse navbar-collapse nav-wil" id="example-navbar-collapse">
						<nav>
							<ul class="nav navbar-nav navbar-left menu-nav-list">
								<li><a class="cur" href="<?php echo site_url();?>">Home</a></li>
								<?php foreach ($Families as $Family){?>
									<li><a href="<?php echo site_url($Family["Description"]);?>s"><?php echo $Family["Name"];?></a></li>
								<?php } ?>
							</ul>
						</nav>
						<nav>
							<ul class="nav navbar-nav navbar-right navbar-social">
								<li><a target="_blank" href="https://www.instagram.com/weddier/?hl=en">instagram </a></li>
								<li><a target="_blank" href="https://twitter.com/WeddierApp">twitter</a></li>
								
							</ul>
						</nav>


					</div>
				</nav>
			
			</div>
		</div>
	
	<div class="main">
		<div class="container">
			<?php echo $the_view_content;?>
		</div>
	</div>
	<div class="space20"> </div>
	<div class="space20"> </div>
	<div class="footer">
		<div class="container">
			<div class="row">
			<div class="col-sm-3">
				<ul class="footer-menu">
					<li><?php echo anchor("/","Home")?></li>
					<li><?php echo anchor("/","Blog")?></li>
					<li><?php echo anchor("/","Contact")?></li>
				</ul>
			</div>
			<div class="col-sm-7"><p>
Disclaimer: This site does not store any files on its server. All contents are provided by non-affiliated third parties.</p></div>
			<div class="col-sm-2">Best10Movies © 2017</div>
			</div>
		</div>
	</div>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-97817388-1', 'auto');
  ga('send', 'pageview');

</script>
	</body>
</html>

