<!DOCTYPE html>
<html lang="en">

<head>

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
$id = $_GET['id'];
include("simple_html_dom.php");
  include('admin/code/config.php');
     
            /////////////////// video  player///////////////////////////////
            
            $base = "https://clipmega.com/watch?v=". $id;
            // set up curl
            $curl = curl_init();
            // the url to request
            curl_setopt($curl, CURLOPT_URL, $base);
            // return to variable
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            // decompress using GZIP
            curl_setopt($curl, CURLOPT_ENCODING, '');
            // don't verify peer ssl cert
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            //  // fetch remote contents, check for errors
            if (false === ($response = curl_exec($curl)))
                $error = curl_error($curl);
            // close the resource
            curl_close($curl);

            if (!$response) {
                die("Curl Error: {$error}");
            }
            $html = new simple_html_dom();
            $html->load($response);
            
  $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
  $uri = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $urlimg = $protocol.$_SERVER['SERVER_NAME'] ;
  include('functions.php');

  // error_reporting(E_ALL ^ E_NOTICE);
 $getvalue = videoStatistics($id, $videoapi);
                    $vPublishedAt = $getvalue['publishedAt'];
                    $vDescription = $getvalue['description'];
                    $vtitle = $getvalue['title'];
                    $cid = $getvalue['channelId'];
                    
                    $vPublishedAt = date('M ,d Y', strtotime($vPublishedAt));
                    // $categoryId=$videoStatistics['categoryId'];
                    $categoryId = $getvalue['categoryId'];
                    
                    
                    $catagoryStatistics = catagoryStatistics($categoryId, $videoapi);
                    $catagorydetail = $catagoryStatistics['catTitle'];
                    
                    $getcdetail = channelStatistics($cid, $videoapi);
                    $channelThumbnails = $getcdetail['channelThumbnailsUrl'];
                    $channelTitle = $getcdetail['channelTitle'];
                    
                    // echo $vtitle;
                    $videoTitle1 = str_replace(" ", "-", $vtitle);
                    $videoTitle1 = preg_replace('/[^A-Za-z0-9\-]/', '', $videoTitle1);
                    $videoTitle1 = substr($videoTitle1, 0, 25);
  ?>

  <!-- fluidplayer end -->


  <!-- fontawesome -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- fontawesome -->

  <link rel="dns-prefetch" href="//clients1.google.com/complete/search">
  <title><?php echo $html->find('div.video-title', 0)->plaintext;?> - hungamaplay.pk</title>
  <link rel="shortcut icon" href="https://hungamaplay.pk/images/hungamaplay_Logo-e1460668515761-1.png" />

  <meta name="title" content="<?php echo $html->find('div.video-title', 0)->plaintext;?>">
  <!---->
<meta property="og:url"                content="<?php echo $uri;?>" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="<?php echo $html->find('div.video-title', 0)->plaintext;?>" />
<meta property="og:description"        content="Hungama Play is a Video Platform. You can watch & download videos and mp3 Songs, movies, funny video, worldwide Videos on Hungama Play" />
<meta property="og:image"              content="https://img.youtube.com/vi/<?php echo $id?>/sddefault.jpg" />
  <!---->
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="description" content="Hungama Play is a Video Platform. You can watch & download videos and mp3 Songs, movies, funny video, worldwide Videos on Hungama Play">
  <meta name="keywords" content="hungamaplay.pk, hungamaplay, hungama play, youtube videos, american song, music, entertainment, sports videos, funny videos, movie song, film and animation, tv drama, tv shows, news and politics">

  <?php
   echo include_once ('AntiAdBlock.php');
  ?>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" type="text/css" />
  <link rel="stylesheet" href="https://hungamaplay.pk/bootstrap.min.css?ver=2.0">
  <link rel="stylesheet" href="https://hungamaplay.pk/styles.css?ver=2.0.24">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" />
  <!--<script src="https://use.fontawesome.com/0e9cbfbc8d.js"></script>-->

  <script src="//code.jquery.com/jquery-2.1.4.js" type="text/javascript"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
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
                        
            <li class="<?php if ($_SERVER['REQUEST_URI'] == "/category/26/FILM ANIMATION") {
                          echo "active";
                        } ?>"><a href="https://www.hungamaplay.pk/category/20/FILM ANIMATION"><b>FILM & ANIMATION</b></a></li>
                        
            <li class="<?php if ($_SERVER['REQUEST_URI'] == "/category/news politics") {
                          echo "active";
                        } ?>"><a href="https://www.hungamaplay.pk/category/news politics"><b>NEWS & POLITICS</b></a></li>
                        
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





