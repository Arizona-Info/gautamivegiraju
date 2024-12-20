<?php require_once 'header.php'; ?>
                <!-- content -->    
                <div class="content">
                    <!-- column-image  -->	
                    <div class="column-image">
                        <div class="bg"  data-bg="<?php
                            if(isset($data['userBanner']) && !empty($data['userBanner'])){
                                foreach ($data['userBanner'] as $key => $value) {
                                    if($value['name'] == 'Contact'){
                                        echo $obj->base_url()."img/camera/thumbnail/".$value['fileName'];
                                    }
                                }
                            }
                        ?>"></div>
                        <!--<div class="overlay"></div>-->
                        <!--<div class="column-title">-->
                            <?php 
                                if(isset($data['userBanner']) && !empty($data['userBanner'])){
                                    foreach ($data['userBanner'] as $key => $value) {
                                        if($value['name'] == 'Contact'){
                                            echo "<h2>".$value['name']."</h2>";
                                            echo "<h3>".$value['description']."</h3>";
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <!-- column-image end  -->	
                    <!-- column-wrapper -->	
                    <div class="column-wrapper ">							
                        <!--section  -->							
                        <!--<section id="sec1">-->
                            <div class="container">
                                <div class="section-title fl-wrap">
                                    <h3>Collaborate</h3>
                                </div>
                                <div class="column-wrapper_item fl-wrap">
                                    <div class="column-wrapper_text fl-wrap">
                                        <p><?php 
                                            if(isset($data['otherDetails'][0]['heading']) && $data['otherDetails'][0]['heading'] != ""){
                                                echo $data['otherDetails'][0]['heading']; 
                                            }
                                        ?></p>
                                        <div class="contact-details fl-wrap">
                                            <ul>
                                                <?php if(isset($data['otherDetails'][0]['phone']) && $data['otherDetails'][0]['phone'] != ""){ ?>
                                                    <li><span>Phone :</span><a href="https://api.whatsapp.com:/send?phone=<?php 
                                                        echo '91'.substr($data['otherDetails'][0]['phone'], -10);
                                                    ?>&text=Hi," target="_BLANK" ><?php echo $data['otherDetails'][0]['phone']; ?></a></li>
                                                <?php } ?>

                                                <?php if(isset($data['otherDetails'][0]['email']) && $data['otherDetails'][0]['email'] != ""){ ?>
                                                    <li><span>Mail :</span><a href="mailto:<?php echo $data['otherDetails'][0]['email']; ?>" target="_blank"><?php echo $data['otherDetails'][0]['email']; ?></a></li>
                                                    <li><span>More To Explore :</span>

                                                        <div class="sb-widget fl-wrap">
                                                            <div class="sidebar-social fl-wrap">
                                                                <ul>
                                                                    <?php if(isset($data['otherDetails'][0]['instagram']) && $data['otherDetails'][0]['instagram'] != ""){ ?>
                                                                        <li><a href="<?php echo $data['otherDetails'][0]['instagram'] ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                                    <?php } ?>

                                                                    <?php if(isset($data['otherDetails'][0]['linkedin']) && $data['otherDetails'][0]['linkedin'] != ""){ ?>
                                                                        <li><a href="<?php echo $data['otherDetails'][0]['linkedin'] ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                                                    <?php } ?>

                                                                    <?php if(isset($data['otherDetails'][0]['vimeo']) && $data['otherDetails'][0]['vimeo'] != ""){ ?>
                                                                        <li><a href="<?php echo $data['otherDetails'][0]['vimeo']; ?>" target="_blank"><i class="fab fa-vimeo"></i></a></li>
                                                                    <?php } ?>

                                                                    <?php if(isset($data['otherDetails'][0]['facebook']) && $data['otherDetails'][0]['facebook'] != ""){ ?>
                                                                        <li><a href="<?php echo $data['otherDetails'][0]['facebook']; ?>" target="_blank"><i class="fab fa-facebook"></i></a></li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        <!--</section>-->
                        <!--section end  -->
                        <!--<div style="color: white" id="getDataFromJS"></div>-->
                        <!--footer -->
                        <div class="fixed-bottom-content fbc_white" id="footerIdChange">	
                            <footer class="min-footer fl-wrap content-animvisible">
                                <div class="container">
                                    <div class="footer-inner fl-wrap">
                                        <div class="policy-box">
                                            <span>&#169; All Rights Reserved by Gautami Vegiraju / Designed by <a href="https://arizonamediaz.com/">Arizona Mediaz</a></span>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </div>
                        <!--footer end  -->
                    </div>
<!-- column-wrapper --> 

<?php require_once 'footer.php'; ?>
<script type="text/javascript" src="<?php echo $obj->base_url(); ?>js/contacts.js?v=1.4.1"></script>