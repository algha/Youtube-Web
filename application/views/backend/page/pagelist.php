<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo lang("page_list");?></div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<table id="pages"
							class="display table table-striped table-bordered table-hover dataTable">
							<thead>
								<tr role="row">
									<th>ID</th>
									<th><?php echo lang("title");?></th>
									<th><?php echo lang("os");?></th>
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
	 options.filter = false;
	 options.sort = false;
	 options.info = true;
	 options.serverSide = true;
	 options.pageLength = 15;

	var pageAocolums =  [{ "mData": "Page_id" },{ "mData": "Title" },{ "mData": "OS" },{ "mData": "Created_at" },{ "mData": null }];
	var pageColumnDefs = [{"targets": -1,"data": null,
		"render": function (data, type, row) {
			return "<a href=\"<?php echo site_url("backend/Page/update/?Page_edit_id=");?>"+row.Page_id+"\"><i class=\"fa fa-edit\"></i></a> "+
	  		 "<a href=\"javascript:del('<?php echo site_url("backend/Page/delete/?id=");?>"+row.Page_id+"','#pages','<?php echo site_url("backend/Page/getPages")?>')\">"+
	  		 "<i class=\"fa fa-remove\"></i></a>";
			}}, { 
	 	        "targets": 3, //column index counting from the left
	 	        "type": 'date',
	 	        "render": function ( dateObj ) {
	 	            var oDate = new Date(dateObj * 1000);
	 	            result = oDate.getDate()+"/"+(oDate.getMonth()+1)+"/"+oDate.getFullYear();
	 	            return "<span>"+result+"</span>";
	 	        }
	 	    }];
	InitOverviewDataTable("#pages","<?php echo site_url("backend/Page/getPages")?>",pageAocolums,pageColumnDefs,options);
	
});
</script>