<?php
$display = "select * from ads , api";
$query = mysqli_query($conn, $display);
$result = mysqli_fetch_array($query);
$videoapi = $result['api_key'];
$relatedapi = $result['api_key5'];

// echo $result['player_ad'] 
?>
<style>
    /*#player {*/
    /*    width: 100% !important;*/
    /*    height: 100% !important;*/
    /*    cursor: default;*/
    /*}*/

    .video_container {
        position: relative;
    }

    .video_container #overlay {
        /*margin-left: 27%;*/
        width: 325px;
        position: absolute;
        top: 60%;
        z-index: 1;
        transform: translate(59%, 25px);

    }

    #closeAD {
        background-color: #fff;
    }

    @media only screen and (max-width: 600px) {
        #overlay {

        margin-left: -60%;
        margin-top: -78px;
        }
         #player {
        width: 100% !important;
        height: 100% !important;
        cursor: default;
    }
    }

    #video-fully-responsive {
        width: 100%;
    }

    /*#vast_video_loading_video-fully-responsive{*/
    /*height: 0;*/
    /*}*/
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <script>
                jQuery(document).ready(function($) {
                    $("#closeAD").click(function() {
                        $("#overlay").hide();
                    });
                });
            </script>
         
            <div class="border-bg rowbox-300 video_container">
                
                    <div id="overlay" style="display: none;">
                        <button type="button" class="close" id="closeAD" aria-label="Close"><span aria-hidden="true">x</span></button>
                        <?php echo $result['player_popup']; ?>
                    </div>
                
         <!--<iframe width="725" height="340" src="https://www.youtube.com/embed/<?php echo $id?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
             <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
    <div id="player"></div>
<script type="text/javascript">
    var vid = <?php echo json_encode($id); ?>;
