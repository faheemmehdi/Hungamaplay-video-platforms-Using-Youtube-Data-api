<?php 

include("header.php");
include("code/config.php"); 

$display = "select * from login  ";
   $query = mysqli_query($conn,$display);
   $result = mysqli_fetch_array($query);



?>
 <div class="col-md-12" style="padding: 0 5px;">
<div class="border-bg">
<h3>Profile</h3>
    
    <br />
    
      <table class="table">
    
      <tr>
      <td>Name </td>
      <td><p><?php echo $result['name']; ?></p>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-link" href='<?php echo $_SERVER['PHP_SELF']; ?>?p=Edit_Namee'>Edit</a> 
     <?php //if(!isset($_GET['p']) || $_GET['p'] == 'Edit_Name') {}
	 if(isset($_GET['p']) && $_GET['p'] == 'Edit_Namee') {
		 
		 if (isset($_POST['updateName_btn'])) {
			 $nu_Name=$_POST['update_name'];
			 $sql= "UPDATE login SET name='$nu_Name'"; 
     
	 $update =mysqli_query($conn,$sql);
	 if($update){ echo "Updated";}
			 }
		 ?>
         <form method="post">
         <input type="text" name="update_name" class="form-control"/>&nbsp;
         <input type="submit" name="updateName_btn" class="btn btn-primary" value="Update" />
         </form>
         <?php
	 }
		 ?>
      </td>
      
      </tr>

       <tr>
      <td>Username </td>
      <td><p><?php echo $result['username']; ?> </p>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-link" href='<?php echo $_SERVER['PHP_SELF']; ?>?p=Edit_User'>Edit</a> 
     <?php //if(!isset($_GET['p']) || $_GET['p'] == 'Edit_Name') {}
	 if(isset($_GET['p']) && $_GET['p'] == 'Edit_User') {
		 
		 if (isset($_POST['updateuser_btn'])) {
			 $user_Name=$_POST['update_user'];
			 $sql= "UPDATE login SET username='$user_Name'"; 
     
	 $update =mysqli_query($conn,$sql);
	 if($update){ echo "Updated";}
			 }
		 ?>
         <form method="post">
         <input type="text" name="update_user" class="form-control"/>&nbsp;
         <input type="submit" name="updateuser_btn" class="btn btn-primary" value="Update" />
         </form>
         <?php
	 }
		 ?>
      </td>
      
      </tr>
      
      
      <tr>
      <td> Password</td>
      <td>&bull;&bull;&bull;&bull;&bull;&bull;&nbsp;&nbsp;&nbsp;<a class="btn btn-link" href='<?php echo $_SERVER['PHP_SELF']; ?>?p=Change_Password'>Change</a>
       <?php
	 
	if(isset($_GET['p']) && $_GET['p'] == 'Change_Password') {
		 
		 if (isset($_POST['changePassword_btn'])) {
			 $password=$_POST['update_password'];
			 // here we encrypt the password and add slashes if needed
	

$salt= "portfolio";
$password_encrypted = sha1($password.$salt);
$query = "UPDATE `login` SET `password` = '$password_encrypted'";
$run = mysqli_query($conn,$query) or die($mysqli_error());
if ($run) {
	echo "Updated";
}else{
	echo "Error";
}         

}
		 ?>
      <form method="post">
         <input type="password" name="update_password" class="form-control"/>&nbsp;
         <input type="submit" name="changePassword_btn" class="btn btn-primary" value="Change" />
         </form>
         <?php
	 }
		 ?>
      
       </td>
      </tr>
      <tr>
      <td>Email</td>
      <td><p><?php echo $result['email']; ?></p>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-link" href='<?php echo $_SERVER['PHP_SELF']; ?>?p=Edit_Email'>Edit</a>
     <?php
	 
	if(isset($_GET['p']) && $_GET['p'] == 'Edit_Email') {
		 
		 if (isset($_POST['updateEmail_btn'])) {
			 $nu_Email=$_POST['update_email'];
			 $sql= "UPDATE login SET email='$nu_Email'"; 

	 $update = mysqli_query($conn, $sql);
	 if($update){ 
	 	echo "Updated";
	}else{
		echo "Error";
	}
			 }
		 ?>
         <form method="post">
         <input type="text" name="update_email" class="form-control"/>&nbsp;
         <input type="submit" name="updateEmail_btn" class="btn btn-primary" value="Update" />
         </form>
         <?php
	 }
		 ?>
      
       </td>
      </tr>
      

    <?php
		
	//}
	?>
        </table> 
        
        <?php
	//}
	//elseif($_GET['p'] == 'Edit Profile') { 
		?>
        
        
        
        
        <?php
	//}
		?>

</div></div>
 <?php
 include ("footer.php");
 ?> 