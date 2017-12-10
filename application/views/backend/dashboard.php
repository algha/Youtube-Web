<div class="row">
	<div class="col-md-12">

		<h2 class="page-title">Manager page</h2>

		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-body bk-primary text-light">
								<div class="stat-panel text-center">
									<div class="stat-panel-number h1 "><?php echo $AllUsers;?> / <?php echo $NewUsers;?></div>
									<div class="stat-panel-title text-uppercase">All Users / New Users</div>
								</div>
							</div>
							<a href="<?php echo site_url("backend/User");?>" class="block-anchor panel-footer text-center">view_all <i
								class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-body bk-info text-light">
								<div class="stat-panel text-center">
									<div class="stat-panel-number h1 "><?php echo $AllMovies;?></div>
									<div class="stat-panel-title text-uppercase">Job</div>
								</div>
							</div>
							<a href="<?php echo site_url("backend/Job");?>" class="block-anchor panel-footer text-center">View All <i class="fa fa-arrow-right"></i>
							</a>
						</div>
					</div>
				
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">User Chart</div>
					<div class="panel-body">
						<div class="chart">
							<canvas id="dashReport" height="310" width="600"></canvas>
						</div>
						<div id="legendDiv"></div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading"><a href="<?php echo site_url("backend/Comments");?>">New Comments</a></div>
					<div class="panel-body">
						<table class="table table-hover" style="margin-bottom: 0;">
							<thead>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Content</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
							
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="row" style="display: none;">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Pie Chart</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4">
								<ul class="chart-dot-list">
									<li class="a1">date 1</li>
									<li class="a2">data 2</li>
									<li class="a3">data 3</li>
								</ul>
							</div>
							<div class="col-md-8">
								<div class="chart chart-doughnut">
									<canvas id="chart-area3" width="1200" height="900" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Doughnut</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4">
								<ul class="chart-dot-list">
									<li class="a1">date 1</li>
									<li class="a2">data 2</li>
									<li class="a3">data 3</li>
								</ul>
							</div>
							<div class="col-md-8">
								<div class="chart chart-doughnut">
									<canvas id="chart-area4" width="1200" height="900" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
	<script>
 	window.onload = function(){

 		var swirlData = {
 			    labels: ["11月", "12月", "1月", "2月", "3月"],
 			    datasets: [
 			        {
 			            label: "My First dataset",
 			            fillColor: "rgba(151,187,205,0.2)",
 			            strokeColor: "rgba(151,187,205,1)",
 			            pointColor: "rgba(151,187,205,1)",
 			            pointStrokeColor: "#fff",
 			            pointHighlightFill: "#fff",
 			            pointHighlightStroke: "rgba(151,187,205,1)",
 			            data: [28, 48, 40, 19, 80]
 			        }
 			    ]
 			};
 	 	
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		});
	
// 			// Pie Chart from doughutData
// 			var doctx = document.getElementById("chart-area3").getContext("2d");
// 			window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});
	
// 			// Dougnut Chart from doughnutData
// 			var doctx = document.getElementById("chart-area4").getContext("2d");
// 			window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});
	
 	}
	</script>