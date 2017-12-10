<div class="sidebar col-sm-3">
	<div class="space10"> </div>
	<div class="family sidebar-div">
		<div class="title">Browse <button class="updown"> <i class="fa fa-angle-down"></i> </button></div>
		<ul class="linear_list sidebar-content">
			<li><a class="cur" href="<?php echo site_url();?>">Home</a></li>
			<?php foreach ($Families as $Family){?>
			<li><a href="<?php echo site_url($Family["Description"]);?>s"><?php echo $Family["Name"];?></a></li>
			<?php } ?>
		</ul>
	</div>
	<div class="category sidebar-div">
		<div class="title">Category <button class="updown"> <i class="fa fa-angle-down"></i> </button></div>
		<ul class="linear_list sidebar-content">
			<?php foreach ($Categories as  $Category){?>
			<li><a href="<?php echo site_url("category/".$Category["Description"]);?>"><?php echo $Category["Name"];?></a></li>
			<?php } ?>
		</ul>
	</div>

</div>


<div class="movies col-sm-9">
	
	<div class="space10"> </div>
	<div class="movie_frame latest_movies">
		<div class="title"><span><?php echo $Title;?></span></div>
		<ul class="movie_list">
			<?php foreach($Movies as $Movie){?>
			<li>
				<div class="poster"><a href="<?php echo site_url($Movie["Family_Description"]."/").$Movie["UrlName"];?>"><img src="<?php echo base_url().$Movie["Image"];?>" alt="<?php echo $Movie["Name"];?>"/></a></div>
				<div class="name"><a href="<?php echo site_url($Movie["Family_Description"]."/").$Movie["UrlName"];?>"><?php echo $Movie["Name"];?></a></div>
				<div class="date"><?php echo $Movie["Published_at"];?></div>
			</li>
			<?php } ?>
		</ul>
	</div>
	
</div>