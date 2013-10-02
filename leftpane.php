<style>
    #accordian a {
        color:inherit;
        text-decoration: none;
    }
</style>
<aside class="left-box">
    <!--here start menu-->
    <div id="accordian">
        <ul>
            <li>
                <a href="http://swc/"><h3><span class="icon-dashboard"></span>Home</h3></a>
            </li>
            <!-- we will keep this LI open by default -->
            <li class="active">
                <h3><span class="icon-tasks"></span>About</h3>
            </li>
            <li>
                <h3><span class="icon-calendar"></span>Gallery</h3>
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
                <a href="contact-us.php"><h3><span class="icon-heart"></span>Contact Us</h3></a>
            </li>
        </ul>
    </div>

    <!-- end of menu-->


    <?php
        $sql_news = "SELECT * FROM news";
        $result = mysql_query($sql_news) or die ('Error reading database: ' . mysql_error());
    ?>

    <div class="news-box">
        <h4>Lalest News</h4>
        <article class="news-body">
            <div class="ticker">
                <ul id="ticker">
                    <?php
                        if($result) {
                        while ($row = mysql_fetch_array($result)):
                    ?>
                            <li><?php echo $row['news'];?>  <a href="#">Read more..</a></li>
                    <?php endwhile;} ?>
                </ul>
            </div>
    </div>
    <div class="news-box">
        <h4>Events</h4>
        <article class="news-body"> <a href="#"> <img src="public/img/layout/calendar.png" /> </a> </article>
    </div>
</aside>