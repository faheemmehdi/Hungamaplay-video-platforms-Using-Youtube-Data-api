<?php 
   include ('header.php');
     $channelId=$_GET['id'];
     
     $display = "select * from api, ads ";
    $query = mysqli_query($conn,$display);
    $result = mysqli_fetch_array($query);

    $channelapi = $result['api_key2'];
    $channelStatistics=channelStatistics($channelId,$channelapi);
  
   
   ?>
<div class="col-md-12 page-header border-bg">
   <div class="clearfix feed-header" data-role="banner">
      <div class="compInnerWrapper" style="background-image:url(<?php echo $channelStatistics['bannerImageUrl']; ?>);"></div>
   </div>
   <div class="profile-user">
      <div class="row">
         <div class="col-lg-6 col-md-6n col-sm-6 col-xs-6">
            <img src="<?php echo$channelStatistics['channelThumbnailsUrl'];?>" class="img-polaroid">
            <h2><?php echo $channelStatistics['channelTitle']; ?></h2>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="channelsubscribe">
               <div style="display:inline-block;">
                  <div id="subscribeButton" class="btn btn-danger btn-xs pull-left" data-action="subscribe"><i class="fa fa-youtube-play"></i> Subscribe</div>
                  <div style="display: inline-block;">
                     <div class="subscriberCount"><span class="subscripberNum"><?php echo $channelStatistics['channelSubscriberCount']; ?></span></div>
                     <div class="subscriberCountNub"><s></s><i></i></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="col-md-10" style="padding: 0 5px;">
   <div class="border-bg">
      <div id="results">
         <?php
               
            $response = file_get_contents("https://www.googleapis.com/youtube/v3/search?part=snippet&channelId={$channelId}&type=video&order=date&key={$channelapi}&maxResults=15");
            
             if (isset($_GET['sp'])) {
                   $np=$_GET['sp'];
                   $response =curl_function("https://www.googleapis.com/youtube/v3/search?part=snippet&channelId={$channelId}&type=video&order=date&pageToken={$np}&key={$channelapi}&maxResults=15");
             }
            
            $searchResponse = json_decode($response,true);
            foreach ($searchResponse['items'] as $searchResult) {
            $a = $searchResult['id']['videoId'];
            $b = $searchResult['snippet']['title'];
            $img = $searchResult['snippet']['thumbnails']['medium']['url'];
             $publishedAt= $searchResult['snippet']['publishedAt'];
             $description= $searchResult['snippet']['description'];
             $videoStatistics=videoStatistics($a, $channelapi);
            $duration=$videoStatistics['duration'];
            $videoTitle1=str_replace(" ","-",$b);
            $videoTitle1=preg_replace('/[^A-Za-z0-9\-]/', '', $videoTitle1);
            $videoTitle1=substr($videoTitle1,0,25);
            ?>
         <div class="col-xs-12 videopost">
            <a class="title-color" href="https://hungamaplay.pk/video/<?php echo $a; ?>" title="<?php echo $b; ?>">
               <div class="video-thumbs">
                  <img class="videosthumbs-style" src="<?php echo $img?>">
                  <!-- $time = intval(preg_replace('/[^0-9]+/', '', $duration), 10); -->
                  <span class="duration"><?php fix_duration($duration); ?></span>
               </div>
               <div class="title-style"><?php echo $b ; ?></div>
            </a>
            <div class="viewsanduser">
               <span style="font-weight:bold;">by <a class="by-user" href="https://hungamaplay.pk/channel/<?php echo $searchResult['snippet']['channelId']; ?>&sp="><?php echo $searchResult['snippet']['channelTitle']; ?></a><br>Posted <?php echo publushDateFix($publishedAt); ?> ∗ Views: <?php echo number_format($videoStatistics['viewCount']); ?></span>
            </div>
            <div class="postdiscription"><?php echo $description; ?></div>
         </div>
         <?php 
            }   
            $nextPage = $searchResponse['nextPageToken'];
            $prevPage = $searchResponse['prevPageToken'];
            ?>
      </div>
      <div class="text-center">
         <ul class="pagination">
            <li><a  <?php if($prevPage == null){ echo "class='disabled'" ;} ?>href="channel/<?php echo $channelId;?>&sp=<?php echo $prevPage;?>">&laquo; Previous</a></li>
            <li><a href="channel/<?php echo $channelId;?>&sp=<?php echo $nextPage;?>">Next &raquo;</a></li>
         </ul>
      </div>
   </div>
</div>
<div class="col-md-2" style="padding: 0 5px;">
   <div class="border-bg rowbox-300">
      <div style="width:360px; overflow:hidden;">
          
         <?php 
           $display = "select * from ads ";
            $query = mysqli_query($conn,$display);
            $result = mysqli_fetch_array($query);
         echo $result['channel_ad']; ?>
         
      </div>
   </div>
</div>
<?php 
   include ('footer.php');
   ?>