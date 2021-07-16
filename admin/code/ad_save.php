<?php 
session_start();
include('config.php'); 
$header_ad=mysqli_real_escape_string($conn,$_POST['header_ad']);

$footer_ad=mysqli_real_escape_string($conn,$_POST['footer_ad']);

$homepage_ad=mysqli_real_escape_string($conn,$_POST['homepage_ad']);
$search_ad=mysqli_real_escape_string($conn,$_POST['search_ad']);
$category_ad=mysqli_real_escape_string($conn,$_POST['category_ad']);
$channel_ad=mysqli_real_escape_string($conn,$_POST['channel_ad']);
$player_popup=mysqli_real_escape_string($conn,$_POST['player_popup']);
$player_ad=mysqli_real_escape_string($conn,$_POST['player_ad']);
$player_mid_ad=mysqli_real_escape_string($conn,$_POST['player_mid_ad']);
$player_post_ad=mysqli_real_escape_string($conn,$_POST['player_post_ad']);
if (isset($_REQUEST['update'])) {

$query = "UPDATE `ads` SET `header_ad`='$header_ad', `footer_ad`= '$footer_ad', `homepage_ad`= '$homepage_ad', `search_ad`= '$search_ad', `category_ad`= '$category_ad' , `channel_ad`= '$channel_ad' , `player_popup`= '$player_popup',`player_ad`='$player_ad',`player_mid_ad`= '$player_mid_ad', `player_post_ad`= '$player_post_ad'";

$run = mysqli_query($conn,$query) or die($mysqli_error());


  if ($run) {
      $_SESSION['status']="Save Successfully";
      $_SESSION['icon']="success";
      header("location: ../ads.php");
   }else{
      $_SESSION['status']="Not Save";
      $_SESSION['icon']="error";
      header("location: ../ads.php");

   }

}



?>