<?php include_once('header.php'); ?>
<body id="page">
<script type="text/javascript" src="public/js/jquery_slider.js"></script>
<script type="text/javascript" src="public/js/jquery-1.9.1.js"></script>
<script type="text/javascript">




    //LATEST NEWS

    function ticker() {
        $('#ticker li:first').slideUp(function() {
            $(this).appendTo($('#ticker')).slideDown();
        });
    }
    setInterval(ticker, 3000);

    <!--  END OF LATEST NEWS-->


    <!--IMAGE SLIDER JS CODE-->

    $(document).ready(function() {

        //Set Default State of each portfolio piece
        $(".paging").show();
        $(".paging a:first").addClass("active");

        //Get size of images, how many there are, then determin the size of the image reel.
        var imageWidth = $(".window").width();
        var imageSum = $(".image_reel img").size();
        var imageReelWidth = imageWidth * imageSum;

        //Adjust the image reel to its new size
        $(".image_reel").css({'width' : imageReelWidth});

        //Paging + Slider Function
        rotate = function(){
            var triggerID = $active.attr("rel") - 1; //Get number of times to slide
            var image_reelPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide

            $(".paging a").removeClass('active'); //Remove all active class
            $active.addClass('active'); //Add active class (the $active is declared in the rotateSwitch function)

            //Slider Animation
            $(".image_reel").animate({
                left: -image_reelPosition
            }, 500 );

        };

        //Rotation + Timing Event
        rotateSwitch = function(){
            play = setInterval(function(){ //Set timer - this will repeat itself every 3 seconds
                $active = $('.paging a.active').next();
                if ( $active.length === 0) { //If paging reaches the end...
                    $active = $('.paging a:first'); //go back to first
                }
                rotate(); //Trigger the paging and slider function
            }, 3000); //Timer speed in milliseconds (3 seconds)
        };

        rotateSwitch(); //Run function on launch

        //On Hover
        $(".image_reel a").hover(function() {
            clearInterval(play); //Stop the rotation
        }, function() {
            rotateSwitch(); //Resume rotation
        });

        //On Click
        $(".paging a").click(function() {
            $active = $(this); //Activate the clicked paging
            //Reset Timer
            clearInterval(play); //Stop the rotation
            rotate(); //Trigger rotation immediately
            rotateSwitch(); // Resume rotation
            return false; //Prevent browser jump to link anchor
        });

    });

    <!--END OF IMAGE SLIDER JSCODE -->

</script>
<script type="text/javascript" src="<?php echo $resourcePath ?>/js/bootstrap.min.js"></script>
<div class="container">
  <header class="header"><a class="logo-head" href="#"> <img src="<?php echo $resourcePath ?>/img/layout/logo.png"
                                                               class="logo"/>
    <h2 class="fl">ST.ANN'S SCHOOL</h2>
    <br/>
    </a>
    <div class="content-login">
      <p style="float:right;"><a href="#sign-up" data-toggle="modal" role="button" class="myButton"><img
                        src="<?php echo $resourcePath ?>/img/layout/login.png" width="15" height="15" /> Admin Login</a></p>
    </div>
    <div class="clear"></div>
  </header>
  <div class="flash-news">
    <!-- <marquee behavior="scroll" direction="left" onMouseOver="this.stop();" onMouseOut="this.start();">
             10th STD EXAMINATION RESULT WILL BE PUBLISH ON 1-DEC-2013
         </marquee>-->
  </div>
  <!-- DIV FOR IMAGE SLIDER  -->
  <div align="center">
    <div class="container_slider">
      <div class="folio_block">
        <div class="main_view">
          <div class="window">
            <div class="image_reel"><a href="#"><img
                                    src="public/img/layout/image1.jpg"
                                    alt=""/></a> <a href="#"><img
                                    src="public/img/layout/image2.jpg"
                                    alt=""/></a> <a href="#"><img
                                    src="public/img/layout/image3.jpg"
                                    alt=""/></a> <a href="#"><img
                                    src="public/img/layout/image4.jpg"
                                    alt=""/></a></div>
          </div>
          <div style="display: block;" class="paging"><a class="" href="#" rel="1">1</a> <a class="" href="#"
                                                                                                      rel="2">2</a> <a
                            class="" href="#"
                            rel="3">3</a> <a class="" href="#" rel="4">4</a></div>
        </div>
      </div>
    </div>
    <!-- <img src="img/layout/t3slider.jpg" alt="" width="940" height="380" /> -->
  </div>
  <!-- END OF DIV FOR IMAGE SLIDER  -->
  <div class="wrapper">
    <?php include_once('leftpane.php'); ?>
    <section class="content-pg clearfix">
      <div class="tab-content">
        <div class="tab-pane active" id="hometab">
          <div class="hm-content">
            <h3>Students </h3>
            <table class="table table-hover">
              <thead>
                <tr class="info">
                  <th>Class</th>
                  <th>No.of Boys</th>
                  <th>No.of Girls</th>
                  <th>Total Students</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td >I</td>
                  <td>10</td>
                  <td>30</td>
                  <td>40</td>
                </tr>
                <tr>
                  <td>II</td>
                  <td>32</td>
                  <td>25</td>
                  <td>57</td>
                </tr>
                <tr>
                  <td>III</td>
                  <td>10</td>
                  <td>30</td>
                  <td>40</td>
                </tr>
                <tr>
                  <td>IV</td>
                  <td>32</td>
                  <td>25</td>
                  <td>57</td>
                </tr>
				 <tr>
                  <td>V</td>
                  <td>32</td>
                  <td>25</td>
                  <td>57</td>
                </tr>
				 <tr>
                  <td>VI</td>
                  <td>32</td>
                  <td>25</td>
                  <td>57</td>
                </tr>
				<tr>
                  <td>VII</td>
                  <td>32</td>
                  <td>25</td>
                  <td>57</td>
                </tr>
				<tr>
                  <td>VIII</td>
                  <td>32</td>
                  <td>25</td>
                  <td>57</td>
                </tr>
				<tr>
                  <td>IX</td>
                  <td>32</td>
                  <td>25</td>
                  <td>57</td>
                </tr>
				<tr>
                  <td>X</td>
                  <td>32</td>
                  <td>25</td>
                  <td>57</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <div class="clear"></div>
  </div>
  <?php include_once('footer.php'); ?>
</div>
