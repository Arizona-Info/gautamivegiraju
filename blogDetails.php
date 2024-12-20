<?php
    require_once 'header.php';

    if(!isset($_COOKIE['category_blog'])){
        $_COOKIE['category_blog'] = '3';
    }

    $id = 0;
    $categoryType = "";

    if(isset($_REQUEST['id']) && $_REQUEST['id'] > 0){
        $id = $_REQUEST['id'];
    }

    if(isset($_REQUEST['category']) && $_REQUEST['category'] > 0){
        $categoryType = $_REQUEST['category'];
    }

    $category = $obj->viewActiveCategoryBlogAll();
    $current = $obj->viewBlogListSingle($id, $categoryType);


    if(!isset($current['current'][0]['id']) || !is_numeric($current['current'][0]['id'])){
        echo "<script>window.location.href = 'coming-soon.php'</script>";
        die();
    }


?>
<style type="text/css">
    .noneStyleCss{
        text-align: left;
    }
    .noneStyleCss ul{
        text-align:left;
        list-style: disc;
    }
    .noneStyleCss li{
        padding-bottom:10px;
    }
    .noneStyleCss p{
        font-size:15px;
    }
    .noneStyleCss span{
        font-size:15px;
    }
    .noneStyleCss h3{
        font-family: Alcubierre;
        font-size: 18px;
        padding: 10px 0;
    }
    .noneStyleCss h2{
        padding-top:15px;
        font-size:29px !important;
    }
