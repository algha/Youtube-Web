<div class="row">

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo lang("base_info");?></div>
			<div class="panel-body">
				<form class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label" for="title"><?php echo lang("name");?></label>
						<div class="col-sm-10">
							<input class="form-control" id="title" placeholder="<?php echo lang("name");?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="title"><?php echo lang("profile");?></label>
						<div class="col-sm-10"><textarea class="form-control" rows="3" placeholder="<?php echo lang("profile");?>"></textarea></div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="title"><?php echo lang("gender");?></label>
						<div class="col-sm-10">
							<div class="radio radio-inline">
								<input type="radio" id="gender1" value="option1" name="gender"
									checked> <label for="gender1"><?php echo lang("male");?></label>
							</div>
							<div class="radio radio-inline">
								<input type="radio" id="gender2" value="option1" name="gender"> <label
									for="gender2"><?php echo lang("female");?></label>
							</div>
							<div class="radio radio-inline">
								<input type="radio" id="gender3" value="option1" name="gender"> <label
									for="gender3"><?php echo lang("not_selected");?></label>
							</div>
						</div>	
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="title"><?php echo lang("registered_at");?></label>
						<div class="col-sm-10"><p class="form-control-static">2017/2/12</p></div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="title"><?php echo lang("login_at");?></label>
						<div class="col-sm-10"><p class="form-control-static">2017/2/12</p></div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="title"><?php echo lang("login_count");?></label>
						<div class="col-sm-10"><p class="form-control-static">１２３次</p></div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="title"></label>
						<div class="col-sm-10">
							<button class="btn btn-primary" type="submit"><?php echo lang("save");?></button>
						</div>	
					</div>
			
			</div>
			</form>
		</div>
	</div>

</div>