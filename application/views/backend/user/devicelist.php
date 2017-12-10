<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo lang("device_list");?></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<table id="device"
							class="display table table-striped table-bordered table-hover dataTable">
							<thead>
								<tr role="row">
									<th>ID</th>
									<th>OS</th>
									<th>Identifier</th>
									<th>Token</th>
									<th><?php echo lang("address");?></th>
									<th><?php echo lang("date");?></th>
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
	 options.filter = true;
	 options.sort = true;
	 options.info = true;
	 options.serverSide = true;
	 options.pageLength = 10;

	 var loadDataUrl = '<?php echo site_url("backend/device/getDevices")?>';

	var deviceAocolums =  [{ "mData": "Device_id" },{ "mData": "DeviceOS","bSortable": false }, {"mData": "Identifier","bSortable": false },{ "mData": "Token","mSearchable": false  }
	,{"mData": "Address","mSearchable": false  },{"mData": "Created_at","mSearchable": false },{ "mData": null,"bSortable": false}];
	var deviceColumnDefs = [{"targets": -1,"data": null,
						"render": function (data, type, row) {
						return "<a href=\"<?php echo site_url("backend/device/update/?device_edit_id=");?>"+row.Device_id+"\"><i class=\"fa fa-edit\"></i></a>"+
				  		 "<a href=\"javascript:del('<?php echo site_url("backend/device/delete/?id=");?>"+row.Device_id+"','#device','"+loadDataUrl+"')\"><i class=\"fa fa-remove\"></i></a>";
	 		}}, { 
	 	        "targets": 6,
	 	        "type": 'date',
	 	        "render": function ( dateObj ) {
	 	            var oDate = new Date(dateObj * 1000);
	 	            result = oDate.getDate()+"/"+(oDate.getMonth()+1)+"/"+oDate.getFullYear();
	 	            return "<span>"+result+"</span>";
	 	        }
	 	    }];
	InitOverviewDataTable("#device",loadDataUrl,deviceAocolums,deviceColumnDefs,options);
});
</script>