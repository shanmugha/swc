<?php include_once('header.php'); ?>
<body id="page">
<script type="text/javascript" src="public/js/jquery_slider.js"></script>
<script type="text/javascript" src="public/js/jquery-1.9.1.js"></script>

<script type="text/javascript" src="public/js/jquery.pikachoose.js"></script>
<script type="text/javascript" src="public/js/jquery.touchwipe.min.js"></script>
<script type="text/javascript" src="public/js/jquery.jcarousel.min.js"></script>

<!-- bottom css for image gallery -->
<link rel="stylesheet" href="public/library/pickachoose/bottom.css"/>
<link rel="stylesheet" href="public/css/jcap.css"/>

<script src="public/js/jquery.capSlide.js"></script>
<style>
    .demo{
        float:left;
    }
    .demo:hover{cursor: pointer}


</style>
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




    //LATEST NEWS

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

            <h2 class="fl">ST.ANN'S SCHOOL</h2> <br/>

        </a>


        <div class="content-login">
             <p style="float:right;"><a href="#sign-up" data-toggle="modal" role="button" class="myButton"><img
                        src="<?php echo $resourcePath ?>/img/layout/login.png" width="15" height="15" /> Admin Login</a></p>
            </p>
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
                        <h4>Gallery</h4>
                    </div>

                    <?php
                    try {
                        $sql_album = "select * from album";
                        $album = mysql_query($sql_album) or die ('Error updating database: ' . mysql_error());
                        while ($albumRow = mysql_fetch_object($album)):
                            $sql_upload = "select album, path from uploads where album = '$albumRow->id'  order by rand() limit 1 ";
                            $upload = mysql_query($sql_upload) or die ('Error updating database: ' . mysql_error());
                            $uploadRow = mysql_fetch_object($upload);
                            if (!empty($uploadRow->album)) {
                                $albumUploadDetails[] = array(
                                    'album_name' => $albumRow->album_name,
                                    'description' => $albumRow->description,
                                    'path' => $uploadRow->path,
                                    'albumId'   => $uploadRow->album
                                );
                            }
                        endwhile;
                    } catch (Exception $e) {
                        echo $e->getMessage();
                        die();
                    }

                    ?>
                    <?php
                    if (!empty($albumUploadDetails)):
                    foreach ($albumUploadDetails as $albumUploadDetail) {
                    ?>
                        <div class="demo">
                          <input type="hidden" class="albumId" value="<?php echo $albumUploadDetail['albumId'];?>">
                            <div id="capslide_img_cont" class="ic_container count9">
                                <img src="<?php echo $albumUploadDetail['path'];?>" width="180" height="240" alt=""/>
                                <div class="overlay" style="display:none;"></div>
                                <div class="ic_caption">
                                    <p class="ic_category">Category</p>
                                    <h3><?php echo $albumUploadDetail['album_name'];?></h3>
                                    <p class="ic_text">
                                        <?php echo $albumUploadDetail['description'];?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php
                    $sql_uploads = "select path from uploads where category='gallery' AND album='$albumUploadDetail[albumId]'";

                    $uploads = mysql_query($sql_uploads) or die ('Error updating database: ' . mysql_error());
                    while ($uploadRow = mysql_fetch_object($uploads)):
                    ?>
                        <?php
                        $albumIdImgs[$albumUploadDetail['albumId']][] = array('albumPath' => $uploadRow->path);
                        endwhile;
                        ?>

                    <?php
                         }
                         endif;
                    ?>
                </div>
            </div>
        </section>
        <div class="clear"></div>
    </div>
    <?php include_once('footer.php'); ?>
</div>

<?php
$i = 0;
foreach($albumIdImgs as $album){
    $albumId  = array_keys($albumIdImgs);
?>
<div id="myModal<?php echo $albumId[$i]?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Gallery</h3>
    </div>
    <div class="modal-body">
        <div class="pikachoose">
            <ul id="pikame<?php echo $albumId[$i];?>" class="jcarousel-skin-pika">
                <?php
                    foreach($album as $albumPath){
                   ?>
                <li><a href="#"><img src="<?php echo $albumPath['albumPath'];?>"/></a><span></span></li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
<?php
    $i++;
    }
?>

<script type="text/javascript">
    $(function() {
        $('.demo').on('click', function(){
            var albumId = $(this).find('.albumId').val();
            var modal = '#myModal'+albumId;
            $(modal).modal('show');
            $("#pikame"+albumId).PikaChoose({carousel:true});
            $(modal).on('hidden', function () {
               window.location.reload();
            })
        });

        $(".count9").capslide({
            caption_color	: '#660e3a',
            caption_bgcolor	: '#3fa6d1',
            overlay_bgcolor : '#3fa6d1',
            border			: '10px solid #3fa6d1',
            showcaption	    : true
        });


    });
</script>