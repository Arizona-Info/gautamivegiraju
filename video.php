<?php 
    require_once 'header.php'; 

    if(!isset($_GET['category'])){
        $_GET['category'] = '';
    }

    $category = $obj->viewActiveCategoryVideo();
?>
                <!-- content -->	
                <div class="content">
                    <!-- column-image  -->	
                    <div class="column-image">
                        
                        <?php
                            if(!empty($category)){
                                foreach ($category as $key => $value) {
                        ?>
                        <div class="hideAllImage" id="changeImage_<?php echo $value['id'] ?>" <?php
                                
                                if($_GET['category'] != "" && $_GET['category'] != $value['id']){
                                    echo 'style="display: none;"';
                                }
                                else if($_GET['category'] == "" && $key != 0){
                                    echo 'style="display: none;"';
                                }
                            ?>>
                            <div class="bg"  data-bg="<?php 
                                echo $obj->base_url()."img/camera/thumbnail/".$value['filename'];
                            ?>" ></div>

                            <!--<div class="overlay"></div>-->
                            <div class="column-title<?php //if($key == 0){ echo 'column-title-new'; }else{ echo 'column-title'; }?>">
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
                                    <a href="#" class="gallery-filter <?php
                                        if($_GET['category'] != "" && $_GET['category'] == $value['id']){
                                            echo 'gallery-filter-active';
                                        }
                                        else if($_GET['category'] == "" && $key == 0){
                                            echo 'gallery-filter-active';
                                        }
                                    ?> galleryFilterButton_<?php echo $value['id']; ?>" data-filter="*" onclick="leftImageChange(<?php echo $value['id']; ?>)">All</a>
                                    <?php }else{ ?>
                                    <a href="#" class="gallery-filter <?php
                                        if($_GET['category'] != "" && $_GET['category'] == $value['id']){
                                            echo 'gallery-filter-active';
                                        }
                                        else if($_GET['category'] == "" && $key == 0){
                                            echo 'gallery-filter-active';
                                        }
                                    ?> galleryFilterButton_<?php echo $value['id']; ?>" data-filter=".galleryFilter_<?php echo $value['id']; ?>" onclick="leftImageChange(<?php echo $value['id']; ?>)"><?php echo $value['name']; ?></a>
                                <?php
                                            }
                                        }
                                    }
                                ?>
                            </div>
                    </div>
                        <!-- fixed-bottom-content end -->	  
                        <!-- portfolio start -->
                        <div class="gallery-items min-pad three-column fl-wrap lightgallery" id="addVideoLink">
                            <!-- gallery-item-->

                            <?php
                                $videoData = $obj->viewVideoDetails();
                                if(!empty($videoData)){
                                    foreach ($videoData as $key => $value) {
                            ?>
                                <div class="gallery-item galleryFilter_<?php echo $value['categary']; ?>" onclick="redirectTo('video-detail.php?id=<?php echo $value['id']; ?>')">
                                    <div class="grid-item-holder hov_zoom">
                                        <img  src="<?php echo $obj->base_url().'img/camera/thumbnail/'.$value['fileName']; ?>" alt="">
                                        <div class="thumb-info">
                                            <h3><a href="javascript:void(0)"><?php echo $value['title']; ?></a></h3>
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
                    </div>
                    <!-- column-wrapper -->	
                </div>

<input type="hidden" id="videoCategory" value="<?php if(isset($_GET['category']) && $_GET['category'] != 1){ echo $_GET['category']; } ?>">

<script type="text/javascript">
    function leftImageChange(id){
        $(".hideAllImage").fadeOut();
        $("#changeImage_"+id).fadeIn();

        // $.post("<?php echo $obj->base_url(); ?>admin/code/api_request/public.php",{ 'id' : id , 'action' : 'video'},function(data,status){
        // })

        $("html, body").animate({ scrollTop: 0 }, "slow");
        var data = $(".gallery-filters").css("display");
        if(data == 'block'){
            $("#closeCurrentTab").trigger("click");
        }
        
        if(id != 1){
            $("#videoCategory").val(id);
            window.history.pushState('obj', 'newtitle', '<?php echo $_SERVER['SCRIPT_NAME']."?category="; ?>'+id);
            return false;
        }
        else{
            $("#videoCategory").val("");   
            window.history.pushState('obj', 'newtitle', '<?php echo $_SERVER['SCRIPT_NAME']; ?>');
            return false;
        }
    }
</script>
<?php require_once 'footer.php'; ?>

<script type="text/javascript">
    // $(document).ready(function() {
    //     setTimeout(function(){
            // $(".galleryFilterButton_<?php //echo $_GET['category'] ?>").trigger('click');
    //     }, 1500);
    // });

    function redirectTo(url){
        var categary = $("#videoCategory").val();
        url = url+"&category="+categary;
        window.location.href = url;
    }
</script>

<?php
    if(isset($_GET['category']) && $_GET['category'] > 0){
?>
<script type="text/javascript">
    $(".gallery-items").isotope({ filter: '.galleryFilter_<?php echo $_GET['category']; ?>'});
</script>
<?php
    }
?>