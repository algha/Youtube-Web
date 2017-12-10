<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Kurumi - Login</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="<?php echo $assets;?>css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo $assets;?>css/bootstrap.min.css">
	
	<link rel="stylesheet" href="<?php echo $assets;?>css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="<?php echo $assets;?>css/style.css">
	<link rel="stylesheet" href="<?php echo $assets;?>css/toastr.min.css">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	
	<div class="login-page bk-img" style="background-image: url(<?php echo $assets;?>img/login-bg.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x"><?php echo lang("sign_in");?></h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form action="<?php echo site_url('backend/Login/postLogin');?>" method="post" onSubmit="return SubmitAjaxOnly(this);" class="mt">

									<label class="text-uppercase text-sm"><?php echo lang("account");?></label>
									<input name="email" type="text" placeholder="<?php echo lang("account");?>" class="form-control mb">

									<label class="text-uppercase text-sm"><?php echo lang("password");?></label>
									<input name="pass" type="password" placeholder="<?php echo lang("password");?>" class="form-control mb">

									<div class="checkbox checkbox-circle checkbox-info">
										<input id="checkbox7" type="checkbox" checked>
										<label for="checkbox7">
											<?php echo lang("save_password");?>
										</label>
									</div>

									<button class="btn btn-primary btn-block" type="submit"><?php echo lang("login");?></button>

								</form>
							</div>
						</div>
						<div class="text-center text-light">
							<a href="#" class="text-light"><?php //echo lang("forget_password");?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Loading Scripts -->
	<script src="<?php echo $assets;?>js/jquery.min.js"></script>
	<script src="<?php echo $assets;?>js/toastr.min.js"></script>
	<script type="text/javascript">
	 function SubmitAjaxOnly(element){
		 	var url = $(element).attr("action");
		 	var data = $(element).serialize();
		 	
		    $.ajax({
		        type: "POST",
		        url: url,          
		        data: data,
		        success: function(json){  
			      //  alert(json);
			        try{
			            var obj = jQuery.parseJSON(json);
			            if(obj.redirect != null){
			            	window.location.href = obj.redirect;
			            	return;
			            }
			            if (obj.showMessage == true){
				            if(obj.status == 0){
				            	toastr.error(obj.info, 'くるーみ');
				            }else{
				            	toastr.success(obj.info, 'くるーみ');
				            }
			            	return;
			            }
			        }catch(e) {     
			        	toastr.error(' json error, Exception while request..', 'くるーみ')
			        }       
		        },
		        error: function(){                      
		        	toastr.error('Exception while request..', 'くるーみ')
		        }
		    });
		 return false;
	}
	</script>

</body>

</html>