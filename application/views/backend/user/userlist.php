<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">User</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<table id="user" class="display table table-striped table-bordered table-hover dataTable">
							<thead>
								<tr role="row">
									<th>ID</th>
									<th>Icon</th>
									<th>Name</th>
									<th>Email</th>
									<th>Gender</th>
									<th>Country</th>
									<th>Age</th>
									<th>Login Count</th>
									<th>Last_Login_at</th>
									<th>Created_at</th>
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

	 var loadDataUrl = '<?php echo site_url("backend/user/getUsers")?>';

	var userAocolums =  [{ "mData": "User_id" },{ "mData": "Icon","bSortable": false },{ "mData": "Name","bSortable": false },{ "mData": "Email","bSortable": false }, {"mData": "Gender","bSortable": false },
		 {"mData": "Country","bSortable": false  },{"mData": "Age","bSortable": false  },{"mData": "Login_Count","mSearchable": false  },{ "mData": "Last_Login_at","mSearchable": false  }
	,{"mData": "Created_at","mSearchable": false },{ "mData": null,"bSortable": false}];
	var userColumnDefs = [{"targets": -1,"data": null,
						"render": function (data, type, row) {
						return "<a href=\"<?php echo site_url("backend/user/update/?user_edit_id=");?>"+row.User_id+"\"><i class=\"fa fa-edit\"></i></a>"+
				  		 "<a href=\"javascript:del('<?php echo site_url("backend/user/delete/?id=");?>"+row.User_id+"','#user','"+loadDataUrl+"')\"><i class=\"fa fa-remove\"></i></a>";
	 		}}, { 
	 	        "targets": 8,
	 	        "type": 'date',
	 	        "render": function ( dateObj ) {
	 	            var oDate = new Date(dateObj * 1000);
	 	            result = oDate.getDate()+"/"+(oDate.getMonth()+1)+"/"+oDate.getFullYear();
	 	            return "<span>"+result+"</span>";
	 	        }
	 	    }, { 
	 	        "targets": 9,
	 	        "type": 'date',
	 	        "render": function ( dateObj ) {
	 	            var oDate = new Date(dateObj * 1000);
	 	            result = oDate.getDate()+"/"+(oDate.getMonth()+1)+"/"+oDate.getFullYear();
	 	            return "<span>"+result+"</span>";
	 	        }
	 	    }];
	InitOverviewDataTable("#user",loadDataUrl,userAocolums,userColumnDefs,options);
});
</script>