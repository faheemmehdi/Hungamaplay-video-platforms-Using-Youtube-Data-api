
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="adlane" content="f2d7dcd6c20bb858f65f138bda0475ad"/>
<meta name="a.validate.01" content="046475ebb8308680bd7e49956a83faf4305f" />
    <link rel="alternate" href="https://www.hungamaplay.pk" hreflang="en-us" />
    <meta name="p:domain_verify" content="7bc19445522e36435e28ed95afc4a1a7"/>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-186282828-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-186282828-1');
</script>

  <?php
  session_start();
  include('admin/code/config.php');
  $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
  $uri = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $urlimg = $protocol.$_SERVER['SERVER_NAME'] ;
  include('functions.php');

  // error_reporting(E_ALL ^ E_NOTICE);

  ?>
  <title>Hungama Play | Watch and Download Video</title>
  <link rel="shortcut icon" href="https://hungamaplay.pk/images/hungamaplay_Logo-e1460668515761-1.png" />

  <meta name="title" content="Hungama Play | Watch and Download Video">
  <meta charset="utf-8">
  <meta property="og:url"                content="https://hungamaplay.pk" />
  <meta property="og:type"               content="article" />
  <meta property="og:title"              content="Hungama Play | Watch and Download Video" />
  <meta property="og:description"        content="Hungama Play is a Video Platform. You can watch & download videos and mp3 Songs, movies, funny video, worldwide Videos on Hungama Play" />
  <meta property="og:image"              content="https://hungamaplay.pk/images/hungama.JPGt" />
  <meta name="keywords" content="hungamaplay.pk, hungamaplay, hungama play, youtube videos, american song, music, entertainment, sports videos, funny videos, movie song, film and animation, tv drama, tv shows, news and politics">


  <!-- sweetalert  -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- sweetalert end -->

  <!-- fontawesome -->
  <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
  <!-- fontawesome -->

 
  <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
  <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
  <!--<meta http-equiv="content-type" content="text/html; charset=UTF-8">-->
  <!--<meta name="description" content="Hungama Play is a Video Platform. You can watch & download videos and mp3 Songs, movies, funny video, worldwide Videos on Hungama Play">-->
  
 <link rel="dns-prefetch" href="//clients1.google.com/complete/search">
  
  <?php
   echo include_once ('AntiAdBlock.php');
  ?>
  
  <link rel="stylesheet" href="https://hungamaplay.pk/uiquery.css" type="text/css" />
  <link rel="stylesheet" href="https://hungamaplay.pk/bootstrap.min.css?ver=2.0">
  <link rel="stylesheet" href="https://hungamaplay.pk/styles.css?ver=2.0.24">
  <!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" />-->
  <script src="https://use.fontawesome.com/0e9cbfbc8d.js"></script>

  <script src="//code.jquery.com/jquery-2.1.4.js" type="text/javascript"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
  <script type="text/javascript">
    jQuery(function() {
      jQuery("#searchInput, #mInputsearch").autocomplete({
        source: function(request, response) {
        //   console.log(request.term);
          var sqValue = [];
          jQuery.ajax({
            type: "POST",
            url: "https://suggestqueries.google.com/complete/search?hl=en&ds=yt&client=youtube&hjson=t&cp=1",
            dataType: 'jsonp',
            data: jQuery.extend({
              q: request.term
            }, {}),
            success: function(data) {
              console.log(data[1]);
              obj = data[1];
              jQuery.each(obj, function(key, value) {
                sqValue.push(value[0]);
              });
              response(sqValue);
            }
          });
        }
      });
    });

    $(document).ready(function() {



      if ($(window).width() <= 620) {
        $(".adtray-728, .adtray-7281, .videoAds").remove();
      }
      if ($(window).width() <= 318) {
        $(".adtray-250, .adtray-600").remove();
      }
      $('#showmobilesearch').click(function() {
        $('#searchmobile').addClass('open-searchbar');
        $('#searchmobile #searchInput').focus();
        $('#fadeMe').show();
      });
      $('#close-searchmobile').click(function() {
        $('#searchmobile').removeClass('open-searchbar');
        $('#searchmobile #searchInput').blur();
        $('#fadeMe').hide();
      });
      $('#fadeMe').click(function() {
        $('#searchmobile').removeClass('open-searchbar');
        $('#searchmobile #searchInput').blur();
        $('#fadeMe').hide();
      });

    });

    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      var expires = "expires=" + d.toGMTString();
      document.cookie = cname + "=" + cvalue + "; " + expires;
    }

    function getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return;
    }
  </script>

  <style>

    .hov{
        transition: 0.3s;
      }
      .hov:hover{
        transform: translate(0, -12px);
      }


    .ui-widget-content {
      z-index: 10000000;
    }

    body {

      padding-top: 130px;
    }

    .navbar-default {
      background-color: #C00;
    }

    .navbar-default .navbar-nav>li>a:hover,
    .navbar-default .navbar-nav>li>a:focus {
      color: #C00;
      background-color: #FFF;
    }

    .navbar-default .navbar-nav>li>a {
      color: #FFF;
    }

    .navbar-default .navbar-nav>.active>a,
    .navbar-default .navbar-nav>.active>a:hover,
    .navbar-default .navbar-nav>.active>a:focus {
      color: #C00;
      background-color: #FFF;

    }

    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      /* background-color:#C00; */

    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .row.content {
        height: auto;
      }
    }

    .video-js .vjs-play-progress:after {
      display: none !Important;
    }

    .video-js .vjs-menu-button-popup .vjs-menu {
      left: 0px !important;
    }

    #mobile-search {

      display: none;
    }

    .nav>li>a {
      padding-left: 10px !important;
      padding-right: 10px !important;
    }

    .vjs-poster {

      background-size: cover !important;
    }

    .iconMusic:before {
      font-family: FontAwesome;
      content: "\f001";
    }

    .iconEntertainment:before {
      font-family: FontAwesome;
      content: "\f26c";
    }

    .iconSports:before {
      font-family: FontAwesome;
      content: "\f1e3";
    }

    .iconComedy:before {
      font-family: FontAwesome;
      content: "\f118";
    }

    .iconNews:before {
      font-family: FontAwesome;
      content: "\f2bc";
    }

    .iconFilm:before {
      font-family: FontAwesome;
      content: "\f008";
    }
    .mobile_footer{
        display:none;
    }

    @media only screen and (max-width: 600px) {
      .header_ad {
        display: none;
      }

      .footer_ad iframe{
      max-width: 335px;
      }
      .hidden-sm iframe{
      max-width: 335px;
    }
    }
  
  </style>
  <script>
    $(document).ready(function() {
      $("#hid_mSearch").click(function() {
        $("#mobile-search").hide();
        $("#hid_mSearch").hide();
      });
      $("#BMSearch").click(function() {
        $("#mobile-search").show();
        $("#hid_mSearch").show();

      });
    });
  </script>

