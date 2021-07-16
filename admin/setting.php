<?php 

include("header.php");
include("code/config.php"); 

$display = "select * from api ,color ";
   $query = mysqli_query($conn,$display);
   $result = mysqli_fetch_array($query);



?>
 <div class="col-md-12" style="padding: 0 5px;">
<div class="border-bg">
<h3>Setting</h3>
    
    <br />
    <!-- AIzaSyAXaUlJa88cGp17Kl7kE8S-tK0X6Bq7vG8 -->
      <table class="table">
    
      <tr>
      <td>Video & Title Api </td>
      <td><p><?php echo $result['api_key']; ?></p>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-link" href='<?php echo $_SERVER['PHP_SELF']; ?>?p=api_key'>Edit</a> 
     <?php 
	 if(isset($_GET['p']) && $_GET['p'] == 'api_key') {
		 
		 if (isset($_POST['api_btn'])) {
			 $key=$_POST['key'];
			 $sql= "UPDATE api SET api_key='$key'"; 
     
	 $update =mysqli_query($conn,$sql);
	 if($update){ echo "Updated";}
			 }
		 ?>
         <form method="post">
         <input type="text" name="key" class="form-control"/>&nbsp;
         <input type="submit" name="api_btn" class="btn btn-primary" value="Update" />
         </form>
         <?php
	 }
		 ?>
      </td>
      
      </tr>
<!-- ------------------------- -->
      <tr>
      <td>Channel Api </td>
      <td><p><?php echo $result['api_key2']; ?></p>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-link" href='<?php echo $_SERVER['PHP_SELF']; ?>?p=api_key2'>Edit</a> 
     <?php 
   if(isset($_GET['p']) && $_GET['p'] == 'api_key2') {
     
     if (isset($_POST['api_btn2'])) {
       $key=$_POST['key2'];
       $sql= "UPDATE api SET api_key2='$key'"; 
     
   $update =mysqli_query($conn,$sql);
   if($update){ echo "Updated";}
       }
     ?>
         <form method="post">
         <input type="text" name="key2" class="form-control"/>&nbsp;
         <input type="submit" name="api_btn2" class="btn btn-primary" value="Update" />
         </form>
         <?php
   }
     ?>
      </td>
      </tr>
<!-- ------------------------- -->

      <tr>
      <td>Search Api 3 </td>
      <td><p><?php echo $result['api_key3']; ?></p>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-link" href='<?php echo $_SERVER['PHP_SELF']; ?>?p=api_key3'>Edit</a> 
     <?php 
   if(isset($_GET['p']) && $_GET['p'] == 'api_key3') {
     
     if (isset($_POST['api_btn3'])) {
       $key=$_POST['key3'];
       $sql= "UPDATE api SET api_key3='$key'"; 
     
   $update =mysqli_query($conn,$sql);
   if($update){ echo "Updated";}
       }
     ?>
         <form method="post">
         <input type="text" name="key3" class="form-control"/>&nbsp;
         <input type="submit" name="api_btn3" class="btn btn-primary" value="Update" />
         </form>
         <?php
   }
     ?>
      </td>
      </tr>
<!-- ------------------------- -->
      <tr>
      <td>Category Api</td>
      <td><p><?php echo $result['api_key4']; ?></p>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-link" href='<?php echo $_SERVER['PHP_SELF']; ?>?p=api_key4'>Edit</a> 
     <?php 
   if(isset($_GET['p']) && $_GET['p'] == 'api_key4') {
     
     if (isset($_POST['api_btn4'])) {
       $key=$_POST['key4'];
       $sql= "UPDATE api SET api_key4='$key'"; 
     
   $update =mysqli_query($conn,$sql);
   if($update){ echo "Updated";}
       }
     ?>
         <form method="post">
         <input type="text" name="key4" class="form-control"/>&nbsp;
         <input type="submit" name="api_btn4" class="btn btn-primary" value="Update" />
         </form>
         <?php
   }
     ?>
      </td>
      </tr>
<!-- ------------------------- -->

      <tr>
      <td>Related Videos Api</td>
      <td><p><?php echo $result['api_key5']; ?></p>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-link" href='<?php echo $_SERVER['PHP_SELF']; ?>?p=api_key5'>Edit</a> 
     <?php 
   if(isset($_GET['p']) && $_GET['p'] == 'api_key5') {
     
     if (isset($_POST['api_btn5'])) {
       $key=$_POST['key5'];
       $sql= "UPDATE api SET api_key5='$key'"; 
     
   $update =mysqli_query($conn,$sql);
   if($update){ echo "Updated";}
       }
     ?>
         <form method="post">
         <input type="text" name="key5" class="form-control"/>&nbsp;
         <input type="submit" name="api_btn5" class="btn btn-primary" value="Update" />
         </form>
         <?php
   }
     ?>
      </td>
      </tr>
<!-- ------------------------- -->

      <tr>
      <td>Home Api 1 </td>
      <td><p><?php echo $result['api_key6']; ?></p>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-link" href='<?php echo $_SERVER['PHP_SELF']; ?>?p=api_key6'>Edit</a> 
     <?php 
   if(isset($_GET['p']) && $_GET['p'] == 'api_key6') {
     
     if (isset($_POST['api_btn6'])) {
       $key=$_POST['key6'];
       $sql= "UPDATE api SET api_key6='$key'"; 
     
   $update =mysqli_query($conn,$sql);
   if($update){ echo "Updated";}
       }
     ?>
         <form method="post">
         <input type="text" name="key6" class="form-control"/>&nbsp;
         <input type="submit" name="api_btn6" class="btn btn-primary" value="Update" />
         </form>
         <?php
   }
     ?>
      </td>
      </tr>
<!-- ------------------------- -->

      <tr>
      <td>Home Api 2 </td>
      <td><p><?php echo $result['api_key7']; ?></p>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-link" href='<?php echo $_SERVER['PHP_SELF']; ?>?p=api_key7'>Edit</a> 
     <?php 
   if(isset($_GET['p']) && $_GET['p'] == 'api_key7') {
     
     if (isset($_POST['api_btn7'])) {
       $key=$_POST['key7'];
       $sql= "UPDATE api SET api_key7='$key'"; 
     
   $update =mysqli_query($conn,$sql);
   if($update){ echo "Updated";}
       }
     ?>
         <form method="post">
         <input type="text" name="key7" class="form-control"/>&nbsp;
         <input type="submit" name="api_btn7" class="btn btn-primary" value="Update" />
         </form>
         <?php
   }
     ?>
      </td>
      </tr>
<!-- ------------------------- -->

      <tr>
      <td>Home Api 3 </td>
      <td><p><?php echo $result['api_key8']; ?></p>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-link" href='<?php echo $_SERVER['PHP_SELF']; ?>?p=api_key8'>Edit</a> 
     <?php 
   if(isset($_GET['p']) && $_GET['p'] == 'api_key8') {
     
     if (isset($_POST['api_btn8'])) {
       $key=$_POST['key8'];
       $sql= "UPDATE api SET api_key8='$key'"; 
     
   $update =mysqli_query($conn,$sql);
   if($update){ echo "Updated";}
       }
     ?>
         <form method="post">
         <input type="text" name="key8" class="form-control"/>&nbsp;
         <input type="submit" name="api_btn8" class="btn btn-primary" value="Update" />
         </form>
         <?php
   }
     ?>
      </td>
      </tr>
<!-- ------------------------- -->



    
        </table> 

        
        
        
        
        <?php
	//}
		?>

</div></div>
 <?php
 include ("footer.php");
 ?> 
