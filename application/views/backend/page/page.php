<div class="row">
	<form action="<?php echo site_url('backend/page/updatePage');?>"
		  method="post" onSubmit="return SubmitAjaxOnly(this);">
		  <?php echo inputHidden($Page,"Page_id");?>
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><?php echo lang("base_info");?></div>
				<div class="panel-body">
					<div class="form-group">
						<label for="title"><?php echo lang("title");?></label>
						<input class="form-control" name="Title" placeholder="<?php echo lang("title");?>" <?php echo inputValue($Page,"Title");?>>
					</div>
					<div class="form-group">
						<label for="title"><?php echo lang("content");?></label>
						<textarea class="form-control" rows="5" name="Content" placeholder="<?php echo lang("content");?>"><?php echo textViewValue($Page,"Content");?></textarea>
					</div>
					<div class="form-group">
						<label for="title"><?php echo lang("order");?></label>
						<input class="form-control" name="ListOrder" placeholder="1" <?php echo inputValue($Page,"ListOrder");?>>
					</div>
					<div class="form-group">
						<label for="title"><?php echo lang("os");?></label>
						<select class="selectpicker form-control" multiple name="OS" title="<?php echo lang("os");?>">
							<option>Android</option>
							<option>iOS</option>
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">	<?php echo lang("save");?>	</button>
						<button class="btn btn-default" >	<?php echo lang("cancel");?>	</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>