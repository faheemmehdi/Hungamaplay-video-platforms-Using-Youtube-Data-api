<?php 
include ('header.php');
$display = "select * from ads ,api ";
$query = mysqli_query($conn,$display);
$result = mysqli_fetch_array($query);

 $Id=$_GET['id'];
 $title=$_GET['title'];
$categoryapi = $result['api_key4'];

$catStats = videoCat($Id, $title, $categoryapi);
// $catStats=catagoryStatistics($categoryId, "AIzaSyDtO4Ja2FmF2aUwPTn5Ly3CGuxuxP4PwHM");

function videoCat($categoryId, $catName, $clientKey){
	?>
<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div id="div-<?php echo $catName; ?>" class="border-bg" style="padding-bottom: 0px !important;">
<div class="page-header">
<h4>
<span class="icons thirty2 <?php echo "icon".$catName; ?>"></span>&nbsp;&nbsp;<?php echo $catName; ?>
<ul class="nav nav-pills pull-right hide-videos">
<li class="dropdown pull-right">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v color-a"></i></a>
<ul class="dropdown-menu" role="menu"><li><a class="pointer" onclick="hideVideos('div-islam')">Hide these videos</a></li></ul>
</li>
</ul> </h4>
</div>    
<ul id="islam" class="media" >
    <?php
	
	
	$ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/search?part=snippet&type=video,statistics,contentDetails&chart=mostPopular&regionCode=IN&videoCategoryId=".$categoryId."&maxResults=15&chart=mostPopular&key=".$clientKey."");
curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/videos?part=snippet,statistics,contentDetails&chart=mostPopular&regionCode=PK&videoCategoryId=".$categoryId."&maxResults=1120&key=".$clientKey."");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 100);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$output = curl_exec($ch);
echo curl_error($ch);
curl_close($ch);
 
$searchResponse = json_decode($output,true);
// print_r($searchResponse);
	foreach ($searchResponse['items'] as $searchResult) {
	$videoId = $searchResult['id'];
	$videoTitle =$searchResult['snippet']['title'];
	$thumb= $searchResult['snippet']['thumbnails']['high']['url'];
	$duration=$searchResult['contentDetails']['duration'];
	$publishedAt=$searchResult['snippet']['publishedAt'];
	$viewCount=$searchResult['statistics']['viewCount'];
	?>
    <li class="homethumb">
              <div class="mediathumb">
                <a title="<?php echo $videoTitle ?>" href="https://www.hungamaplay.pk/video/<?php echo $videoId; ?>">
                  <img src="<?php echo $thumb  ?>" alt="<?php echo $videoTitle; ?>">
           <span class="duration"><?php fix_duration($duration); ?></span>
                </a>                                      
              </div>                  
              <h4><a title="<?php echo $videoTitle; ?>" href="https://www.hungamaplay.pk/video/<?php echo $videoId; ?>" class="medialink"><?php echo shortString($videoTitle, 33); ?></a></h4>
           <div class="viewsanduser">Posted <?php publushDateFix($publishedAt); ?><br>Views: <?php echo number_format($viewCount); ?></div>         
            </li> 
		
		<?php
		
		}
?>

</ul>
<div id="unhide" align="center" style="display:none"><a class="unhide" onclick="unhide('div-islam')">Click here to Unhide this section</a></div>
</div>
<?php
}
?>
		</div>
		  <div class="col-md-2" style="padding:0 5px;">
		     <div class="border-bg rowbox-300">
				<?php 
				echo $result['category_ad']; ?>
			</div>
		     <!-- 4 ends -->
		   </div>
	</div>

</div>


<?php


include ('footer.php');
?>