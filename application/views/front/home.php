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
		<div class="title"><span>Latest Videos</span> <a href="<?php echo site_url("all");?>">View All</a></div>
		<ul class="movie_list">
			<?php foreach($Latest as $Movie){?>
			<li>
				<div class="poster"><a href="<?php echo site_url($Movie["Family_Description"]."/").$Movie["UrlName"];?>"><img src="<?php echo base_url().$Movie["Image"];?>" alt="<?php echo $Movie["Name"];?>" /></a></div>
				<div class="name"><a href="<?php echo site_url($Movie["Family_Description"]."/").$Movie["UrlName"];?>"><?php echo $Movie["Name"];?></a></div>
				<div class="date"><?php echo $Movie["Published_at"];?></div>
			</li>
			<?php } ?>
		</ul>
	</div>
	
	<div class="space10"> </div>
		
	<div class="movie_frame latest_movies">
		<div class="title"><span>Videos</span> <a href="<?php echo site_url("videos");?>">View All</a></div>
		<ul class="music_list">
			<?php foreach($Videos as $Movie){?>
			<li>
				<div class="poster"><a href="<?php echo site_url("video/").$Movie["UrlName"];?>"><img src="<?php echo base_url().$Movie["Image"];?>" alt="<?php echo $Movie["Name"];?>" /></a></div>
				<div class="name"><a href="<?php echo site_url("video/").$Movie["UrlName"];?>"><?php echo $Movie["Name"];?></a></div>
			</li>
			<?php } ?>
		</ul>
	</div>
	
	<div class="space10"> </div>
	<div class="movie_frame latest_movies">
		<div class="title"><span>Movies</span> <a href="<?php echo site_url("movies");?>">View All</a></div>
		<ul class="movie_list">
			<?php foreach($Movies as $Movie){?>
			<li>
				<div class="poster"><a href="<?php echo site_url("movie/").$Movie["UrlName"];?>"><img src="<?php echo base_url().$Movie["Image"];?>" alt="<?php echo $Movie["Name"];?>"/></a></div>
				<div class="name"><a href="<?php echo site_url("movie/").$Movie["UrlName"];?>"><?php echo $Movie["Name"];?></a></div>
				<div class="date"><?php echo $Movie["Published_at"];?></div>
			</li>
			<?php } ?>
		</ul>
	</div>
	<div class="space10"> </div>
		
	<div class="movie_frame latest_movies">
		<div class="title"><span>Episodes</span> <a href="<?php echo site_url("episodes");?>">View All</a></div>
		<ul class="movie_list">
			<?php foreach($Episodes as $Movie){?>
			<li>
				<div class="poster"><a href="<?php echo site_url("episode/").$Movie["UrlName"];?>"><img src="<?php echo base_url().$Movie["Image"];?>" alt="<?php echo $Movie["Name"];?>" /></a></div>
				<div class="name"><a href="<?php echo site_url("episode/").$Movie["UrlName"];?>"><?php echo $Movie["Name"];?></a></div>
				<div class="date"><?php echo $Movie["Published_at"];?></div>
			</li>
			<?php } ?>
		</ul>
	</div>
	<div class="space10"> </div>
		
	<div class="movie_frame latest_movies">
		<div class="title"><span>TV Shows</span> <a href="<?php echo site_url("tvs");?>">View All</a></div>
		<ul class="movie_list">
			<?php foreach($TVs as $Movie){?>
			<li>
				<div class="poster"><a href="<?php echo site_url("tv/").$Movie["UrlName"];?>"><img src="<?php echo base_url().$Movie["Image"];?>" alt="<?php echo $Movie["Name"];?>" /></a></div>
				<div class="name"><a href="<?php echo site_url("tv/").$Movie["UrlName"];?>"><?php echo $Movie["Name"];?></a></div>
				<div class="date"><?php echo $Movie["Published_at"];?></div>
			</li>
			<?php } ?>
		</ul>
	</div>
	
	<div class="space10"> </div>
		
	<div class="movie_frame latest_movies">
		<div class="title"><span>Music</span> <a href="<?php echo site_url("musics");?>">View All</a></div>
		<ul class="music_list">
			<?php foreach($Musics as $Movie){?>
			<li>
				<div class="poster"><a href="<?php echo site_url("music/").$Movie["UrlName"];?>"><img src="<?php echo base_url().$Movie["Image"];?>" alt="<?php echo $Movie["Name"];?>" /></a></div>
				<div class="name"><a href="<?php echo site_url("music/").$Movie["UrlName"];?>"><?php echo $Movie["Name"];?></a></div>
			</li>
			<?php } ?>
		</ul>
	</div>
	
	<div class="space10"> </div>
		
	<div class="movie_frame latest_movies">
		<div class="title"><span>Game</span> <a href="<?php echo site_url("games");?>">View All</a></div>
		<ul class="movie_list">
			<?php foreach($Games as $Movie){?>
			<li>
				<div class="poster"><a href="<?php echo site_url("game/").$Movie["UrlName"];?>"><img src="<?php echo base_url().$Movie["Image"];?>" alt="<?php echo $Movie["Name"];?>" /></a></div>
				<div class="name"><a href="<?php echo site_url("game/").$Movie["UrlName"];?>"><?php echo $Movie["Name"];?></a></div>
				<div><?php echo $Movie["Published_at"];?></div>
			</li>
			<?php } ?>
		</ul>
	</div>
	
	
</div>