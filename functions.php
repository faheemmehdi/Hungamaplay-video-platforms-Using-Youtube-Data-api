<?php
// error_reporting(E_ALL ^ E_NOTICE);

//session_start();
 /**
 * Function to get videos from category for slider.
 */
 // $display = "select * from ads , api";
 //      $query = mysqli_query($conn,$display);
 //      $result = mysqli_fetch_array($query);
 //      $api = $result['api_key'];


function videoCategory($categoryId, $catName, $clientKey){
	?>
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
<ul id="islam" class="media">
    <?php
	
	
	$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/videos?part=snippet,statistics,contentDetails&chart=mostPopular&regionCode=PK&videoCategoryId=".$categoryId."&maxResults=6&key=".$clientKey."");
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

    <li class="homethumb hov">
              <div class="mediathumb">
                <a title="<?php echo $videoTitle ?>" href="video/<?php echo $videoId; ?>">
                  <img src="<?php echo $thumb  ?>" alt="<?php echo $videoTitle; ?>">
           <span class="duration"><?php fix_duration($duration); ?></span>
                </a>                                      
              </div>                  
              <h4><a title="<?php echo $videoTitle; ?>" href="video/<?php echo $videoId; ?>" class="medialink"><?php echo shortString($videoTitle, 33); ?></a></h4>
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

/////////////////////////////////// VideoStats ////////////////////////////

function videoStatistics($videoId, $clientKey){
	$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/videos?part=snippet,statistics,contentDetails&id=".$videoId."&key=".$clientKey."");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 100); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$output = curl_exec($ch);
echo curl_error($ch);
curl_close($ch);
 
$searchResponse = json_decode($output,true);

	foreach ($searchResponse['items'] as $searchResult) {
	// $videoId = $searchResult['id'];
	
	$publishedAt=$searchResult['snippet']['publishedAt'];
	$channelId=$searchResult['snippet']['channelId'];
	$title=$searchResult['snippet']['title'];
	$description=$searchResult['snippet']['description'];
	$thumbnailsUrl=$searchResult['snippet']['thumbnails']['default']['url'];
	$channelTitle=$searchResult['snippet']['channelTitle'];
	$categoryId=$searchResult['snippet']['categoryId'];

	$duration=$searchResult['contentDetails']['duration'];
	$viewCount=$searchResult['statistics']['viewCount'];
	$likeCount=$searchResult['statistics']['likeCount'];
	$dislikeCount=$searchResult['statistics']['dislikeCount'];
	$commentCount=$searchResult['statistics']['commentCount'];
	//echo $likeCount;
	return array ('publishedAt'=>$publishedAt, 'channelId'=>$channelId, 'title'=>$title, 'description'=>$description, 'thumbnailsUrl'=>$thumbnailsUrl, 'channelTitle'=>$channelTitle, 'categoryId'=>$categoryId, 'duration'=>$duration, 'viewCount'=>$viewCount, 'likeCount'=>$likeCount, 'dislikeCount'=>$dislikeCount, 'commentCount'=>$commentCount);
	}
	
}
function fix_duration($duration){
    preg_match_all('/[0-9]+[HMS]/',$duration	,$matches);
    $duration=0;
    foreach($matches as $match){
            
        foreach($match as $portion){        
            $unite=substr($portion,strlen($portion)-1);

            switch($unite){
                case 'H':{  
                    $dhour =    substr($portion,0,strlen($portion)-1);
					if($dhour<10){
						$dhour="0".$dhour;
						}              
                }break;             
                case 'M':{                  
                    $dminut =substr($portion,0,strlen($portion)-1); 
					if($dminut<10){
						$dminut="0".$dminut;
						}          
                }break;             
                case 'S':{                  
                    $dsecond =    substr($portion,0,strlen($portion)-1); 
					if($dsecond<10){
						$dsecond="0".$dsecond;
						}         
                }break;
            }
        }    
    }
		// if($dhour==0){echo "";} else {echo $dhour.":";}
		if($dminut==0){echo "00:";} else {echo $dminut.":";}
		if($dsecond==0){echo "00";} else {echo $dsecond;}
}
///////////////////////////////////////////////// End Stats Functions ////////////////////
////////////////////////////////////////////////Cat Stats start here/////
function catagoryStatistics($catId, $clientKey){
	
	$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/videoCategories?part=snippet&id=".$catId."&key=".$clientKey."");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 100);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$output = curl_exec($ch);
echo curl_error($ch);
curl_close($ch);
 
$searchResponse = json_decode($output,true);
	
	foreach ($searchResponse['items'] as $searchResult) {
	//$videoId = $searchResult['id'];
	$catChannelId=$searchResult['snippet']['channelId'];
	$title=$searchResult['snippet']['title'];
	return array ('catTitle'=>$title, 'catChannelId'=>$catChannelId);
	
	}

}
////////////////////////////////////////////////Comments Function ///////////////
function commentsReplies($videoId, $clientKey){
$response = file_get_contents("https://www.googleapis.com/youtube/v3/commentThreads?part=snippet,replies&textFormat=plainText&videoId=".$videoId."&maxResults=30&key=".$clientKey."");
	
	$searchResponse = json_decode($response,true);
	foreach ($searchResponse['items'] as $searchResult) {
	$commentThreadId = $searchResult['id'];
	$authorDisplayName=$searchResult['snippet']['topLevelComment']['snippet']['authorDisplayName'];
	$authorProfileImageUrl=$searchResult['snippet']['topLevelComment']['snippet']['authorProfileImageUrl'];
	$textDisplay=$searchResult['snippet']['topLevelComment']['snippet']['textDisplay'];
	$publishedAt=$searchResult['snippet']['topLevelComment']['snippet']['publishedAt'];
	$totalReplyCount=$searchResult['snippet']['totalReplyCount'];
	
	$publishedAt = date('Y-m-d', strtotime($publishedAt));
$publishedAt = date_create($publishedAt);
$today = date_create('now');
$diff=date_diff($publishedAt,$today);

//accesing days
$days = $diff->d;
//accesing years
$years = $diff->y;
//accesing months
$months = $diff->m;
//accesing hours
$hours=$diff->h;
	//return array ('commentThreadId'=>$commentThreadId, 'authorDisplayName'=>$authorDisplayName, 'authorProfileImageUrl'=>$authorProfileImageUrl, 'textDisplay'=>$textDisplay, 'publishedAt'=>$publishedAt, 'totalReplyCount'=>$totalReplyCount);
	?>
    <div style="width:685px;">
    <table>
    <tr><td valign="top">
    <span id="CommentAImg" style=" position:relative;">
    <img src="<?php echo $authorProfileImageUrl; ?>" width="48" height="48"></span>
    </td><td>
    <div style="float:left; margin-left:10px; width:620px; margin-bottom:15px; position: relative;">
    <div id="Aname" style="color: #128ee9; margin-bottom:5px;"><?php echo $authorDisplayName; ?>  
    <span style="color: #666; font-weight:100; font-size:13px; margin-left:50px;">
    
    <?php 
				if($months==0 AND $years!=0){
				echo $years." Year ago ";}
				elseif($years==0 AND $months!=0){ echo $months; if($months==1){ echo " month ago ";} else { echo " months ago ";}}
				elseif($years!=0 AND $months!=0){ echo $years; if($years==1){ echo " year ago ";} else { echo " years ago ";}}
				elseif($years==0 AND $months==0 AND $days!=0 ){ echo $days; if($days==1){ echo " day ago ";} else { echo " days ago ";}}
				elseif($years==0 AND $months==0 AND $days==0 AND  $hours!=0){ echo $hours; if($hours==1){ echo " hour ago ";} else { echo " hours ago ";}} ?>
    
    
    
    </span> </div>
    <div id="Comment"><?php echo $textDisplay; ?></div>
    </div>
    </td></tr>
    </table>
    </div>
    
    <?php
	
	
	}
}
//////////////////////////////////////Comments function ends here///////////////////////////////////////
///////////////////////////////////////////////////String Length fix/////////////////////////////////////////////////
function shortString($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}
//////////////////////////////////////Related Videos///////////////////////////////////////
function relatedVideos($videoId , $api){
?>
<div id="sidebar" >
    
<?php


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/search?part=snippet&relatedToVideoId=".$videoId."&type=video&key=".$api."&maxResults=8");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 100);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$output = curl_exec($ch);
echo curl_error($ch);
curl_close($ch);
 
$searchResponse = json_decode($output,true);
$x=0;
	foreach ($searchResponse['items'] as $searchResult) {
$x+=1;
	$a = $searchResult['id']['videoId'];
	$b = $searchResult['snippet']['title'];
	$channelTitle = $searchResult['snippet']['channelTitle'];
	$thumbnails = $searchResult['snippet']['thumbnails']['medium']['url'];
	$getvalue=videoStatistics($a, $api);
	// $getvalue=videoStatistics($a, "AIzaSyCm_kEXUlL5DXhnGzEJ81EvinIg-1VFa0Q");
	$duration=$getvalue['duration'];
	if($x==1){
		$_SESSION["videoLink"] = $a;
		$_SESSION["videoTitle"] = $b;
		$_SESSION["videoThumbnails"] = $thumbnails ;
		$_SESSION["videoDuration"] =$duration;
		}
// 	$videoTitle1=str_replace(" ","-",$searchResult['snippet']['title']);
//  $videoTitle1=preg_replace('/[^A-Za-z0-9\-]/', '', $videoTitle1);
// $videoTitle1=substr($videoTitle1,0,25);
	?>
		 <div class=" related-video hov ">
         <a class="title-color" href="<?php echo $a; ?>" title="<?php echo $b?>">
         <div class="related-thumbs">
        	<img class="relatedthumbs-style" src="<?php echo $thumbnails ?>">
           	<span class="duration"><?php fix_duration($duration); ?></span>
         </div>
        </a>
        <div class="caption"><a class="title-color" href="<?php echo $a; ?>" title="<?php echo $b ?>">
                      <div class="related-title"><?php echo shortString($b, 20); ?></div>
      </a>
       <div class="viewsanduser">by <a class="user" href="#"><?php echo $channelTitle; ?></a><br>Views: <?php echo number_format($getvalue['viewCount']); ?></div>
      </div>
      </div>       
		
		<?php
		}
?>
</div>
<?php
}
/////////////////////////////////////////////related videos ends here /////////////////////////
////////////////////////////////////////////////channelStatistics//////////////////
function channelStatistics($channelId, $clientKey){
	
	$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics,contentDetails,brandingSettings&id=".$channelId."&key=".$clientKey."");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 100);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$output = curl_exec($ch);
echo curl_error($ch);
curl_close($ch);
 
$searchResponse = json_decode($output,true);


   


	foreach ($searchResponse['items'] as $searchResult) {
	
	$channelTitle=$searchResult['snippet']['title'];
	$channelPublishedAt=$searchResult['snippet']['publishedAt'];
	
	$channelThumbnailsUrl=$searchResult['snippet']['thumbnails']['medium']['url'];
	$channelSubscriberCount=$searchResult['statistics']['subscriberCount'];
	$channelViewCount=$searchResult['statistics']['viewCount'];
	$channelVideoCount=$searchResult['statistics']['videoCount'];
	$bannerImageUrl=$searchResult['brandingSettings']['image']['bannerExternalUrl'];
	
	//echo $likeCount;
	return array ('channelTitle'=>$channelTitle, 'channelPublishedAt'=>$channelPublishedAt, 'channelThumbnailsUrl'=>$channelThumbnailsUrl, 'channelSubscriberCount'=>$channelSubscriberCount, 'channelViewCount'=>$channelViewCount, 'channelVideoCount'=>$channelVideoCount, 'bannerImageUrl'=>$bannerImageUrl);
	}

}
/////////////////////////////////////////////channelStatistics ends here///////.////////////
///////////////////////////////////////////////////////////////////Publish date Fix/////////////////////
function publushDateFix($publishedDate){
	 $publishedAt = date('Y-m-d', strtotime($publishedDate));
$publishedAt = date_create($publishedAt);
$today = date_create('now');
$diff=date_diff($publishedAt,$today);

//accesing days
$days = $diff->d;
//accesing years
$years = $diff->y;
//accesing months
$months = $diff->m;
//accesing hours
$hours=$diff->h;
if($months==0 AND $years!=0){
				echo $years." Year ago ";}
				elseif($years==0 AND $months!=0){ echo $months; if($months==1){ echo " month ago ";} else { echo " months ago ";}}
				elseif($years!=0 AND $months!=0){ echo $years; if($years==1){ echo " year ago ";} else { echo " years ago ";}}
				elseif($years==0 AND $months==0 AND $days!=0 ){ echo $days; if($days==1){ echo " day ago ";} else { echo " days ago ";}}
				elseif($years==0 AND $months==0 AND $days==0 AND  $hours!=0){ echo $hours; if($hours==1){ echo " hour ago ";} else { echo " hours ago ";}}
	 
	 }
//////////////////////////////////////////////////////////////trending Videos///////////////////
function trendingVideos( $clientKey){
	?>
    <div class="row">

    <?php
	
	
	$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/videos?part=snippet,statistics,contentDetails&chart=mostPopular&regionCode=PK&maxResults=4&key=".$clientKey."");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 100);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$output = curl_exec($ch);
echo curl_error($ch);
curl_close($ch);
 
$searchResponse = json_decode($output,true);
	
	$x=0;
	foreach ($searchResponse['items'] as $searchResult) {
		$x+=1;
	$videoId = $searchResult['id'];
	
	$publishedAt=$searchResult['snippet']['publishedAt'];
	$channelId=$searchResult['snippet']['channelId'];
	$title=$searchResult['snippet']['title'];
	$description=$searchResult['snippet']['description'];
	$thumbnailsUrl=$searchResult['snippet']['thumbnails']['medium']['url'];
	$channelTitle=$searchResult['snippet']['channelTitle'];
	$categoryId=$searchResult['snippet']['categoryId'];


	$duration=$searchResult['contentDetails']['duration'];
	$viewCount=$searchResult['statistics']['viewCount'];
	$likeCount=$searchResult['statistics']['likeCount'];
	$dislikeCount=$searchResult['statistics']['dislikeCount'];
	$commentCount=$searchResult['statistics']['commentCount'];
	
	?>
<div id="promoted" class="col-xs-12 col-sm-6 <?php if($x==1) {echo 'promoted-big';} else {echo 'promoted';}?>">
<a title="<?php echo shortString($title, 34); ?>"href="video/<?php echo $videoId;?>">
<div <?php if($x==1) {echo 'style="position: relative;"';} else {echo 'class="promo-thumbs"';}?>>
<img class="<?php if($x==1) {echo 'promob-thumbstyle';} else {echo 'promothumbs-style';}?>" src="<?php echo $thumbnailsUrl; ?>">
<span class="duration"><?php fix_duration($duration); ?></span>
</div>
</a>
<?php if($x==1) { ?>
<a class="title-color" title="<?php echo shortString($title, 34); ?>" href="video/<?php echo $videoId;?>">
</a>
<?php } ?>

<div class="caption"><a class="title-color" title="<?php echo shortString($title, 34); ?>" href="video/<?php echo $videoId;?>">
<div class="title-style"><?php echo shortString($title, 34); ?></div>
</a>
<div class="viewsanduser">Posted <?php publushDateFix($publishedAt); ?> ∗ Views: <?php echo number_format($viewCount); ?></div>
</div>
</div>
    <?php
	}
	?>
  
    </div>
    <?php
	
}
/////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////get OS info ///////////////////////
function getOS() { 

   $user_agent     =   $_SERVER['HTTP_USER_AGENT'];

    $os_platform    =   "UnknownOS";

    $os_array       =   array(
                            '/Windows Phone/i'     =>  'Windows Phone',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}
////////////////////////////// OS info Ends here /////////////////////////////

function curl_function($url){
	$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 100);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$output = curl_exec($ch);
echo curl_error($ch);
curl_close($ch);
 
//$searchResponse = json_decode($output,true);
 return $output;
	
	}
?>