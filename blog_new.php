<?php
	require_once 'header.php';

	if(!isset($_COOKIE['category_blog'])){
        $_COOKIE['category_blog'] = '3';
    }

    $pagination = 1;
    $categoryType = "";

    if(isset($_REQUEST['page']) && $_REQUEST['page'] > 0){
        $pagination = $_REQUEST['page'];
    }

    if(isset($_REQUEST['category']) && $_REQUEST['category'] > 0){
        $categoryType = $_REQUEST['category'];
    }

	$category = $obj->viewActiveCategoryBlogAll();
	$videoData = json_decode($obj->viewBlogList($pagination, $categoryType));

	if($videoData->code == 400){
		echo "<script>window.location.href = 'coming-soon.php'</script>";
        die();
	}
?>

<div class="content">
    <!-- column-wrapper -->	
    <div class="column-wrapper-b  single-content-section">
        <!--section  -->	
        <!-- <section class="single-content-section"> -->
            <div class="container">
                

                <!-- post -->
                <?php
                	foreach ($videoData->data->data as $key => $value) {
                ?>
	                <div class="post fl-wrap fw-post">
	                    <h2><span style="font-family: Simplifica;font-size: 49px;"><?php echo $value->title; ?></span></h2>
	                    <ul class="blog-title-opt">
	                        <li><?php 
                                if($value->update_at != ""){
                                    echo date("d M Y", strtotime($value->update_at));
                                }
                                else{
                                    echo date("d M Y", strtotime($value->created_at));
                                }
                            ?></li>
	                    </ul>
	                    <!-- blog media -->
	                    <div class="blog-media fl-wrap">
                            <?php
                                if($value->uploadType == "video"){
                                    echo $obj->getVideoType($value->file_path);
                                }
                                else if($value->uploadType == "audio"){
                                    $audioType = explode(".",$value->file_path);
                            ?>
                                <audio controls style="width: 100%">
                                  <source src="<?php echo $obj->base_url().'img/camera/'.$value->file_path; ?>" type="audio/<?php echo $audioType[1]; ?>">
                                </audio>
                            <?php
                                }
                                else if($value->uploadType == "image"){
                            ?>
	                           <img src="<?php echo $obj->base_url().'img/camera/'.$value->file_path; ?>" class="respimg" alt="">
                            <?php 
                                }
                            ?>
	                    </div>
	                    <!-- blog media end -->
	                    <div class="blog-text fl-wrap">
	                        <div class="pr-tags fl-wrap">
	                            <span>Tags : </span>
	                            <ul>
	                                <li><?php echo $value->categaryName; ?></li>
	                            </ul>
	                        </div>
	                        <p>
	                            <?php echo $obj->cropParagraph($value->description,75); ?>
	                        </p>
	                        <a href="blogDetails.php?id=<?php echo $value->id; ?>&category=<?php echo $categoryType; ?>" class="btn float-btn flat-btn">Read more </a>
	                    </div>
	                </div>
	            <?php } ?>
                <!-- post end-->
                
                <!-- pagination   -->
	            <div class="pagination-container fl-wrap">

                    <?php
                        if($videoData->data->previousPage > 0){
                    ?>
                        <a href="<?php echo $obj->base_url().'blog_new.php?page='.($pagination-1).'&category='.$categoryType; ?>" class="prevposts-link"><i class="fal fa-chevron-left"></i></a>
                        <a href="<?php echo $obj->base_url().'blog_new.php?page='.($pagination-1).'&category='.$categoryType; ?>"><?php echo $pagination-1; ?></a>
                    <?php
                        }
                        else{
                    ?>
                        <a href="<?php echo $obj->base_url().'blog_new.php?page='.$pagination.'&category='.$categoryType; ?>" class="prevposts-link"><i class="fal fa-chevron-left"></i></a>
                    <?php
                        }
                    ?>
	                

                    <a href="<?php echo $obj->base_url().'blog_new.php?page='.$pagination.'&category='.$categoryType; ?>" class="current-page"><?php echo $pagination; ?></a>


                    <?php
                        if($videoData->data->nextPage > 0){
                    ?>
                        <a href="<?php echo $obj->base_url().'blog_new.php?page='.($pagination+1).'&category='.$categoryType; ?>"><?php echo $pagination+1; ?></a>
                        <a href="<?php echo $obj->base_url().'blog_new.php?page='.($pagination+1).'&category='.$categoryType; ?>" class="nextposts-link"><i class="fal fa-chevron-right"></i></a>
                    <?php
                        }
                        else{
                    ?>
                        <a href="<?php echo $obj->base_url().'blog_new.php?page='.$pagination.'&category='.$categoryType; ?>" class="nextposts-link"><i class="fal fa-chevron-right"></i></a>
                    <?php
                        }
                    ?>                    
	            </div>
            <!-- pagination  end -->
            </div>
        <!-- </section> -->
        <!--section end  -->	
    </div>
    <!-- column-wrapper -->
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
                            <h3>
                            <?php 
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
<!-- navigation  end -->
        <!-- <div class="bottom-filter-wrap">
            <div class="filter-title">Filters <i class="fal fa-long-arrow-right"></i></div>
        </div>
        <div class="container">
            <div class="blog-main">
                <h3>The B Roll</h3>
                <p>A blog that explores the endeavours, experiences and epiphanies of a 21st century cinematographer on the journey towards creative equanimity.</p>
            </div>   
            <div class="blog-section">
                <h3> - Set Swag</h3>
            </div>
            <div class="blog-section">
                <h3> - Singularities</h3>
            </div>
            <div class="blog-section">
                <h3> - Setting the Frame</h3>
            </div>
            <div class="blog-section">
                <h3> - Steer the Gear</h3>
            </div>
        </div> -->
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
</div>

<?php require_once 'footer.php'; ?>
<script src="https://player.vimeo.com/api/player.js"></script>