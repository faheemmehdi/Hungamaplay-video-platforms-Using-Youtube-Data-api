
<?php include ('header.php');

include('admin/code/track.php' ); 
$display = "select * from api, ads ";
$query = mysqli_query($conn,$display);
$result = mysqli_fetch_array($query);
$homeapi1 = $result['api_key6'];
$homeapi2 = $result['api_key7'];
$homeapi3 = $result['api_key8'];
 ?>

    
    <div class="col-md-8" style="padding:0 5px;">
    <div class="promoted-row border-bg">
<div class="page-header pagehed">
<h4><i class="fa fa-bullhorn"></i>&nbsp;&nbsp;Trending</h4>
</div>
    
    
<?php
trendingVideos($homeapi1);
?>
</div>

    <!-- 8 ends -->
    </div>
     <div class="col-md-4" style="padding:0 5px;">
     <div class="border-bg rowbox-300">
          <?php echo $result['homepage_ad']; ?>
          <!--<iframe scrolling="no" src="https://neon.today/context/get/55769/13407/1/200/200" style="width: 250px; height: 100px;  padding: 0;" frameborder="0"></iframe>-->

     

</div>
     <iframe style="display:none" width="50" height="50" src="https://www.youtube.com/embed/WqF92oBS9sU?autoplay=1&controls=0&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
     <!-- 4 ends -->
     </div>
      <div class="col-md-12" style="padding:0 5px;">
      
<?php						//echo getOS();	
		//$categoryId="10";
//$clientKey="AIzaSyAwgA2PpZuFRiZXQu5McIUE6Jz0HsGQqHY";
//AIzaSyCqSNdQsdZnhyFPCDV6k2KZRyPsOGLyx2M

videoCategory("10", "Music", $homeapi1);

videoCategory("1", "Entertainment", $homeapi1);

videoCategory("17", "Sports", "$homeapi2");

videoCategory("23", "Comedy", $homeapi3);

videoCategory("20", "Film & Animation", $homeapi3);

videoCategory("25", "News & Politics", $homeapi3);

?>
      <!-- 12 ends -->
      
      </div>
      
<?php include ('footer.php'); ?>