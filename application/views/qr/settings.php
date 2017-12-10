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
<style type="text/css">
	.developed{
		text-align:center;
		font-size:22px;
		margin-top:50px;
	}
</style>
<body>



<div class="container">
	<h3 class="developed">
		Developed by: Joseph
	</h3>	
</div>


</body>
</html>

