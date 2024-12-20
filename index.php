<?php
    require_once 'admin/code/project.php';
    $data = $obj->viewIndexDetails();
?>
<style>
    ::-webkit-scrollbar { 
        display: none;
    }
</style>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title><?php echo $data['userDetails'][0]['name']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content="videos, projects, narrative, commercials, faces, places, traces, experimental, 2nd Dp/Co-Dp, Gautami Vegiraju, director of photography, Mumbai, DOP, cinematographer, short films, camerawoman, camera">
    <meta name="description" content="Gautami Vegiraju is a Director of Photography based in Mumbai.Gautami Vegiraju has shot commercials and branded content for brands like Jabong, Oreo, Tanishq Mia, Abbott, 7UP, Puraniks, Tata Docomo, Nestlé, L'Oréal, Mercedes-Benz, Kissan, Cinthol, Camlin, Fevicol, Sunburn, HUL, Red FM, Glenlivet, John Deere, Metropolis Laboratories, Elanic Fashion, Ace2three.com, Asus Zenfone, Baidyanath, Housejoy.com, Master Chef India, Miss World and most recently Redbull.">
    <!--=============== css  ===============-->	
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/plugins.css">
    <link type="text/css" rel="stylesheet" href="css/style.css?v=1.6">
    <link type="text/css" rel="stylesheet" href="css/style-dark.css"> 
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Social Link -->
    <meta property="og:title" content="<?php echo $data['userDetails'][0]['name']; ?>" />
    <meta property="og:description" content="<?php echo $data['userDetails'][0]['designation']; ?>" />
    <meta property="og:image" content="<?php echo $obj->base_url()."img/camera/thumbnail/".$data['userDetails'][0]['fileName']; ?>">
    <!-- Social Link -->
</head>
<body>
    <!--loader-->
    <div class="loader-wrap">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
    <!--loader end-->
    <!-- main start  -->
    <div id="main">
        
        <!-- wrapper  -->	
        <!--<div id="wrapper">-->
            <!--content -->	
            <div class="content full-height">
                <!--home-main_container-->	
                <div class="home-main_container">

                    <!--home-main_title-->
                    <div class="home-main_title">
                        <div class="home-main_title_item">
                            <h2><?php echo $data['userDetails'][0]['name']; ?></h2>
                            <h4><?php echo $data['userDetails'][0]['designation']; ?></h4>
                            <a href="video.php" class="btn fl-btn"><h3>Context</h3></a>
                            <a href="contacts.php" class="btn fl-btn"><h3>Connect</h3></a>
                            <a href="javascript:void(0)" class="btn fl-btn" onclick="playMusic(this)"><h3><i class="fa fa-volume-off" aria-hidden="true"></i></h3></a>
                        </div>
                    </div>
                    <!--home-main_title end-->
                    <!--bg video-->
                    <div class="media-container media-container_fs">
                        <div class="video-mask"></div>
                        <div class="video-holder" >
                            <div class="video-container">
                                <div style="padding:56.25% 0 0 0;">
                                    <iframe id="vi-banner-video" src="<?php echo $data['otherDetails'][0]['introLink']; ?>?background=1&autoplay=1&loop=1&color=ffffff&title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen" data-audio-volume="0" allowfullscreen></iframe>
                                </div>

                                <!-- <video autoplay loop muted poster="images/banner/video-thumb-1.jpg" class="bgvid">
                                    <source src="" type="video/mp4">
                                </video> -->
                            </div>
                        </div>
                    </div>

                    <!-- <div class="overlay"></div> -->
                    <!--bg image end-->
                </div>
                <!--home-main_container end-->	
            </div>
            <!--content end-->	
        <!-- wrapper end -->
    <!-- Main end -->
    <!--=============== scripts  ===============-->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/plugins.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <script src="https://player.vimeo.com/api/player.js"></script>
</body>
</html>

<script type="text/javascript">
    function playMusic(currentObj){
        var volumn = $("#vi-banner-video").attr("data-audio-volume");
        
        var iframe = document.querySelector('iframe');
        var player = new Vimeo.Player(iframe);

        if(volumn == 0) {
            $(currentObj).html('<h1><i class="fa fa-volume-up" aria-hidden="true"></i></h1>');
            player.setVolume(1);
            $("#vi-banner-video").attr("data-audio-volume",1);
            
        } else {
            $("#vi-banner-video").attr("data-audio-volume",0);
            player.setVolume(0);
            $(currentObj).html('<h1><i class="fa fa-volume-off" aria-hidden="true"></i></h1>');
        }
    }
</script>