</head>

<body>
  <div id="hid_mSearch" style="position: absolute; top: 46px; width: 100%; height: 100%; background: rgb(153, 153, 153); opacity: 0.7; z-index: 100; display: none;"></div>
  <!-- navbar-fixed-top --->
  <div class="navbar-fixed-top">
    <div style="background-color:#FFF; height:72px;" class="hidden-xs">
      <div class="row"> 
        <div class="col-sm-3">
          <a href="https://www.hungamaplay.pk" title="Hungama Play" rel="home">
            <img src="https://www.hungamaplay.pk/images/hungamaplay_Logo-e1460668515761.png" alt="Hungama Play" style="margin-left: 10%; margin-top: 7px;"></a>
        </div>
        <div class="col-sm-4">
          <form action="https://www.hungamaplay.pk/results" method="GET" id="hyv-yt-search" class="navbar-form" style="margin-top: 17px;">
            <div class="input-group">
              <input type="search" name="search_query" id="searchInput" placeholder="Search..." class="form-control ui-autocomplete-input" autocomplete="off">
              <div class="input-group-btn">
                <button type="submit" class="btn btn-danger" id="hyv-searchBtn" style="height: 34px;"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-sm-4 header_ad">
          <div style="width:468px; height:60px; overflow:hidden;     padding-top: 5px;
