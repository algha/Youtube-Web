<div class="row">
<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo anchor("backend/category","Action");?> </div>
			<div class="panel-body">
				<form  action="<?php echo site_url('backend/Category/updateCategory');?>" method="post"
						data-id="#category" 
						data-table-source="<?php echo site_url('backend/Category/getCategories');?>" 
				 		onSubmit="return SubmitAjax(this);">
					<?php echo inputHidden($Category,"Category_id");?>
					<div class="form-group">
						<label for="title"><?php echo lang("title");?></label>
						<div class="row">
							<div class="col-xs-6">
								<input class="form-control" name="Name" placeholder="Name" <?php echo inputValue($Category,"Name");?>>
							</div>
							<div class="col-xs-2">
								<input class="form-control" name="Description" placeholder="Description" <?php echo inputValue($Category,"Description");?>>
							</div>
							<div class="col-xs-1">
								<input class="form-control" name="ListOrder" placeholder="Order" <?php echo inputValue($Category,"ListOrder");?>>
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
			<div class="panel-heading">Category List</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<table id="category" class="display table table-striped table-bordered table-hover dataTable" cellspacing="0" width="100%" style="width: 100%;">
							<thead>
								<tr role="row">
									<th class="sorting" tabindex="0" aria-controls="zctb" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">ID</th>
									<th>Name</th>
									<th>Click</th>
									<th class="sorting" tabindex="0" aria-controls="zctb" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Manage</th>
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

	var categoryAocolums =  [{ "mData": "ListOrder" },{ "mData": "Name" },{ "mData": "Click" },{ "mData": null }];
	var categoryColumnDefs = [{"targets": -1,"data": null,
		"render": function (data, type, row) {
			return "<a href=\"<?php echo site_url("backend/Category/?Category_edit_id=");?>"+row.Category_id+"\"><i class=\"fa fa-edit\"></i></a> "+
	  		 "<a href=\"javascript:del('<?php echo site_url("backend/Category/delete/?id=");?>"+row.Category_id+"','#category','<?php echo site_url("backend/Category/getCategories")?>')\">"+
	  		 "<i class=\"fa fa-remove\"></i></a>";
	}}];
	InitOverviewDataTable("#category","<?php echo site_url("backend/Category/getCategories")?>",categoryAocolums,categoryColumnDefs,options);
});
</script>