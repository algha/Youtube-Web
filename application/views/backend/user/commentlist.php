<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Comment</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<table id="comment" class="display table table-striped table-bordered table-hover dataTable">
							<thead>
								<tr role="row">
									<th>ID</th>
									<th>Comment</th>
									<td>Content</td>
									<td>Good</td>
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

	 var loadDataUrl = '<?php echo site_url("backend/Comment/getComments");?>';

	var commentAocolums =  [{ "mData": "Comment_id" },{ "mData": "UserName","bSortable": false },{ "mData": "Content","bSortable": false },
		{ "mData": "Good","bSortable": false }, {"mData": "Created_at","bSortable": false },{ "mData": null,"bSortable": false}];
	var commentColumnDefs = [{"targets": -1,"data": null,
						"render": function (data, type, row) {
						return "<a href=\"<?php echo site_url("backend/Comment/update/?Comment_edit_id=");?>"+row.Comment_id+"\"><i class=\"fa fa-edit\"></i></a>"+
				  		 "<a href=\"javascript:del('<?php echo site_url("backend/Comment/delete/?id=");?>"+row.Comment_id+"','#comment','"+loadDataUrl+"')\"><i class=\"fa fa-remove\"></i></a>";
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
	InitOverviewDataTable("#comment",loadDataUrl,commentAocolums,commentColumnDefs,options);
});
</script>