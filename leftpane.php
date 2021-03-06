
<!--<style>
    #accordian a {
        color:inherit;
        text-decoration: none;
    }
</style>-->
<?php
$actualUrl = explode('/', $_SERVER["REQUEST_URI"]);
$cnt       = count($actualUrl) - 1;
$url       = $actualUrl[$cnt];
?>

<!-- Core CSS File. The CSS code needed to make eventCalendar works -->
<link rel="stylesheet" href="public/css/eventCalendar.css">

<!-- Theme CSS file: it makes eventCalendar nicer -->
<link rel="stylesheet" href="public/css/eventCalendar_theme_responsive.css">
<script src="public/js/jquery.eventCalendar.js" type="text/javascript"></script>

<aside class="left-box">
    <div class="news-box">
    <div id='cssmenu'>
        <ul>
            <li class='<?php if($url == ''){echo 'active';}else{echo '';}?>'><a href='<?php echo $baseUrl;?>'><span>Home</span></a></li>
            <li class='<?php if($url == 'about.php'){echo 'active';}else{echo '';}?>'><a href='about.php'><span>About</span></a></li>
            <li class='<?php if($url == 'gallery.php'){echo 'active';}else{echo '';}?>'><a href='gallery.php'><span>Gallery</span></a></li>
            <li class='has-sub'><a href='#'><span>People</span></a>
                <ul style="<?php if(in_array($url, array('students.php', 'teachers.php', 'management.php'))){echo "display:block";}else{echo "display:none";}?>">
                    <li class="<?php if($url == 'students.php'){echo 'active';}else{echo '';}?>"><a href='students.php'><span>Students</span></a></li>
                    <li class="<?php if($url == 'teachers.php'){echo 'active';}else{echo '';}?>"><a href='teachers.php'><span>Teachers</span></a></li>
                    <li class='<?php if($url == 'management.php'){echo 'active';}else{echo '';}?>'><a href='management.php'><span>Management</span></a></li>
                </ul>
            </li>
            <!--<li class='has-sub'><a href='#'><span>Company</span></a>
                <ul>
                    <li><a href='#'><span>About</span></a></li>
                    <li class='last'><a href='#'><span>Location</span></a></li>
                </ul>
            </li>-->
            <li class='<?php if($url == 'contact-us.php'){echo 'active';}else{echo '';}?>'><a href='contact-us.php'><span>Contact Us</span></a></li>
        </ul>
    </div>
    </div>
    <!--here start menu-->
    <!--<div id="accordian">
        <ul>
            <li>
                <a href="<?php /*echo $baseurl."index.php";*/?>"><h3><span class="icon-home"></span>Home</h3></a>
            </li>
            <li class="active">
                <h3><span class="icon-tasks"></span>About</h3>
            </li>
            <li>
                <a href="gallery.php"><h3><span class="icon-calendar"></span>Gallery</h3></a>
            </li>
            <li>
                <h3><span class="icon-heart"></span>People</h3>
                <ul>
                    <li><a href="#">Students</a></li>
                    <li><a href="#">Teachers</a></li>
                    <li><a href="#">Management</a></li>
                </ul>
            </li>
            <li>
                <a href="contact-us.php"><h3><span class="icon-tasks"></span>Contact Us</h3></a>
            </li>
        </ul>
    </div>-->

    <!-- end of menu-->


    <?php
        $sql_news = "SELECT * FROM news";
        $result = mysql_query($sql_news) or die ('Error reading database: ' . mysql_error());
    ?>

    <div class="news-box">
        <h4>Latest News</h4>
        <article class="news-body">
            <div class="ticker">
                <ul id="ticker">
                    <?php
                        if($result) {
                        while ($row = mysql_fetch_array($result)):
                            //print_r($row);
                    ?>
                            <li><?php echo substr(strip_tags($row['news']),0,15);?>  <a href="<?php echo 'latest-news.php?nid='.$row['id'];?>">Read more..</a></li>
                    <?php endwhile;} ?>
                </ul>
            </div>
    </div>
    <div class="news-box">
        <h4>Events</h4>
        <div id="eventCalendarDefault"></div>
    </div>
</aside>
<script>
    $(document).ready(function() {
        $("#eventCalendarDefault").eventCalendar({
            eventsjson: 'events.json.php',
            jsonDateFormat: 'human',
            startWeekOnMonday: false,
            eventsScrollable: true
        });
    });
</script>