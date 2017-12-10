<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo lang("manager");?></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<table id="Manager"
							class="display table table-striped table-bordered table-hover dataTable"
							cellspacing="0" width="100%" style="width: 100%;">
							<thead>
								<tr role="row">
									<th>ID</th>
									<th><?php echo lang("name");?></th>
									<th>Role</th>
									<th>Email</th>
									<th>Login IP</th>
									<th>Last Login at</th>
									<th>Login count</th>
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

	 var loadDataUrl = '<?php echo site_url("backend/Manager/getManagers")?>';

	var ManagerAocolums =  [{ "mData": "Manager_id" },{"mData": "Name" },{ "mData": "rName" },{"mData": "Email" },{ "mData": "LastLogin_IP" },{"mData": "Lastlogin_at" },{"mData": "LoginCount" },{ "mData": null }];
	var ManagerColumnDefs = [{"targets": -1,"data": null,
						"render": function (data, type, row) {
						return "<a href=\"<?php echo site_url("backend/Manager/update/?Manager_edit_id=");?>"+row.Manager_id+"\"><i class=\"fa fa-edit\"></i></a> "+
				  		 "<a href=\"javascript:del('<?php echo site_url("backend/Manager/delete/?id=");?>"+row.Manager_id+"','#Manager','"+loadDataUrl+"')\">"+
				  		 "<i class=\"fa fa-remove\"></i></a>";
	 		}}];
	InitOverviewDataTable("#Manager",loadDataUrl,ManagerAocolums,ManagerColumnDefs,options);
});
</script>