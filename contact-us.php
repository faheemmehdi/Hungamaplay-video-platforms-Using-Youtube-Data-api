<?php include ('header.php'); ?>
<div class="col-md-8" style="padding: 0 5px;">
   <div class="border-bg">
      <div class="page-header" style="border-bottom:1px solid #CCC">
         <h3>Contact Us</h3>
      </div>
      <p style="font-weight: bold;">If you have any question related to hungamaplay or if you want to report a bug/problem you are facing on hungamaplay then send us email at <a href="mailto:support@hungamaplay.pk" target="_top" style="color: rgba(109, 109, 109, 0.82);text-decoration: none;">support@hungamaplay.pk</a> Or use contact form below.</p>
      <br><br>
      <div id="formbody">
         <form method="post" class="form-horizontal" id="contactform">
            <div class="form-group">
               <label for="title" class="col-md-2 control-label">Name:</label>
               <div class="col-md-10">
                  <input type="text" class="form-control" name="user_name" required="true">
               </div>
            </div>
            <div class="form-group">
               <label for="title" class="col-md-2 control-label">Email:</label>
               <div class="col-md-10">
                  <input type="email" class="form-control" name="user_email" required="true">
               </div>
            </div>
            <div class="form-group">
               <label for="category" class="col-md-2 control-label">Subject:</label>
               <div class="col-md-10">
                  <select name="user_subject" id="subject" class="form-control">
                     <option value="General Question">General Question</option>
                     <option value="Advertise">Advertisement</option>
                     <option value="Bug Report">Bug Report</option>
                     <option value="other">other</option>
                  </select>
               </div>
            </div>
            <div class="form-group">
               <label for="description" class="col-md-2 control-label">Message :</label>
               <div class="col-md-10">
                  <textarea name="user_msg" id="message" class="form-control" required="true" rows="5"></textarea>
               </div>
            </div>
            <div class="form-group">
               <label for="" class="col-md-2">&nbsp;</label>
               <div class="col-md-10">
                  <input type="submit" id="submit_btn" name="submit" class="btn btn-you btn-block" value="Submit">
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<div class="col-md-4" style="padding: 0 5px;">
   <div class="border-bg rowbox-300">
   </div>
</div>
<?php include ('footer.php'); ?>
<?php 


    extract($_REQUEST);
     if (isset($_REQUEST['submit'])) {

          $query = "INSERT INTO `contactus`( `user_name`,`user_email`,`user_subject`, `user_msg`) VALUES ('$user_name','$user_email','$user_subject','$user_msg')";
          $run = mysqli_query($conn,$query);
          
     if ($run) {
              echo "<script type='text/javascript'>
                  Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Send Success',
                    showConfirmButton: false,
                    timer: 1500
                  })
              </script>";
               // header("location:contact-us.php");

     }else{
          echo "<script type='text/javascript'>
                  Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Not Send',
                    showConfirmButton: false,
                    timer: 1500
                  })
              </script>";
     }
     };
    
 ?>