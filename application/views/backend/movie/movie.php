<div class="row">
	<form action="<?php echo site_url('backend/Movie/updateMovie');?>"
		  method="post" onSubmit="return SubmitAjaxOnly(this);" enctype="multipart/form-data">
		  <?php echo inputHidden($Movie,"Movie_id");?>
		<div class="col-md-7">
			<div class="panel panel-default">
				<div class="panel-heading">Base Info</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="title">Name</label>
						<div class="row">
							<div class="col-xs-8"><input class="form-control" name="Name" placeholder="Name" <?php echo inputValue($Movie,"Name");?> /></div>
							<div class="col-xs-4"><input class="form-control" name="UrlName" placeholder="Url Name" <?php echo inputValue($Movie,"UrlName");?>></div>
						</div>
						
					</div>
					
					<div class="form-group">
						<label for="title">Company Info</label>
						<input class="form-control" id="Company" placeholder="Company Name" name="CompanyName" <?php echo inputValue($Movie,"CompanyName");?>  />
						<input type="hidden" name="Company_id" id="Company_id" <?php echo inputValue($Movie,"Company_id");?> />
					</div>
					<script type="text/javascript">
					    $('#Company').bootcomplete({
					        url: '<?php echo site_url('backend/company/search');?>',
					        minLength : 1,
					        idFieldName: 'Company_id',
					        formParams: {
					            'keyName' : $('#Company')
					        }
					    });
					</script>
					
					<div class="form-group">
						<label for="title">content</label>
						<textarea class="form-control" name="Content" rows="5" placeholder="content"><?php echo textViewValue($Movie,"Content");?></textarea>
					</div>
					<div class="form-group">
						<label for="title">Video Url</label>
						<textarea class="form-control" name="Video_url" rows="5" placeholder="Video url"><?php echo textViewValue($Movie,"Video_url");?></textarea>
					</div>
					<div class="hr-dashed"></div>
					<div class="form-group">
						<label for="title">Length / Quality</label>
						<div class="row">
							<div class="col-xs-6">
								<input class="form-control" name="Length" placeholder="Length" <?php echo inputValue($Movie,"Length");?> >
							</div>
							<div class="col-xs-6">
								<input class="form-control" name="Quality" placeholder="Quality" <?php echo inputValue($Movie,"Quality");?>>
							</div>
						</div>
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
					
					<div class="form-group">
						<div><label for="title">Episode</label></div>
						<div class="radio radio-info radio-inline">
							<input type="radio" id="Episode_true" value="1"  name="Episode">
							<label for="Episode_true">true</label>
						</div>
						<div class="radio radio-danger radio-inline">
							<input type="radio" id="Episode_false" checked value="0" name="Episode">
							<label for="Episode_false">false</label>
						</div>
					</div>
					
					<div class="hr-dashed"></div>
					<div class="form-group">
						<label for="title">Family</label>
						<select name="Family_Description"  class="form-control selectpicker" title="Family">
								<?php foreach ($Families as $Family){?>
								<option  <?php echo selectValue($Family["Description"], $Movie["Family_Description"]);?>  value="<?php echo $Family["Description"];?>"><?php echo $Family["Name"];?></option>
								<?php }?>
						</select>
					</div>
					
					<div class="form-group">
						<label for="title">Category</label>
						<select name="Category_Description[]" class="form-control selectpicker"  multiple title="Category">
								<?php foreach ($Categories as $Category){?>
								<option  <?php echo selectValue($Category["Description"], $Movie["Category_Description"]);?>  value="<?php echo $Category["Description"];?>"><?php echo $Category["Name"];?></option>
								<?php }?>
						</select>
					</div>
					
					<div class="form-group">
						<label for="title">Type</label>
						<select name="Type"  class="form-control selectpicker"  title="Type">
							<option  <?php echo selectValue("full", $Movie["Type"]);?>  value="Full">Full</option>
							<option  <?php echo selectValue("Trailer", $Movie["Type"]);?>  value="Full">Trailer</option>
						</select>
					</div>
					
					<div class="hr-dashed"></div>
					<div class="form-group">
						<label for="title">Publish Date / Year / IMDB</label>
						<div class="row">
							<div class="col-xs-4">
								<input class="form-control"  name="Published_at" placeholder="Published Date" <?php echo inputValue($Movie,"Published_at");?> >
							</div>
							<div class="col-xs-4">
								<input class="form-control"  name="Year" placeholder="Year" <?php echo inputValue($Movie,"Year");?>>
							</div>
							<div class="col-xs-4">
								<input class="form-control"  name="Imdb" placeholder="Imdb" <?php echo inputValue($Movie,"Imdb");?> >
							</div>
							
						</div>
					</div>
					
					<div class="hr-dashed"></div>
					<div class="form-group">
						<label for="title">Region / Language</label>
						<div class="row">
							<div class="col-xs-6">
								<input class="form-control"  name="Region" placeholder="Region" <?php echo inputValue($Movie,"Region");?> >
							</div>
							<div class="col-xs-6">
								<input class="form-control"  name="Language" placeholder="Language" <?php echo inputValue($Movie,"Language");?>>
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
							<?php if($Movie != null && $Movie["Image"] != null){?>
							<div class="imgList">
								<img src="<?php echo base_url().$Movie["Image"];?>">
								<span onclick="remove(this)">x</span>
								<input type="hidden" name="Images[]" value="<?php echo $Movie["Image"];?>" >
							</div>
							<?php }?>
							<?php 
								if($Movie != null && $Movie["Images"] != null){
									$Images = explode(",", $Movie["Images"]);
									foreach ($Images as $image){
								?>
								<div class="imgList">
									<img src="<?php echo base_url().$image;?>">
									<span onclick="remove(this)">x</span>
									<input type="hidden" name="Images[]" value="<?php echo $image;?>" >
								</div>
							<?php } }?>
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