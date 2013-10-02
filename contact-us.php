<?php include_once('header.php'); ?>
<body id="page">
<script type="text/javascript" src="public/js/jquery_slider.js"></script>
<script type="text/javascript" src="public/js/jquery-1.9.1.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">

    /*jQuery time*/
    $(document).ready(function () {
        $("#accordian h3").click(function () {
            //slide up all the link lists
            $("#accordian ul ul").slideUp();
            //slide down the link list below the h3 clicked - only if its closed
            if (!$(this).next().is(":visible")) {
                $(this).next().slideDown();
            }
        })
    })




    <!--  LATEST NEWS-->

    function ticker() {
        $('#ticker li:first').slideUp(function () {
            $(this).appendTo($('#ticker')).slideDown();
        });
    }
    setInterval(ticker, 3000);

    <!--  END OF LATEST NEWS-->


    <!--IMAGE SLIDER JS CODE-->

    $(document).ready(function () {

        //Set Default State of each portfolio piece
        $(".paging").show();
        $(".paging a:first").addClass("active");

        //Get size of images, how many there are, then determin the size of the image reel.
        var imageWidth = $(".window").width();
        var imageSum = $(".image_reel img").size();
        var imageReelWidth = imageWidth * imageSum;

        //Adjust the image reel to its new size
        $(".image_reel").css({'width': imageReelWidth});

        //Paging + Slider Function
        rotate = function () {
            var triggerID = $active.attr("rel") - 1; //Get number of times to slide
            var image_reelPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide

            $(".paging a").removeClass('active'); //Remove all active class
            $active.addClass('active'); //Add active class (the $active is declared in the rotateSwitch function)

            //Slider Animation
            $(".image_reel").animate({
                left: -image_reelPosition
            }, 500);

        };

        //Rotation + Timing Event
        rotateSwitch = function () {
            play = setInterval(function () { //Set timer - this will repeat itself every 3 seconds
                $active = $('.paging a.active').next();
                if ($active.length === 0) { //If paging reaches the end...
                    $active = $('.paging a:first'); //go back to first
                }
                rotate(); //Trigger the paging and slider function
            }, 3000); //Timer speed in milliseconds (3 seconds)
        };

        rotateSwitch(); //Run function on launch

        //On Hover
        $(".image_reel a").hover(function () {
            clearInterval(play); //Stop the rotation
        }, function () {
            rotateSwitch(); //Resume rotation
        });

        //On Click
        $(".paging a").click(function () {
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
                    <section class="hm-content">
                        <h4>Contact Us</h4>
                        <table class="address">
                            <tbody>
                            <tr>
                                <th>Address</th>
                                <td> ST.ANN'S SCHOOL - Affiliated to C.B.S.E <br/> AYOOR- 691 533<br/> KOLLAM (Dist.), KERALA</td>
								
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>0475-2294485</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>stannsayur@yahoo.com</td>
                            </tr>
                            <tr>
                                <th>Fax</th>
                                <td>0475-2294485</td>
                            </tr>
                            <tbody>
                        </table>
                        <div class="g-map">
                            <!--<img src="public//img/layout/map.png" />-->
                            <div id="map-canvas" style="height: 250px;width: 600px;"></div>

                        </div>
                        <div class="clear"></div>
                    </section>
                    <section class="call-form">
                        <form class="bs-docs-example form-horizontal">
                            <div class="control-group">
                                <label for="inputEmail" class="control-label">Name</label>

                                <div class="controls">
                                    <input type="text" placeholder="Name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="inputEmail" class="control-label">Phone Number</label>

                                <div class="controls">
                                    <input type="text" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="inputEmail" class="control-label">Email</label>

                                <div class="controls">
                                    <input type="text" placeholder="Email" id="inputEmail">
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="inputEmail" class="control-label">Address</label>

                                <div class="controls">
                                    <textarea type="text" placeholder="Address"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button class="btn" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </section>
        <div class="clear"></div>
    </div>
    <?php include_once('footer.php'); ?>
</div>

<script>

    function initialize() {
        var myLatlng = new google.maps.LatLng(8.893488, 76.857044);
        var mapOptions = {
            zoom: 15,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        var contentString = "<div><h5>St Anns Central School</h5></div>"

        var infowindow = new google.maps.InfoWindow({
            content: contentString,
            width: 250
        });

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: "ST.ANN'S SCHOOL!"
        });

        google.maps.event.addListener(marker, 'click', function () {
            infowindow.open(map, marker);
        });

    }

    google.maps.event.addDomListener(window, 'load', initialize);


</script>
