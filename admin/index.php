<?php
 
include("code/config.php");
include('code/login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
header("location: home.php"); // Redirecting To Profile Page
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hungamaplay</title>
<meta name="title" content="Hungamaplay">
  <meta charset="utf-8">
<link rel="dns-prefetch" href="//clients1.google.com/complete/search">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="description" content="Watch or Download Youtube videos.">
<meta name="keywords" content="hungamaplay.pk, hungamaplay, pakistani videos, browse videos, browse youtube videos, watch youtube video,  download youtube videos, watch Bollywood songs and download">
  <link rel="stylesheet" href="https://www.youpak.com/styles/bootstrap.min.css?ver=2.0">
    <link rel="stylesheet" href="styles.css?ver=2.0.24">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"/>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" media="screen" href="http://vjs.zencdn.net/5.4.6/video-js.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

 
  
  <style>
  body{
	  
	      padding-top: 130px;
		  }
  .navbar-default {
    background-color: #C00;
  }
  .navbar-default .navbar-nav>li>a:hover, .navbar-default .navbar-nav>li>a:focus{
	  color: #C00;
    background-color: #FFFFFF;
	  }
	  .navbar-default .navbar-nav>li>a{
		  color: #FFFFFF;
		  }
.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.active>a:focus{
	    color: #C00;
    background-color: #FFFFFF;
	
	}
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
	 /* background-color:#C00; */
	 
    }
    
       .navbar-fixed-top{
		   
		  /* top: 72px; */
		   }
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .row.content {height:auto;} 
    }
	
	.video-js .vjs-play-progress:after  {
display:none !Important;
}
.video-js .vjs-menu-button-popup .vjs-menu {
    left: 0px !important;
}
#mobile-search{
	
	display:none;
	}
	.nav>li>a {
		    padding-left: 10px !important;
    		padding-right: 10px !important;
	}
	.vjs-poster{
		
		    background-size: cover !important;
		}
	.iconMusic:before{
		font-family: FontAwesome;
		content: "\f001";
		}
	.iconEntertainment:before{
		font-family: FontAwesome;
		content: "\f26c";
		}
	.iconSports:before{
		font-family: FontAwesome;
		content: "\f1e3";
		}
	.iconComedy:before{
		font-family: FontAwesome;
		content: "\f118";
		}
	.iconFilm:before{
		font-family: FontAwesome;
		content: "\f008";
		}
  </style>
</head>
<body>
<div id="hid_mSearch" style="position: absolute; top: 46px; width: 100%; height: 100%; background: rgb(153, 153, 153); opacity: 0.7; z-index: 100; display: none;"></div>
<!-- navbar-fixed-top --->
<div class="navbar-fixed-top">
<div style="background-color:#FFF; height:72px;"  class="hidden-xs">
<div class="row">
<div class="col-sm-12">
<a href="http://hungamaplay.pk/" title="Hungama Play" rel="home">
<img src="images/hungamaplay_Logo-e1460668515761.png" alt="Hungama Play" class="center-block" style="margin-top: 7px; text-align:center;"></a>
</div>


</div>
</div>
<nav class="navbar navbar-default">
  <div class="container">
     <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <div class="navbar-toggle" style="height: 35px; border: none; margin-right:0;">
      <button id="BMSearch" style="background: transparent; border: 0; margin: 0; padding:0;">
<i class="fa fa-search" aria-hidden="true" style="color: white; margin-top: -7px !important; font-size: 30px;"></i>
</button>
      </div>
      
      <div class="hidden-sm hidden-md hidden-lg" style="border: none;">
    <a href="http://hungamaplay.pk/" title="Hungama Play" rel="home">
<div style="float: left; margin-right: 2px; margin-left: 10px; margin-top: 4px;">
<img src="images/hungamaplay_Logo-e1460668515761-1.png" style="height:35px;">

</div>
<h3 style="display: table-cell; color:#FFF; float: left; margin-top:10px;">hungamaplay</h3>
</a>
    </div>
      
      
      
      
    </div>
    
    
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        

		
      </ul>
      <ul class="nav navbar-nav navbar-right" style="display:none;">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
  <div id="mobile-search" style="position: absolute; z-index: 100; top: 0px; width: 100%; height: 53px; background: rgb(230, 33, 23);">
<div style="float: left; margin-right: 8px; margin-left: 15px; margin-top: 4px;">
<img src="images/hungamaplay_Logo-e1460668515761-1.png" style="height:35px;">

</div>

</div>

</nav>
</div>
  <div class="container">    
  <div class="row">
<style>
  .wrapper {    
	margin-top: 80px;
	margin-bottom: 20px;
}

.form-signin {
  max-width: 420px;
  padding: 30px 38px 66px;
  margin: 0 auto;
  background-color: #eee;
  border: 3px dotted rgba(0,0,0,0.1);  
  }

.form-signin-heading {
  text-align:center;
  margin-bottom: 30px;
}

.form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
}

input[type="text"] {
  margin-bottom: 0px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}

input[type="password"] {
  margin-bottom: 20px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.colorgraph {
  height: 7px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
  body{
	  background-color:#FFF;}
  </style>  


	<div class="wrapper">
		<form  method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
			  <hr class="colorgraph"><br>
			  
			  <input type="text" class="form-control" name="username" placeholder="Username" required autofocus />
			  <input type="password" class="form-control" name="password" placeholder="Password" required/>     		  
			 
			  <input class="btn btn-lg btn-primary btn-block"  name="login_submit" value="Login" type="Submit" />  			
		</form>			
	</div>
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
      
 <!-- row ends --> 
  </div>
</div>
<footer class="container-fluid text-center">
  <p>hungamaplay Copyright</p>
</footer>

</body>
</html>