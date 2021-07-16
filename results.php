<style>
   #subscribeButton {
   margin-left: 0px !important; 
   }
   .btn-danger {
   color: #333 !important;
   background-color: #f8f8f8 !important;
   border-color: #ccc !important;
   }
   .channelsubscribe {
   text-align: left !important;
   }
</style>
<?php 
   include ('header.php');
   $display = "select * from ads ,api ";
   $query = mysqli_query($conn,$display);
   $result = mysqli_fetch_array($query);
   $searchapi = $result['api_key3'];

   if(isset($_REQUEST['search_query'])) {
   $keyword=$_REQUEST['search_query'];
   $keyword=preg_replace("/ /","+",$keyword);
   error_reporting(E_ALL ^ E_NOTICE);

   ?>
<div class="col-md-10" style="padding:0 5px;">
   <div class="border-bg">
      <div class="page-heading-nav">
         <div class="pagehead">
            <div class="page-heading">
                Search Results
            </div>
         </div>
      </div>
      <div id="results">
         <?php
            
            $response =curl_function("https://www.googleapis.com/youtube/v3/search?part=snippet&q={$keyword}&type=channel,video&order=relevance&key={$searchapi}&maxResults=15");
            
            if ($_GET['search_query'] || $_GET['sp']) {
               $np=$_GET['sp'];
               $response =curl_function("https://www.googleapis.com/youtube/v3/search?part=snippet&q={$keyword}&type=channel,video&order=relevance&pageToken={$np}&key={$searchapi}&maxResults=15");
               }
            
            $searchResponse = json_decode($response,true);
            foreach ($searchResponse['items'] as $searchResult) {
            $a = $searchResult['id']['videoId'];
            $kind=$searchResult['id']['kind'];
            $channelIdc= $searchResult['id']['channelId'];
            $channelId= $searchResult['snippet']['channelId'];
            $channelTitle= $searchResult['snippet']['channelTitle'];
            $resultType= $searchResult['id']['kind'];
            $b = $searchResult['snippet']['title'];
             $publishedAt= $searchResult['snippet']['publishedAt'];
             $description= $searchResult['snippet']['description'];
             
            
            
            $getvalue=videoStatistics($a, $searchapi);
            $duration=$getvalue['duration'];
            $channelStatistics=channelStatistics($channelId, $searchapi);
             $videoTitle1=str_replace(" ","-",$searchResult['snippet']['title']);
            $videoTitle1=preg_replace('/[^A-Za-z0-9\-]/', '', $videoTitle1);
            $videoTitle1=substr($videoTitle1,0,25);
            if($kind== "youtube#channel"){
               ?>
         <div class="col-xs-12 videopost">
            <a class="title-color" href="https://www.hungamaplay.pk/channel/<?php echo $channelId;?>&sp=" title="<?php echo $searchResult['snippet']['title']; ?>">
               <div class="video-thumbs">
                   <img class="videosthumbs-style lozad" data-src="<?php echo $searchResult['snippet']['thumbnails']['medium']['url']; ?>" style="width:120px;">
                  <!--<img class="" src="" >-->
               </div>
               <div class="title-style"><?php echo $searchResult['snippet']['title']; ?></div>
            </a>
            <div class="viewsanduser">
               <span style="font-weight:bold;"><?php echo $channelStatistics['channelVideoCount']; ?> videos</span><br />
               <span style="border:solid thin #ddd;">CHANNEL</span>
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
       
         <?php
            }
            else
            {
            
            ?>
         <div class="col-xs-12 videopost">
            <a class="title-color" href="https://www.hungamaplay.pk/video/<?php echo $a; ?>" title="<?php echo $searchResult['snippet']['title']; ?>">
               <div class="video-thumbs">
                   <img class="videosthumbs-style lozad" data-src="<?php echo $searchResult['snippet']['thumbnails']['medium']['url']; ?>">

                  <span class="duration"><?php fix_duration($duration); ?></span>
               </div>
               <div class="title-style"><?php echo $searchResult['snippet']['title']; ?></div>
            </a>
            <div class="viewsanduser">
               <span style="font-weight:bold;">by <a class="by-user" href="https://www.hungamaplay.pk/channel/<?php echo $channelId;?>&sp="><?php echo $channelTitle; ?></a><br>Posted <?php echo publushDateFix($publishedAt); ?> ∗ Views: <?php echo number_format($getvalue['viewCount']); ?></span>
            </div>
            <div class="postdiscription"><?php echo $description; ?></div>
         </div>
         <?php } 
            }
            $nextPage = $searchResponse['nextPageToken'];
            $prevPage = $searchResponse['prevPageToken'];
            ?>
      </div>
      <!-- results ends -->
      <div class="text-center">
         <ul class="pagination">
            <li><a <?php if(empty($prevPage)){ echo "class='disabled'" ;} ?>href="<?php echo $_SERVER['PHP_SELF'];?>?search_query=<?php echo $keyword;?>&sp=<?php echo $prevPage;?>">&laquo; Previous</a></li>
            <li><a href="<?php echo $_SERVER['PHP_SELF'];?>?search_query=<?php echo $keyword;?>&sp=<?php echo $nextPage;?>">Next &raquo;</a></li>
         </ul>
      </div>
   </div>
   <!-- border-bg ends -->
</div>
  <script>
             const observer = lozad();
observer.observe();
         </script>
<!-- 8 ends -->
<div class="col-md-2" style="padding: 0 5px;">
   <div class="border-bg rowbox-300">
      <div style="width:360px; overflow:hidden;">
         <?php
           echo $result['search_ad'];
            ?>
      </div>
   </div>
</div>
<?php
   }
   include ('footer.php');
   ?>