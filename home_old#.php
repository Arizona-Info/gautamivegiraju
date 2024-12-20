<?php 
    require_once 'header.php';

    if(isset($_SESSION['category_blog'])){
        // unset($_SESSION['category_blog']);
        setcookie('category_blog', null, -1, "/");
    }

    if(isset($_COOKIE['category_video'])){
        // unset($_COOKIE['category_video']);
        setcookie('category_video', null, -1, "/");
    }

    $category = $obj->viewActiveCategoryBest();
?>
            <!-- content -->	
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

                        <div class="column-title">
                            <h2><?php echo strtoupper($value['name']); ?></h2>
                            <h3><?php echo $value['description']; ?></h3>
                        </div>
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
                    <!--<div class="fixed-bottom-content fbc_white">-->
                        <!--<div class="gallery-filters">-->
                            
                            <?php
                                if(!empty($category)){
                                    foreach ($category as $key => $value) {
                                        if($key == 0){
                            ?>
                                <!--<a href="#" class="gallery-filter gallery-filter-active" data-filter="*" onclick="leftImageChange(<?php //echo $value['id']; ?>)">All</a>-->
                                <?php }else{ ?>
                                <!--<a href="#" class="gallery-filter" data-filter=".galleryFilter_<?php //echo $value['id']; ?>" onclick="leftImageChange(<?php //echo $value['id']; ?>)"><?php //echo $value['name']; ?></a>-->
                            <?php
                                        }
                                    }
                                }
                            ?>

                        <!--</div>-->
                    <!--</div>-->
                    <!-- fixed-bottom-content end -->	
                    <!-- portfolio start -->
                    <div class="gallery-items min-pad three-column fl-wrap lightgallery">
                        
                        <!-- gallery-item-->
                        <?php
                            $viewBest = $obj->viewBest();
                            if(!empty($viewBest)){
                                foreach ($viewBest as $key => $value) {
                        ?>
                            <div class="gallery-item galleryFilter_<?php if($value['imageVideoStatus'] == 1){ echo 2; }else{ echo 1; } ?>" onclick="redirectTo('best-detail.php?id=<?php echo $value['id']; ?>')">
                                <div class="grid-item-holder hov_zoom">
                                    <a href="best-detail.php?id=<?php echo $value['id']; ?>"><img src="<?php 
                                        
                                        if(filter_var($value['fileName'], FILTER_VALIDATE_URL)){
                                            echo $value['fileName'];
                                        }
                                        else{
                                            echo $obj->base_url().'img/camera/thumbnail/'.$value['fileName'];
                                        }

                                    ?>" alt=""></a>
                                    <div class="thumb-info">
                                        <h3><a href="best-detail.php?id=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a></h3>
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
            <!--content end-->
<?php require_once 'footer.php'; ?>

<script type="text/javascript">
    function leftImageChange(id){
        $(".hideAllImage").fadeOut();
        $("#changeImage_"+id).fadeIn();
    }

    function redirectTo(url){
        window.location.href = url;
    }
</script>