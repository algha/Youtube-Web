<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo lang("base_info");?></div>
			<div class="panel-body">
				<form class="form-horizontal"
					action="<?php echo site_url('backend/Manager/updateManager');?>"
					method="post" onSubmit="return SubmitAjaxOnly(this);">
					<?php echo inputHidden($Manager,"Manager_id");?>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="title"><?php echo lang("name");?></label>
						<div class="col-sm-10">
							<input class="form-control" required name="Name"
								<?php echo inputValue($Manager,"Name");?>
								placeholder="<?php echo lang("name");?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="title"><?php echo lang("email");?></label>
						<div class="col-sm-10">
							<input class="form-control" required name="Email"
								<?php echo inputValue($Manager,"Email");?>
								placeholder="<?php echo lang("email");?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label"><?php echo lang("password");?></label>
						<div class="col-sm-10">
							<input class="form-control" type="password" name="Password"
								placeholder="<?php echo lang("password");?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label"><?php echo lang("password");?></label>
						<div class="col-sm-10">
							<input class="form-control" type="password" name="RePassword"
								placeholder="<?php echo lang("password");?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label"><?php echo lang("login");?></label>
						<div class="col-sm-10">
							<label class="radio-inline"> <input type="radio"  <?php echo checkedRadioValue("canLogin",$Manager,1);?> value="1" name="canLogin">ログインできる</label>
							<label class="radio-inline"> <input type="radio" <?php echo checkedRadioValue("canLogin",$Manager,0);?> value="0" name="canLogin">ログインできない</label>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="title"><?php echo lang("role");?></label>
						<div class="col-sm-10">
							<select class=" form-control" name="Role_id" title="Role">
								<option><?php echo lang("select_a_role");?></option>
								<?php foreach ($roles as $role){?>
								<option
									<?php echo $Manager["Role_id"]==$role["Role_id"]?"selected":""; ?>
									value="<?php echo $role["Role_id"];?>"><?php echo $role["Name"];?></option>
								<?php }?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="title"></label>
						<div class="col-sm-10">
							<button class="btn btn-primary" type="submit"><?php echo lang("save");?></button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

</div>