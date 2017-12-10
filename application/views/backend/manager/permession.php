<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo lang("add");?></div>
			<div class="panel-body">
				<form action="<?php echo site_url('backend/Permession/updatePermession');?>" method="post"
						data-id="#Permession" 
						data-table-source="<?php echo site_url('backend/Permession/getPermessions');?>" 
				 		onSubmit="return SubmitAjax(this);">
				 		<?php echo inputHidden($Permession,"Permession_id");?>
					<div class="form-group">
						<label class="control-label" for="title"><?php echo lang("permession");?></label> <input
							class="form-control" name="Name" required <?php echo inputValue($Permession,"Name");?> placeholder="<?php echo lang("permession").lang("enter");?>">
					</div>
					<div class="form-group">
						<label class="control-label" ><?php echo lang("description");?></label> <input
							class="form-control" name="Description" required <?php echo inputValue($Permession,"Description");?>  placeholder="<?php echo lang("description").lang("enter");?>">
					</div>
					<div class="form-group">
						<label class="control-label" for="title"><?php echo lang("action");?></label> 
						<div>
							<?php foreach ($Actions as $_action){?>
								<label class="checkbox-inline">
									<input type="checkbox" name="Action_ids[]" <?php echo checkedValue($_action["Action_id"],$ActionIds);?> value="<?php echo $_action["Action_id"];?>" />
									<?php echo $_action["Name"];?>
								</label>
							<?php }?>
						</div>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit"><?php echo lang("save");?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo lang("permission_list");?></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<table id="Permession"
							class="display table table-striped table-bordered table-hover dataTable">
							<thead>
								<tr role="row">
									<th>ID</th>
									<th><?php echo lang("number");?></th>
									<th>Description</th>
									<th><?php echo lang("manage");?></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function () {

	 var options = {};
	 options.pagination = true;
	 options.filter = false;
	 options.sort = false;
	 options.info = true;
	 options.serverSide = true;
	 options.pageLength = 20;
	 
	 var loadDataUrl = '<?php echo site_url("backend/Permession/getPermessions")?>';

	var PermessionAocolums =  [{ "mData": "Permession_id" },{ "mData": "Name" },{ "mData": "Description" },{ "mData": null }];
	var PermessionColumnDefs = [{"targets": -1,"data": null,
		"render": function (data, type, row) {
			return "<a href=\"<?php echo site_url("backend/Permession/?Permession_edit_id=");?>"+row.Permession_id+"\"><i class=\"fa fa-edit\"></i></a> "+
	  		 "<a href=\"javascript:del('<?php echo site_url("backend/Permession/delete/?id=");?>"+row.Permession_id+"','#Permession','"+loadDataUrl+"')\">"+
	  		 "<i class=\"fa fa-remove\"></i></a>";
	}}];
	InitOverviewDataTable("#Permession",loadDataUrl,PermessionAocolums,PermessionColumnDefs,options);
});
</script>