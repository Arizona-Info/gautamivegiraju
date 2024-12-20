<?php
    require_once 'admin/code/project.php';
    $data = $obj->viewIndexDetails();
?>
<!DOCTYPE HTML>
<html lang="en" style="scrollbar-width: none;">
<head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title><?php echo $data['userDetails'][0]['name']; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content="videos, projects, narrative, commercials, faces, places, traces, experimental, 2nd Dp/Co-Dp, Gautami Vegiraju, director of photography, Mumbai, DOP, cinematographer, short films, camerawoman, camera">
        <meta name="description" content="Gautami Vegiraju is a Director of Photography who currently shoots live-action, pure virtual production, hybrid virtual production, ICVFX, game cinematics and immersive content.">
        <!--=============== css  ===============-->	
        <link type="text/css" rel="stylesheet" href="<?php echo $obj->base_url(); ?>css/reset.css">
        <link type="text/css" rel="stylesheet" href="<?php echo $obj->base_url(); ?>css/plugins.css">
        <link type="text/css" rel="stylesheet" href="<?php echo $obj->base_url(); ?>css/style.css?v=1.6">
        <link type="text/css" rel="stylesheet" href="<?php echo $obj->base_url(); ?>css/style-dark.css"> 
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="images/favicon.ico">
        <style type="text/css">
            .myClassTest{
                overflow-y: scroll !important;
                overflow: -moz-scrollbars-none;
                -ms-overflow-style: none;
            }
            
            .myClassTest::-webkit-scrollbar { width: 0 !important }
        </style>
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
            <!-- header start  -->
            <header class="main-header">
                <!-- logo   -->
                <a href="index.php" class="logo-holder"><img src="<?php echo $obj->base_url()."img/camera/thumbnail/".$data['userDetails'][0]['fileName']; ?>" alt=""></a>  
                <!-- logo end  -->
                <!-- Menu -->
                <div class="nav-button-wrap">
                    <div class="nav-button"><span></span><span></span><span></span></div>
                </div>
                <!-- Menu End -->
                <div class="share-btn showshare"><i class="fa fa-share-alt"></i></div>
            </header>
            <!-- header end -->

            <!--share-wrapper-->
            <div class="share-wrapper">
                <div class="share-container fl-wrap isShare">
                    <a href="https://api.whatsapp.com:/send?text=<?php echo $obj->base_url(); ?>" class="pop share-icon" target="blank">Whatsapp</a>
                    <!--<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $obj->base_url(); ?>" class="pop share-icon" target="blank">Linkedin</a>-->
                </div>
            </div>
            <!--share-wrapper end-->

            <!-- sidebar -->
            <div class="sb-overlay"></div>
            <div class="hiiden-sidebar-wrap outsb myClassTest">
                <div class="sb-widget-wrap fl-wrap">
                    <h3><a href="video.php">MOTION</a></h3>
                </div>
                <div class="sb-widget-wrap fl-wrap">
                    <h3><a href="camera.php">STILLS</a></h3>
                </div>
                <div class="sb-widget-wrap fl-wrap">
                    <h3><a href="about.php">ON THE JOB</a></h3>
                </div>
                <!-- <div class="sb-widget-wrap fl-wrap">
                    <h3><a href="blog_new.php">THE B ROLL</a></h3>
                </div> -->
                <div class="sb-widget-wrap fl-wrap">
                    <h3><a href="contacts.php">COLLABORATE</a></h3>
                </div>
            </div>
            <!-- sidebar end -->
            
            <!-- wrapper  -->	
            <div id="wrapper">
                