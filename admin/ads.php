<?php 
include("header.php");
include("code/config.php"); 
$display = "select * from ads  ";
$query = mysqli_query($conn,$display);
$result = mysqli_fetch_array($query);
?>
 <div class="col-md-12" style="padding: 0 5px;">
<div class="border-bg">
<div class="page-header" style="border-bottom:1px solid #CCC">
<h3>Ads Management</h3>
</div>
</div></div>

<form action="code/ad_save.php" method="post">

<div class="col-md-6" style="padding: 0 5px;">
<div class="border-bg">
<h4>Header Ad</h4>size: 400x60
  <div class="form-group">
  <label for="header_ad">Ad Code:</label>
  <textarea class="form-control" rows="5" name="header_ad" id="header_ad"><?php echo$result['header_ad'];?></textarea>
</div>
  


</div>
</div>



<div class="col-md-6" style="padding: 0 5px;">
<div class="border-bg">
<h4>Footer Ad</h4>size: 728x90

  <div class="form-group">
  <label for="footer_ad">Ad Code:</label>
  <textarea class="form-control" rows="5" name="footer_ad" id="footer_ad"><?php echo$result['footer_ad'];?></textarea>
</div>
  


</div>
</div>



<div class="col-md-6" style="padding: 0 5px;">
<div class="border-bg">
<h4>Homepage Ad</h4>size:300x320

  <div class="form-group">
  <label for="homepage_ad">Ad Code:</label>
  <textarea class="form-control" rows="5" name="homepage_ad" id="homepage_ad"><?php echo$result['homepage_ad'];?></textarea>
</div>
  



</div></div>




<div class="col-md-6" style="padding: 0 5px;">
<div class="border-bg">
<h4>Search Page Ad</h4>size:300xmax

  <div class="form-group">
  <label for="search_ad">Ad Code:</label>
  <textarea class="form-control" rows="5" name="search_ad" id="search_ad"><?php echo $result['search_ad'];?></textarea>
</div>
  



</div></div>



<div class="col-md-6" style="padding: 0 5px;">
<div class="border-bg">
<h4>Category Page Ad</h4>size:300xmax

  <div class="form-group">
  <label for="category_ad">Ad Code:</label>
  <textarea class="form-control" rows="5" name="category_ad" id="category_ad"><?php echo$result['category_ad'];?></textarea>
</div>
  



</div></div>





<div class="col-md-6" style="padding: 0 5px;">
<div class="border-bg">
<h4>Channel Page Ad</h4>size:300xmax

  <div class="form-group">
  <label for="channel_ad">Ad Code:</label>
  <textarea class="form-control" rows="5" name="channel_ad" id="channel_ad"><?php echo$result['channel_ad'];?></textarea>
</div>
  



</div></div>





<div class="col-md-6" style="padding: 0 5px;">
<div class="border-bg">
<h4>Player PopUp Ad</h4>size: 300x50

  <div class="form-group">
  <label for="player_popup">Ad Code:</label>
  <textarea class="form-control" rows="5" name="player_popup" id="player_popup"><?php echo$result['player_popup'];?></textarea>
</div>
</div>
</div>

<div class="col-md-6" style="padding: 0 5px;">
<div class="border-bg">
<h4>Player Ad preRoll</h4>size: Responsive

  <div class="form-group">
  <label for="player_ad">Ad Code:</label>
  <textarea class="form-control" rows="5" name="player_ad" id="player_ad"><?php echo$result['player_ad'];?></textarea>
</div>
</div>
</div>

<div class="col-md-6" style="padding: 0 5px;">
<div class="border-bg">
<h4>Player Ad midRoll</h4>size: Responsive

  <div class="form-group">
  <label for="player_mid_ad">Ad Code:</label>
  <textarea class="form-control" rows="5" name="player_mid_ad" id="player_mid_ad"><?php echo$result['player_mid_ad'];?></textarea>
</div>
</div>
</div>

<div class="col-md-6" style="padding: 0 5px;">
<div class="border-bg">
<h4>Player Ad postRoll</h4>size: Responsive

  <div class="form-group">
  <label for="player_post_ad">Ad Code:</label>
  <textarea class="form-control" rows="5" name="player_post_ad" id="player_post_ad"><?php echo$result['player_post_ad'];?></textarea>
</div>
</div>
</div>


<br>
<center>
  <input class="btn btn-primary form-control" type="submit" value="Update" name="update">
</center>
<br>
</form>

   <?php 
            if (isset($_SESSION['status']) && $_SESSION['status'] !='') {
         ?>
                  <script type='text/javascript'>
                  Swal.fire({
                    position: 'center',
                    icon: '<?php echo $_SESSION['icon']; ?>',
                    title: '<?php echo $_SESSION['status']; ?>',
                    showConfirmButton: false,
                    timer: 1500
                  })
              </script>
         <?php
               unset($_SESSION['status']);
            } 
         ?>

 <?php
 include ("footer.php");
 ?> 