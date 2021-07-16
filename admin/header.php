<?php 

 include('code/session.php');
include("code/config.php");

    if(!isset($_SESSION['login_user'])){
             header("location: index.php"); 
   }
   ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Hungama play | Watch and Download Video</title>
<meta name="title" content="Hungama play | Watch and Download Video">
  <meta charset="utf-8">
<link rel="dns-prefetch" href="//clients1.google.com/complete/search">
<!-- fontawesome -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- fontawesome -->
 <!-- sweetalert  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- sweetalert end -->

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
      <li><a href="home.php"><b>HOME</b></a></li>
      <li><a href="ads.php"><b>ADS</b></a></li>
<li><a href="profile.php"><b>Profile</b></a></li>
<li><a href="setting.php"><b>Setting</b></a></li>
      </ul>
<p class="navbar-text navbar-right" style="color:#FFF;">

        
 
<a style="color: #fff" href=logout.php>Logout</a>

 	
		</p>      
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