</script>
    <script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '390',
          width: '725',
          videoId: vid,
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }
      }
      function stopVideo() {
        var x = document.getElementById("overlay");
        if (x.style.display === "none") {
            x.style.display = "block";
          }
      }
    </script>
            </div>


            <div class="border-bg">

                <div class="video-title" itemprop="name">
                    <?php 
                   
                    echo $html->find('div.video-title', 0)->plaintext;
                    ?>
                </div>

                <div class="row">
                    <div class="channelDetails col-sm-8">
                        <a href="">
                           <?php echo $html->find('img[class=channelThumb]', 0)->outertext; ?>
                            <!--<img src="<?php echo $channelThumbnails; ?>" class="channelThumb" alt="<?php echo $channelTitle; ?>">-->
                        </a>
                        <a class="uploader-name" href="https://hungamaplay.pk/channel/<?php echo $cid;?>&sp="><?php echo  $html->find('a.uploader-name', 0)->plaintext; ?>
                        </a>

                        <?php
                        //Find all links 
                        foreach ($html->find('.uploader-name') as $element) {

                            $href = $element->href;
                            // echo $href."<br>";
                        ?>
                        <?php } ?>
                        
                        <div style="margin-top:2px"><span class="subscripberNum" style="margin-left: 10px;font-size: 13px;font-weight: bold;color: #5b5b5b;"><?php echo $html->find('.subscripberNum', 0)->innertext; ?></span></div>
                    </div>
                    <div class="text-right col-sm-4">
                        <div class="font-size-16">
                            <?php echo $html->find('.text-right', 0)->innertext; ?></span>
                        </div>
                    </div>
                </div>

                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#about-tab" data-toggle="tab"><i class="fa fa-bullhorn"></i><span class="about-tab-title">&nbsp;About</span></a></li>
                    <li class=""><a href="#comments-tab" data-toggle="tab"><i class="fa fa-comment"></i><span class="comments-tab-title">&nbsp;Comments</span></a></li>
                    <li class=""><a href="#share-tab" data-toggle="tab"><i class="fa fa-link"></i><span class="share-tab-title">&nbsp;Share / Embed</span></a></li>
                    <li class=""><a href="#report-tab" data-toggle="tab"><i class="fa fa-flag"></i><span class="report-tab-title">&nbsp;Report<span></span></span></a></li>
                    <li class=""><a href="#download-tab" data-toggle="tab"><i class="fa fa-download"></i><span class="download-tab-title">&nbsp;Download<span></span></span></a></li>
                </ul>
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane fade active in" id="about-tab">
                        <h4 class="font-weight-bold"><?php echo $html->find('.font-weight-bold', 0)->innertext; ?></h4>
                        <div style="font-size: 16px;font-weight: bold;">Category: <a class="title-color" href="https://www.hungamaplay.pk/cat.php?id=<?php echo $categoryId; ?>&title=<?php echo $catagorydetail ?>"><?php echo $catagorydetail ?></a></div>
                        <div id="about" class="overflow-hidden" style="background-image:linear-gradient(to bottom, #FFF 95%, #EBEBEB 100%)">
                            <p>
                                <?php
                                echo $html->find('.overflow-hidden', 0)->innertext;
                                
                                ?>
                            </p>
                        </div>
                        <div class="show-more closed">show more<span class="caret"></span></div>
                    </div>
                    <div class="tab-pane fade" id="comments-tab">
                        <h4 class="font-weight-bold"><i class="fa fa-message"></i>&nbsp;Comments</h4>
                        <div id="comments" class="overflow-hidden" style="background-image:linear-gradient(to bottom, #FFF 95%, #EBEBEB 100%)">
                            <p>
                                <center>
                                    <?php
                                    commentsReplies($id, $videoapi);
                                    ?>
                                </center>

                            </p>
                        </div>
                        <div class="show-comm closed">show more<span class="cmtcaret"></span></div>
                    </div>
                    <div class="tab-pane fade" id="share-tab">
                        <h4 class="font-weight-bold">Share/Embed</h4>
                        <div class="mbl">
                            <button class="btn mlxs btn-twitter" onclick="window.open('https://twitter.com/intent/tweet?url=<?php echo $uri; ?>&amp;text=&amp;hashtags=hungamaplaypk','','width=555,height=300')"><i class="fa fa-twitter"></i><span class="share-btn-title"><span class="share-btn-title"> Twitter</span></span></button>
                            <button class="btn mlxs btn-pinterest" onclick="window.open('https://pinterest.com/pin/create/button/?url=<?php echo $uri; ?>;&amp;media=<?php echo $videoStatistics['thumbnailsUrl']; ?>&amp;description=<?php echo $videoStatistics['title']; ?>','','width=555,height=300')"><i class="fa fa-pinterest"></i><span class="share-btn-title"> Pinterest</span></button>
                            <button class="btn mlxs btn-linkedin" onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $uri; ?>;&amp;title=<?php echo $videoStatistics['title']; ?>&amp;summary=<?php echo $videoStatistics['title']; ?>&amp;source=hungamaplay','','width=555,height=300')"><i class="fa fa-linkedin"></i><span class="share-btn-title"> LinkedIn</span></button>
                            <button class="btn mlxs btn-google-plus" onclick="window.open('https://plus.google.com/share?url=<?php echo $uri; ?>;,'width=555,height=300')"><i class="fa fa-google-plus"></i><span class="share-btn-title"> Google Plus</span></button>
                            <button class="btn mlxs btn-success" onclick="window.open('whatsapp://send?text=<?php echo $uri; ?>','','width=555,height=300')"><i class="fa fa-whatsapp"></i><span class="share-btn-title"> Whatsapp</span></button>

                        </div>
                        <div class="video-content">
                            <div class="row input-group social-btns" style="width: 100%;">
                                <div class="tab-pane fade active in width-full">
                                    <div class="clearfix"></div>
                                    <h4 class="font-weight-bold">Video Link</h4>
                                    <div class="input-group col-md-8 width-full">
                                        <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                        <input type="text" id="shareable_link" value="<?php echo $uri ?>" class="form-control" onclick="$(this).select()">
                                    </div>
                                    <h4 class="font-weight-bold">Embed Video</h4>
                                    <div class="video-embed relative clearfix">
                                        <div class="input-group mbm col-md-12">
                                            <span class="input-group-addon">
                                                <i class="fa fa-expand"></i>
                                            </span>
                                            <textarea name="embed_code" id="embed_code" onclick="this.select()" class="form-control height">&lt;iframe width="600" height="350" src="https://hungamaplay.pk/embed.php?id=<?php echo $id ?>" frameborder="0" allowfullscreen&gt;&lt;/iframe&gt;</textarea>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="report-tab">
                        <h4 class="font-weight-bold">Report</h4>
                        <p>Please select the category that most closely reflects your concern about the video, so that we can review it and determine whether it violates our Community Guidelines or isn't appropriate for all viewers. Abusing this feature is also a violation of the Community Guidelines, so don't do it.</p>
                        <div id="formbody">
                            <div id="reportform">
                                <div class="input-group col-md-8">
                                    <select name="subject" id="subject" class="form-control" style="height: 34px;">
                                        <option value="Broken Link ">Broken Link</option>
                                        <option value="Anti Religious ">Anti Religious</option>
                                        <option value="Copyright Infringement">Copyright Infringement</option>
                                        <option value="Hatred Speech ">Hatred Speech</option>
                                        <option value="Violence">Violence</option>
                                        <option value="Sexually Explicit Content">Sexually Explicit Content</option>
                                    </select>
                                    <div class="input-group-btn">
                                        <div id="submit_report" class="btn btn-primary">Submit Report</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="download-tab">
                        <h4 class="font-weight-bold"> <i class="fa fa-download"></i>&nbsp;Download Links </h4>
                        <div id="formbody">
                            <center>
                                <iframe src="https://break.tv/widget/full/?link=https://www.youtube.com/watch?v=<?php echo $id ?>" width="300" height="200" scrolling="no" style="border:none;"></iframe>
                            </center>
                        </div>
                    </div>
                </div>
                <!-- --- -->
            </div>
        </div>
        <div class="col-md-4">
            <div class="border-bg rowbox-300">
                <?php echo $result['homepage_ad']; ?>
            </div>
            <div class="border-bg rowbox-300">
                
                        <div id="sidebar" >
                <?php
        
            foreach($html->find('div.related-video') as $article) {
                $item['title']     = $article->find('div.related-title', 0)->plaintext;
                $item['time']    = $article->find('span.duration', 0)->plaintext;
                $item['cname'] = $article->find('div.viewsanduser', 0)->plaintext;
                $item['cname'] = $article->find('div.viewsanduser', 0)->plaintext;
                $item['img'] = $article->find('img', 0)->outertext;
                $articles[] = $item;
?>
                
         <div class=" related-video hov ">
            <?php 
                foreach($article->find('a.title-color') as $element)
                $url = $element->href;
                $aa = substr($url, 8);
             ?>
         <a class="title-color" href="<?php echo $aa; ?>" title="<?php ?>">
         <div class="related-thumbs">
            <!-- img -->
            <?php echo $item['img']; ?>
            <span class="duration"><?php echo $item['time']; ?></span>
         </div>
        </a>
        <div class="caption">
            <a class="title-color" href="<?php echo $aa; ?>" title="<?php  ?>">
                      <div class="related-title"><?php echo  $item['title']; ?></div>
      </a>
       <div class="viewsanduser">by <a class="user" href="#"><?php echo $item['cname'];  ?></a></div>
      </div>
      </div>       
        
<?php
            }
     ?>
