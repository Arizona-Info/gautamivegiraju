<?php 
    require_once 'header.php';
    $category = $obj->viewActiveCategoryImage();
    // unset($_SESSION['category_image']);
    setcookie('category_image', null, -1, "/");
?>
                <div class="content">
                    <!-- column-image  -->	
                    <div class="column-image">


                        <?php
                            if(!empty($category)){
                                foreach ($category as $key => $value) {
                        ?>
                        <div class="hideAllImage" id="changeImage_<?php echo $value['id'] ?>" <?php if($key != 0){ echo 'style="display: none;"';  }?>>
                            <div class="bg"  data-bg="<?php 
                                echo $obj->base_url()."img/camera/thumbnail/".$value['filename'];
                            ?>" ></div>

                            <!--<div class="overlay"></div>-->
                            <div class="column-title<?php //if($key == 0){ echo 'column-title-new-c'; }else{ echo 'column-title'; }?>">
                                <h2><?php echo strtoupper($value['name']); ?></h2>
                                <!-- <h3><?php //echo $value['description']; ?></h3> -->
                            </div>
                            <!--<div class="fixed-column-dec"></div>-->
                        </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                    <!-- column-image end  -->	
                    <!-- column-wrapper -->	
                    <div class="column-wrapper column-wrapper_smallpadding">
                        <!--fixed-bottom-content -->	
                        <div class="bottom-filter-wrap">
                            <div class="filter-title" id="closeCurrentTab">Filters <i class="fal fa-long-arrow-right"></i></div>
                                <div class="gallery-filters" id="gallery-filters-hide-data">
                                    <?php
                                        if(!empty($category)){
                                            foreach ($category as $key => $value) {
                                                if($key == 0){
                                    ?>
                                        <a href="#" class="gallery-filter gallery-filter-active" data-filter="*" onclick="leftImageChange(<?php echo $value['id']; ?>)">All</a>

                                        <?php }else{ ?>

                                        <a href="#" class="gallery-filter" data-filter=".galleryFilter_<?php echo $value['id']; ?>" onclick="leftImageChange(<?php echo $value['id']; ?>)"><?php echo $value['name']; ?></a>

                                    <?php
                                                }
                                            }
                                        }
                                    ?>
                                </div>
                        </div>
                        <!-- fixed-bottom-content end -->
                        <!-- portfolio start -->
                        <div class="gallery-items min-pad three-column fl-wrap lightgallery">
                            <!-- gallery-item-->

                            <?php
                                $videoData = $obj->viewImageDetails();
                                if(!empty($videoData)){
                                    foreach ($videoData as $key => $value) {
                            ?>
                            <div class="gallery-item galleryFilter_<?php echo $value['categary']; ?>" onclick="document.getElementById('click<?php echo $value['id']; ?>').click()">
                                <div class="grid-item-holder hov_zoom">
                                    <img src="<?php 
                                        if(filter_var($value['fileName'], FILTER_VALIDATE_URL)){
                                            echo $value['fileName'];
                                        }
                                        else{
                                            echo $obj->base_url().'img/camera/thumbnail/'.$value['fileName'];
                                        }
                                    ?>" alt="">
                                    <a href="<?php echo $obj->base_url().'img/loading.gif'; ?>" imageName="<?php echo $value['title']; ?>" onclick="imageModalOpen(this, <?php echo $value['id']; ?>)" id="click<?php echo $value['id']; ?>" class="box-media-zoom popup-image"><i class="fal fa-expand"></i></a>                                    
                                    <div class="thumb-info" style="cursor: pointer;">
                                        <h3><?php echo $value['title']; ?></h3>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    }
                                }
                            ?>
                            <!-- gallery-item end-->
                        </div>
                        <!-- portfolio end -->

                        <!--footer -->          
                        <!-- <section id="sec3">
                            <div class="container">     
                                <footer class="min-footer fl-wrap content-animvisible">
                                    <div class="container">
                                        <div class="footer-inner fl-wrap">
                                            <div class="policy-box">
                                                <span>&#169; Gautami Vegiraju 2019 / Designed by <a href="https://arizonamediaz.com/">Arizona Mediaz</a></span>
                                            </div>
                                            <a href="#" class="to-top-btn to-top">Back to top <i class="fal fa-long-arrow-up"></i></a>
                                        </div>
                                    </div>
                                </footer>
                            </div>
                        </section> -->
                    </div>
                    <!-- column-wrapper -->
                </div>
                <!--content end-->
        <!-- Main end -->
        <!-- Back-to-top -->

        <input type="hidden" id="tempImageId" value="">
        <input type="hidden" id="tempPrevImageId" value="">
        <input type="hidden" id="tempNextImageId" value="">
        <input type="hidden" id="tempCategoryId" value="">

<?php require_once 'footer.php'; ?>

<script>

    function imageModalOpen(currentObj, id){
        $("#tempImageId").val(id);
        getImageDetails(id);
    }

    var request = "";
    function getImageDetails(id){

        if(request != ""){
            request.abort();
        }

        $("#imageNameModal").text("");
        var categaryValue = $("#tempCategoryId").val();

        request = $.ajax({
            type:"post",
            url:"<?php echo $obj->base_url(); ?>admin/code/api_request/public.php",
            data:{ 'id' : id , 'action' : 'getImage' , 'category' : categaryValue },
            success:function(data){
                var jsonData = JSON.parse(data);
                if(jsonData.code == 200){
                    $("#imageNameModal").text(jsonData.data.current[0]['title']);
                    setTimeout(function(){
                        $(".lg-current").children().children().attr("src", jsonData.data.current[0]['fileName']);
                        // console.log(jsonData.data.current[0]['fileName']);

                        // startInterval();

                    }, 150)
                    $("#tempPrevImageId").val(jsonData.data.previous[0]['id']);
                    $("#tempNextImageId").val(jsonData.data.next[0]['id']);
                }
                else{
                    alert("Something went wrong please try again");
                }
            }
        })
    }
 </script>

<script type="text/javascript">
    function leftImageChange(id){
        $(".hideAllImage").fadeOut();
        $("#changeImage_"+id).fadeIn();

        // $.post("<?php //echo $obj->base_url(); ?>admin/code/api_request/public.php",{ 'id' : id , 'action' : 'image'},function(data,status){
        // })
        if(id != 2){
            $("#tempCategoryId").val(id);
        }
        else{
            $("#tempCategoryId").val("");
        }
        
        $("html, body").animate({ scrollTop: 0 }, "slow");
        var data = $(".gallery-filters").css("display");
        if(data == 'block'){
            $("#closeCurrentTab").trigger("click");
        }
    }
</script>


<script type="text/javascript">
    function clickRightArrow(){

        setTimeout(function(){
            $(".lg-current ").children().children().attr("src",'<?php echo $obj->base_url().'img/loading.gif'; ?>');

            id = $("#tempNextImageId").val();
            getImageDetails(id);
        }, 150);
    }

    function clickLeftArrow(){
        setTimeout(function(){
            $(".lg-current ").children().children().attr("src",'<?php echo $obj->base_url().'img/loading.gif'; ?>');

            id = $("#tempPrevImageId").val();
            getImageDetails(id);
        }, 150);
    }


    var startIntervalValue;
    var previousValue = "";
    function startInterval(){
        startIntervalValue = setInterval(function(){
            var data = $(".lg-current").children().children().attr("src");
            console.log(data);
            console.log(previousValue);
            console.log("");
            // clearInterval(startIntervalValue);
            
            if((previousValue != data && data != undefined)){
                previousValue = data;
                id = $("#tempPrevImageId").val();
                getImageDetails(id);
            }

        }, 1500);
    }
</script>