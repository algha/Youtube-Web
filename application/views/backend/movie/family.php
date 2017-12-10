<div class="row">
<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo anchor("backend/family","Action");?></div>
			<div class="panel-body">
				<form  action="<?php echo site_url('backend/Family/updateFamily');?>" method="post"
						data-id="#family" 
						data-table-source="<?php echo site_url("backend/Family/getFamilies");?>" 
				 		onSubmit="return SubmitAjax(this);">
					<?php echo inputHidden($Family,"Family_id");?>
					<div class="form-group">
						<label for="title"><?php echo lang("title");?></label>
						<div class="row">
							<div class="col-xs-6">
								<input class="form-control" name="Name" placeholder="Name" <?php echo inputValue($Family,"Name");?>>
							</div>
							<div class="col-xs-2">
								<input class="form-control" name="Description" placeholder="Description" <?php echo inputValue($Family,"Description");?>>
							</div>
							<div class="col-xs-1">
								<input class="form-control" name="ListOrder" placeholder="Order" <?php echo inputValue($Family,"ListOrder");?>>
							</div>
							<div class="col-xs-1">
								<input type="submit" class="btn btn-primary btn-block"  value="Save" />
							</div>
						</div>
					</div>
				</form>
			</div>
	</div>
</div>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Family List</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<table id="family" class="display table table-striped table-bordered table-hover dataTable" cellspacing="0" width="100%" style="width: 100%;">
							<thead>
								<tr role="row">
									<th>ID</th>
									<th>Name</th>
									<th>Key</th>
									<th>Click</th>
									<th>Manage</th>
								</tr>
							</thead>
							
							<tbody>
								<tr>
									
								</tr>
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
	 options.filter = true;
	 options.sort = true;
	 options.info = true;
	 options.serverSide = true;
	 options.pageLength = 15;

	var familyAocolums =  [{ "mData": "ListOrder" },{ "mData": "Name" },{ "mData": "Description" },{ "mData": "Click" },{ "mData": null }];
	var familyColumnDefs = [{"targets": -1,"data": null,
		"render": function (data, type, row) {
			return "<a href=\"<?php echo site_url("backend/Family/?Family_edit_id=");?>"+row.Family_id+"\"><i class=\"fa fa-edit\"></i></a> "+
	  		 "<a href=\"javascript:del('<?php echo site_url("backend/Family/delete/?id=");?>"+row.Family_id+"','#family','<?php echo site_url("backend/Family/getFamilies")?>')\">"+
	  		 "<i class=\"fa fa-remove\"></i></a>";
	}}];
	InitOverviewDataTable("#family","<?php echo site_url("backend/Family/getFamilies");?>",familyAocolums,familyColumnDefs,options);
});
</script>