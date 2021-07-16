
<html>
        <script src="https://cdn.fluidplayer.com/v3/current/fluidplayer.min.js"></script>

       <style>
   #my-video{
   position: absolute;
   width: 100%; 
   height: 100%; 
   }
   
   #overlay{
   position: relative;
   top: 360px;
   left: 30%;
   z-index: 1;
   }
   #closeAD{
    background-color: #fff;
   }
   @media only screen and (max-width: 600px) {
  #overlay {
    display: none;
  }
}
</style>
</head>
<body>  
    <?php
include ('admin/code/config.php');
$display = "select * from ads , api";
$query = mysqli_query($conn,$display);
$result = mysqli_fetch_array($query);
$api = $result['api_key'];
$id=$_GET['id'];
// require_once("simple_html_dom.php");
// // url to request
// $base = "https://clipmega.com/watch?v=".$id;
// // set up curl
// $curl = curl_init();                                
// // the url to request
// curl_setopt( $curl, CURLOPT_URL, $base );           
// // return to variable
// curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true ); 
// // decompress using GZIP
// curl_setopt( $curl, CURLOPT_ENCODING, '');
// // don't verify peer ssl cert
// curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );
// //  // fetch remote contents, check for errors
// if ( false === ( $response = curl_exec( $curl ) ) )
//     $error = curl_error( $curl );
// // close the resource
// curl_close( $curl );

// if ( !$response ){
//     die("Curl Error: {$error}");
// }
// $html = new simple_html_dom();
// $html->load( $response );

?>
<!--<iframe width="725" height="340" src="https://www.youtube.com/embed/<?php echo $id?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
             <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
             
    <div id="player"></div>
<script type="text/javascript">
    var vid = <?php echo json_encode($id); ?>;
</script>
    <script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '100%',
          width: '100%',
          videoId: vid,
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }
      }
      function stopVideo() {
        var x = document.getElementById("overlay");
        if (x.style.display === "none") {
            x.style.display = "block";
          }
      }
    </script>
     
            <script type="text/javascript">
   var ad_one = <?php echo json_encode($result['player_ad']); ?>;
   var ad_two = <?php echo json_encode($result['player_mid_ad']); ?>;
   var ad_three = <?php echo json_encode($result['player_post_ad']); ?>;
</script>
<script>
   // fluidPlayer method is global when CDN distribution is used.
   var player = fluidPlayer(
   'my-video',
   {
   "layoutControls": {
   "controlForwardBackward": {
       "show": true // Default: false
   },
   "logo": {
         "imageUrl": 'images/hungamaplay_Logo-e1460668515761.png', // Default null
         "position": 'top right', // Default 'top left'
         "opacity": 0.8, // Default 1
     },
   "controlBar": {
     "autoHideTimeout": 3,
     "animated": true,
     "autoHide": true
   },
   "htmlOnPauseBlock": {
     "html": "",
     "height": null,
     "width": null
   },
   "autoPlay": true,
   "mute": false,
   "allowTheatre": true,
   "playPauseAnimation": false,
   "playbackRateEnabled": true,
   "allowDownload": true,
   "playButtonShowing": true,
   "fillToContainer": false,
   "posterImage": "",
   "primaryColor": "CC0000"
   },
   
   vastOptions: {
   adList: [
   {
   roll: 'preRoll',
   vastTag: ad_one,
   adText: 'Advertising supports us directly',  
   },
   {
   roll: 'midRoll', //multiple preRoll Ads
   vastTag: ad_two,
   adText: 'Advertising supports us directly',
   timer: 120
   },  
   {
   roll: 'postRoll', //multiple preRoll Ads
   vastTag: ad_three,
   adText: 'Advertising supports us directly'
   }              
   
   ]
   }
   }
   );
   
     setTimeout(function(){
    $('#overlay').show();// or fade, css display however you'd like.
   }, 40000);
  
</script>
            
</body>
</html>