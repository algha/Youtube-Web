<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo lang("base_info");?></div>
			<div class="panel-body">
				<form class="form-horizontal" >
					<div class="form-group">
						<label class="col-sm-2 control-label" for="title"><?php echo lang("name");?></label>
						<div class="col-sm-10">
							<input class="form-control" disabled value="<?php echo $Manager["Name"];?>" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="title"><?php echo lang("email");?></label>
						<div class="col-sm-10">
							<input class="form-control" disabled value="<?php echo $Manager["Email"];?>" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">ログイン数</label>
						<div class="col-sm-10"><input class="form-control" disabled value="<?php echo $Manager["LoginCount"];?>次" /></div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="title">Role</label>
						<div class="col-sm-10"><input class="form-control" disabled value="<?php echo $Role["Name"];?>次" /></div>
					</div>

				</form>
			</div>
		</div>
	</div>

</div>