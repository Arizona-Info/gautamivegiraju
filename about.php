<?php require_once 'header.php'; ?>
<link rel="stylesheet" type="text/css" href="https://kenwheeler.github.io/slick/slick/slick.css?v=1.2"/>
<link rel="stylesheet" type="text/css" href="https://kenwheeler.github.io/slick/slick/slick-theme.css?v=1.2"/>
<style type="text/css">
    .slick-slide {
  margin: 0 10px;
}
</style>

            <div class="content">
                <div class="column-image">
                    <div class="bg"  data-bg="<?php
                            if(isset($data['userBanner']) && !empty($data['userBanner'])){
                                foreach ($data['userBanner'] as $key => $value) {
                                    if($value['name'] == 'About'){
                                        echo $obj->base_url()."img/camera/thumbnail/".$value['fileName'];
                                    }
                                }
                            }
                        ?>"></div>
                    <!--<div class="overlay"></div>-->
                    <!-- <div class="column-title">
                        <h2>On The Job</h2>
                        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</h3>
                    </div> -->
                </div>

                <div class="column-wrapper">
                    <!--<section id="sec1">-->
                        <div class="container">
                            <div class="section-title fl-wrap">
                                <h3>On The Job</h3>
                            </div>
                            <div class="column-wrapper_item fl-wrap">
                                <div class="column-wrapper_text fl-wrap">
                                    <?php
                                        if(isset($data['otherDetails'][0]['aboutus'])){
                                            echo $obj->paragraphView($data['otherDetails'][0]['aboutus']);
                                        }
                                    ?>
                                </div>
                            </div>
                            <a href="<?php echo $obj->base_url()."pdfDownload.php"; ?>" class="btn fl-btn"><h3>Work Profile</h3></a>
                        </div>
                    <!--</section>-->


                    <?php
                        $testimonialData = $obj->viewTestimonial();
                        if(!empty($testimonialData)){
                    ?>
                    <!--section --> 

                        <!--<section id="sec4">-->
                            <div class="container">
                                <div class="section-title-t fl-wrap">
                                    <h3>Creative Collaborations</h3>
                                </div>
                                <div class="column-wrapper_item fl-wrap">
                                    <div class="column-wrapper_text fl-wrap">
                                        
                                        <div class="carousel-controls testimonial-carousel-controls">
                                            <div class="testimonial-carousel">

                                                <?php
                                                        foreach ($testimonialData as $key => $value) {
                                                    ?>
                                                    <div class="swiper-slide" style="padding-left: 5px">
                                                        <div class="testi-item fl-wrap">
                                                            <h3><?php echo $value['name']; ?></h3>
                                                            <p style="position: relative;">
                                                                "<?php echo $value['review']; ?>"

                                                                <?php if($value['fileName'] != ""){ ?>
                                                                        <img src="<?php echo $obj->base_url().'img/camera/thumbnail/'.$value['fileName']; ?>" alt="" width="50px" height="50px" style="position: absolute; right: 10px; top: -25px;border-radius: 50%;">
                                                                <?php } ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        }
                                                    ?>
                                            </div>

                                            <div class="testilider-controls">
                                                <div class="ss-slider-btn ss-slider-prev color-bg testimonial-carousel-controls-prev"><i class="fal fa-angle-left"></i></div>
                                                <div class="ss-slider-btn ss-slider-next color-bg testimonial-carousel-controls-next"><i class="fal fa-angle-right"></i></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <!--</section>-->
                <!--section end  -->
            <?php } ?>

                    <!--footer -->			
                    <!-- <footer class="min-footer fl-wrap content-animvisible">
                        <div class="container">
                            <div class="footer-inner fl-wrap">
                                <div class="policy-box">
                                    <span>&#169; Gautami Vegiraju 2019 / Designed by <a href="https://arizonamediaz.com/">Arizona Mediaz</a></span>
                                </div>
                            </div>
                        </div>
                    </footer> -->
                </div>
            </div>
<?php require_once 'footer.php'; ?>

<script type="text/javascript">
    $(document).ready(function() {
        $(".testimonial-carousel").slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 2,
            autoplay: false,
            arrows: true,
            prevArrow: $(".testimonial-carousel-controls-prev"),
            nextArrow: $(".testimonial-carousel-controls-next"),
            responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                  }
                },
                {
                  breakpoint: 640,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
            ]
        });

        /*
        Help:- "https://kenwheeler.github.io/slick/"
        */
    });
</script>
