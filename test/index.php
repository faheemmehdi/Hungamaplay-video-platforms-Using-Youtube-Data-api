<?php
include("head.php");

$token=$_GET['list'];
$search=urlencode($_GET['q']);

$url="https://www.googleapis.com/youtube/v3/search?order=relevance&part=snippet&q=$search&maxResults=5&key=AIzaSyB1dP3p3NpEGiqIPiLjLcte4KCNtwr_XMM&pageToken=$token";

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  

$json_response = curl_exec($curl);

curl_close($curl);

$result = json_decode($json_response, true);
$result1= $result['pageInfo']['totalResults'];
echo '<div class="links">Search Result : ('.$result1.')</div>';
echo '<div class="title" align="center"><i class="fa fa-spinner fa-spin"></i> Latest Videos</div>';
foreach ($result['items'] as $data ){
$vtittle = $data['snippet']['title'];
$gvtittle = urlencode($vtittle);

$vid = $data['id']['videoId'];
            $videoThumb = $data['snippet']['thumbnails']['default']['url'];

			echo '<div class="list">';
			echo '<table class="otable" width="100%">';
			echo '<tbody>';
			echo '<tr>';
			echo '<td valign="middle" width="75px" align="center">';
			echo "<img src='".$videoThumb."' / class='thumb'>";
			echo '</td>';
			echo '<td>';
			echo "<div class='link'><a class=\"sublink\" href=\"./getvideo.php?videoid=$vid&type=Download\">$vtittle</a>";
			echo '</td>';
			echo '</tr>';
			echo '</table>';
			echo '</div></div>';

}
if(isset($result['nextPageToken'])) { $_SESSION[nextToken]=$result['nextPageToken'];
}

if(isset($result['prevPageToken'])) { $_SESSION[prevToken]=$result['prevPageToken'];
}


$next=$_SESSION[nextToken];

$prev=$_SESSION[prevToken];
echo '<div class="pagenavi">';
print '<a href="index.php?list='.$next.'&q='.$search.'" >Next Page</a> | ';
print '<a href="index.php?list='.$prev.'&q='.$search.'">Back Page</a>';
echo'</div>';

include("footer.php");

?>