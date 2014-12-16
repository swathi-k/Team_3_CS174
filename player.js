 // 2. This code loads the IFrame Player API code asynchronously.
      
      var firstScriptTag = document.getElementsByTagName('script')[0];
      var duration = 15000;
      var current = 0;
      var startPosition = 30;
      var stopSlideshow = false;
     
      var videos = ["-E0XNRawUYw", "-lba30NLsMM", "2FsZyPjsjTA", "2kSM7rEbDk4"];

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      
      var videoParm;
      
      function init()
      {
    	  var tag = document.createElement('script');

          tag.src = 'https://www.youtube.com/iframe_api';
          var firstScriptTag = document.getElementsByTagName('script')[0];
          firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
          
          jQuery('#prev-button').click(previous);
          jQuery('#next-button').click(next);
      }
      
      function onYouTubeIframeAPIReady() 
      {
        player = new YT.Player('container', {
          height: '720',
          width: '1080',
          videoId: videos[0],
          playerVars: { 'controls': 0, 'showinfo': 1, 'autoplay': 1 },
          events: 
          {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) 
      {
    	event.target.mute();
        
        event.target.loadPlaylist(videos)
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      var timeout = false;
      function onPlayerStateChange(event) 
      {
        if (event.data == YT.PlayerState.PLAYING && !done) 
        {
        	timeout = true;
        	setTimeout(function() 
        	{
        	   if (timeout && !stopSlideshow)
        	   {
        		   next();
        	   }
            }, duration);
        }
      }

      //goes to next video
      
      function next()
      {
    	  timeout = stopSlideshow = false;
    	  player.stopVideo();
    	  
    	  player.mute();
    	  
    	  current++;
    	  
    	  if (current == videos.length)
    	  {
    		  current = 0;
    	  }
    	  
    	  player.playVideoAt(current);
    	  player.seekTo(startPosition, false);
    	  player.playVideo();
      }
      
      //goes to previous video
      
      function previous()
      {
    	  timeout = stopSlideshow = false;
    	  player.stopVideo();
    	  
    	  player.mute();
    	  
    	  current--;
    	  
    	  if (current < 0)
    	  {
    		  current = videos.length - 1;
    	  }
    	  
    	  player.playVideoAt(current);
    	  player.seekTo(startPosition, false);
    	  player.playVideo();
      }
      
      function loadVideo(id)
      {
    	  player.loadVideoById(id);
    	  stopSlideshow = true;
    	  player.unMute();
      }
      
      
      jQuery(document).ready(init);