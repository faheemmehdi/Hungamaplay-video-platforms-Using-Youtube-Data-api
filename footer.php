 <!-- row ends --> 
  </div>
</div>
<div class="footer_ad border-bg">
<center>
<?php
$display = "select * from ads  ";
   $query = mysqli_query($conn,$display);
   $result = mysqli_fetch_array($query);
 echo $result['footer_ad'] ?>

</center>
</div>
<footer class="container-fluid">
  <div class="col-md-6 text-left">
<a class="margin-right-10" href="/terms.php" style='color: white;'>TOS</a>
<a class="margin-right-10" href="/privacy.php"  style='color: white;'>Privacy Policy</a>
<a class="margin-right-10" href="/contact-us.php"  style='color: white;'>Contact us</a>
</div>
<div class="col-md-6 text-right">
<p class="muted credit copyright">Copyright © 2021, All Rights Reserved! Developed By <a style="color: #fff" href="https://www.hungamaplay.pk">Khaleeq Ahmad</a></p>
</div>
</footer>


</body>
                

</html>