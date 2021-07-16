 <?php 
include("header.php"); 
$display = "select * from login, visit  ";
$query = mysqli_query($conn,$display);
$result = mysqli_fetch_array($query);

?>
 <style>

         .row-msg:hover{
         background-color: #e3e3e3;
         }
         .fa-trash{
         font-size: 30px
         }
      </style>
 <div class="col-md-12" style="padding: 0 5px;">
<div class="border-bg">
<div class="page-header" style="border-bottom:1px solid #CCC">
<h3>Welcome to <?php echo$result['name'] ; ?></h3>
<?php 

               ?>
            <div>
               <p>Total Visitor in website <span class="btn-primary" style="color: #fff;"><?php echo$result['total_count'] ; ?>  </span>
          
                </p>
            </div>
</div>

 <div id="content" >
         <h2 class="mb-4">Inbox</h2>
         <?php

            
            // Check connection
            if($conn === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            
            	// Attempt select query execution
            	// SELECT * FROM myTable ORDER BY id DESC LIMIT 1
            
            	$sql = "SELECT * FROM contactus  ORDER BY id DESC ";
            	if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
            	    	?>
         <div style="max-height: 450px; overflow: scroll; ">
            <table class="table" >
            <thead >
               <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Subject</th>
                  <th scope="col">Message <?php echo $total_msg ?></th>
                  <th scope="col">Date & Time</th>
                  <th scope="col"></th>
               </tr>
            </thead>
            <?php 
               $num = 1;
                  while($row = mysqli_fetch_array($result)){ ?>
            <tbody>
               <tr class="row-msg">

                  <th scope="row"><?php echo $num++;?></th>
                  <th scope="row"><?php echo  $row['user_name'];?></th>
                  <td>
                     <a target="_blank" href="mailto: <?php echo $row['user_email']?>?subject=Hello'<?php echo  $row['user_name'];?>"><?php echo  $row['user_email'];?></a>
                  </td>
                  <td><?php echo  $row['user_subject'];?></td>
                  <td><?php echo  $row['user_msg'];?></td>
                  <td class="date-time">
                     <?php echo $row['date_time']; ?>
                  </td>
                  <td  >
                     <input type="hidden" class="delete_id_value" value="<?php echo $row['id']; ?>">
                     <a href="javascript:void(0)" class="delete"><i class="fa fa-trash" aria-hidden="true"></i>
 </a>
                  </td>
               </tr>
            </tbody>
            <?php 
               }
               
               	echo "</table>";
               	echo "</div>";
               
               // Free result set
               mysqli_free_result($result);
               } else{
                echo "No records matching your query were found.";
               }
               } else{
               echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
               }
               
               // Close connection
               mysqli_close($conn);
               ?>
         </div>
      </div>
      <script>
         jQuery(document).ready(function($) {
            $('.delete').click(function(event) {
               // alert('ok');
               var deleteid = $(this).closest("tr").find('.delete_id_value').val();
               // console.log(deleteid);
               Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to recover this message!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                       $.ajax({
                         type: "POST",
                         url: "code/delete.php",
                         data: {
                           "delete_btn_set":1,
                           "delete_id":deleteid,
                         },
                         success: function(response){
                              Swal.fire({
                                text: "Message Deleted Successfully!",
                                icon: 'success',
                              }).then((result) =>{
                                 location.reload();
                              })

                           }
                           })
                    }
                  })
            });
         });
      </script>
<br><br>

</div>
</div>
 <?php
 include ("footer.php");
 ?>