">
            <?php

            $display = "select * from ads  ";
            $query = mysqli_query($conn, $display);
            $result = mysqli_fetch_array($query);

            ?>
            <?php echo $result['header_ad'] ?>

          </div>
          <iframe style="display:none" width="50" height="50" src="https://www.youtube.com/embed/WqF92oBS9sU?autoplay=1&controls=0&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
            <a href="https://hungamaplay.pk/" title="Hungama Play" rel="home">
              <div style="float: left; margin-right: 2px; margin-left: 10px; margin-top: 4px;">
                <img src="https://hungamaplay.pk/images/hungamaplay_Logo-e1460668515761-1.png" style="height:35px;">

              </div>
              <h3 style="display: table-cell; color:#FFF; float: left; margin-top:10px;">hungamaplay</h3>
            </a>
          </div>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="<?php if ($_SERVER['REQUEST_URI'] == "/") {
                          echo "active";
                        } ?>"><a href="https://hungamaplay.pk"><b>HOME</b></a></li>
                        
            <li class="<?php if ($_SERVER['REQUEST_URI'] == "/category/10/MUSIC") {
                          echo "active";
                        } ?>"><a href="https://www.hungamaplay.pk/category/10/MUSIC"><b>MUSIC</b></a></li>
                        
            <li class="<?php if ($_SERVER['REQUEST_URI'] == "/category/24/ENTERTAINMENT") {
                          echo "active";
                        } ?>"><a href="https://www.hungamaplay.pk/category/24/ENTERTAINMENT"><b>ENTERTAINMENT</b></a></li>
                        
            <li class="<?php if ($_SERVER['REQUEST_URI'] == "/category/17/SPORTS") {
                          echo "active";
                        } ?>"><a href="https://www.hungamaplay.pk/category/17/SPORTS"><b>SPORTS</b></a></li>
                        
            <li class="<?php if ($_SERVER['REQUEST_URI'] == "/category/23/COMEDY") {
                          echo "active";
                        } ?>"><a href="https://www.hungamaplay.pk/category/23/COMEDY"><b>COMEDY</b></a></li>
                        
            <li class="<?php if ($_SERVER['REQUEST_URI'] == "/category/20/FILM%20ANIMATION") {
                          echo "active";
                        } ?>"><a href="https://www.hungamaplay.pk/category/20/FILM ANIMATION"><b>FILM & ANIMATION</b></a></li>
                        
            <li class="<?php if ($_SERVER['REQUEST_URI'] == "/category/25/news%20politics") {
                          echo "active";
                        } ?>"><a href="https://www.hungamaplay.pk/category/25/news politics"><b>NEWS & POLITICS</b></a></li>
                        
            <li class="<?php if ($_SERVER['REQUEST_URI'] == "/contact-us.php") {
                          echo "active";
                        } ?>"><a href="https://www.hungamaplay.pk/contact-us.php"><b>CONTACT US</b></a></li>

          </ul>
          <ul class="nav navbar-nav navbar-right" style="display:none;">
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </div>
      <div id="mobile-search" style="position: absolute; z-index: 100; top: 0px; width: 100%; height: 53px; background: rgb(230, 33, 23);">
        <div style="float: left; margin-right: 8px; margin-left: 15px; margin-top: 4px;">
          <img src="https://hungamaplay.pk/images/hungamaplay_Logo-e1460668515761-1.png" style="height:35px;">

        </div>
        <form action="/results" method="get" id="hyv-yt-search">
          <div style="margin-left: 50px; margin-right: 50px; margin-top: 8px;">

            <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input style="width:99%; height:30px;" type="search" name="search_query" id="mInputsearch" placeholder="Search..." class="ui-autocomplete-input" autocomplete="off">


          </div>
          <div style="top: 9px; position: absolute; right: 10px;">

            <button type="submit" style="background: transparent; border: 0; margin: 0;" class="icon" id="hyv-searchBtn"><i class="fa fa-search fa-2x" aria-hidden="true" style="color: white;"></i></button>
          </div>
        </form>
      </div>

    </nav>
  </div>
  <div class="border-bg hidden-md hidden-lg hidden-sm" style="
    position: absolute;
    top: 55px;
    height: 70px;
   
    margin-left: 5px;
    width: 98%;
">

    <?php
    $display = "select * from ads  ";
    $query = mysqli_query($conn, $display);
    $result = mysqli_fetch_array($query);
    echo $result['header_ad'];
    // var_dump($result);
    ?>

  </div>
  <div class="container">
    <div class="row">