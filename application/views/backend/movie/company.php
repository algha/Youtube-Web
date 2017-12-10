<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo anchor("backend/company","Base Info");?></div>
			<div class="panel-body">
				<form action="<?php echo site_url('backend/Company/updateCompany');?>" method="post"
						data-id="#company" 
						data-table-source="<?php echo site_url('backend/Company/getCompanies');?>" 
				 		onSubmit="return SubmitAjax(this);">
				 		<?php echo inputHidden($Company,"Company_id");?>
					<div class="form-group">
						<div class="row">
							<div class="col-xs-4">
								<input class="form-control" required name="Name" placeholder="Name" <?php echo inputValue($Company,"Name");?> >
							</div>
							<div class="col-xs-4">
								<input class="form-control" required name="Address" placeholder="Address" <?php echo inputValue($Company,"Address");?>>
							</div><div class="col-xs-4">
								<input class="form-control" required name="Link" placeholder="Link" <?php echo inputValue($Company,"Link");?>>
							</div>
						</div>
					</div>
					<div class="form-group">
						<textarea class="form-control" id="title" name="Business" required
								placeholder="Business content"><?php echo textViewValue($Company,"Business");?></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary"  type="submit">Save</button>
					</div>
				</form>

				<div class="hr-dashed"></div>

				<table
					id="company"
					class="display table table-striped table-bordered table-hover dataTable">
					<thead>
						<tr role="row">
							<th>ID</th>
							<th>Name</th>
							<td>Address</td>
							<td>Business Content</td>
							<th>Manage</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
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
	 options.pageLength = 20;

	var companyAocolums =  [{ "mData": "Company_id" },{ "mData": "Name","bSortable": false},{ "mData": "Business","bSortable": false },{ "mData": "Address" ,"bSortable": false},{ "mData": null, "bSortable": false}];
	var companyColumnDefs =  [{"targets": -1,"data": null,
						"render": function (data, type, row) {
        					return "<a href=\"<?php echo site_url("backend/Company/?edit_id=");?>"+row.Company_id+"\"><i class=\"fa fa-edit\"></i></a>"+
        						   "<a href=\"javascript:del('<?php echo site_url("backend/Company/delete/?id=");?>"+row.Company_id+"','#company','<?php echo site_url("backend/Company/getCompanies")?>')\">"+
        						   "<i class=\"fa fa-remove\"></i></a>";
   				 		}},{"targets": 1,"data": null,
   							"render": function (data, type, row) {
   	        					return "<a href=\""+row.Link+"\" target=\"_blank\">"+row.Name+"</a>";
   	   				 		}}];
	InitOverviewDataTable("#company","<?php echo site_url("backend/Company/getCompanies")?>",companyAocolums,companyColumnDefs,options);
	
});
</script>
