<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Episodes</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<table id="episode" class="display table table-striped table-bordered table-hover" cellspacing="0"  style="width: 100%;">
							<thead>
								<tr role="row">
									<th>ID</th>
									<th>Name</th>
									<th>Season/Part</th>
									<th>Length</th>
									<th>Click</th>
									<td>Published at</td>
									<td>Created at</td>
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
	 
	 var loadDataUrl = '<?php echo site_url("backend/Episode/getEpisodes")?>';
	 var episodeAocolums =  [{ "mData": "Episode_id" },{ "mData": "Name","bSortable": false }, {"mData": null,"bSortable": false  }, {"mData": "Length","bSortable": false  },{ "mData": "Click","bSortable": false},
		 {"mData": "Published_at" ,"bSortable": false},{"mData": "Created_at" },{ "mData": null,"bSortable": false  }];
	 var episodeColumnDefs = [{"targets": -1,"data": null,
						"render": function (data, type, row) {
							var episode = "";
							if (row.Episode == 1){
								episode = "<a href=\"<?php echo site_url("backend/Episode/update/?Episode_id=");?>"+row.Episode_id+"\"><i class=\"fa fa-plus\"></i></a>";
							}
						return "<a href=\"<?php echo site_url("backend/Episode/update/?Episode_edit_id=");?>"+row.Episode_id+"\"><i class=\"fa fa-edit\"></i></a>   "+
				  		 "<a href=\"javascript:del('<?php echo site_url("backend/Episode/delete/?id=");?>"+row.Episode_id+"','#episode','"+loadDataUrl+"')\"><i class=\"fa fa-remove\"></i></a> "+episode;
	 		}}, {
	 	        "targets": 2, //column index counting from the left
	 	        "type": null,
	 	        "render": function ( data, type, row ) {
	 	            return row.Season + "/" + row.Part;
	 	        }
	 	    }, { 
	 	        "targets": 6, //column index counting from the left
	 	        "type": 'date',
	 	        "render": function ( dateObj ) {
	 	            var oDate = new Date(dateObj * 1000);
	 	            result = oDate.getDate()+"/"+(oDate.getMonth()+1)+"/"+oDate.getFullYear();
	 	            return "<span>"+result+"</span>";
	 	        }
	 	    }];
	InitOverviewDataTable("#episode",loadDataUrl,episodeAocolums,episodeColumnDefs,options);
});
</script>