</div>

            </div>
        </div>
    </div>
</div>
// <script type="text/javascript">
//     setTimeout(function() {
//         $('#overlay').show(); // or fade, css display however you'd like.
//     }, 40000);
// </script>
<script>
    $(document).ready(function() {
        $('.show-more').click(function() {
            if ($(this).hasClass('closed')) {
                $(this).removeClass('closed').html('Show less <span class="caret fa-rotate-180"></span>');
                $('#about').css({
                    'height': 'auto',
                    'overflow': 'visible',
                    'background': 'transparent'
                });
                $(this).addClass('margin-top-10');
            } else {
                $(this).addClass('closed').html('Show more <span class="caret"></span>');
                $('#about').css({
                    'height': '',
                    'overflow': 'hidden',
                    'background-image': 'linear-gradient(to bottom, #FFF 95%, #EBEBEB 100%)'
                });
                $(this).removeClass('margin-top-10');
            }
        });
        $('.show-comm').click(function() {
            if ($(this).hasClass('closed')) {
                $(this).removeClass('closed').html('Show less <span class="cmtcaret fa-rotate-180"></span>');
                $('#comments').css({
                    'height': 'auto',
                    'overflow': 'visible',
                    'background': 'transparent'
                });
                $(this).addClass('margin-top-10');
            } else {
                $(this).addClass('closed').html('Show more <span class="cmtcaret"></span>');
                $('#comments').css({
                    'height': '',
                    'overflow': 'hidden',
                    'background-image': 'linear-gradient(to bottom, #FFF 95%, #EBEBEB 100%)'
                });
                $(this).removeClass('margin-top-10');
            }
        });
    });
</script>
</div>
<!-- <?php echo $html->find('.btn-group-justified ', 0)->innertext; ?>
   <iframe style="width:100%;height:50px;border:0;overflow:hidden;" scrolling="no" src="https://break.tv/widget/button/?link=https://www.youtube.com/watch?v=<?php echo "$id"; ?>"&color=c91818></iframe>
    -->
<!-- ------------------------------------------------------------------------------------- -->
<?php
include('footer.php');


?>