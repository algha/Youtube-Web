<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo lang("add");?></div>
			<div class="panel-body">
				<form action="<?php echo site_url('backend/action/updateAction');?>" method="post"
						data-id="#Action" 
						data-table-source="<?php echo site_url('backend/action/getActions');?>" 
				 		onSubmit="return SubmitAjax(this);">
				 		<?php echo inputHidden($Action,"Action_id");?>
					<div class="form-group">
						<label class="control-label" for="title"><?php lang("permession");?></label> <input
							class="form-control" name="Name" <?php echo inputValue($Action,"Name");?> placeholder="<?php echo lang("action").lang("enter");?>">
					</div>

					<div class="form-group">
						<label class="control-label" for="title"><?php lang("description");?></label> <input
							class="form-control" name="Description" <?php echo inputValue($Action,"Description");?>  placeholder="<?php echo lang("description").lang("enter");?>">
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
			<div class="panel-heading"><?php echo lang("action_list");?></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<table id="Action"
							class="display table table-striped table-bordered table-hover dataTable">
							<thead>
								<tr role="row">
									<th>ID</th>
									<th><?php echo lang("number");?></th>
									<th><?php echo lang("description");?></th>
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
	 options.pageLength = 10;
	 
	 var loadDataUrl = '<?php echo site_url("backend/Action/getActions")?>';

	var ActionAocolums =  [{ "mData": "Action_id" },{ "mData": "Name","bSortable":false },{ "mData": "Description","bSortable":false },{ "mData": null,"bSortable": false }];
	var ActionColumnDefs = [{"targets": -1,"data": null,
		"render": function (data, type, row) {
			return "<a href=\"<?php echo site_url("backend/Action/?Action_edit_id=");?>"+row.Action_id+"\"><i class=\"fa fa-edit\"></i></a> "+
	  		 "<a href=\"javascript:del('<?php echo site_url("backend/Action/delete/?id=");?>"+row.Action_id+"','#Action','"+loadDataUrl+"')\">"+
	  		 "<i class=\"fa fa-remove\"></i></a>";
	}}];
	InitOverviewDataTable("#Action",loadDataUrl,ActionAocolums,ActionColumnDefs,options);
});
</script>