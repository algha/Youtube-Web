<div class="movies col-sm-9">
	<div class="space10"> </div>
	<div class="movie_frame latest_movies">
	  <div id="player"></div>
	  <script>
      var tag = document.createElement('script');
      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '485',
          width: '100%',
          videoId: '<?php echo $Movie["Video_url"];?>',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          },
          playerVars: {
        	  showinfo: 0, 
              autoplay: 1 , 'autohide': 1, 'controls': 1, 'rel': 0, 'loop': 1
          }
        });
      }
      function onPlayerReady(event) {
        event.target.playVideo();
      }
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }
    </script>
    
	    <div class="video_info">
	    	<div class="poster">
	    		<img src="<?php echo base_url().$Movie["Image"];?>" />
	    	</div>
	    	<div class="data">
	    		<h1><?php echo $Movie["Name"];?></h1>
	    		<div class="extra">
	    			<span class="date"><?php echo $Movie["Published_at"];?></span>
	    			<span class="runtime"><?php echo $Movie["Length"];?></span>
	    		</div>
	    		
	    	</div>
	    </div>
	    <div class="video_description">
	    	<div class="title">Description</div>
	    	<p class="content">
	    		<?php echo $Movie["Content"];?>
	    	</p>
	    	<div class="space10"></div>
	    	<?php if($Movie["Images"] != ""){?>
	    	<div class="title">Images</div>
	    	<div class="space10"></div>
	    	<div class="images">
	    		<?php $images = explode(",", $Movie["Images"]);?>
	    		<?php foreach ($images as $image){?>
	    		<span>
	    			<img alt="<?php echo $Movie["Name"];?>" src="<?php echo base_url().$image;?>" alt="<?php echo $Movie["Name"];?>" alt="<?php $Movie["Name"];?>" />
	    		</span>
	    		
	    		<?php }?>
	    	</div>
	    	<?php }?>
	    </div>
	</div>	
</div>

<div class="sidebar col-sm-3">
	<div class="space10"> </div>
	<div class="family">
		<div class="title">You May Also Like</div>
		<ul class="sidebar_movie_list">
			<?php foreach ($Movies as $_Movie){?>
			<li>
				<div class="image">
					<a href="<?php echo site_url("movie/").$_Movie["UrlName"];?>"><img src="<?php echo base_url().$_Movie["Image"];?>" alt="<?php echo $_Movie["Name"];?>"/></a>
				</div>
				<div class="data">
					<h3><?php echo $_Movie["Name"];?></h3>
					<span class="pdate"><?php echo $_Movie["Published_at"];?></span>
					<span>IMDB: <?php echo $_Movie["Imdb"];?></span>
					<span>View: <?php echo $_Movie["Click"];?></span>
				</div>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
