<?php

    if(!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id']) || $_REQUEST['id'] == 0 || empty($_REQUEST['id'])){
        echo "<script>window.location.href = 'video.php'</script>";
        die();
    }

    require_once 'header.php';

    if(isset($_GET['category']) && $_GET['category'] > 0){
        $category = $_GET['category'];
    }
    else{
        $category = null;
    }
    $viewBest = $obj->viewVideoDetails2($_REQUEST['id'], $category);
    // echo "<pre>";
    // print_r($viewBest);
    // exit();

    if(!isset($viewBest['current']) || empty($viewBest['current'])){
        echo "<script>window.location.href = 'video.php'</script>";
        die();   
    }

?>
                <div class="content">
                    <!-- column-wrapper -->	
                    <div class="column-wrapper-cl single-content-section">
                        <!--section  -->	
                        <!-- <section class="single-content-section"> -->
                            <div class="container">
                                <!-- post -->
                                <div class="post fl-wrap fw-post">
                                    <!-- blog media -->
                                    <div class="blog-media fl-wrap">
                                        

                                        <div class="video-image">
                                            <iframe id="videoHeightAdj" width="100%" src="<?php echo $viewBest['current'][0]['link']; ?>?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen mozallowfullscreen webkitallowfullscreen></iframe>
                                        </div>
                                        <script src="https://player.vimeo.com/api/player.js"></script>
                                        <!-- <div class="swiper-slide hov_zoom swiper-slide-active" data-swiper-slide-index="0">
                                            <img src="http://gautamivegiraju.com/img/camera/FqCVvWIrzx20191030011957.jpg" class="respimg" alt="">
                                            <a href="http://gautamivegiraju.com/img/camera/FqCVvWIrzx20191030011957.jpg" class="box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                                        </div> -->
<!-- <div class="fw-carousel  fs-gallery-wrap fl-wrap full-height lightgallery thumb-contr" data-mousecontrol="true">
<div class="swiper-container swiper-container-horizontal swiper-container-free-mode" style="cursor: grab;">
<div class="swiper-wrapper no-horizontal-slider">
<div class="swiper-slide hov_zoom swiper-slide-active" style="margin-right: 10px;">
<a href="http://localhost/pooja/websites/gautami/img/camera/iJ9nPhxg4M20191029233633.JPG" class="popup-image">
<img src="http://localhost/pooja/websites/gautami/img/camera/iJ9nPhxg4M20191029233633.JPG" alt="" style="
    width: 100% !important;
">
</a>
</div>



</div>
<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
</div>
</div> -->
                                    </div>
                                    <!-- blog media end -->
                                    <div class="blog-text fl-wrap">
                                        <div class="fl-wrap det-anim">
                                            <h2><?php if(isset($viewBest['current'][0]['title'])){ echo $viewBest['current'][0]['title']; } ?></h2>
                                            <span class="separator sep-b"></span>
                                            <div class="clearfix"></div>
                                            <?php if(isset($viewBest['current'][0]['description'])){ echo $obj->paragraphView($viewBest['current'][0]['description']); } ?>
                                        </div>
                                        <div class="content-nav det-anim">
                                            <div class="fs-controls_wrap-m">

                                                <?php if(isset($viewBest['previous'][0]['id']) && !empty($viewBest['previous'][0]['id'])){ ?>
                                                    <a href="javascript:void(0)" onclick="goTo(<?php echo $viewBest['previous'][0]['id']; ?>)">
                                                        <div class="fw_cb fw-carousel-button-prev"><i class="fal fa-angle-left"></i></div>
                                                    </a>
                                                <?php } ?>


                                                <a href="javascript:void(0)" onclick="goToHomePage()">
                                                    <div class="fw_cb fw-carousel-button-prev"><i class="fal fa-home"></i></div>
                                                </a>

                                                <?php if(isset($viewBest['next'][0]['id']) && !empty($viewBest['next'][0]['id'])){ ?>
                                                    <a href="javascript:void(0)" onclick="goTo(<?php echo $viewBest['next'][0]['id']; ?>)">
                                                        <div class="fw_cb fw-carousel-button-next"><i class="fal fa-angle-right"></i></div>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- post end-->
                            </div>
                        <!-- </section> -->
                        <!--section end  -->
                    </div>
                    <!-- column-wrapper -->	
                </div>

<?php require_once 'footer.php'; ?>

<script type="text/javascript">
    var width = $(window).width();
    var height = $(window).height();
    if(height < width){
        reduceHeight = 80;
        if(height <= 1064){
            reduceHeight = 60;    
        }
        console.log(reduceHeight);
        
        value = height - reduceHeight;
        if(value > 600){
            value = 600;
        }
        value1 = (10/100)*value;
        value = value+value1;
        console.log(value);
        $("#videoHeightAdj").css("height",value+"px");
        $("#videoHeightAdj").css("width","100%");
    }
    else{
        value = (width*55)/100;
        $("#videoHeightAdj").css("height",value+"px");
        $("#videoHeightAdj").css("width","100%");
    }

    $(window).on('resize', function(){
        width = $(window).width();
        height = $(window).height();
        if(height < width){
            reduceHeight = 80;
            if(height <= 1064){
                reduceHeight = 60;    
            }
            console.log(reduceHeight);
            
            value = height - reduceHeight;
            if(value > 600){
                value = 600;
            }
            value1 = (10/100)*value;
            value = value+value1;
            console.log(value);
            $("#videoHeightAdj").css("height",value+"px");
            $("#videoHeightAdj").css("width","100%");
        }
        else{
            value = (width*55)/100;
            $("#videoHeightAdj").css("height",value+"px");
            $("#videoHeightAdj").css("width","100%");
        }
    });
</script>

<script type="text/javascript">
    function goTo(id){
        window.location.href = '<?php echo $obj->base_url() ?>video-detail.php?id='+id+'&category=<?php if(isset($_GET['category'])){ echo $_GET['category']; } ?>';
    }


    function goToHomePage(){
        window.location.href = '<?php echo $obj->base_url() ?>video.php?category=<?php if(isset($_GET['category'])){ echo $_GET['category']; } ?>';
    }
</script>