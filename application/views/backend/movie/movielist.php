<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Movies</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<table id="movie" class="display table table-striped table-bordered table-hover" cellspacing="0"  style="width: 100%;">
							<thead>
								<tr role="row">
									<th>ID</th>
									<th>Name</th>
									<th>Family</th>
									<th>Category</th>
									<th>Region</th>
									<th>Language</th>
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
	 
	 var loadDataUrl = '<?php echo site_url("backend/movie/getMovies")?>';
	 var movieAocolums =  [{ "mData": "Movie_id" },{ "mData": "Name","bSortable": false }, {"mData": "Family_Description","bSortable": false  }, {"mData": "Category_Description","bSortable": false  },{ "mData": "Region","bSortable": false  },
		 {"mData": "Language" ,"bSortable": false},{"mData": "Click" },{"mData": "Published_at" },{"mData": "Created_at","mSearchable": false },{ "mData": null,"bSortable": false  }];
	 var movieColumnDefs = [{"targets": -1,"data": null,
						"render": function (data, type, row) {
							var episode = "";
							if (row.Episode == 1){
								episode = "<a href=\"<?php echo site_url("backend/Episode/update/?Movie_id=");?>"+row.Movie_id+"\"><i class=\"fa fa-plus\"></i></a>";
							}
						return "<a href=\"<?php echo site_url("backend/movie/update/?Movie_edit_id=");?>"+row.Movie_id+"\"><i class=\"fa fa-edit\"></i></a>   "+
				  		 "<a href=\"javascript:del('<?php echo site_url("backend/Movie/delete/?id=");?>"+row.Movie_id+"','#movie','"+loadDataUrl+"')\"><i class=\"fa fa-remove\"></i></a>   "+episode;
	 		}}, { 
	 	        "targets": 8, //column index counting from the left
	 	        "type": 'date',
	 	        "render": function ( dateObj ) {
	 	            var oDate = new Date(dateObj * 1000);
	 	            result = oDate.getDate()+"/"+(oDate.getMonth()+1)+"/"+oDate.getFullYear();
	 	            return "<span>"+result+"</span>";
	 	        }
	 	    }];
	InitOverviewDataTable("#movie",loadDataUrl,movieAocolums,movieColumnDefs,options);
});
</script>