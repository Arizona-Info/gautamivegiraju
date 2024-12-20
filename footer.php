<a href="javascript:void(0)" style="display: none ! important;" id="back-to-top" title="Back to top" class="dark-blue-bg show" onclick="topFunction()"><i class="fa fa-chevron-up"></i></a>

                </div>
                <!--content end-->
            </div>
            <!-- wrapper end -->
        <!-- Main end -->
        <!--=============== scripts  ===============-->          
        <script type="text/javascript" src="<?php echo $obj->base_url(); ?>js/jquery.min.js?v=1.2.1"></script>
        <script type="text/javascript" src="<?php echo $obj->base_url(); ?>js/plugins.js?v=1.3.1"></script>
        <script type="text/javascript" src="<?php echo $obj->base_url(); ?>js/scripts.js?v=1.2.1"></script>
        <script type="text/javascript" src="<?php echo $obj->base_url(); ?>js/map.js?v=1.2.1"></script>
        
        <script type="text/javascript" src="<?php echo $obj->base_url(); ?>js/slick.min.js?v=1.2.1"></script>


        <script type="text/javascript">
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};
            
            function scrollFunction() {
            // alert(document.documentElement.scrollTop);
              if (document.body.scrollTop > 120 || document.documentElement.scrollTop > 120) {
                // document.getElementById("back-to-top").style.display = "block !important";
                $("#back-to-top").removeAttr("style").attr("style","display:block !important");
              } else {
                // document.getElementById("back-to-top").style.display = "none !important";
                $("#back-to-top").removeAttr("style").attr("style","display:none !important");
              }
            }
            
            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
              $("html, body").animate({ scrollTop: 0 }, "slow");
            }
        </script>   
    </body>
</html>