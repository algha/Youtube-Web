<div class="row">
	<form action="<?php echo site_url('backend/Episode/updateEpisode');?>"
		  method="post" onSubmit="return SubmitAjaxOnly(this);" enctype="multipart/form-data">
		  <?php echo inputHidden($Episode,"Episode_id");?>
		<div class="col-md-7">
			<div class="panel panel-default">
				<div class="panel-heading">Base Info</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="title">Name</label>
						<div class="row">
							<div class="col-xs-6"><input class="form-control" name="Name" placeholder="Name" value="<?php echo $Name;?>" /></div>
							<div class="col-xs-6"><input class="form-control" name="UrlName" placeholder="Url Name" value="<?php echo $UrlName;?>" /></div>
						</div>
						
					</div>
					<div class="form-group">
						<label for="title">Season / Part</label>
						<div class="row">
							<div class="col-xs-6">
								<input class="form-control" required name="Season" placeholder="Season" <?php echo inputValue($Episode,"Season");?> >
							</div>
							<div class="col-xs-6">
								<input class="form-control" required name="Part" placeholder="Part" <?php echo inputValue($Episode,"Part");?>>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="title">content</label>
						<textarea class="form-control" name="Content" rows="5" placeholder="content"><?php echo textViewValue($Episode,"Content");?></textarea>
					</div>
					<div class="form-group">
						<label for="title">Video Url</label>
						<textarea class="form-control" name="Video_url" rows="5" placeholder="Video url"><?php echo textViewValue($Episode,"Video_url");?></textarea>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">Other_info</div>
				<div class="panel-body">
					<div class="form-group">
						<div><label for="title">State</label></div>
						<div class="radio radio-info radio-inline">
							<input type="radio" id="inlineRadio1" value="1" checked name="State">
							<label for="inlineRadio1">Publish</label>
						</div>
						<div class="radio radio-danger radio-inline">
							<input type="radio" id="inlineRadio2" value="0" name="State">
							<label for="inlineRadio2">Save</label>
						</div>
					</div>
					<div class="hr-dashed"></div>
					<div class="form-group">
						<label for="title">Publish Date</label>
						<div class="row">
							<div class="col-xs-12">
								<input class="form-control"  name="Published_at" placeholder="Published Date" <?php echo inputValue($Episode,"Published_at");?> >
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="title">Length / Quality</label>
						<div class="row">
							<div class="col-xs-6">
								<input class="form-control" required name="Length" placeholder="Length" <?php echo inputValue($Episode,"Length");?> >
							</div>
							<div class="col-xs-6">
								<input class="form-control" required name="Quality" placeholder="Quality" <?php echo inputValue($Episode,"Quality");?>>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">image</div>
				<div class="panel-body">
					<div class="form-group">
						<div class="image_upload_box" id="uploadImage">
							<span class="info">Click to Select Image</span>
							<input type="file" name="image" class="image_input" />
							<?php if($Episode != null && $Episode["Image"] != null){?>
							<div class="imgList">
								<img src="<?php echo base_url().$Episode["Image"];?>">
								<span onclick="remove(this)">x</span>
								<input type="hidden" name="Images[]" value="<?php echo $Episode["Image"];?>" >
							</div>
							<?php }?>
						</div>
						<script type="text/javascript">
							$(document).ready(function(){
								uploadImage("#uploadImage","<?php echo site_url("/backend/upload/do_upload")?>");
							});
						</script>
					</div>
					<div class="hr-dashed"></div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">	Save	</button>
						<button class="btn btn-default" type="submit">	Cancel  </button>
					</div>
				</div>
			</div>
		</div>	
	</form>
</div>