</style>
                <!-- content -->    
                <div class="content">
                    <!-- column-image  -->  
                    <div class="column-image-b">
                        <div class="nav-holder main-menu">
                            <nav>
                                <ul>
                                    <li>

                                        <?php
                                            $blodMainName = "";
                                            foreach ($category as $key => $value) {
                                                if($key == 0){
                                        ?>
                                            <!--<a href="javascript:void(0)" class="act-link">-->
                                            <h3><?php 
                                                $blodMainName = $value['name'];
                                                echo $value['name'];
                                            ?>
                                            </h3>
                                            <!--</a>-->
                                            <p class="blog">A blog that explores the endeavours, experiences and epiphanies of a 21st century cinematographer on the journey towards creative equanimity.<?php //echo $value['description']; ?></p>

                                        <?php
                                                }
                                                else{
                                                    if($key == 1){
                                                        echo "<ul style='margin:5px'>";
                                                        echo '<li><a href="'.$obj->base_url().'blog_new.php">All</a></li>';
                                                    }
                                        ?>
                                            <li><a href="<?php echo $obj->base_url().'blog_new.php?category='.$value['id']; ?>"><?php echo $value['name']; ?></a></li>
                                        <?php

                                                    if($key == sizeof($category)-1){
                                                        echo "</ul>";
                                                    }

                                                }
                                            }
                                        ?>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="bottom-filter-wrap-b">
                        <div class="filter-title"><?php echo $blodMainName; ?> <i class="fal fa-long-arrow-right"></i></div>
                        <div class="gallery-filters">

                            <?php
                                foreach ($category as $key => $value) {
                                    if($key == 0){
                            ?>
                                <a href="<?php echo $obj->base_url().'blog_new.php'; ?>" class="gallery-filter <?php
                                    if($value['id'] == $categoryType || $categoryType == ""){
                                        echo "gallery-filter-active";
                                    }
                                ?>">All</a>
                            <?php
                                    }
                                    else{
                            ?>
                                <a href="<?php echo $obj->base_url().'blog_new.php?category='.$value['id']; ?>" class="gallery-filter <?php
                                    if($value['id'] == $categoryType){
                                        echo "gallery-filter-active";
                                    }
                                ?>"><?php echo $value['name']; ?></a>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <!-- column-image end  -->
                    <!-- column-wrapper -->	
                    <div class="column-wrapper-b single-content-section">
                        <!--fixed-bottom-content -->	
                        <!--fixed-bottom-content end  -->	
                        <!--section  -->	
                         <!-- <section class="single-content-section"> -->
                            <div class="container">
                                <!-- post -->
                                <div class="post fl-wrap fw-post single-post ">
                                    <h2><span style="font-family: Simplifica;font-size: 49px;"><?php echo $current['current'][0]['title']; ?></span></h2>
                                    <ul class="blog-title-opt">
                                        <li><?php 
                                                if($current['current'][0]['update_at'] != ""){
                                                    echo date("d M Y", strtotime($current['current'][0]['update_at']));
                                                }
                                                else{
                                                    echo date("d M Y", strtotime($current['current'][0]['created_at']));
                                                }
                                            ?></li>
                                    </ul>
                                    <!-- blog media -->
                                    <div class="blog-media fl-wrap">
                                        <div class="single-slider-wrap">
                                            <div class="single-slider fl-wrap">
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper lightgallery">
                                                        <?php
                                                            if($current['current'][0]['uploadType'] == "video"){
                                                                echo $obj->getVideoType($current['current'][0]['file_path']);
                                                            }
                                                            else if($current['current'][0]['uploadType'] == "audio"){
                                                                $audioType = explode(".",$current['current'][0]['file_path']);
                                                        ?>
                                                            <audio controls style="width: 100%">
                                                              <source src="<?php echo $obj->base_url().'img/camera/'.$current['current'][0]['file_path']; ?>" type="audio/<?php echo $audioType[1]; ?>">
                                                            </audio>
                                                        <?php
                                                            }
                                                            else if($current['current'][0]['uploadType'] == "image"){
                                                        ?>
                                                           <img src="<?php echo $obj->base_url().'img/camera/'.$current['current'][0]['file_path']; ?>" class="respimg" alt="">
                                                        <?php 
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- blog media end -->
                                    <div class="blog-text fl-wrap">
                                        <div class="pr-tags fl-wrap">
                                            <span>Tags : </span>
                                            <ul>
                                                <li>
                                                    <a href="<?php echo $obj->base_url().'blog_new.php?category='.$current['current'][0]['categaryId']; ?>"><?php echo $current['current'][0]['categoryName']; ?></a></li>
                                            </ul>
                                        </div>

                                        <div class="container noneStyleCss" style="color: white">
                                            <?php 
                                                // $descriotionContain = str_replace('color:rgb(0, 0, 0);', '', $current['current'][0]['description']);
                                                // $descriotionContain = str_replace('color: black;', '', $descriotionContain);
                                                // $descriotionContain = str_replace('color: #000;', '', $descriotionContain);
                                                // $descriotionContain = str_replace('color:#000000;', '', $descriotionContain);
                                                $descriotionContain = str_replace('<img ', '<img width="100%"', $current['current'][0]['description']);
                                                echo $descriotionContain;
                                            ?>
                                        </div>
                                    
                                    <div id="comments" class="single-post-comm fl-wrap">

                                        <?php
                                            if(isset($current['comment'][0]['name'])){
                                        ?>
                                        <!--title-->
                                        <h6 id="comments-title">Comments<span>( <?php echo sizeof($current['comment']); ?> )</span></h6>
                                        <ul class="commentlist clearafix">

                                            <?php
                                                foreach ($current['comment'] as $key => $value) {
                                            ?>

                                            <li class="comment" style="width: 100%">
                                                <div class="comment-body">
                                                    <cite class="fn"><a href="#"><?php echo $value['name']; ?></a></cite>
                                                    <div class="comment-meta">
                                                        <h6><a href="#"><?php echo date("M d, Y", strtotime($value['created_at'])); ?> at <?php echo date("h:i a", strtotime($value['created_at'])); ?></a> / <a class='comment-reply-link' href="#">Reply</a></h6>
                                                    </div>
                                                    <p><?php echo $value['description']; ?></p>
                                                </div>
                                            </li>

                                            <?php
                                                }
                                            ?>

                                        </ul>
                                        <?php
                                            }
                                            else{
                                        ?>
                                            <h6 id="comments-title">Comments<span>( 0 )</span></h6>
                                            <ul class="commentlist clearafix">

                                            <li class="comment">
                                                <div class="comment-body">
                                                    <p>No comment found</p>
                                                </div>
                                            </li>

                                        </ul>
                                        <?php
                                            }
                                        ?>


                                        <div class="clearfix"></div>
                                        <div id="respond" class="clearafix">
                                            <h6 id="reply-title">Leave A Review</h6>
                                            <form id="formSubmit"  class="custom-form "   name="commentform" autocomplete="off">
                                                <fieldset>
                                                    <input type="hidden" name="action" value="comment">
                                                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                                                    <input style="color: white" type="text" name="name" id="name2" placeholder="Your Name *" value=""/>
                                                    <input style="color: white" type="text"  name="email" id="email2" placeholder="Email Address *" value=""/>
                                                    <textarea name="comments"  id="comments2" cols="40" rows="1" placeholder="Your Message *"></textarea>

                                                    <input style="color: white" type="text"  name="captcha" id="name3" placeholder="Enter Captcha *" value=""/>

                                                    <img id="captcha_code" class="captcha_code" src="captcha_code.php"/>
                                                    <img class="captcha_code" onclick="refreshCaptcha()" src="img/refresh.jpg"/>
                                                </fieldset>
                                                <button type="button" class="btn float-btn" id="submit">Add Comment </button>
                                            </form>
                                        </div>
                                        <!--end respond-->
                                    </div>
                                    <!--comments end -->
                                    
                                    <div class="content-nav-fixed">
                                        <ul>
                                            <li>
                                                <a href="blogDetails.php?id=<?php echo $current['previous'][0]['id']; ?>&category=<?php echo $categoryType; ?>" class="ln"><i class="fal fa-long-arrow-left"></i><span>Prev <strong>- <?php echo $current['previous'][0]['title']; ?></strong></span></a>
                                                
                                                <!--<div class="content-nav_mediatooltip cnmd_leftside"><img  src="images/folio/6.jpg"   alt=""></div>-->
                                            </li>
                                            <li>
                                                <a href="blogDetails.php?id=<?php echo $current['next'][0]['id']; ?>&category=<?php echo $categoryType; ?>" class="rn"><span >Next <strong>- <?php echo $current['next'][0]['title']; ?></strong></span> <i class="fal fa-long-arrow-right"></i></a>
                                                <!--<div class="content-nav_mediatooltip cnmd_rightside"><img  src="images/folio/5.jpg"   alt=""></div>-->
                                            </li>
                                        </ul>
                                    </div>
                            
                                </div>
                                <!-- post end-->
                            </div>
                        <!-- </section> -->
                        <!--section end  -->
                    </div>
                    </div>
                    </div>
                    <!-- column-wrapper -->	
<?php require_once 'footer.php'; ?>
<script src="https://player.vimeo.com/api/player.js"></script>
<script type="text/javascript">
    function refreshCaptcha(){
        $("#captcha_code").attr('src','captcha_code.php');
    }
</script>

<script type="text/javascript">
    $("#submit").click(function(){
        var name = /^([a-zA-Z0-9 ])+$/;
        var email = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var phone = /^[0-9]{8,12}$/;

        if(!name.test($("#name2").val())){
            alert("Enter your name.");
            $("#name2").focus();
        }
        else if($("#email2").val() == ""){
            alert("Enter your email.");
            $("#email2").focus();
        }
        else if(!email.test($("#email2").val())){
            alert("Incorrect email found.");
            $("#email2").focus();
        }
        else if($("#comments2").val() == ""){
            alert("Enter your comment");
            $("#comments2").focus();
        }
        else if($("#name3").val() == ""){
            alert("Enter captcha.");
            $("#name3").focus();
        }
        else{
            $("#submit").val("Please wait..");
            val = $("#formSubmit").serialize();
            $.ajax({
                type:"post",
                data:val,
                url:"<?php echo $obj->base_url(); ?>admin/code/api_request/public.php",
                success:function(rec){

                    var jsonData = JSON.parse(rec);

                    if(jsonData.code == 200){
                      alert("Comment successfully submited");
                      $("#name2").val("");
                      $("#email2").val("");
                      $("#comments2").val("");
                      $("#name3").val("")
                    }
                    else{
                      alert(jsonData.message);
                    }
                    refreshCaptcha();
                    $("#submit").val("Add Comment");
                }
            })
        }
    })
</script>

<script type="text/javascript">
    var i, frames, maxWidth, audioFormate, lastValue;
    frames = document.getElementsByTagName("iframe");
    for (i = 0; i < frames.length; ++i)
    {
        audioFormate = ['mp3'];
        var str = frames[i].src;
        var res = str.split(".");
        lastValue = res[res.length-1];
        if(jQuery.inArray(lastValue, audioFormate) !== -1){
            
            frames[i].src = 'https://www.google.com/';
            frames[i].style.display = "none";
            var audio = document.createElement("audio");
            
            var controls = document.createAttribute("controls");
            audio.setAttributeNode(controls);
            
            var controls = document.createAttribute("controls");
            audio.setAttributeNode(controls);

            var source = document.createElement("source");

            var style = document.createAttribute("style");
            style.value = "width: 80%;margin: 0% 10%;";
            audio.setAttributeNode(style); 
            
            var src = document.createAttribute("src");
            src.value = str;
            source.setAttributeNode(src);
            
            var type = document.createAttribute("type");
            type.value = "audio/"+lastValue;
            source.setAttributeNode(type); 
            
            audio.appendChild(source);
            frames[i].parentNode.appendChild(audio);
        }
        else{
            frames[i].style.width = "80%";
            var width = frames[i].parentNode.clientWidth;
            maxWidth = width;
            frames[i].style.height = (parseInt(width)/2)+"px";
            frames[i].style.margin = "0% 10%";
        }
    }


    setInterval(function(){
        frames = document.getElementsByTagName("iframe");
        for (i = 0; i < frames.length; ++i)
        {
            if(jQuery.inArray(lastValue, audioFormate) === -1){
                var width = frames[i].parentNode.clientWidth;
                maxWidth = width;
                frames[i].style.height = (parseInt(width)/2)+"px";
            }
        }
    }, 500)
</script>

<script type="text/javascript">
    var span = document.getElementsByTagName("span");
    for (i = 0; i < span.length; ++i)
    {
        var current = span[i].style.color;
        if(current != ""){
            span[i].style.color = "white";
        }
    }
    
    span = document.getElementsByTagName("p");
    for (i = 0; i < span.length; ++i)
    {
        var current = span[i].style.color;
        if(current != ""){
            span[i].style.color = "white";
        }
    }
    
    span = document.getElementsByTagName("h1");
    for (i = 0; i < span.length; ++i)
    {
        var current = span[i].style.color;
        if(current != ""){
            span[i].style.color = "white";
        }
    }
    
    span = document.getElementsByTagName("h2");
    for (i = 0; i < span.length; ++i)
    {
        var current = span[i].style.color;
        if(current != ""){
            span[i].style.color = "white";
        }
    }
    
    span = document.getElementsByTagName("h3");
    for (i = 0; i < span.length; ++i)
    {
        var current = span[i].style.color;
        if(current != ""){
            span[i].style.color = "white";
        }
    }
    
    span = document.getElementsByTagName("h4");
    for (i = 0; i < span.length; ++i)
    {
        var current = span[i].style.color;
        if(current != ""){
            span[i].style.color = "white";
        }
    }
    
    span = document.getElementsByTagName("h5");
    for (i = 0; i < span.length; ++i)
    {
        var current = span[i].style.color;
        if(current != ""){
            span[i].style.color = "white";
        }
    }
    
    span = document.getElementsByTagName("h6");
    for (i = 0; i < span.length; ++i)
    {
        var current = span[i].style.color;
        if(current != ""){
            span[i].style.color = "white";
        }
    }
</script>